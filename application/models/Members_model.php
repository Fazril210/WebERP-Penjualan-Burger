<?php 

class Members_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Menambahkan members baru ke database
    public function add_members($data) {
        $this->db->insert('members', $data);  // Sesuaikan dengan nama tabel Anda
    }

    // Update members
    public function update_members($members_id, $data) {
        $this->db->where('id_members', $members_id);
        $this->db->update('members', $data);
    }    

    // Hapus members
    public function delete_members($members_id) {
        $this->db->where('id_members', $members_id);
        $this->db->delete('members');
    }

    // Mengambil semua data members
    public function get_all_members() {
        $query = $this->db->get('members');
        return $query->result();
    }

    // Mengambil total members
    public function get_total_memberss() {
        return $this->db->count_all('members');
    }

    
    public function get_members_by_id($id_members)
    {
        $this->db->where('id_members', $id_members); // Pastikan kolom benar
        $query = $this->db->get('members');
        return $query->row(); 
    }
    

}



?>