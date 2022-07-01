<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'profile_model',
        ]);
	}

	public function index()
    {
        $datas = $this->profile_model->profile()->result();
        $index = 0;
        foreach ($datas as $data) {
            $datas[$index]->file_content = "Konten";
            if( file_exists( './uploads/profile/' . $data->file ) )
            {
                $datas[$index]->file_content = file_get_contents( './uploads/profile/' . $data->file );
            }
            $index++;
        }
        
        $this->data['datas'] = $datas;
        
        $this->data['page'] = 'Profil Poltekkes';
        $this->render('admin/profile');
    }

    public function create()
    {
        if( !$_POST ) return redirect( base_url('admin/profile') );

        $this->form_validation->set_rules('title', 'Titel Profil', 'required');
        $this->form_validation->set_rules('content', 'Konten Profil', 'required');   

        $alert = 'error';
        $message = 'Gagal Menyimpan Profil terbaru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $title = $this->input->post('title');
            $content = $this->input->post('content');

            $slug = str_replace( " ", "_", $title );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $file = $slug . '.html';
            if( !file_put_contents( './uploads/profile/' . $file, $content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Membuat File Profil!';
            } else {
                $data['title'] = $title;
                $data['slug'] = $slug;
                $data['file'] = $file;
    
                if( $this->profile_model->create( $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Membuat Profil Baru!';
                } else {
                    $message = 'Gagal Membuat Profil Baru!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/profile') );
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/profile') );

        $this->form_validation->set_rules('id', 'Id Profil', 'required');
        $this->form_validation->set_rules('title', 'Titel Profil', 'required');
        $this->form_validation->set_rules('content', 'Konten Profil', 'required');   

        $alert = 'error';
        $message = 'Gagal Mengubah Profil terbaru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $content = $this->input->post('content');
            $file = $this->input->post('file');
            $title = $this->input->post('title');

            if( !file_put_contents( './uploads/profile/' . $file, $content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Mengubah File Profil!';
            } else {
                $data['title'] = $title;
    
                if( $this->profile_model->update( $id, $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Mengubah Profil Baru!';
                } else {
                    $message = 'Gagal Mengubah Profil Baru!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/profile') );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/profile') );

        $alert = 'error';
        $message = 'Gagal Menghapus Profil!';

        $this->form_validation->set_rules('id', 'Id Profil', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->profile_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Profil!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/profile') );
    }
}
