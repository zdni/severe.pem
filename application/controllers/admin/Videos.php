<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends User_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'videos_model',
        ]);
		$this->load->library('upload');
	}

	public function index()
    {
        // $this->data['page'] = 'Beranda';
        // $this->render('admin/dashboard');
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Judul Video', 'required');
        $this->form_validation->set_rules('link', 'Link Video Video', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Video Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $link = $this->input->post('link');
            $title = $this->input->post('title');
            $is_show = $this->input->post('is_show');
            $laboratory_id = $this->input->post('laboratory_id');

            $data['title'] = $title;
            $data['is_show'] = $is_show;
            $data['link'] = $link;
            $data['laboratory_id'] = $laboratory_id;
            
            if( $this->videos_model->create( $data ) )
            {
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('message', 'Berhasil Membuat Data Video Baru!');
                return redirect( base_url('admin/laboratories/detail/') . $laboratory_id );
            } else {
                $message = 'Gagal Membuat Data Video Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/laboratories') );
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/laboratories') );

        $this->form_validation->set_rules('id', 'Id Video', 'required');
        $this->form_validation->set_rules('title', 'Judul Video', 'required');
        $this->form_validation->set_rules('link', 'Link Video', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Video! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $is_show = $this->input->post('is_show');
            $link = $this->input->post('link');
            $laboratory_id = $this->input->post('laboratory_id');
            
            $data['title'] = $title;
            $data['is_show'] = $is_show;
            $data['link'] = $link;

            if( $this->videos_model->update( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Video!';
            } else {
                $message = 'Gagal Mengubah Video!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/laboratories/detail/') . $laboratory_id );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/laboratories') );

        $alert = 'error';
        $message = 'Gagal Menghapus Video!';

        $this->form_validation->set_rules('id', 'Id Video', 'required');
        if( $this->form_validation->run() )
        {
            $laboratory_id = $this->input->post('laboratory_id');
            $id = $this->input->post('id');
            if( $this->videos_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Video!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/laboratories/detail/') . $laboratory_id );
    }
}
