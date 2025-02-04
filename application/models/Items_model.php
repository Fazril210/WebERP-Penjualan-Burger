<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items_model extends CI_Model {

    private $table = 'items';

    public function __construct()
    {
        parent::__construct();
    }

    // Retrieve all items
    public function get_all_items()
    {
        return $this->db->get($this->table)->result();
    }

    public function item_exists($id_items)
{
    $query = $this->db->get_where('items', ['id_items' => $id_items]);
    return $query->num_rows() > 0;
}

public function get_total_items() {
    return $this->db->count_all('items');
}

// Fungsi untuk sorting dan filtering
public function get_sorted_filtered_items($sort_stock = '', $sort_price = '', $status = '', $type = '')
{
    $this->db->from($this->table);
    
    // Filter berdasarkan status
    if (!empty($status)) {
        $this->db->where('status', $status);
    }
    
    // Filter berdasarkan tipe
    if (!empty($type)) {
        $this->db->where('type', $type);
    }
    
    // Sorting berdasarkan stok
    if ($sort_stock === 'highest') {
        $this->db->order_by('stock_items', 'DESC');
    } elseif ($sort_stock === 'lowest') {
        $this->db->order_by('stock_items', 'ASC');
    }

    // Sorting berdasarkan harga
    if ($sort_price === 'highest') {
        $this->db->order_by('price_items', 'DESC');
    } elseif ($sort_price === 'lowest') {
        $this->db->order_by('price_items', 'ASC');
    }

    return $this->db->get()->result();
}



    // Get single item by ID
    public function get_item($id)
{
    return $this->db->where('id_items', $id)->get($this->table)->row();
}

public function get_item_by_id($id)
{
    return $this->db->where('id_items', $id)->get($this->table)->row();
}

public function decrease_stock($id, $quantity) {
    $this->db->set('stock_items', 'stock_items - ' . (int)$quantity, FALSE);
    $this->db->where('id_items', $id);
    return $this->db->update('items');
}



    // Add new item
    public function add_item($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update existing item
    public function update_item($id, $data)
    {
        return $this->db->where('id_items', $id)->update($this->table, $data);
    }

    // Delete item
    public function delete_item($id)
    {
        return $this->db->where('id_items', $id)->delete($this->table);
    }

    // Search items by name or price
    public function search_items($keyword)
    {
        $this->db->like('name_items', $keyword);
        $this->db->or_like('price_items', $keyword);
        return $this->db->get($this->table)->result();
    }
}
