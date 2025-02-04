<?php
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Admin_model');
    }

    // Halaman login
    public function login() {
        // Jika pengguna sudah login, langsung arahkan berdasarkan peran
        if ($this->session->userdata('admin_id')) {
            $this->redirect_by_role($this->session->userdata('role'));
        }

        // Tampilkan form login
        $this->load->view('auth/login');
    }

    // Proses login
    public function do_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Validasi input
        if (empty($username) || empty($password)) {
            $this->session->set_flashdata('error', 'Username dan password wajib diisi');
            redirect('auth/login');
        }

        // Validasi login ke database
        $admin = $this->Admin_model->check_admin($username, $password);
        if ($admin) {
            // Set session jika login berhasil
            $this->session->set_userdata([
                'admin_id' => $admin->id,
                'username' => $admin->username,
                'role' => $admin->role,
            ]);

            // Arahkan pengguna berdasarkan peran
            $this->redirect_by_role($admin->role);
        } else {
            // Jika login gagal, tampilkan pesan error
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('auth/login');
        }
    }

    // Fungsi untuk logout
    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Anda berhasil logout.');
        redirect('auth/login');
    }

    // Fungsi bantu untuk mengarahkan berdasarkan peran
    private function redirect_by_role($role) {
        switch ($role) {
            case 'superadmin':
                redirect('dashboard'); // Halaman untuk superadmin
                break;
            case 'kasir':
                redirect('kasir'); // Halaman untuk kasir
                break;
            default:
                $this->session->set_flashdata('error', 'Role tidak dikenali!');
                redirect('auth/login');
                break;
        }
    }
}
