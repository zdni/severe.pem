<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questionnaires extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'questionnaires_model',
        ]);
	}

	public function index()
    {
        $laboratory_id = ( $this->session->userdata('role_name') == 'admin' ) ? NULL : $this->session->userdata('laboratory_id');
        $this->data['datas'] = $this->questionnaires_model->questionnaires( $laboratory_id )->result();
        $this->data['page'] = 'Daftar Kuisioner';
        $this->render('admin/questionnaires');
    }
    
    public function create()
    {
        $this->form_validation->set_rules('title', 'Judul Kuisioner', 'required');
        $this->form_validation->set_rules('link', 'Link Kuisioner', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Kuisioner Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $title = $this->input->post('title');
            $link = $this->input->post('link');
            $is_show = $this->input->post('is_show');

            $slug = str_replace( " ", "_", $title );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $data['title'] = $title;
            $data['slug'] = $slug;
            $data['link'] = $link;
            $data['is_show'] = $is_show;
            $data['laboratory_id'] = $this->session->userdata('laboratory_id');

            if( $is_show == 1 ) $this->questionnaires_model->set_all_hidden();
            if( $this->questionnaires_model->create( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat Kuisioner Baru!';
            } else {
                $message = 'Gagal Membuat Kuisioner Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/questionnaires') );
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/questionnaires') );

        $this->form_validation->set_rules('title', 'Judul Kuisioner', 'required');
        $this->form_validation->set_rules('link', 'Link Kuisioner', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Kuisioner! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $link = $this->input->post('link');
            $is_show = $this->input->post('is_show');

            $slug = str_replace( " ", "_", $title );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $data['title'] = $title;
            $data['slug'] = $slug;
            $data['link'] = $link;
            $data['is_show'] = $is_show;
           
            if( $is_show == 1 ) $this->questionnaires_model->set_all_hidden();
            if( $this->questionnaires_model->update( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Kuisioner!';
            } else {
                $message = 'Gagal Mengubah Kuisioner!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/questionnaires') );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/questionnaires') );

        $alert = 'error';
        $message = 'Gagal Menghapus Kuisioner!';

        $this->form_validation->set_rules('id', 'Id Kuisioner', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->questionnaires_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Kuisioner!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/questionnaires') );
    }

}
