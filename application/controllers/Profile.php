<?php
class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    // Tampilkan daftar admin
    public function index() {
        $data['admins'] = $this->User_model->get_all_admins();
        $this->load->view('content/profile', $data); // Ganti dengan nama view untuk daftar admin
    }

    // Form tambah admin
    public function create() {
        $this->load->view('content/profile'); // Ganti dengan nama view untuk tambah admin
    }

    // Simpan admin baru
        public function store() {
            $data = [
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => $this->input->post('role')
            ];
            $this->User_model->insert_admin($data);
            redirect('content/profile');
        }

    // Form edit admin
    public function edit($id) {
        $data['admin'] = $this->User_model->get_admin_by_id($id);
        $this->load->view('profile', $data); // Ganti dengan nama view untuk edit admin
    }

    // Update data admin
    public function update($id) {
        $data = [
            'username' => $this->input->post('username'),
            'role' => $this->input->post('role')
        ];

        if ($this->input->post('password')) {
            $data['password'] = md5($this->input->post('password'));
        }

        $this->User_model->update_admin($id, $data);
        redirect('profile');
    }

    // Hapus admin
    public function delete($id) {
        $this->User_model->delete_admin($id);
        redirect('profile');
    }
}
