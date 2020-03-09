<?php

//ini adalah class "M_data"
class M_data extends CI_Model
{
	// ini adalah baris kode yang berfungsi menampilkan data dari tabel 'user' pada database 'malasngoding'
	function tampil_data()
	{
		return $this->db->get('user');
	}
	// ini adalah baris kode yang berfungsi memasukkan data dari view/v_input.php ke view/v_tampil.php 
	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	// ini adalah baris kode untuk menghapus data di database
	function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	// Cini adalah baris kode yang berfungsi mengedit data yang ada di database
	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	// ini adalah baris kode yang berfungsi mengupdate data yang sudah diedit sebelumnya pada code diatas 
	// dan ditampilkan ke view/v_tampil.php 
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
