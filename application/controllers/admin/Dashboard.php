<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'users_model',
        ]);
	}

	public function index()
    {
        $this->data['page'] = 'Beranda';
        $this->render('admin/dashboard');
    }
}
