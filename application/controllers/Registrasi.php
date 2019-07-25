<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	// Gambar Pelanggan
	public function gambar($id_pelanggan)
	{
		$pelanggan 	=	$this->pelanggan_model->detail($id_pelanggan);
		
		// Validasi Input
		$valid = $this->form_validation;

		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// End validasi


		$data = array(	'title'		=>	'Tambah Gambar Pelanggan: '.$pelanggan->nama_pelanggan,
						'pelanggan'	=>	$pelanggan,
						'gambar'	=>	$gambar,
						'error'		=>	$this->upload->display_error(),
						'isi'		=>	'registrasi/gambar'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// Create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= '/assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250; // Pixel
			$config['height']       	= 250;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End create

			$i = $this->input;
	
			$data = array( 	'id_pelanggan'		=>	$id_pelanggan,
							'judul_gambar'	=>	$i->post('judul_gambar'),
							// Disimpan nama file gambar
							'gambar'		=>	$upload_gambar['upload_data']['file_name'],
						);
			$this->pelanggan_model->tambah_gambar($data);
			$this->session->set_flashdata('sukses', 'Data gambar telah ditambah');
			redirect(base_url('registrasi/gambar/'.$id_produk),'refresh');
		}}
		// End Masuk database
		$data = array(	'title'		=>	'Tambah Gambar Pelanggan: '.$pelanggan->nama_pelanggan,
						'pelanggan'	=>	$pelanggan,
						'gambar'	=>	$gambar,
						'isi'		=>	'registrasi/gambar'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Halaman registrasi
	public function index()
	{
		// Ambil data pelanggan
		$pelanggan = $this->pelanggan_model->listing();

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan','Nama lengkap','required',
			array( 	'required' 		=>	'%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email|is_unique[pelanggan.email]',
			array( 	'required' 		=>	'%s harus diisi',
					'valid_email'	=>	'%s tidak valid',
					'is_unique'		=>	'%s sudah terdaftar'
					));

		$valid->set_rules('nim','NIM','required|is_unique[pelanggan.nim]',
			array( 	'required' 		=>	'%s harus diisi',
					'is_unique'		=>	'%s sudah terdaftar'
					));

		$valid->set_rules('password','Password','required',
			array( 	'required' 		=>	'%s harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data 	= array('title' 	=> 'Registrasi Pelanggan',
						'isi'		=> 'registrasi/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$i = $this->input;
			$data = array( 	'status_pelanggan'	=>	'Pending',
							'nama_pelanggan'	=>	$i->post('nama_pelanggan'),
							'email'				=>	$i->post('email'),
							'nim' 				=>	$i->post('nim'),
							'password'			=>	SHA1($i->post('password')),
							// 'gambar'			=>	$upload_gambar['upload_data']['file_name'],
							'tanggal_daftar'	=>	date('Y-m-d H:i:s')
						);
			$this->pelanggan_model->tambah($data);
			// Create Session Login
			$this->session->set_userdata('email',$i->post('email'));
			$this->session->set_userdata('nama_pelanggan',$i->post('nama_pelanggan'));
			// End Create Session
			$this->session->set_flashdata('sukses', 'Registrasi berhasil');
			redirect(base_url('registrasi/sukses'),'refresh');
		}
		// End Masuk database
	}

	// Sukses
	public function sukses()
	{
		$data 	= array('title' 	=> 'Registrasi Berhasil',
						'isi'		=> 'registrasi/sukses'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */