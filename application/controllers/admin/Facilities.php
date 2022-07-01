<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facilities extends Admin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'facilities_model',
            'moduls_model',
        ]);
        $this->data['menu_id'] = 'facilities_index';
		$this->load->library('upload');
	}

	public function index()
    {
        $datas = $this->facilities_model->facilities()->result();
        $this->data['datas'] = $datas;
        
        $this->data['page'] = 'Daftar Fasilitas';
        $this->render('admin/facilities');
    }
    
    public function create()
    {
        $this->form_validation->set_rules('name', 'Nama Fasilitas', 'required');
        $this->form_validation->set_rules('total', 'Jumlah Fasilitas', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi Fasilitas', 'required');
        $this->form_validation->set_rules('state', 'Keadaan Fasilitas', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Fasilitas Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $name = $this->input->post('name');
            $total = $this->input->post('total');
            $description = $this->input->post('description');
            $state = $this->input->post('state');

            $slug = str_replace( " ", "_", $name );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $data['name'] = $name;
            $data['total'] = $total;
            $data['description'] = $description;
            $data['state'] = $state;
			
            $data['image'] = NULL;
			if($_FILES['image']['name']){
				$uploaded_foto = $this->upload_image( $slug );
				$data['image'] = $uploaded_foto['file_name'];
			}
            
            if( $this->facilities_model->create( $data ) )
            {
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('message', 'Berhasil Membuat Data Fasilitas Baru!');
                return redirect( base_url('admin/facilities') );
            } else {
                $message = 'Gagal Membuat Data Fasilitas Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/facilities') );
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/facilities') );

        $this->form_validation->set_rules('name', 'Nama Fasilitas', 'required');
        $this->form_validation->set_rules('total', 'Jumlah Fasilitas', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi Fasilitas', 'required');
        $this->form_validation->set_rules('state', 'Keadaan Fasilitas', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Fasilitas! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $total = $this->input->post('total');
            $description = $this->input->post('description');
            $state = $this->input->post('state');

            $slug = str_replace( " ", "_", $name );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );
            
            $data['name'] = $name;
            $data['total'] = $total;
            $data['description'] = $description;
            $data['state'] = $state;
			
			if($_FILES['image']['name']){
				$uploaded_foto = $this->upload_image( $slug );
				$data['image'] = $uploaded_foto['file_name'];
			}
           
            if( $this->facilities_model->update( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Fasilitas!';
            } else {
                $message = 'Gagal Mengubah Fasilitas!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/facilities') );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/facilities') );

        $alert = 'error';
        $message = 'Gagal Menghapus Fasilitas!';

        $this->form_validation->set_rules('id', 'Id Fasilitas', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->facilities_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Fasilitas!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/facilities') );
    }

	public function upload_image( $title )
	{
		$config['upload_path']          = './uploads/facilities/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048;
		$config['file_name']			= $title;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('admin/facilities') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
	}
}
