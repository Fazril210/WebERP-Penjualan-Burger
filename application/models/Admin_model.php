<?php
class Admin_model extends CI_Model {

    // Mengecek apakah admin ada di database
    public function check_admin($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // Gantilah dengan metode hash password yang lebih aman
        $query = $this->db->get('admins');
        return $query->row(); // Mengembalikan objek admin beserta role
    }
    
    public function get_all_admins() {
        return $this->db->get('admins')->result_array();
    }

    public function add_admin($data) {
        $this->db->insert('admins', $data);
    }

    public function update_admin($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('admins', $data);
    }

    public function delete_admin($id) {
        $this->db->where('id', $id);
        $this->db->delete('admins');
    }
}


    