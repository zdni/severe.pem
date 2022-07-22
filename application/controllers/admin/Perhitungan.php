<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'kriteria_model',
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
        $kriteria = $this->kriteria_model->kriteria()->result();
        $jumlah_bobot_kri = 0;
        $kri_id_min = [];
        $kri_id_max = [];
        foreach ($kriteria as $kri ) {
            $kri->subdatas = $this->subkriteria_model->subkriteria( NULL, $kri->id )->result();
            $jumlah_bobot_kri += $kri->bobot;
            if( $kri->jenis == 'cost' ) {
                $kri_id_min[] = $kri->id;
            }
            if( $kri->jenis == 'benefit' ) {
                $kri_id_max[] = $kri->id;
            }
        }

        $matriks_nilai = [];
        
        $pasien = $this->pasien_model->pasien()->result();
        // buat matriks nilai
        foreach ($pasien as $pas ) {
            $pas->penilaian = [];
            $data = [];
            $penilaian = $this->penilaian_model->penilaian( NULL, $pas->id )->result();
            foreach ($penilaian as $pen) {
                $pas->penilaian[$pen->kriteria_id] = $pen->bobot_subkriteria;
                $data[$pen->kriteria_id] = $pen->bobot_subkriteria;
            }
            $matriks_nilai[] = $data;
        }
        
        // normalisasi matriks
        $normalisasi_matriks = $matriks_nilai;
        $matriks_dij = $matriks_nilai;
        foreach ($kriteria as $kri ) {
            $sum = 0;
            for ($i=0; $i < count($matriks_nilai); $i++) { 
                $sum += $matriks_nilai[$i][$kri->id];
            }
            for ($i=0; $i < count($matriks_nilai); $i++) { 
                $normalisasi_matriks[$i][$kri->id] = $matriks_nilai[$i][$kri->id] / $sum;
                $matriks_dij[$i][$kri->id] = $normalisasi_matriks[$i][$kri->id] * ($kri->bobot / $jumlah_bobot_kri);
            }
        }
        
        $s_plus_i = [];
        $s_min_i = [];
        $total_s_min_i = 0;
        $satu_per_s_min_i = [];
        $total_satu_per_s_min_i = 0;
        for ($i=0; $i < count($matriks_dij); $i++) { 
            $total_id_min = 0;
            $total_id_max = 0;
            foreach ($kri_id_min as $kri ) {
                $total_id_min += $matriks_dij[$i][$kri];
            }
            foreach ($kri_id_max as $kri ) {
                $total_id_max += $matriks_dij[$i][$kri];
            }
            ( $total_id_min == 0 ) ? $total_satu_per_s_min_i += 0 : $total_satu_per_s_min_i += (1 / $total_id_min);
            $s_min_i[] = $total_id_min;
            $total_s_min_i += $total_id_min;
            $s_plus_i[] = $total_id_max;

        }
        $bobot_relatif = [];
        for ($i=0; $i < count($s_min_i); $i++) { 
            $bobot_relatif[] = $s_min_i[$i] * $total_satu_per_s_min_i;
        }
        $max_q = 0;
        $q_i = [];
        if( count($s_plus_i) == count($bobot_relatif) ) {
            for ($i=0; $i < count($s_plus_i); $i++) { 
                ( $bobot_relatif[$i] == 0 ) ? $result = $s_plus_i[$i] : $result = $s_plus_i[$i] + ($total_s_min_i / $bobot_relatif[$i]); 
                $q_i[] = $result;
                if( $result > $max_q ) $max_q = $result;
            }
        }
        $u_i = [];
        for ($i=0; $i < count($q_i); $i++) { 
            $u_i[] = $q_i[$i] / $max_q * 100;
        }

        $this->data['kriteria'] = $kriteria;
        $this->data['pasien'] = $pasien;
        $this->data['page'] = 'Perhitungan Metode COPRAS';
        $this->render('admin/copras');
    }
}