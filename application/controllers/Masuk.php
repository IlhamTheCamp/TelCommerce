<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	// Login Pelanggan
	public function index()
	{
		// Validasi
		$this->form_validation->set_rules('email','Email/Username','required',
			array( 'required'	=>	'%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required',
			array( 'required'	=>	'%s harus diisi'));

		if($this->form_validation->run())
		{
			$email 		=	$this->input->post('email');
			$password 	=	$this->input->post('password');
			// proses ke simple login
			$this->simple_pelanggan->login($email,$password);
		}
		// End validasi

		$data 	= array('title' 	=> 'Login Pelanggan',
						'isi' 		=> 'masuk/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Logout Pelanggan
	public function logout()
	{
		// Ambil fungsi logout di Simple_pelanggan yang sudah di set di autoload libraries
		$this->simple_pelanggan->logout();
	}

}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */