<?php
//ini adalah class "login"
class Login extends CI_Controller
{
    //ini adalah function yang aakan di jalankan pertama kali dan sekali secara otomatis
    function __construct()
    {
        parent::__construct();
        //ini adalah baris kode untuk menjalankan model "m_login"
        $this->load->model('m_login');
    }
    //ini adalah method "index" yang akan diakses ketika controller ini dijalankan
    function index()
    {
        //ini adalah baris kode yang berfungsi untuk menampilkan view "v_login"
        $this->load->view('v_login');
    }
    //ini adalah method "aksi_login" yang di jalankan ketika kita melakukan login
    function aksi_login()
    {
        //ini adalah baris kode untuk merekam data yang dikirim menggunakan post
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //ini baris kode yang mendefinisikan array yang nantinya akan di proses ke dalam model
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        //ini adalah baris kode untuk menjalankan method "cek_login" pada model "m_login"
        $cek = $this->m_login->cek_login("admin", $where)->num_rows();

        //ini adalah baris kode if else jika ditemukan data pada database sesuai apa yang diinpuutkan 
        //maka akan ke sintaks true, jika salah ke sintaks else
        if ($cek > 0) {
            // membuat session dengan index 'nama' yang berisi username dan 'status' berisi login
            $data_session = array(
                'nama' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);

            redirect(base_url("admin"));
        } else {
            // warning atau toast else jika input yang dimasukkan tak sesuai dengan isi database
            echo "Username dan password salah !";
        }
    }
    // ini adalah method "logout" berfungsi untuk destroy session login jika tombol logout di klik
    function logout()
    {
        // ini adalah baris kode yang akan menghapus session yang ada
        $this->session->sess_destroy();
        // ini adalah baris kode yang mengarahkan pengguna ke controller login
        redirect(base_url('login'));
    }
}
