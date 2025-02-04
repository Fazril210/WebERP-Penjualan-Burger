<?php
class Order_model extends CI_Model {
    public function create_order($data) {
        return $this->db->insert('orders', $data) ? $this->db->insert_id() : false;
    }
    
    public function create_order_detail($data) {
        return $this->db->insert('order_details', $data);

        log_message('debug', 'Data untuk order detail: ' . json_encode($data));

    if (!$this->db->insert('order_details', $data)) {
        log_message('error', 'Gagal menyimpan detail order: ' . json_encode($this->db->error()));
        return false;
    }

    // Debugging: Log query yang dijalankan
    log_message('debug', 'Query berhasil dijalankan: ' . $this->db->last_query());
    return true;
    }
    

public function update_stock($id_items, $quantity)
{
    $this->db->set('stock_items', 'stock_items - ' . (int)$quantity, FALSE);
    $this->db->where('id_items', $id_items);
    if (!$this->db->update('items')) {
        log_message('error', 'Gagal memperbarui stok: ' . json_encode($this->db->error()));
        return false;
    }
    return true;
}


    
    
}
?>
