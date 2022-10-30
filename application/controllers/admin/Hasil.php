<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends User_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'hasil_model',
        ]);
        $this->data['menu_id'] = 'hasil_index';
	}

	public function index()
    {
        $this->data['datas'] = $this->hasil_model->hasil()->result();
        $this->data['status'] = ['Normal', 'Malnutrisi Ringan (Mild PEM)', 'Malnutrisi Sedang (Moderate PEM)', 'Severe PEM'];
        
        $this->data['page'] = 'Hasil';
        $this->render('admin/hasil');
    }
}
