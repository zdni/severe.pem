<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends User_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'kriteria_model',
            'hasil_model',
            'pasien_model',
            'penilaian_model',
            'subkriteria_model',
        ]);
        $this->data['menu_id'] = 'perhitungan_index';
	}

	public function index()
    {
        $this->data['datas'] = $this->kriteria_model->kriteria()->result();
        $this->data['page'] = 'Perhitungan Metode COPRAS';
        $this->render('admin/perhitungan');
    }

    public function copras()
    {
        $kri_id_min = [];
        $kri_id_max = [];
        $total_per_kriteria = [];
        $normalisasi_matriks = [];
        $matriks_dij = [];
        $matriks_nilai = [];
        $s_plus_i_array = [];
        $s_min_i_array = [];
        $total_s_min_i = 0;
        $satu_per_s_min_i = [];
        $total_satu_per_s_min_i = 0;
        $bobot_relatif = [];
        $max_q = 0;
        $q_i = [];
        $u_i = [];
        
        $kriteria = $this->kriteria_model->kriteria()->result();
        $jumlah_bobot = $this->kriteria_model->jumlah_bobot()->row()->jumlah;
        $alternatif = $this->pasien_model->pasien()->result();

        $jumlah_kriteria = count( $kriteria );

        // buat matriks nilai
        foreach ($alternatif as $key => $pas ) {
            $pas->penilaian = [];
            $data = [];
            $penilaian = $this->penilaian_model->penilaian( NULL, $pas->id )->result();
            foreach ($penilaian as $pen) {
                $pas->penilaian[$pen->kriteria_id] = $pen->bobot_subkriteria;
                $data[$pen->kriteria_id] = $pen->bobot_subkriteria;
                if( isset($total_per_kriteria[$pen->kriteria_id]) ) {
                    $total_per_kriteria[$pen->kriteria_id] += $pen->bobot_subkriteria;
                } else {
                    $total_per_kriteria[$pen->kriteria_id] = $pen->bobot_subkriteria;
                }
            }
            if( $jumlah_kriteria != count( $data ) ) {
                // $this->session->set_flashdata('alert', 'error');
                // $this->session->set_flashdata('message', 'Data Tidak Lengkap! Silahkan Lengkapi Data Terlebih Dahulu');
                // return redirect( base_url( 'admin/perhitungan' ) );
                unset( $alternatif[$key] );
            } else {
                $matriks_nilai[$pas->nama] = $data;
            }
        }

        // normalisasi matriks
        foreach ( $kriteria as $kri ) {
            $kri->subdatas = $this->subkriteria_model->subkriteria( NULL, $kri->id )->result();
            if( $kri->jenis == 'cost' ) $kri_id_min[] = $kri->id;
            if( $kri->jenis == 'benefit' ) $kri_id_max[] = $kri->id;

            foreach ($alternatif as $pasien) {
                $normalisasi_matriks[$pasien->nama][$kri->id] = $matriks_nilai[$pasien->nama][$kri->id] / $total_per_kriteria[$kri->id];
                $matriks_dij[$pasien->nama][$kri->id] = $normalisasi_matriks[$pasien->nama][$kri->id] * ($kri->bobot / $jumlah_bobot);
            }
        }
        
        foreach ($matriks_dij as $altern => $m_dij) {
            $total_id_min = 0;
            $total_id_max = 0;
            foreach ($kri_id_min as $kri ) {
                $total_id_min += $m_dij[$kri];
            }
            foreach ($kri_id_max as $kri ) {
                $total_id_max += $m_dij[$kri];
            }
            ( $total_id_min == 0 ) ? $total_satu_per_s_min_i += 0 : $total_satu_per_s_min_i += (1 / $total_id_min);
            $s_min_i_array[$altern] = $total_id_min;
            $total_s_min_i += $total_id_min;
            $s_plus_i_array[$altern] = $total_id_max;
        }
        foreach ($s_min_i_array as $altern => $s_min_i) {
            $bobot_relatif[$altern] = $s_min_i * $total_satu_per_s_min_i; 
        }
        
        if( count($s_plus_i_array) == count($bobot_relatif) ) {
            foreach ($s_plus_i_array as $altern => $s_plus_i) {
                $result = ( $bobot_relatif[$altern] == 0 ) ? $s_plus_i : $s_plus_i + ($total_s_min_i / $bobot_relatif[$altern]);
                $q_i[$altern] = $result;      
                if( $result > $max_q ) $max_q = $result;
            }
        }
        foreach ($q_i as $altern => $value) {
            $u_i[$altern] = $value / $max_q * 1;
        }
        $ordered_u_i = $u_i;
        rsort($ordered_u_i);
        $datas = [];
        foreach ($u_i as $altern => $value) {
            foreach ($ordered_u_i as $rank => $value_ordered) {
                if( $value_ordered == $value ) {
                    $datas[$altern] = ['hasil' => $value, 'rank' => $rank+1];
                    $pasien_id = $this->pasien_model->pasien_berdasarkan_nama( $altern )->row()->id;
                    $hasil[] = ['ui' => $value, 'ranking' => $rank+1, 'pasien_id' => $pasien_id];
                } 
            }
        }

        $this->hasil_model->hapus_semua(  );
        $this->hasil_model->tambah_batch( $hasil );

        $this->data['normalisasi_matriks'] = $normalisasi_matriks;
        $this->data['matriks_dij'] = $matriks_dij;
        $this->data['datas'] = $datas;
        $this->data['kriteria'] = $kriteria;
        $this->data['pasien'] = $alternatif;
        $this->data['s_plus_i_array'] = $s_plus_i_array;
        $this->data['s_min_i_array'] = $s_min_i_array;
        $this->data['q_i'] = $q_i;
        $this->data['max_q'] = $max_q;
        $this->data['page'] = 'Perhitungan Metode COPRAS';
        $this->data['status'] = ['Normal', 'Malnutrisi Ringan (Mild PEM)', 'Malnutrisi Sedang (Moderate PEM)', 'Severe PEM'];
        $this->render('admin/copras');
    }
}