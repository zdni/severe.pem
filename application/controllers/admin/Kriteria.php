<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'kriteria_model',
        ]);
        $this->data['menu_id'] = 'kriteria_index';
	}

	public function index()
    {
        $this->data['datas'] = $this->kriteria_model->kriteria()->result();
        $this->data['page'] = 'Kriteria';
        $this->render('admin/kriteria');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kode', 'Kode Kriteria', 'required');
        $this->form_validation->set_rules('nama', 'Nama Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Kriteria Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $bobot = $this->input->post('bobot');
            $jenis = $this->input->post('jenis');
            $tipe = $this->input->post('tipe');

            $data['kode'] = $kode;
            $data['nama'] = $nama;
            $data['bobot'] = $bobot;
            $data['jenis'] = $jenis;
            $data['tipe'] = $tipe;
        
            if( $this->kriteria_model->tambah( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat Kriteria Baru!';
            } else {
                $message = 'Gagal Membuat Kriteria Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/kriteria') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('kode', 'Kode Kriteria', 'required');
        $this->form_validation->set_rules('nama', 'Nama Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Kriteria Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $bobot = $this->input->post('bobot');
            $jenis = $this->input->post('jenis');
            $tipe = $this->input->post('tipe');

            $data['kode'] = $kode;
            $data['nama'] = $nama;
            $data['bobot'] = $bobot;
            $data['jenis'] = $jenis;
            $data['tipe'] = $tipe;
        
            if( $this->kriteria_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Kriteria!';
            } else {
                $message = 'Gagal Mengubah Kriteria!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/kriteria') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/kriteria') );

        $alert = 'error';
        $message = 'Gagal Menghapus Kriteria!';

        $this->form_validation->set_rules('id', 'Id Kriteria', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->kriteria_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Kriteria!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/kriteria') );
    }
}
