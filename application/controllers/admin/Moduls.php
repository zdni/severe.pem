<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moduls extends User_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'moduls_model',
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
        $this->form_validation->set_rules('title', 'Judul Bahan Ajar', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Bahan Ajar Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $title = $this->input->post('title');
            $is_show = $this->input->post('is_show');
            $laboratory_id = $this->input->post('laboratory_id');

            $slug = str_replace( " ", "_", $title );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $data['title'] = $title;
            $data['is_show'] = $is_show;
            $data['laboratory_id'] = $laboratory_id;
            $data['file'] = NULL;
			if($_FILES['file']['name']){
				$uploaded_file = $this->upload_file( $slug );
				$data['file'] = $uploaded_file['file_name'];
			}
            
            if( $this->moduls_model->create( $data ) )
            {
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('message', 'Berhasil Membuat Data Bahan Ajar Baru!');
                return redirect( base_url('admin/laboratories/detail/') . $laboratory_id );
            } else {
                $message = 'Gagal Membuat Data Bahan Ajar Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/laboratories') );
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/laboratories') );

        $this->form_validation->set_rules('id', 'Id Bahan Ajar', 'required');
        $this->form_validation->set_rules('title', 'Bahan Ajar', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Bahan Ajar! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $is_show = $this->input->post('is_show');
            $laboratory_id = $this->input->post('laboratory_id');
            
            $data['title'] = $title;
            $data['is_show'] = $is_show;

            $slug = str_replace( " ", "_", $title );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );
            
			if($_FILES['file']['name']){
				$uploaded_file = $this->upload_file( $slug );
				$data['file'] = $uploaded_file['file_name'];
			}

            if( $this->moduls_model->update( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Bahan Ajar!';
            } else {
                $message = 'Gagal Mengubah Bahan Ajar!';
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
        $message = 'Gagal Menghapus Bahan Ajar!';

        $this->form_validation->set_rules('id', 'Id Bahan Ajar', 'required');
        if( $this->form_validation->run() )
        {
            $laboratory_id = $this->input->post('laboratory_id');
            $id = $this->input->post('id');
            if( $this->moduls_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Bahan Ajar!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/laboratories/detail/') . $laboratory_id );
    }

	public function upload_file( $title )
	{
		$config['upload_path']          = './uploads/laboratories/moduls/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'pdf|word|xls|xlsx|ppt|pptx';
		$config['max_size']             = 204800;
		$config['file_name']			= strtolower($title);
        
		$this->upload->initialize( $config );
		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('admin/laboratories') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
	}
}
