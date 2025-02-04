<?php 

class Customer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Menambahkan customer baru ke database
    public function add_customer($data) {
        $this->db->insert('customers', $data);  // Sesuaikan dengan nama tabel Anda
    }

    // Update customer
    public function update_customer($customer_id, $data) {
        $this->db->where('id_customers', $customer_id);
        $this->db->update('customers', $data);
    }    

    // Hapus customer
    public function delete_customer($customer_id) {
        $this->db->where('id_customers', $customer_id);
        $this->db->delete('customers');
    }

    // Mengambil semua data customer
    public function get_all_customers() {
        $query = $this->db->get('customers');
        return $query->result();
    }

    // Mengambil total customer
    public function get_total_customers() {
        return $this->db->count_all('customers');
    }

    
public function get_customer_by_id($id_customers) {
    $this->db->where('id_customers', $id_customers);
    $query = $this->db->get('customers');
    return $query->row(); 
}

}



?>