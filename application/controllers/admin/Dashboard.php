<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'kriteria_model',
            'pasien_model',
            'penilaian_model',
            'subkriteria_model',
        ]);
	}

	public function index()
    {
        $this->data['kriteria'] = count( $this->kriteria_model->kriteria()->result() );
        $this->data['pasien'] = count( $this->pasien_model->pasien()->result() );
        $this->data['penilaian'] = count( $this->penilaian_model->penilaian()->result() );
        $this->data['subkriteria'] = count( $this->subkriteria_model->subkriteria()->result() );
        
        $this->data['page'] = 'Beranda';
        $this->render('admin/dashboard');
    }
}
