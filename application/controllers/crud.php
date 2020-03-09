<?php

//ini adalah class "crud" 
class crud extends CI_Controller
{
	//ini adalah function yang aakan di jalankan pertama kali dan sekali secara otomatis
	function __construct()
	{
		parent::__construct();
		//ini adalah baris kode untuk menjalankan model "m_data"
		$this->load->model('m_data');
		//ini adalah baris kode untuk menjalankan helper "uri"
		$this->load->helper('url');
	}
	//ini adalah method "index" yang akan diakses ketika controller ini dijalankan
	function index()
	{
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil', $data);
	}
	//ini adalah methode "tambah" yang akan mengarahkan ke view v_input 
	function tambah()
	{
		$this->load->view('v_input');
	}

	//ini adalah method "tambah_aksi" yang akan berjalan ketika tombol submite di klik
	//berfungsi untuk menambahkan data ke database
	function tambah_aksi()
	{

		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		//ini adalah baris kode array yang menjadikan ketiga di atas menjadi 1 variable
		//dan nantiny akan di kirim ke dalam query database di model m_data
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
		$this->m_data->input_data($data, 'user');
		redirect('crud/index');
	}
	// ini adalah method "hapus" berfungsi untuk melakukan hapus data dari database, dan memerlukan 1 parameter 
	// yaitu $id yang berasal dari id user yang dikirim pengguna menggunakan uri segment ke 3
	function hapus($id)
	{
		$where = array('id' => $id);
		$this->m_data->hapus_data($where, 'user');
		redirect('crud/index');
	}
	// ini adalah method "edit" ini berfungsi untuk mengarahkan user ke view_edit yang merupakan form input edit 
	// untuk melakukan update data ke dalam database, membutuhkan 1 parameter yaitu id user
	function edit($id)
	{
		$where = array('id' => $id);
		$data['user'] = $this->m_data->edit_data($where, 'user')->result();
		$this->load->view('v_edit', $data);
	}
	// ini adalah method "update" adalah method yang diajalankan ketika tombol submit pada form v_edit klik, 
	// method ini berfungsi untuk merekam data, memperbarui baris database yang dimaksud, 
	// lalu mengarahkan pengguna ke controller crud method index
	function update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
		// ini adalah baris kode yang berfungsi untuk menyimpan id user ke dalam array $where pada index array bernama 'id'
		$where = array(
			'id' => $id
		);
		// ini adalah kode yang berfungsi melakukan query update dengan menjalankan method update_data() pada model m_data, 
		// memerlukan 3 parameter yaitu $where sebagai id yg diperlukan 
		// untuk mendefinisikan where pada query, kedua $data adalah ketiga values yang diperbarui pada database, 
		// dan ketiga adalah nama tabel yang akan dilakukan update
		$this->m_data->update_data($where, $data, 'user');
		// ini adalah baris kode yang berfungsi mengarahkan pengguna ke link base_url()crud/index/
		redirect('crud/index');
	}
}
