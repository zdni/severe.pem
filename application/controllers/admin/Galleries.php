<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleries extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'galleries_model',
        ]);
        $this->data['menu_id'] = 'galleries_index';
		$this->load->library('upload');
	}

	public function index()
    {
        $datas = $this->galleries_model->galleries()->result();
        $this->data['datas'] = $datas;
        
        $this->data['page'] = 'Daftar Galeri';
        $this->render('admin/galleries');
    }
    
    public function create()
    {
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('post_date', 'Tanggal Post', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi Galeri', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Galeri Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $title = $this->input->post('title');
            $post_date = $this->input->post('post_date');
            $description = $this->input->post('description');

            $slug = str_replace( " ", "_", $title );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $data['title'] = $title;
            $data['post_date'] = $post_date;
            $data['create_data'] = date('Y-m-d');
            $data['description'] = $description;
            $data['slug'] = $slug;
			
            $data['image'] = NULL;
			if($_FILES['image']['name']){
				$uploaded_foto = $this->upload_image( $slug );
				$data['image'] = $uploaded_foto['file_name'];
			}
            
            if( $this->galleries_model->create( $data ) )
            {
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('message', 'Berhasil Membuat Data Galeri Baru!');
                return redirect( base_url('admin/galleries') );
            } else {
                $message = 'Gagal Membuat Data Galeri Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/galleries') );
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/galleries') );

        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('post_date', 'Tanggal Post', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi Galeri', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Galeri! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $post_date = $this->input->post('post_date');
            $description = $this->input->post('description');

            $slug = str_replace( " ", "_", $name );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $data['title'] = $title;
            $data['slug'] = $slug;
            $data['post_date'] = $post_date;
            $data['description'] = $description;
			
			if($_FILES['image']['name']){
				$uploaded_foto = $this->upload_image( $slug );
				$data['image'] = $uploaded_foto['file_name'];
			}
           
            if( $this->galleries_model->update( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Galeri!';
            } else {
                $message = 'Gagal Mengubah Galeri!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/galleries') );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/galleries') );

        $alert = 'error';
        $message = 'Gagal Menghapus Galeri!';

        $this->form_validation->set_rules('id', 'Id Galeri', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->galleries_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Galeri!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/galleries') );
    }

	public function upload_image( $title )
	{
		$config['upload_path']          = './uploads/galleries/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 2048;
		$config['file_name']			= $title;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('admin/galleries') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
	}
}
