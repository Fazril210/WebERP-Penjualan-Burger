<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingredients extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kasir_model');
        $this->load->helper('url');
    }

    // Menampilkan daftar ingredients
    public function index() {
        $data['ingredients'] = $this->Kasir_model->get_all_ingredients(); // Ambil semua data ingredients
        $data['items'] = $this->Kasir_model->get_all_items(); // Ambil semua menu (items)
        $data['products'] = $this->Kasir_model->get_all_products(); // Ambil semua bahan baku (products)

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/ingredients', $data);
        $this->load->view('admin/footer');
    }

    public function do_add_batch() {
        $id_items = $this->input->post('id_items');
        $bahan = $this->input->post('bahan'); // Array bahan baku
    
        // Validasi
        if (empty($id_items) || empty($bahan)) {
            $this->session->set_flashdata('error', 'Menu dan bahan baku tidak boleh kosong.');
            redirect('ingredients/add');
        }
    
        // Siapkan data untuk batch insert
        $dataBatch = [];
        foreach ($bahan as $item) {
            $dataBatch[] = [
                'id_items' => $id_items,
                'id_produk' => $item['id_produk'],
                'quantity' => $item['quantity'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
    
        // Simpan data
        if ($this->Kasir_model->add_ingredient_batch($dataBatch)) {
            $this->session->set_flashdata('success', 'Bahan Baku berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan Bahan Baku.');
        }
        redirect('ingredients');
    }

    public function sort_quantity() {
        $order = $this->input->get('order'); // Ambil parameter sorting
        $order = ($order === 'desc') ? 'DESC' : 'ASC'; // Default ke ASC jika parameter tidak valid
    
        // Query untuk mengambil data ingredients terurut berdasarkan quantity
        $this->db->order_by('quantity', $order);
        $query = $this->db->get('ingredients'); // Ganti 'ingredients' dengan nama tabel Anda
        $result = $query->result();
    
        // Kirimkan data ke frontend dalam format JSON
        echo json_encode($result);
    }
    
    

    public function add() {
        $data['items'] = $this->Kasir_model->get_all_items(); // Ambil semua data items (menu)
        $data['products'] = $this->Kasir_model->get_all_products(); // Ambil semua data products (bahan baku)
    
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/add_ingredients', $data); // Pastikan data dikirim ke view
        $this->load->view('admin/footer');
    }
    


    public function do_add() {
        $this->form_validation->set_rules('id_items', 'Menu', 'required|integer');
        $this->form_validation->set_rules('id_produk', 'Bahan Baku', 'required|integer');
        $this->form_validation->set_rules('quantity', 'Jumlah Bahan Baku', 'required|numeric');
    
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = [
                'id_items' => $this->input->post('id_items'),
                'id_produk' => $this->input->post('id_produk'),
                'quantity' => $this->input->post('quantity'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
    
    
            if ($this->Kasir_model->add_ingredient($data)) {
                $this->session->set_flashdata('success', 'Bahan Baku berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan Bahan Baku.');
            }
    
            redirect('ingredients');
        }
    }
    


    // Mendapatkan data ingredient berdasarkan ID
    public function get($id) {
        $ingredient = $this->Kasir_model->get_ingredient_by_id($id);
        echo json_encode($ingredient);
    }

    // Mengedit data ingredient
    public function edit() {
        $data = [
            'id_items' => $this->input->post('id_items'),
            'id_produk' => $this->input->post('id_produk'),
            'quantity' => $this->input->post('quantity'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $id = $this->input->post('id_ingredient');
        $success = $this->Kasir_model->update_ingredient($id, $data);

        echo json_encode(['status' => $success ? 'success' : 'error']);
    }

    // Menghapus data ingredient
    public function delete($id) {
        $success = $this->Kasir_model->delete_ingredient($id);
        echo json_encode(['status' => $success ? 'success' : 'error']);
    }

    public function sort_data() {
        $quantity_order = $this->input->get('quantity_order');
        $menu_order = $this->input->get('menu_order');
        
        // Ambil data yang sudah diurutkan dari model
        $data = $this->Kasir_model->get_sorted_ingredients($quantity_order, $menu_order);
        
        if ($data) {
            $response = [
                'status' => 'success',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal mengambil data'
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
