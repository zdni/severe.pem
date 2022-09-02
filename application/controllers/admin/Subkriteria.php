<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'kriteria_model',
            'subkriteria_model',
        ]);
        $this->data['menu_id'] = 'subkriteria_index';
	}

	public function index()
    {
        $datas = $this->kriteria_model->kriteria()->result();
        foreach ($datas as $data ) {
            $data->subdatas = $this->subkriteria_model->subkriteria( NULL, $data->id )->result();
        }
        $this->data['datas'] = $datas;
        $this->data['page'] = 'Sub Kriteria';
        $this->render('admin/subkriteria');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kriteria_id', 'Kriteria', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Sub Kriteria Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $kriteria_id = $this->input->post('kriteria_id');
            $nilai = $this->input->post('nilai');
            $keterangan = $this->input->post('keterangan');
            $bobot = $this->input->post('bobot');

            $data['kriteria_id'] = $kriteria_id;
            $data['nilai'] = $nilai;
            $data['keterangan'] = $keterangan;
            $data['bobot'] = $bobot;
        
            if( $this->subkriteria_model->tambah( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat Sub Kriteria Baru!';
            } else {
                $message = 'Gagal Membuat Sub Kriteria Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/subkriteria') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Sub Kriteria Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            
            $nilai = $this->input->post('nilai');
            $keterangan = $this->input->post('keterangan');
            $bobot = $this->input->post('bobot');

            $data['nilai'] = $nilai;
            $data['keterangan'] = $keterangan;
            $data['bobot'] = $bobot;

            if( $this->subkriteria_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Sub Kriteria!';
            } else {
                $message = 'Gagal Mengubah Sub Kriteria!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/subkriteria') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/subkriteria') );

        $alert = 'error';
        $message = 'Gagal Menghapus Sub Kriteria!';

        $this->form_validation->set_rules('id', 'Id Sub Kriteria', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->subkriteria_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Sub Kriteria!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/subkriteria') );
    }
}
