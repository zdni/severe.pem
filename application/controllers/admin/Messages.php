<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'messages_model',
        ]);
	}

	public function index()
    {
        $this->data['datas'] = $this->messages_model->messages()->result();
        $this->data['page'] = 'Pesan Pengunjung';
        $this->render('admin/messages');
    }
}
