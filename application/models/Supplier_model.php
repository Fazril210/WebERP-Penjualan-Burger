<?php 

class Supplier_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Menambahkan customer baru ke database
    public function add_supplier($data) {
        $this->db->insert('suppliers', $data); 
    }

    // Update supplier
    public function update_supplier($supplier_id, $data) {
        $this->db->where('id_suppliers', $supplier_id);
        $this->db->update('suppliers', $data);
    }    

    // Hapus supplier
    public function delete_supplier($supplier_id) {
        $this->db->where('id_suppliers', $supplier_id);
        $this->db->delete('suppliers');
    }

    // Mengambil semua data supplier
    public function get_all_supplierS() {
        $query = $this->db->get('suppliers');
        return $query->result();
    }

    // Mengambil total supplier
    public function get_total_suppliers() {
        return $this->db->count_all('suppliers');
    }

    
public function get_supplier_by_id($supplier_id) {
    $this->db->where('id_suppliers', $supplier_id);
    $query = $this->db->get('suppliers');
    return $query->row(); 
}

}



?>