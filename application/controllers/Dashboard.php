<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Visitor_Controller 
{
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'articles_model',
            'documents_model',
            'downloads_model',
            'facilities_model',
            'galleries_model',
            'heros_model',
            'laboratories_model',
            'messages_model',
            'moduls_model',
            'profile_model',
            'questionnaires_model',
            'videos_model',
        ]);

        $this->data['alamat'] = file_get_contents( './uploads/profile/alamat.html' );
        $this->data['email'] = file_get_contents( './uploads/profile/email.html' );
        $this->data['fax'] = file_get_contents( './uploads/profile/fax.html' );
        $this->data['institut'] = file_get_contents( './uploads/profile/institut.html' );
        $this->data['telepon'] = file_get_contents( './uploads/profile/telepon.html' );

        $laboratories = $this->laboratories_model->laboratories()->result();
        unset($laboratories[0]);
        $this->data['menu_downloads'] = $this->downloads_model->downloads()->result();
        $this->data['menu_laboratories'] = $laboratories;
        $this->data['menu_profiles'] = $this->profile_model->profile()->result();
        $this->data['questionnaire'] = $this->questionnaires_model->last_questionnaire( 1 )->row();
	}

    public function index()
    {
        $this->data['articles'] = $this->articles_model->articles( 0, 3 )->result();
        $this->data['galleries'] = $this->galleries_model->galleries( 0, 3 )->result();
        $this->data['heros'] = $this->heros_model->heros()->result();
        $this->data['videos'] = $this->videos_model->videos( NULL, 0, 3 )->result();
        
        $this->render('index');
    }

    public function contact()
    {
        $this->render('contact');
    }

    public function documents( $download_id = NULL )
    {
        if( !$download_id ) return redirect( base_url() );
        $this->data['documents'] = $this->documents_model->documents( $download_id )->result();
    
        $this->render('documents');
    }

    public function facilities()
    {
        $this->data['facilities'] = $this->facilities_model->facilities()->result();
        $this->render('facilities');
    }

    public function laboratory()
    {
        $slug = isset( $_GET['slug'] ) ? $_GET['slug'] : NULL;
        if( !$slug ) return redirect( base_url() );

        $laboratory = $this->laboratories_model->laboratory( NULL, $slug )->row();
        $laboratory->file_content = '';

        if( file_exists( './uploads/laboratories/' . $laboratory->file ) )
        {
            $laboratory->file_content = file_get_contents( './uploads/laboratories/' . $laboratory->file );
        }

        $this->data['laboratory'] = $laboratory;
        $this->data['moduls'] = $this->moduls_model->moduls_show( $laboratory->id, 1 )->result();
        $this->data['videos'] = $this->videos_model->videos_show( $laboratory->id, 1 )->result();
        
        $this->render('laboratory');
    }

    public function profile()
    {
        $slug = isset( $_GET['slug'] ) ? $_GET['slug'] : NULL;
        if( !$slug ) return redirect( base_url() );

        $profile = $this->profile_model->profile( NULL, $slug )->row();
        if( !$profile ) return redirect( base_url() );
        $profile->file_content = "Konten";
        if( file_exists( './uploads/profile/' . $profile->file ) )
        {
            $profile->file_content = file_get_contents( './uploads/profile/' . $profile->file );
        }

        $this->data['profile'] = $profile;
        $this->render('profile');
    }

    public function articles()
    {
        $page = isset( $_GET['page'] ) ? $_GET['page'] : 0;

        $articles = $this->articles_model->articles( ($page*10), ( ($page*10) + 9) )->result();
        $this->data['articles'] = $articles;
        $this->data['new_articles'] = $this->articles_model->articles( 0, 3 )->result();
        $this->data['page'] = $page;
        $this->data['total'] = count( $this->articles_model->articles(  )->result() );

        $this->render('articles');
    }

    public function article(  )
    {
        $slug = isset( $_GET['slug'] ) ? $_GET['slug'] : NULL;
        if( !$slug ) return redirect( base_url() );

        $article = $this->articles_model->article( NULL, $slug )->row();
        if( !$article ) return redirect( base_url() );
        if( file_exists( './uploads/articles/files/' . $article->file ) )
        {
            $article->file_content = file_get_contents( './uploads/articles/files/' . $article->file );
        }

        $this->data['new_articles'] = $this->articles_model->articles( 0, 3 )->result();
        $this->data['article'] = $article;
        $this->render('article');
    }
    
    public function send_message()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('subject', 'Subjek Pesan', 'required');
        $this->form_validation->set_rules('message', 'Pesan', 'required');

        $alert = 'error';
        $message = 'Gagal Mengirim Pesan! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            $data['name'] = $name;
            $data['email'] = $email;
            $data['phone'] = $phone;
            $data['subject'] = $subject;
            $data['message'] = $message;
            $data['date'] = date('Y-m-d');


            if( $this->messages_model->create( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengirim Pesan!';
            } else {
                $message = 'Gagal Mengirim Pesan!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('dashboard/contact') );
    }

}