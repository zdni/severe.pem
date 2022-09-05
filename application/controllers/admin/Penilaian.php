<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends User_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'kriteria_model',
            'pasien_model',
            'penilaian_model',
            'subkriteria_model',
        ]);
        $this->data['menu_id'] = 'penilaian_index';
	}

	public function index()
    {
        if( $this->session->userdata('role_name') == 'user' ) {
            return redirect( base_url('admin/penilaian/pasien') );
        }

        $kriteria = $this->kriteria_model->kriteria()->result();
        foreach ($kriteria as $kri ) {
            $kri->subdatas = $this->subkriteria_model->subkriteria( NULL, $kri->id )->result();
        }
        $this->data['kriteria'] = $kriteria;
        $pasien = $datas = [];
        $_pasien = $this->pasien_model->pasien()->result();
        foreach ($_pasien as $pas ) {
            $pas->penilaian = [];
            $penilaian = $this->penilaian_model->penilaian( NULL, $pas->id )->result();
            // print_r( $penilaian );
            // die;
            foreach ($penilaian as $pen) {
                $pas->penilaian[$pen->kriteria_id] = $pen->subkriteria;
                if( $pen->tipe_kriteria == 2 )  $pas->penilaian[$pen->kriteria_id] = $pen->manual_value . ':' . $pen->subkriteria;
            }
            if( $pas->penilaian != [] ) {
                $datas[] = $pas;
            } else {
                $pasien[] = $pas;
            }
        }
        $this->data['pasien'] = $pasien;
        $this->data['datas'] = $datas;
        $this->data['page'] = 'Penilaian';
        $this->render('admin/penilaian');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('pasien_id', 'Kode penilaian', 'required');
        // $this->form_validation->set_rules('kriteria_id', 'Nama penilaian', 'required');
        $kriteria_manual = $this->kriteria_model->kriteria_berdasarkan_inputan( 2 )->result();

        $alert = 'error';
        $message = 'Gagal Menambah Data Penilaian Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $pasien_id = $this->input->post('pasien_id');
            $kriteria = $this->input->post('kriteria_id');
            $manual_value = $this->input->post('manual_value');
            foreach ($kriteria as $kri) {
                $man_val = NULL;
                $_data = explode(':', $kri);
                if( key_exists($_data[0], $manual_value) ) {
                    $man_val = $manual_value[$_data[0]];
                } 
                $data[] = [
                    'pasien_id' => $pasien_id,
                    'kriteria_id' => $_data[0],
                    'subkriteria_id' => $_data[1],
                    'manual_value' => $man_val,
                ];
            }
            
            if( $this->penilaian_model->tambah_batch( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat Penilaian Baru!';
            } else {
                $message = 'Gagal Membuat Penilaian Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/penilaian') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('pasien_id', 'Kode penilaian', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Penilaian Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $pasien_id = $this->input->post('pasien_id');
            $kriteria = $this->input->post('kriteria_id');
            $manual_value = $this->input->post('manual_value');
            foreach ($kriteria as $kri) {
                $man_val = NULL;
                $_data = explode(':', $kri);
                $data['subkriteria_id'] = $_data[1];
                if( key_exists($_data[0], $manual_value) ) {
                    $man_val = $manual_value[$_data[0]];
                }
                $data['manual_value'] = $man_val;
                
                if( $this->penilaian_model->ubah( $pasien_id, $_data[0], $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Mengubah Penilaian!';
                } else {
                    $message = 'Gagal Mengubah Penilaian!';
                    break;
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/penilaian') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/penilaian') );

        $alert = 'error';
        $message = 'Gagal Menghapus Penilaian!';

        $this->form_validation->set_rules('id', 'Id Pasien', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->penilaian_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Penilaian!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/penilaian') );
    }

    public function pasien()
    {
        $user_id = $this->session->userdata('user_id');
        $pasien = $this->pasien_model->penilaian( $user_id )->row();
        
        $kriteria = $this->kriteria_model->kriteria()->result();
        foreach ($kriteria as $kri ) {
            $kri->subdatas = $this->subkriteria_model->subkriteria( NULL, $kri->id )->result();
            
            $penilaian = $this->penilaian_model->penilaian_per_pasien_kriteria( $pasien->id, $kri->id )->row();
            $kri->subkriteria_id = NULL;
            $kri->nilai = '-';
            $kri->keterangan = '-';
            
            if( $penilaian ) {
                $subkriteria = $this->subkriteria_model->subkriteria( $penilaian->subkriteria_id )->row();
                if( $subkriteria ) {
                    $kri->subkriteria_id = $penilaian->subkriteria_id;
                    $kri->nilai = $subkriteria->nilai;
                    $kri->keterangan = $subkriteria->keterangan;

                    if( $kri->tipe == 2 ) $kri->nilai = $penilaian->manual_value;
                }
            }
        }
        $this->data['datas'] = $kriteria;
        $this->data['pasien_id'] = $pasien->id;

        $this->data['page'] = 'Penilaian Pasien';
        $this->render('pasien');
    }

    public function ubah_penilaian()
    {
        $this->form_validation->set_rules('pasien_id', 'Kode penilaian', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Penilaian Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $pasien_id = $this->input->post('pasien_id');
            $kriteria = $this->input->post('kriteria_id');
            $manual_value = $this->input->post('manual_value');
            
            $this->penilaian_model->hapus( $pasien_id );
            
            foreach ($kriteria as $kri) {
                $man_val = NULL;
                
                $_data = explode(':', $kri);
                $data['pasien_id'] = $pasien_id;
                $data['kriteria_id'] = $_data[0];
                $data['sequence'] = 1;
                $data['subkriteria_id'] = $_data[1];
                
                if( key_exists($_data[0], $manual_value) ) {
                    $man_val = $manual_value[$_data[0]];
                }
                $data['manual_value'] = $man_val;
                
                if( $this->penilaian_model->tambah( $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Mengubah Penilaian!';
                } else {
                    $message = 'Gagal Mengubah Penilaian!';
                    break;
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/penilaian/pasien') );
    }
}
