<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'documents_model',
            'downloads_model',
        ]);
		$this->load->library('upload');
        $this->data['menu_id'] = 'documents_index';
	}

	public function index()
    {
        $this->data['datas'] = $this->downloads_model->downloads()->result();
        $this->data['page'] = 'Daftar Menu Dokumen';
        $this->render('admin/downloads');
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Judul Dokumen', 'required');
        $this->form_validation->set_rules('download_id', 'Menu Dokumen', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Dokumen Baru! <br> Silahkan isi semua inputan!';
        $detail = '';
        if ( $this->form_validation->run() )
        {
            $title = $this->input->post('title');
            $download_id = $this->input->post('download_id');

            $data['title'] = $title;
            $data['download_id'] = $download_id;

            $slug = str_replace( " ", "_", $title );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $data['slug'] = $slug;
            $data['file'] = NULL;
			if($_FILES['file']['name']){
				$uploaded_file = $this->upload_file( $slug );
				$data['file'] = $uploaded_file['file_name'];
			}
			
            if( $this->documents_model->create( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menambah Dokumen Baru!';
            } else {
                $message = 'Gagal Menambah Dokumen Baru!';
            }
            $detail = ( $download_id ) ? 'detail/' . $download_id : '';
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/documents/') . $detail );
    }

    public function detail( $download_id = NULL )
    {
        if( !$download_id ) return redirect( base_url('admin/documents/') );

        $this->data['menu'] = $this->downloads_model->downloads( $download_id )->row();
        $this->data['datas'] = $this->documents_model->documents( $download_id )->result();
        $this->data['download_id'] = $download_id;
        $this->data['page'] = 'Daftar Dokumen';
        $this->render('admin/documents');
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/documents') );

        $this->form_validation->set_rules('title', 'Judul Dokumen', 'required');
        $this->form_validation->set_rules('download_id', 'Menu Dokumen', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Dokumen! <br> Silahkan isi semua inputan!';
        $detail = '';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $slug = $this->input->post('slug');
            $download_id = $this->input->post('download_id');

            $data['title'] = $title;
			if($_FILES['file']['name']){
				$uploaded_file = $this->upload_file( $slug );
				$data['file'] = $uploaded_file['file_name'];
			}

            if( $this->documents_model->update( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Dokumen!';
            } else {
                $message = 'Gagal Mengubah Dokumen!';
            }
            if( $download_id ) $detail = 'detail/' . $download_id;
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/documents/') . $detail );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/documents') );

        $alert = 'error';
        $message = 'Gagal Menghapus Dokumen!';

        $this->form_validation->set_rules('id', 'Id Dokumen', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $download_id = $this->input->post('download_id');
            if( $this->documents_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Dokumen!';
            }
            $detail = ($download_id) ? 'detail/' . $download_id : '';
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/documents/') . $detail );
    }

	public function upload_file( $title )
	{
		$config['upload_path']          = './uploads/documents/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'pdf|word|xls|xlsx|ppt|pptx';
		$config['max_size']             = 204800;
		$config['file_name']			= strtolower($title);
        
		$this->upload->initialize( $config );
		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('admin/documents') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
	}
}
