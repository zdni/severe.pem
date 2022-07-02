<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'articles_model',
        ]);
        $this->data['menu_id'] = 'articles_index';
		$this->load->library('upload');
	}

	public function index()
    {
        $this->data['datas'] = $this->articles_model->articles()->result();
        $this->data['page'] = 'Berita';
        $this->render('admin/articles');
    }

    public function form( $id = NULL )
    {
        $this->data['page'] = 'Tambah Berita';
        $this->data['url'] = base_url('admin/articles/create');
        if( $id )
        {
            $article = $this->articles_model->article( $id )->row();
            $article->post_date = date('Y-m-d', strtotime( $article->post_date ));
            if( file_exists( './uploads/articles/files/' . $article->file ) )
            {
                $article->file_content = file_get_contents( './uploads/articles/files/' . $article->file );
            }
            $this->data['data'] = $article;
            $this->data['page'] = 'Edit Berita';
            $this->data['url'] = base_url('admin/articles/update');
        }
        $this->render('admin/form_articles');
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Judul Berita', 'required');
        $this->form_validation->set_rules('post_date', 'Tanggal Post', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi Berita', 'required');
        $this->form_validation->set_rules('content', 'Isi Kontent Berita', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Fasilitas Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $title = $this->input->post('title');
            $post_date = $this->input->post('post_date');
            $description = $this->input->post('description');
            $content = $this->input->post('content');

            $slug = str_replace( " ", "_", $title );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            
            $file = $slug . '.html';
            if( !file_put_contents( './uploads/articles/files/' . $file, $content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Membuat File Berita!';
            } else {
                $data['title'] = $title;
                $data['post_date'] = $post_date;
                $data['description'] = $description;
                $data['slug'] = $slug;
                $data['file'] = $file;
                $data['post_date'] = $post_date;
			
                $data['thumbnail'] = NULL;
                if($_FILES['thumbnail']['name']){
                    $uploaded_foto = $this->upload_thumbnail( $slug );
                    $data['thumbnail'] = $uploaded_foto['file_name'];
                }
                $data['create_by'] = $this->session->userdata('user_id');
                $data['create_date'] = date('Y-m-d');
    
                if( $this->articles_model->create( $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Membuat Berita Baru!';
                } else {
                    $message = 'Gagal Membuat Berita Baru!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/articles') );
    }

    public function detail( $id = NULL )
    {
        if( !$id ) return redirect('admin/articles');

        $article = $this->articles_model->article( $id )->row();
        if( !$article ) return redirect('admin/articles');

        if( file_exists( './uploads/articles/files/' . $article->file ) )
        {
            $file_content = file_get_contents( './uploads/articles/files/' . $article->file );
            $article->file_content = $this->form_validation->set_value( 'content', $file_content );
        }
        
        $this->data['data'] = $article;
        
        $this->data['page'] = 'Detail Berita';
        $this->render('admin/article');
    }

    public function update()
    {
        $this->form_validation->set_rules('title', 'Judul Berita', 'required');
        $this->form_validation->set_rules('post_date', 'Tanggal Post', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi Berita', 'required');
        $this->form_validation->set_rules('content', 'Isi Kontent Berita', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Fasilitas Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $slug = $this->input->post('slug');
            $filename = $this->input->post('filename');
            $title = $this->input->post('title');
            $post_date = $this->input->post('post_date');
            $description = $this->input->post('description');
            $content = $this->input->post('content');

            $file = $filename;
            if( !file_put_contents( './uploads/articles/files/' . $file, $content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Mengubah File Berita!';
            } else {
                $data['title'] = $title;
                $data['post_date'] = $post_date;
                $data['description'] = $description;
			
                if($_FILES['thumbnail']['name']){
                    $uploaded_foto = $this->upload_thumbnail( $slug );
                    $data['thumbnail'] = $uploaded_foto['file_name'];
                }
    
                if( $this->articles_model->update( $id, $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Mengubah Berita!';
                } else {
                    $message = 'Gagal Mengubah Berita!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/articles') );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/articles') );

        $alert = 'error';
        $message = 'Gagal Menghapus Berita!';

        $this->form_validation->set_rules('id', 'Id Berita', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->articles_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Berita!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/articles') );
    }

    public function upload_thumbnail( $title = 'thumbnail' )
    {
		$config['upload_path']          = './uploads/articles/thumbnails/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048;
		$config['file_name']			= $title;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('thumbnail')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('admin/articles') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;

    }
}
