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

    public function profile( $slug = NULL )
    {
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
        $articles = $this->articles_model->articles()->row();
        $this->data['articles'] = $articles;
        $this->render('articles');
    }

    public function article(  )
    {
        $slug = $_GET['slug'];
        if( !$slug ) return redirect( base_url() );

        $article = $this->articles_model->article( NULL, $slug )->row();
        if( !$article ) return redirect( base_url() );
        if( file_exists( './uploads/articles/files/' . $article->file ) )
        {
            $article->file_content = file_get_contents( './uploads/articles/files/' . $article->file );
        }

        $this->data['article'] = $article;
        $this->render('article');
    }

}