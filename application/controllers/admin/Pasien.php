<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'pasien_model',
        ]);
        $this->data['menu_id'] = 'pasien_index';
	}

	public function index()
    {
        $this->data['datas'] = $this->pasien_model->pasien()->result();
        $this->data['page'] = 'Pasien';
        $this->render('admin/pasien');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama Pasien', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Pasien Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $nama = $this->input->post('nama');

            $data['nama'] = $nama;
        
            if( $this->pasien_model->tambah( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat Pasien Baru!';
            } else {
                $message = 'Gagal Membuat Pasien Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/pasien') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('nama', 'Nama pasien', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Pasien Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');

            $data['nama'] = $nama;
        
            if( $this->pasien_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Pasien!';
            } else {
                $message = 'Gagal Mengubah Pasien!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/pasien') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/pasien') );

        $alert = 'error';
        $message = 'Gagal Menghapus Pasien!';

        $this->form_validation->set_rules('id', 'Id Pasien', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->pasien_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Pasien!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/pasien') );
    }
}