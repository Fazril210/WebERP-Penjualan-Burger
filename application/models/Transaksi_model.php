<?php 

class Transaksi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Menambahkan transaksi baru ke database
    public function add_transaksi($data) {
        if ($this->db->insert('transaksi', $data)) {
            return $this->db->insert_id(); // Kembalikan ID produk yang baru ditambahkan
        } else {
            return false;
        }
    }

    // Update transaksi
    public function update_transaksi($transaksi_id, $data) {
        $this->db->where('id_transaksi', $transaksi_id);
        $this->db->update('transaksi', $data);
    }    


    // Mengambil semua data transaksi
    public function get_all_transaksi() {
        $this->db->select('transaksi.id_transaksi, transaksi.tgl, transaksi.jumlah_beli, transaksi.harga_satuan, transaksi.total_harga, transaksi.metode_pembayaran, transaksi.status_pembayaran, products.id_produk, products.name_product, suppliers.name_suppliers, suppliers.id_suppliers');
        $this->db->from('transaksi');
        $this->db->join('products', 'transaksi.id_produk = products.id_produk', 'left');
        $this->db->join('suppliers', 'transaksi.id_suppliers = suppliers.id_suppliers', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    // Mengambil total transaksi
    public function get_total_transaksi() {
        return $this->db->count_all('transaksi');
    }

    // Mengambil transaksi berdasarkan ID
    public function get_transaksi_by_id($transaksi_id) {
        $this->db->where('id_transaksi', $transaksi_id);
        $query = $this->db->get('transaksi');
        return $query->row(); 
    }

    public function get_all_product() {
        $this->db->select('id_produk, name_product'); // Ambil kolom yang diperlukan
        $this->db->from('products'); // Tabel products
        $query = $this->db->get();
        return $query->result(); // Mengembalikan array objek
    }
    

    public function get_all_suppliers() {
        $this->db->select('id_suppliers, name_suppliers'); // Ambil kolom yang diperlukan
        $this->db->from('suppliers'); // Tabel customers
        $query = $this->db->get();
        return $query->result(); // Mengembalikan array objek
    }


    public function update_product_stock($id_produk, $jumlah_beli, $is_penambahan = true) {
        // Cek stok saat ini
        $this->db->select('stock');
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('products');
        $product = $query->row();
    
        if ($product) {
            if ($is_penambahan) {
                // Tambahkan stok
                $this->db->set('stock', 'stock + ' . (int)$jumlah_beli, FALSE);
            } else {
                // Kurangi stok (cek stok cukup terlebih dahulu)
                if ($product->stock >= $jumlah_beli) {
                    $this->db->set('stock', 'stock - ' . (int)$jumlah_beli, FALSE);
                } else {
                    return false; // Stok tidak cukup
                }
            }
            $this->db->where('id_produk', $id_produk);
            return $this->db->update('products');
        } else {
            return false; // Produk tidak ditemukan
        }
    }
    


    public function edit_transaksi($transaksi_id, $data) {
        // Ambil transaksi lama
        $old_transaction = $this->get_transaksi_by_id($transaksi_id);
        if (!$old_transaction) {
            return false; // Transaksi tidak ditemukan
        }
    
        // Update transaksi
        $this->db->where('id_transaksi', $transaksi_id);
        return $this->db->update('transaksi', $data);
    }

    
    public function delete_transaksi($transaksi_id) {
        // Ambil transaksi lama
        $transaction = $this->get_transaksi_by_id($transaksi_id);
        if (!$transaction) {
            return false; // Transaksi tidak ditemukan
        }
    
        // Hapus transaksi
        $this->db->where('id_transaksi', $transaksi_id);
        return $this->db->delete('transaksi');
    }
    

    public function get_product_by_id($id_produk) {
        $this->db->select('products.id_produk, products.unit_of_goods, suppliers.name_suppliers');
        $this->db->from('products');
        $this->db->join('suppliers', 'products.id_suppliers = suppliers.id_suppliers', 'left');
        $this->db->where('products.id_produk', $id_produk);
        $query = $this->db->get();
        return $query->row();
    }
    
    
    
    
}
?>
