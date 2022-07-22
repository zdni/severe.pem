<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'kriteria_model',
        ]);
        $this->data['menu_id'] = 'hasil_index';
	}

	public function index()
    {
        $this->data['datas'] = $this->kriteria_model->kriteria()->result();
        $this->data['page'] = 'Hasil';
        $this->render('admin/hasil');
    }
}
