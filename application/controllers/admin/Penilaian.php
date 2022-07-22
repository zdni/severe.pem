<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends Uadmin_Controller {
	
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
            foreach ($penilaian as $pen) {
                $pas->penilaian[$pen->kriteria_id] = $pen->subkriteria;
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

        $alert = 'error';
        $message = 'Gagal Menambah Data Penilaian Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $pasien_id = $this->input->post('pasien_id');
            $kriteria = $this->input->post('kriteria_id');

            foreach ($kriteria as $kri) {
                $_data = explode(':', $kri);
                $data[] = [
                    'pasien_id' => $pasien_id,
                    'kriteria_id' => $_data[0],
                    'subkriteria_id' => $_data[1],
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
            foreach ($kriteria as $kri) {
                $_data = explode(':', $kri);
                $data['subkriteria_id'] = $_data[1];
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
}
