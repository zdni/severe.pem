<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends Admin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'downloads_model',
        ]);
	}

	public function index()
    {
        $this->data['datas'] = $this->downloads_model->downloads()->result();
        $this->data['page'] = 'Daftar Menu Dokumen';
        $this->render('admin/downloads');
    }

    public function create()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('header', 'Header', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Menu Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $menu = $this->input->post('menu');
            $header = $this->input->post('header');

            $data['menu'] = $menu;
            $data['header'] = $header;
			
            if( $this->downloads_model->create( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat Menu Baru!';
            } else {
                $message = 'Gagal Membuat Menu Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/documents') );
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/documents') );

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('header', 'Header', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Menu! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $menu = $this->input->post('menu');
            $header = $this->input->post('header');

            $data['menu'] = $menu;
            $data['header'] = $header;
           
            if( $this->downloads_model->update( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Menu!';
            } else {
                $message = 'Gagal Mengubah Menu!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/documents') );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/documents') );

        $alert = 'error';
        $message = 'Gagal Menghapus Menu!';

        $this->form_validation->set_rules('id', 'Id Menu', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->downloads_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Menu!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/documents') );
    }
}
