<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratories extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'laboratories_model',
            'moduls_model',
            'users_model',
            'videos_model'
        ]);
        $this->data['menu_id'] = 'laboratories_index';
	}

	public function index()
    {
        // $a = 'https://www.youtube.com/watch?v=6qpEsghHno4';
        // $explode = explode( "v=", $a );
        // echo "<img src='http://img.youtube.com/vi/" . $explode[1] . "/0.jpg'>";
        // die;
        if( $this->session->userdata('role_name') == 'admin' ) {
            $datas = $this->laboratories_model->laboratories()->result();
            unset( $datas[0] );
        }
        if( $this->session->userdata('role_name') == 'uadmin' ) {
            $laboratory_id = $this->session->userdata('role_name');
            $datas = $this->laboratories_model->laboratory( $laboratory_id )->result();
        }
        $this->data['datas'] = $datas;
        
        $this->data['page'] = 'Daftar Laboratorium';
        $this->render('admin/laboratories');
    }
    
    public function create()
    {
        $this->form_validation->set_rules('name', 'Nama Laboratorium', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Laboratorium Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $name = $this->input->post('name');

            $slug = str_replace( " ", "_", $name );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $data['name'] = $name;
            $data['slug'] = $slug;
            
            $id = $this->laboratories_model->create( $data );
            if( $id )
            {
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('message', 'Berhasil Membuat Data Laboratorium Baru!');
                return redirect( base_url('admin/laboratories/detail/') . $id );
            } else {
                $message = 'Gagal Membuat Data Laboratorium Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/laboratories') );
    }

    public function detail( $id = NULL )
    {
        if( !$id ) return redirect( base_url('admin/laboratories') );

        $data = $this->laboratories_model->laboratory( $id )->row();
        $data->file_content = '';

        if( file_exists( './uploads/laboratories/' . $data->file ) )
        {
            $data->file_content = file_get_contents( './uploads/laboratories/' . $data->file );
        }
        
        $this->data['users'] = $this->users_model->users_laboratory( $id )->result();
        $this->data['moduls'] = $this->moduls_model->moduls( $id )->result();
        $this->data['videos'] = $this->videos_model->videos( $id )->result();
        $this->data['data'] = $data;
        $this->data['page'] = 'Detail Laboratorium';
        $this->render('admin/laboratory');
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/laboratories') );

        $this->form_validation->set_rules('id', 'Id Laboratorium', 'required');
        $this->form_validation->set_rules('name', 'Laboratorium Laboratorium', 'required');
        $this->form_validation->set_rules('content', 'Konten Laboratorium', 'required');   

        $alert = 'error';
        $message = 'Gagal Mengubah Data Laboratorium! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $content = $this->input->post('content');
            $file = $this->input->post('file') ? $this->input->post('file') : $this->input->post('slug') . '.html';
            $name = $this->input->post('name');
            
            if( !file_put_contents( './uploads/laboratories/' . $file, $content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Mengubah File Laboratorium!';
            } else {
                $data['name'] = $name;
                $data['file'] = $file;
    
                if( $this->laboratories_model->update( $id, $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Mengubah Laboratorium!';
                } else {
                    $message = 'Gagal Mengubah Laboratorium!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/laboratories') );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/laboratories') );

        $alert = 'error';
        $message = 'Gagal Menghapus Laboratorium!';

        $this->form_validation->set_rules('id', 'Id Laboratorium', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->laboratories_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Laboratorium!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/laboratories') );
    }
}
