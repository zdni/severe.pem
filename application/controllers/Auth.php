<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'users_model',
            'pasien_model',
        ]);
	}

    public function daftar()
    {
        return $this->load->view('daftar');
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim');

        $alert = 'error';
        $message = 'Gagal Mendaftarkan Akun! Silahkan isi semua inputan';
        $url = 'auth/daftar';
        
        if ( $this->form_validation->run() == true )
        {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            
            if( $password != $confirm_password ) {
                $message = 'Password dan Konfirmasi Password tidak cocok! Silahkan ulangi';
                
                $this->session->set_flashdata('alert', $alert);   
                $this->session->set_flashdata('message', $message);  
                return redirect( base_url( $url ) );
            }
            
            $user = $this->users_model->user( NULL, $username )->row();
            if( $user ) {
                
                $message = 'Username telah digunakan! Silahkan menggunakan username lain!';
                $this->session->set_flashdata('alert', $alert);   
                $this->session->set_flashdata('message', $message);  
                return redirect( base_url( $url ) );
            }
            
            $data['username'] = $username;
            $data['name'] = $name;
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            $data['role_id'] = 3;

            $user_id = $this->users_model->create( $data );
            
            if( $user_id )
            {
                $data = [
                    'nama' => $name,
                    'user_id' => $user_id,
                ];
                
                $this->pasien_model->tambah( $data );
                
                $alert = 'success';
                $message = 'Berhasil Mendaftarkan Akun! Silahkan login';
                $url = 'auth/login';
            } else {
                $message = 'Gagal Mendaftarkan Akun!';
                $url = 'auth/daftar';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);   
        $this->session->set_flashdata('message', $message);  
        return redirect( base_url( $url ) );
    }

	public function login()
    {
        // cek apakah user sudah login
        if( $this->session->userdata('user_id') ){
            $role_name = $this->session->userdata('role_name');
            if ( $role_name == 'admin' ) {
                $path = 'admin/dashboard';
            }
            return redirect( base_url() . $path );
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ( $this->form_validation->run() == true )
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
			
            $user = $this->users_model->user( NULL, $username )->row();
			
            if ( $user ) {
				
                if( password_verify( $password, $user->password ) ){
                    $session = [
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'name' => $user->name,
                        'role_id' => $user->role_id,
                        'role_name' => $user->role_name,
                        'user_image' => $user->image,
                        'laboratory_id' => $user->laboratory_id,
                    ];

                    $this->session->set_userdata( $session );
                    $this->session->set_flashdata('alert', 'success');   
                    $this->session->set_flashdata('message', 'Login Berhasil');   
                    
                    return redirect( base_url('admin/dashboard') );
                } else {
                    $alert = 'warning';
                    $message = 'Login Gagal! Password yang anda masukkan salah';
                }

            } else {
                $alert = 'error';
                $message = 'Login Gagal! Username tidak ditemukan';
            }

            $this->session->set_flashdata('alert', $alert);   
            $this->session->set_flashdata('message', $message);   
            return redirect( base_url('auth/login') );
        }

        return $this->load->view('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect( base_url() );
    }

}
