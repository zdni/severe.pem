<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gizi extends User_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'gizi_model',
        ]);
		$this->load->library('upload');
	}

	public function index()
    {
        $this->data['menu_id'] = 'gizi_index';
        $this->data['artikel'] = '';
        if( file_exists( './uploads/gizi/artikel/gizi.html' ) )
        {
            $this->data['artikel'] = file_get_contents( './uploads/gizi/artikel/gizi.html' );
        }
        
        $this->data['page'] = 'Informasi Gizi';
        $this->render('admin/gizi');
    }

    public function edit_artikel()
    {
        $this->form_validation->set_rules('artikel', 'Artikel', 'required');
        if ( $this->form_validation->run() )
        {
            $content = $this->input->post('content');
            file_put_contents( './uploads/gizi/artikel/gizi.html', $content );
            return redirect( base_url('admin/gizi') );
        } else 
        {
            $this->data['menu_id'] = 'gizi_index';
            $this->data['artikel'] = '';
            if( file_exists( './uploads/gizi/artikel/gizi.html' ) )
            {
                $this->data['artikel'] = file_get_contents( './uploads/gizi/artikel/gizi.html' );
            }
            
            $this->data['page'] = 'Informasi Gizi';
            $this->render('admin/edit_artikel');
        }
    }

    public function foto()
    {
        $this->data['menu_id'] = 'foto_gizi_index';
        $this->data['datas'] = $this->gizi_model->gizi()->result();
        
        $this->data['page'] = 'Foto Gizi Buruk';
        $this->render('admin/foto_gizi');

    }

    public function tambah()
    {
        if( !$_POST ) return redirect( base_url('admin/gizi/foto') );

        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');   

        $alert = 'error';
        $message = 'Gagal Menambahkan Foto! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $title = $this->input->post('title');
            $keterangan = $this->input->post('keterangan');

            $data['title'] = $title;
            $data['keterangan'] = $keterangan;
            
            $slug = str_replace( " ", "_", $title );
            $slug = strtolower( $slug );
            $data['foto'] = NULL;
            if($_FILES['foto']['name']){
                $uploaded_foto = $this->upload_foto( $slug );
                $data['foto'] = $uploaded_foto['file_name'];
            }
            
            if( $this->gizi_model->tambah( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menambahkan Foto!';
            } else {
                $message = 'Gagal Menambahkan Foto!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/gizi/foto') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/gizi/foto') );

        $alert = 'error';
        $message = 'Gagal Menghapus Foto Gizi!';

        $this->form_validation->set_rules('id', 'Id Foto', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->gizi_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Foto Gizi!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/gizi/foto') );
    }

    public function upload_foto( $title )
    {
        $config['upload_path']          = './uploads/gizi/foto/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 2048;
		$config['file_name']			= $title;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('foto')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('admin/gizi/foto') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
    }
}
