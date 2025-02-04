<?php
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Items_model');
        $this->load->model('Members_model');
        $this->load->model('Supplier_model');
        $this->load->model('Kasir_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Product_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Ingredient_usage_model');
        $this->load->model('User_model');
        $this->load->library('session','form_validation');

        // Cek apakah admin sudah login
        if (!$this->session->userdata('admin_id')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu untuk mengakses halaman ini.');
            redirect('auth/login');
        }
    }

    // Halaman Dashboard Utama
    public function index() {

  // Ambil parameter sorting dari URL (default: null)
  $order = $this->input->get('order') ?? null;

  // Ambil data total penggunaan bahan baku per produk tanpa sorting default
  $data['total_usage_by_product'] = $this->Ingredient_usage_model->get_total_usage_by_product($order); // Tambahkan ini

        $data['total_items'] = $this->Items_model->get_total_items(); // Semua produk
        $data['total_members'] = $this->Members_model->get_total_memberss(); // Total member
        $data['total_suppliers'] = $this->Supplier_model->get_total_suppliers(); // Total supplier
        $data['months'] = ['January', 'February', 'March', 'April', 'May']; // Data bulan
        $data['sales_data'] = [150, 200, 250, 300, 350]; // Data penjualan
        $data['top_products'] = $this->Kasir_model->get_top_selling_products(5);
        $data['members_and_non_members'] = $this->Kasir_model->get_total_final_price_by_members_and_non_members(5);


        // Load view
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/dashboard', $data); // Dashboard utama
        $this->load->view('admin/footer');
    }

    public function get_monthly_sales($year = null)
{
    $year = $year ?? date('Y'); // Default ke tahun sekarang jika tidak ada parameter
    $monthlySales = $this->Kasir_model->getMonthlySalesByYear($year);
    echo json_encode($monthlySales);
}



    // ============================
    // SECTION: MEMBER MANAGEMENT
    // ============================
    public function members() {
        $data['members'] = $this->Members_model->get_all_members();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/members', $data);
        $this->load->view('admin/footer');
    }

    public function add_members() {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/add_members');
        $this->load->view('admin/footer');
    }

    public function do_add_members() {
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
        ];
        $this->Members_model->add_members($data);
        redirect('dashboard/members');
    }

    public function do_edit_members() {
        $id_members = $this->input->post('id_members');
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
        ];
        $this->Members_model->update_members($id_members, $data);
        redirect('dashboard/members');
    }

    public function do_delete_members($id_members) {
        $this->Members_model->delete_members($id_members);
        redirect('dashboard/members');
    }

    public function get_members_by_id($id_members) {
        $members = $this->Members_model->get_members_by_id($id_members);
        echo json_encode($members);
    }

    public function get_top_members()
    {
        $top_members = $this->Kasir_model->get_top_members_by_transactions();
    
        if (empty($top_members)) {
            log_message('error', 'Data top members kosong.');
        } else {
            log_message('debug', 'Data top members: ' . json_encode($top_members));
        }
    
        echo json_encode([
            'status' => empty($top_members) ? 'error' : 'success',
            'data' => $top_members
        ]);
    }
    
    


    // ============================
    // SECTION: SUPPLIER MANAGEMENT
    // ============================
    public function suppliers() {
        $data['suppliers'] = $this->Supplier_model->get_all_suppliers();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/suppliers', $data);
        $this->load->view('admin/footer');
    }

    public function add_supplier() {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/add_supplier');
        $this->load->view('admin/footer');
    }

    public function do_add_supplier() {
        $data = [
            'name_suppliers' => $this->input->post('name_suppliers'),
            'phone' => $this->input->post('phone'),
            'alamat' => $this->input->post('alamat'),
        ];
        $this->Supplier_model->add_supplier($data);
        redirect('dashboard/suppliers');
    }

    public function do_edit_supplier() {
        $supplier_id = $this->input->post('supplier_id');
        $data = [
            'name_suppliers' => $this->input->post('name_suppliers'),
            'phone' => $this->input->post('phone'),
            'alamat' => $this->input->post('alamat'),
        ];
        $this->Supplier_model->update_supplier($supplier_id, $data);
        redirect('dashboard/suppliers');
    }

    public function do_delete_supplier($supplier_id) {
        $this->Supplier_model->delete_supplier($supplier_id);
        redirect('dashboard/suppliers');
    }

    public function get_supplier_by_id($supplier_id) {
        $supplier = $this->Supplier_model->get_supplier_by_id($supplier_id);
        echo json_encode($supplier);
    }

     // ============================
    // SECTION: ITEMS
    // ============================
    public function items()
    {
        $data['items'] = $this->Items_model->get_all_items();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/items', $data);
        $this->load->view('admin/footer');
    }

    public function add_item()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/add_item');
        $this->load->view('admin/footer');
    }

    public function do_add_item()
    {
        // Set validation rules
        $this->form_validation->set_rules('name_items', 'Name', 'required');
        $this->form_validation->set_rules('price_items', 'Price', 'required|numeric');
        $this->form_validation->set_rules('stock_items', 'Stock', 'required|integer');
        $this->form_validation->set_rules('status', 'Status','required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->load->view('content/add_item');
        } else {
            // Handle file upload
            if (!empty($_FILES['images']['name'])) {
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048; // 2MB
                $config['file_name'] = time() . '_' . $_FILES['images']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('images')) {
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                } else {
                    $image = '';
                }
            } else {
                $image = '';
            }

            // Prepare data
            $data = array(
                'name_items'    => $this->input->post('name_items'),
                'price_items'   => $this->input->post('price_items'),
                'stock_items'   => $this->input->post('stock_items'),
                'images'        => $image,
                'status'        => $this->input->post('status'),
                'type'        => $this->input->post('type')
            );

            // Insert data
            $insert = $this->Items_model->add_item($data);

            if ($insert) {
                $this->session->set_flashdata('success', 'Item berhasil ditambahkan.');
                redirect('dashboard/items');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan item.');
                $this->load->view('add_item');
            }
        }
    }

    

    public function do_edit_item()
    {
        // Set validation rules
        $this->form_validation->set_rules('id_items', 'ID', 'required|integer');
        $this->form_validation->set_rules('name_items', 'Name', 'required');
        $this->form_validation->set_rules('price_items', 'Price', 'required|numeric');
        $this->form_validation->set_rules('stock_items', 'Stock', 'required|integer');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
            return;
        }

        $id = $this->input->post('id_items');

        // Fetch existing item
        $item = $this->Items_model->get_item($id);
        if (!$item) {
            $response = array(
                'status' => 'error',
                'message' => 'Item tidak ditemukan.'
            );
            echo json_encode($response);
            return;
        }

        // Handle file upload
        if (!empty($_FILES['images']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = time() . '_' . $_FILES['images']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('images')) {
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];

                // Delete old image if exists
                if ($item->images && file_exists('./assets/images/' . $item->images)) {
                    unlink('./assets/images/' . $item->images);
                }
            } else {
                $image = $item->images; // Keep existing image if upload fails
            }
        } else {
            $image = $item->images; // Keep existing image if no new image is uploaded
        }

        // Prepare data
        $data = array(
            'name_items'    => $this->input->post('name_items'),
            'price_items'   => $this->input->post('price_items'),
            'stock_items'   => $this->input->post('stock_items'),
            'images'        => $image,
            'status'        => $this->input->post('status'),
            'type'        => $this->input->post('type')
        );

        // Update data
        $update = $this->Items_model->update_item($id, $data);

        if ($update) {
            $response = array(
                'status' => 'success',
                'message' => 'Item berhasil diperbarui.',
                'data' => $this->Items_model->get_item($id) // Return updated data
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Gagal memperbarui item.'
            );
        }

        echo json_encode($response);
    }

    // Handle delete item
    public function delete_item($id)
    {
        error_log('ID yang diterima: ' . $id);
        // Periksa apakah item ada
        $item = $this->Items_model->get_item($id);
        if (!$item) {
            echo json_encode(['status' => 'error', 'message' => 'Item tidak ditemukan.']);
            return;
        }
    
        // Hapus data terkait di order_details
        $this->db->where('id_items', $id);
        $this->db->delete('order_details');
    
        // Hapus file gambar jika ada
        if ($item->images && file_exists('./assets/images/' . $item->images)) {
            unlink('./assets/images/' . $item->images);
        }
    
        // Hapus item dari tabel items
        $delete = $this->Items_model->delete_item($id);
    
        if ($delete) {
            echo json_encode(['status' => 'success', 'message' => 'Item berhasil dihapus']);
        } else {
            error_log('Gagal menghapus item ID: ' . $id);
            echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus item']);
        }
    }
    


    

    // Handle AJAX search
    public function search_items()
    {
        $keyword = $this->input->get('keyword');
        $items = $this->Items_model->search_items($keyword);
        echo json_encode($items);
    }

    public function get_item($id)
    {
        $item = $this->Items_model->get_item($id);
        if ($item) {
            echo json_encode($item);
        } else {
            echo json_encode(false);
        }
    }

    public function filter_items() {
        $keyword = $this->input->get('keyword');
        $filterType = $this->input->get('filterType');
        
        // Filter item berdasarkan pencarian dan tipe/status
        if ($filterType) {
            if ($filterType == 'type') {
                $this->db->like('type', $keyword);
            } elseif ($filterType == 'status') {
                $this->db->like('status', $keyword);
            }
        } else {
            if ($keyword) {
                $this->db->like('name_items', $keyword);
            }
        }
    
        $query = $this->db->get('items'); // Ganti dengan nama tabel yang sesuai
        $items = $query->result();
        
        echo json_encode($items);
    }

    public function sort_filter_items()
{
    $sort_stock = $this->input->get('sort_stock');
    $sort_price = $this->input->get('sort_price');
    $status = $this->input->get('status');
    $type = $this->input->get('type');
    
    log_message('debug', 'Sort Price: ' . $sort_price); // Debugging

    $items = $this->Items_model->get_sorted_filtered_items($sort_stock, $sort_price, $status, $type);
    echo json_encode($items);
}


public function transaksi_penjualan()
{
    $this->load->model('Kasir_model'); // Pastikan model di-load
    $data['transaksi'] = $this->Kasir_model->get_all_penjualan(); // Ambil data pesanan (opsional)
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('content/transaksi_penjualan', $data); // Tampilkan view transaksi penjualan
    $this->load->view('admin/footer');
}


public function get_sales_report()
{
    $type = $this->input->get('type');
    $date = $this->input->get('date');

    $this->load->model('Kasir_model');
    $sales = $this->Kasir_model->get_sales_report($type, $date);

    echo json_encode($sales);
}

    


    // ============================
    // SECTION: PRODUCT MANAGEMENT
    // ============================
    public function products() {
        $data['products'] = $this->Product_model->get_all_products();
        $data['suppliers'] = $this->Supplier_model->get_all_suppliers();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/product', $data);
        $this->load->view('admin/footer');
    }

    public function add_product() {
        log_message('debug', 'Metode add_product dipanggil.');
        $data['suppliers'] = $this->Supplier_model->get_all_suppliers();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/add_product', $data);
        $this->load->view('admin/footer');
    }
    

    public function do_add_product() {
        $name_product = $this->input->post('name_product', TRUE);
        $stock = $this->input->post('stock', TRUE);
        $unit_of_goods = $this->input->post('unit_of_goods', TRUE);
        $price_per_piece = $this->input->post('price_per_piece', TRUE);
        $id_suppliers = $this->input->post('id_suppliers', TRUE);

        // Validasi input (opsional)
        if (empty($name_product) || empty($stock) || empty($unit_of_goods) || empty($price_per_piece) || empty($id_suppliers)) {
            $this->session->set_flashdata('error', 'Semua field harus diisi!');
            redirect('dashboard/add_product');
        }        

        // Data yang akan disimpan
        $data = [
            'name_product' => $name_product,
            'stock' => $stock,
            'unit_of_goods' => $unit_of_goods,
            'price_per_piece' => $price_per_piece,
            'id_suppliers' => $id_suppliers
        ];

        // Simpan ke database (contoh query insert, sesuaikan dengan model produk Anda)
        $this->db->insert('products', $data);

        // Redirect setelah berhasil
        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
        redirect('dashboard/products');
    }

    public function edit_product($id) {
        $data['product'] = $this->Product_model->get_product_by_id($id);
        $data['suppliers'] = $this->Supplier_model->get_all_suppliers();  
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/edit_product', $data);
        $this->load->view('admin/footer');
    }

    public function do_edit_product() {
        $product_id = $this->input->post('id_produk');
        $data = [
            'name_product' => $this->input->post('name_product'),
            'stock' => $this->input->post('stock'),
            'unit_of_goods' => $this->input->post('unit_of_goods'),
            'price_per_piece' => $this->input->post('price_per_piece'),
            'id_suppliers' => $this->input->post('id_suppliers'),
        ];
        $this->Product_model->update_product($product_id, $data);
        redirect('dashboard/products');
    }

    public function do_delete_product($id) {
        $this->Product_model->delete_product($id);
        redirect('dashboard/products');
    }
 
    public function get_product_by_id($id_produk) {
        $product = $this->Product_model->get_product_by_id($id_produk);
        echo json_encode($product);
    }

   

    // Method untuk mengambil data produk dengan sorting dan filtering
    public function sort_filter_products() {
        // Ambil parameter sorting dari request
        $sort_price = $this->input->get('sort_price');
        $sort_stock = $this->input->get('sort_stock');

        // Panggil model untuk mendapatkan data yang sudah diurutkan
        $products = $this->Product_model->get_sorted_filtered_products($sort_price, $sort_stock);

        // Kirim data sebagai JSON
        echo json_encode($products);
    }

    // ============================
    // SECTION: PROFILE AND LOGOUT
    // ============================
    public function profile() {
        // Mendapatkan admin_id dari session
        $admin_id = $this->session->userdata('admin_id');

        // Mengambil data admin berdasarkan ID
        $data['admin'] = $this->User_model->get_admin_by_id($admin_id);

        // Mengambil data tambahan jika diperlukan (contoh: data tabel admin)
        $this->load->model('Admin_model');
        $data['admins'] = $this->Admin_model->get_all_admins();

        // Load view dengan data
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/profile', $data);
        $this->load->view('admin/footer');
    }

   // Fungsi tambahan jika dibutuhkan
   public function add_admin() {
    $data = [
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')), // Hash password
        'role'     => $this->input->post('role')
    ];

    $this->load->model('Admin_model');
    $this->Admin_model->add_admin($data); // Simpan data
    redirect('dashboard/profile'); // Reload halaman profile
}

public function delete_admin($id) {
    $this->load->model('Admin_model');
    $this->Admin_model->delete_admin($id);
    redirect('dashboard/profile'); // Reload halaman profile
}

public function update_admin() {
    $admin_id = $this->input->post('id');
    $data = [
        'username' => $this->input->post('username'),
        'role'     => $this->input->post('role')
    ];

    $this->load->model('Admin_model');
    $this->Admin_model->update_admin($admin_id, $data); // Update data admin
    redirect('dashboard/profile'); // Reload halaman profile
}


    // ============================
    // SECTION: TRANSAKSI
    // ============================
    public function transactions() {
        $data['transactions'] = $this->Transaksi_model->get_all_transaksi();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/transaksi/transaksi_page', $data);
        $this->load->view('admin/footer');       
    }

    public function add_transaksi() {
        $data['products'] = $this->Transaksi_model->get_all_product();       
        $data['suppliers'] = $this->Transaksi_model->get_all_suppliers();       
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/transaksi/add_transaksi', $data);
        $this->load->view('admin/footer');
    }
    

    public function do_add_transaksi() {
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('id_produk', 'Produk', 'required');
        $this->form_validation->set_rules('id_suppliers', 'Pemasok', 'required');
        $this->form_validation->set_rules('jumlah_beli', 'Jumlah Beli', 'required|integer|greater_than[0]');
        $this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required|numeric');
        $this->form_validation->set_rules('total_harga', 'Total Harga', 'required|numeric');
        $this->form_validation->set_rules('metode_pembayaran', 'Metode Pembayaran', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('dashboard/add_transaksi');
        } else {
            $id_produk = $this->input->post('id_produk');
            $jumlah_beli = $this->input->post('jumlah_beli');
    
            $data = [
                'id_produk' => $id_produk,
                'id_suppliers' => $this->input->post('id_suppliers'),
                'jumlah_beli' => $jumlah_beli,
                'harga_satuan' => $this->input->post('harga_satuan'),
                'total_harga' => $this->input->post('total_harga'),
                'metode_pembayaran' => $this->input->post('metode_pembayaran'),
                'tgl' => $this->input->post('tgl'),
                'status_pembayaran' => $this->input->post('status_pembayaran')
            ];
    
            if ($this->Transaksi_model->add_transaksi($data)) {
                // Perbarui stok produk
                if ($this->Transaksi_model->update_product_stock($id_produk, $jumlah_beli, true)) {
                    $this->session->set_flashdata('success', 'Transaksi berhasil ditambahkan dan stok diperbarui!');
                } else {
                    $this->session->set_flashdata('error', 'Transaksi berhasil, tetapi gagal memperbarui stok produk!');
                }                
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan transaksi!');
            }
            redirect('dashboard/transactions');
        }
    }
    
    

    public function edit_transaction($transaksi_id) {
        $data['transaction'] = $this->Transaksi_model->get_transaksi_by_id($transaksi_id);
        $data['products'] = $this->Transaksi_model->get_all_product();
        $data['suppliers'] = $this->Transaksi_model->get_all_suppliers();
    
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/transaksi/edit_transaksi', $data);
        $this->load->view('admin/footer');
    }
    
    public function do_edit_transaction($transaksi_id) {
        $data = [
            'id_produk' => $this->input->post('id_produk'),
            'id_suppliers' => $this->input->post('id_suppliers'),
            'jumlah_beli' => $this->input->post('jumlah_beli'),
            'harga_satuan' => $this->input->post('harga_satuan'),
            'total_harga' => $this->input->post('total_harga'),
            'metode_pembayaran' => $this->input->post('metode_pembayaran'),
            'tgl' => $this->input->post('tgl'),
            'status_pembayaran' => $this->input->post('status_pembayaran')
        ];
    
        if ($this->Transaksi_model->edit_transaksi($transaksi_id, $data)) {
            $this->session->set_flashdata('success', 'Transaksi berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui transaksi!');
        }
        redirect('dashboard/transactions');
    }

    public function delete_transaction($id) {
        if ($this->Transaksi_model->delete_transaksi($id)) {
            $this->session->set_flashdata('success', 'Transaksi berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus transaksi!');
        }
        redirect('dashboard/transactions');
    }
    

    public function get_product_details() {
        $id_produk = $this->input->post('id_produk');
        $this->db->select('products.id_produk, products.price_per_piece, suppliers.id_suppliers, suppliers.name_suppliers');
        $this->db->from('products');
        $this->db->join('suppliers', 'products.id_suppliers = suppliers.id_suppliers', 'left');
        $this->db->where('products.id_produk', $id_produk);
        $query = $this->db->get();
        $product = $query->row();
    
        if ($product) {
            echo json_encode($product);
        } else {
            echo json_encode(['error' => 'Produk tidak ditemukan']);
        }
    }


    // =====================
    // SECTION: KARYAWAN
    // =====================

    public function karyawan(){
        $data['karyawan'] = $this->Karyawan_model->get_all_karyawan();
        $data['posisi_list'] = ['Kasir', 'Koki', 'Manajer', 'Pelayan'];
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/karyawan', $data);
        $this->load->view('admin/footer');
    }

    public function add_karyawan(){
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('content/add_karyawan');
        $this->load->view('admin/footer');
    }

    public function do_add_karyawan() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('gaji', 'Gaji', 'numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['posisi_list'] = ['Kasir', 'Koki', 'Manajer', 'Pelayan'];
            $this->load->view('karyawan/add', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'posisi' => $this->input->post('posisi'),
                'email' => $this->input->post('email'),
                'no_telepon' => $this->input->post('no_telepon'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'status_karyawan' => $this->input->post('status_karyawan'),
                'gaji' => $this->input->post('gaji'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat')
            ];

            if ($this->Karyawan_model->insert_karyawan($data)) {
                $this->session->set_flashdata('success', 'Karyawan berhasil ditambahkan');
                redirect('dashboard/karyawan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan karyawan');
                redirect('dashboard/add_karyawan');
            }
        }
    }

    public function do_edit_karyawan() {
        $id = $this->input->post('id_karyawan');
        $data = [
            'nama' => $this->input->post('nama'),
            'posisi' => $this->input->post('posisi'),
            'email' => $this->input->post('email'),
            'no_telepon' => $this->input->post('no_telepon'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'status_karyawan' => $this->input->post('status_karyawan'),
            'gaji' => $this->input->post('gaji'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat')
        ];

        if ($this->Karyawan_model->update_karyawan($id, $data)) {
            $this->session->set_flashdata('success', 'Karyawan berhasil diperbarui');
            redirect('dashboard/karyawan');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui karyawan');
            redirect('dashboard/karyawan/' . $id);
        }
    }

    public function delete_karyawan($id) {
        if ($this->Karyawan_model->delete_karyawan($id)) {
            $this->session->set_flashdata('success', 'Karyawan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus karyawan');
        }
        redirect('dashboard/karyawan');
    }

    public function search_karyawan() {
        $keyword = $this->input->get('keyword');
        $data['karyawan'] = $this->Karyawan_model->search_karyawan($keyword);
        $data['posisi_list'] = ['Kasir', 'Koki', 'Manajer', 'Pelayan'];
        $this->load->view('karyawan/index', $data);
    }

    public function filter_karyawan() {
        $params = [
            'posisi' => $this->input->get('posisi'),
            'status_karyawan' => $this->input->get('status_karyawan'),
            'jenis_kelamin' => $this->input->get('jenis_kelamin'),
            'gaji_min' => $this->input->get('gaji_min'),
            'gaji_max' => $this->input->get('gaji_max'),
            'start_date' => $this->input->get('start_date'),
            'end_date' => $this->input->get('end_date')
        ];

        $data['karyawan'] = $this->Karyawan_model->filter_karyawan($params);
        $data['posisi_list'] = ['Kasir', 'Koki', 'Manajer', 'Pelayan'];
        $this->load->view('karyawan/index', $data);
    }


    public function laporan_analisis()
{
    // Memuat model yang diperlukan
    $this->load->model('Kasir_model');

    // Mendapatkan data laporan bulanan
    $current_year = date('Y');
    $current_month = date('m');
    $data['monthly_report'] = $this->Kasir_model->get_monthly_report($current_year, $current_month);

    // Mendapatkan data produk terlaris
    $data['top_products'] = $this->Kasir_model->get_top_selling_products(10, $current_year, $current_month);

    // Mendapatkan tren penjualan harian
    $data['sales_trends'] = $this->Kasir_model->get_sales_trends($current_year, $current_month);

    // Memuat view dengan data
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('content/laporan_analisis', $data);
    $this->load->view('admin/footer');
}



    public function get_monthly_report($year, $month) {
        // Get start and end dates for the month
        $start_date = "$year-$month-01";
        $end_date = date('Y-m-t', strtotime($start_date));
        
        // Get previous month dates for comparison
        $prev_start = date('Y-m-01', strtotime($start_date . ' -1 month'));
        $prev_end = date('Y-m-t', strtotime($prev_start));
    
        // Get current month summary
        $current_summary = $this->db->select('
            COUNT(DISTINCT id_order) as total_transactions,
            SUM(total_price) as total_sales,
            SUM(member_discount) as total_discounts
        ')
        ->from('orders')
        ->where('DATE(order_date) >=', $start_date)
        ->where('DATE(order_date) <=', $end_date)
        ->get()
        ->row_array();
    
        // Get previous month summary for comparison
        $prev_summary = $this->db->select('
            COUNT(DISTINCT id_order) as total_transactions,
            SUM(total_price) as total_sales,
            SUM(member_discount) as total_discounts
        ')
        ->from('orders')
        ->where('DATE(order_date) >=', $prev_start)
        ->where('DATE(order_date) <=', $prev_end)
        ->get()
        ->row_array();
    
        // Calculate growth percentages
        $sales_growth = 0;
        $transactions_growth = 0;
        $average_growth = 0;
        $discounts_growth = 0;
        $average_current = 0;
        
        // Calculate sales growth
        if ($prev_summary['total_sales'] > 0) {
            $sales_growth = (($current_summary['total_sales'] - $prev_summary['total_sales']) / $prev_summary['total_sales']) * 100;
        }
        
        // Calculate transactions growth
        if ($prev_summary['total_transactions'] > 0) {
            $transactions_growth = (($current_summary['total_transactions'] - $prev_summary['total_transactions']) / $prev_summary['total_transactions']) * 100;
        }
        
        // Calculate average transaction value and growth
        if ($current_summary['total_transactions'] > 0) {
            $average_current = $current_summary['total_sales'] / $current_summary['total_transactions'];
            $average_prev = ($prev_summary['total_transactions'] > 0) ? 
                ($prev_summary['total_sales'] / $prev_summary['total_transactions']) : 0;
                
            if ($average_prev > 0) {
                $average_growth = (($average_current - $average_prev) / $average_prev) * 100;
            }
        }
        
        // Calculate discounts growth
        if ($prev_summary['total_discounts'] > 0) {
            $discounts_growth = (($current_summary['total_discounts'] - $prev_summary['total_discounts']) / $prev_summary['total_discounts']) * 100;
        }
    
        // Get top selling products
        $top_products = $this->db->query("
            SELECT 
                i.name_items,
                SUM(od.quantity) as quantity_sold,
                SUM(od.price * od.quantity) as total_revenue
            FROM order_details od
            JOIN items i ON od.id_items = i.id_items
            JOIN orders o ON od.id_order = o.id_order
            WHERE DATE(o.order_date) BETWEEN '$start_date' AND '$end_date'
            GROUP BY i.id_items, i.name_items
            ORDER BY quantity_sold DESC
            LIMIT 10
        ")->result_array();
    
        // Get daily sales data
        $daily_sales = $this->db->query("
            SELECT 
                DATE(order_date) as date,
                SUM(total_price) as total
            FROM orders 
            WHERE DATE(order_date) BETWEEN '$start_date' AND '$end_date'
            GROUP BY DATE(order_date)
            ORDER BY date ASC
        ")->result_array();
    
        // Prepare response data
        $response = [
            'summary' => [
                'totalSales' => (float)$current_summary['total_sales'],
                'totalTransactions' => (int)$current_summary['total_transactions'],
                'averageTransaction' => $average_current,
                'totalDiscounts' => (float)$current_summary['total_discounts'],
                'salesGrowth' => round($sales_growth, 2),
                'transactionsGrowth' => round($transactions_growth, 2),
                'averageGrowth' => round($average_growth, 2),
                'discountsGrowth' => round($discounts_growth, 2)
            ],
            'topProducts' => $top_products,
            'dailySales' => $daily_sales
        ];
    
        // Send JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    
    
    public function export_report_excel($year, $month) {
        // Pastikan library Composer terhubung
        if (!class_exists('PhpOffice\PhpSpreadsheet\Spreadsheet')) {
            show_error('PhpSpreadsheet belum diinstal.');
        }
    
        // Buat spreadsheet baru
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Report $month-$year");
    
        // Header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Produk');
        $sheet->setCellValue('C1', 'Jumlah Terjual');
        $sheet->setCellValue('D1', 'Total Pendapatan');
    
        // Ambil data dari model
        $data = $this->Kasir_model->get_monthly_data($year, $month);
        if (empty($data)) {
            show_error('Data laporan tidak tersedia.');
        }
    
        // Isi data ke Excel
        $row = 2;
        foreach ($data as $index => $item) {
            $sheet->setCellValue("A$row", $index + 1);
            $sheet->setCellValue("B$row", $item['product_name']);
            $sheet->setCellValue("C$row", $item['quantity_sold']);
            $sheet->setCellValue("D$row", $item['total_revenue']);
            $row++;
        }
    
        // Output file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="report_' . $year . '_' . $month . '.xlsx"');
        header('Cache-Control: max-age=0');
    
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
    
    
    public function export_report_pdf($year, $month) {
        // Pastikan Dompdf terhubung
        if (!class_exists('Dompdf\Dompdf')) {
            show_error('Dompdf belum diinstal.');
        }
    
        // Ambil data laporan
        $data['report'] = $this->Kasir_model->get_monthly_data($year, $month);
        $data['month'] = $month;
        $data['year'] = $year;
    
        if (empty($data['report'])) {
            show_error('Data laporan tidak tersedia.');
        }
    
        // Load view laporan
        $html = $this->load->view('report_pdf', $data, true);
    
        // Inisialisasi Dompdf
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        // Output PDF
        $dompdf->stream("report_{$year}_{$month}.pdf", array("Attachment" => true));
        exit;
    }
    
    
    
        
        
        
    
        /**
         * Fetch all orders for the transactions view
         */
        public function get_orders() {
            $orders = $this->Pesanan_model->get_all_orders();
            echo json_encode($orders);
        }
    
        public function payment()
        {
            
            $data['title'] = 'Payment Page';
            $this->load->view('kasir/payment_page', $data); // Tampilkan halaman pembayaran
        }
    
    

    
    



    public function logout() {
        $this->session->set_flashdata('success', 'Anda berhasil logout.');
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>
