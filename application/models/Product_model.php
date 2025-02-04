<?php
class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Ambil semua produk
    public function get_all_products() {
        $this->db->select('products.id_produk, products.name_product, products.stock, products.unit_of_goods, products.price_per_piece, suppliers.name_suppliers, suppliers.id_suppliers');
        $this->db->from('products');
        $this->db->join('suppliers', 'products.id_suppliers = suppliers.id_suppliers', 'left'); // Gunakan LEFT JOIN jika ada produk tanpa supplier
        $query = $this->db->get();
        return $query->result();
    }

public function get_total_usage_by_product($order = null) {
    $this->db->select('products.id_produk, products.name_product, products.unit_of_goods, SUM(ingredients.quantity) as total_usage');
    $this->db->from('ingredients');
    $this->db->join('products', 'ingredients.id_produk = products.id_produk', 'left');
    $this->db->group_by('ingredients.id_produk');

    // Tambahkan sorting hanya jika parameter order diberikan
    if ($order === 'asc') {
        $this->db->order_by('total_usage', 'ASC');
    } elseif ($order === 'desc') {
        $this->db->order_by('total_usage', 'DESC');
    }

    $query = $this->db->get();
    return $query->result();
}

// Product_model.php


    

    // Method untuk mengambil data produk dengan sorting dan filtering
    public function get_sorted_filtered_products($sort_price, $sort_stock) {
        $this->db->select('
            products.id_produk,
            products.name_product,
            products.stock,
            products.unit_of_goods,
            products.price_per_piece,
            suppliers.name_suppliers
        ');
        $this->db->from('products');
        $this->db->join('suppliers', 'products.id_suppliers = suppliers.id_suppliers', 'left');

        // Terapkan sorting untuk harga
        if ($sort_price === 'highest') {
            $this->db->order_by('products.price_per_piece', 'DESC');
        } else if ($sort_price === 'lowest') {
            $this->db->order_by('products.price_per_piece', 'ASC');
        }

        // Terapkan sorting untuk stok
        if ($sort_stock === 'highest') {
            $this->db->order_by('products.stock', 'DESC');
        } else if ($sort_stock === 'lowest') {
            $this->db->order_by('products.stock', 'ASC');
        }

        $query = $this->db->get();

        return $query->result_array(); // Kembalikan hasil sebagai array
    }
    

    // Ambil produk berdasarkan ID
    // Product_model.php

public function get_product_by_id($id_produk) {
    $this->db->where('id_produk', $id_produk); // Gunakan id_produk, bukan id
    $query = $this->db->get('products');
    return $query->row();
}

    // Tambah produk baru
    public function add_product($data) {
        if ($this->db->insert('products', $data)) {
            return $this->db->insert_id(); // Kembalikan ID produk yang baru ditambahkan
        } else {
            return false;
        }
    }

    // Update produk berdasarkan ID
    public function update_product($id, $data) {
        $this->db->where('id_produk', $id);
        if ($this->db->update('products', $data)) {
            return true; // Kembalikan true jika berhasil
        } else {
            return false; // Kembalikan false jika gagal
        }
    }

    // Hapus produk berdasarkan ID
    public function delete_product($id) {
        $this->db->where('id_produk', $id);
        if ($this->db->delete('products')) {
            return true; // Kembalikan true jika berhasil
        } else {
            return false; // Kembalikan false jika gagal
        }
    }

    // Ambil total jumlah produk
    public function get_total_products() {
        return $this->db->count_all('products'); // Hitung total jumlah data di tabel 'products'
    }

    // Ambil produk dengan filter (contoh dengan supplier)
    public function get_products_by_supplier($supplier_id) {
        $this->db->where('id_supplier', $supplier_id);
        $query = $this->db->get('products');
        return $query->result(); // Kembalikan sebagai array objek
    }

    // Ambil produk dengan filter harga
    public function get_products_by_stock_range($min_stock, $max_stock) {
        $this->db->where('stock >=', $min_stock);
        $this->db->where('stock <=', $max_stock);
        $query = $this->db->get('products');
        return $query->result(); // Kembalikan produk dalam rentang harga
    }

    // Ambil produk dengan pencarian nama
    public function search_products_by_name($name) {
        $this->db->like('name_product', $name); // Pencarian menggunakan LIKE
        $query = $this->db->get('products');
        return $query->result(); // Kembalikan hasil pencarian
    }

    // Fungsi untuk mengambil semua data supplier
    public function get_all_suppliers() {
        $this->db->select('id_suppliers, suppliers_name'); // Pilih kolom yang dibutuhkan
        $this->db->from('suppliers'); // Nama tabel
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil dalam bentuk objek
    }


}

?>
