<?php
class User_model extends CI_Model {

    // Verifikasi login untuk admin
    public function login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('admins');  // Menggunakan tabel 'admins'
        
        if ($query->num_rows() > 0) {
            $admin = $query->row();
            // Verifikasi password yang terenkripsi
            if (password_verify($password, $admin->password)) {
                return $admin;  // Mengembalikan data admin yang berhasil login
            }
        }
        return false;  // Jika username atau password salah
    }

    // Ambil data admin berdasarkan ID
    public function get_admin_by_id($admin_id) {
        $this->db->where('id', $admin_id);  // Menggunakan kolom 'id' di tabel 'admins'
        $query = $this->db->get('admins');
        return $query->row();  // Mengembalikan data admin
    }

    // Ambil data admin berdasarkan username
    public function get_admin_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('admins');
        return $query->row();  // Mengembalikan data admin
    }

    // Fungsi untuk mengupdate data admin jika diperlukan
    public function update_admin($admin_id, $data) {
        $this->db->where('id', $admin_id);
        $this->db->update('admins', $data);
    }

    
    public function get_all()
    {
        return $this->db->get('admins')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('admins', ['id' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('admins', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('admins', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('admins');
    }
}
?>
