<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Tambahkan namespace PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


// application/controllers/Kasir.php

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kasir_model');
        $this->load->model('Items_model');
        $this->load->model('Members_model');
        $this->load->model('Order_model');
        $this->load->model('Ingredient_usage_model'); // Tambahkan ini
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');

            // Cek apakah admin sudah login
    if (!$this->session->userdata('admin_id')) {
        $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu untuk mengakses halaman ini.');
        redirect('auth/login');
    }
}


    // Menampilkan daftar pesanan
    public function index()
    {
// Ambil semua item
$all_items = $this->Items_model->get_all_items();

// Kelompokkan item berdasarkan tipe yang sesuai
$data['items'] = [
    'Burger'    => [],
    'Drinks'    => [],
    'Side Dish' => []
];

foreach ($all_items as $item) {
    switch (trim($item->type)) {
        case 'Burger':
            $data['items']['Burger'][] = $item;
            break;
        case 'Drinks':
            $data['items']['Drinks'][] = $item;
            break;
        case 'Side Dish':
            $data['items']['Side Dish'][] = $item;
            break;
        default:
            // Item dengan tipe yang tidak dikenali bisa diabaikan atau dikelompokkan ke kategori lain
            break;
    }
}

        $data['orders'] = $this->Kasir_model->get_all_orders();
        $this->load->view('kasir/kasir', $data);
    }

    public function save_order()
{
    $post_data = json_decode($this->input->raw_input_stream, true);
    
    // Validasi data utama
    if (empty($post_data['cart']) || empty($post_data['total_price']) || empty($post_data['payment_method'])) {
        echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap.']);
        return;
    }

    // Simpan data order ke tabel orders
    $order_data = [
        'order_date' => date('Y-m-d H:i:s'),
        'total_price' => $post_data['total_price'],
        'payment_method' => $post_data['payment_method'],
        'member_discount' => $post_data['member_discount'] ?? 0,
        'tax' => $post_data['tax'] ?? 0,
        'final_price' => $post_data['final_price'],
        'id_members' => $post_data['id_members'] ?? null 
    ];

    $this->load->model('Order_model');
    $order_id = $this->Order_model->create_order($order_data);

    if (!$order_id) {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data order.']);
        return;
    }

    // Simpan detail order ke tabel order_details
    foreach ($post_data['cart'] as $item) {
        if (empty($item['id_items'])) {
            echo json_encode(['status' => 'error', 'message' => 'id_items tidak boleh kosong']);
            return;
        }
        
        $order_detail = [
            'id_order' => $order_id,
            'id_items' => $item['id_items'],
            'quantity' => $item['quantity'],
            'price' => $item['price']
        ];

        if (!$this->Order_model->create_order_detail($order_detail)) {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan detail order.']);
            return;
        }

        // **Kurangi stok pada tabel items**
        $this->load->model('Items_model');
        if (!$this->Items_model->decrease_stock($item['id_items'], $item['quantity'])) {
            echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui stok item.']);
            return;
        }

        // **Kurangi stok bahan baku pada tabel products**
        // Ambil data bahan baku dari tabel ingredients
        $this->db->select('id_produk, quantity');
        $this->db->from('ingredients');
        $this->db->where('id_items', $item['id_items']);
        $ingredients = $this->db->get()->result();

        foreach ($ingredients as $ingredient) {
            // Hitung jumlah bahan baku yang diperlukan
            $total_needed = $ingredient->quantity * $item['quantity'];

            // Kurangi stok bahan baku
            $this->db->set('stock', 'stock - ' . $total_needed, false)
                     ->where('id_produk', $ingredient->id_produk)
                     ->update('products');

            // Catat penggunaan bahan baku
            $this->Ingredient_usage_model->record_usage(
                $order_id,
                $ingredient->id_produk,
                $total_needed
            );

            // Periksa stok bahan baku setelah pengurangan
            $current_stock = $this->db->get_where('products', ['id_produk' => $ingredient->id_produk])->row();
            if ($current_stock->stock < 0) {
                echo json_encode(['status' => 'error', 'message' => 'Stok bahan baku tidak mencukupi untuk produk: ' . $ingredient->id_produk]);
                return;
            }
        }
    }

    echo json_encode(['status' => 'success', 'message' => 'Order berhasil disimpan.']);
}




// In your Kasir controller

public function get_transactions($date = null) {
    if (!$date) {
        $date = date('Y-m-d');
    }
    
    $this->db->select('orders.*, members.name AS member_name'); // Tambahkan kolom nama member
    $this->db->from('orders');
    $this->db->join('members', 'orders.id_members = members.id_members', 'left'); // Gunakan LEFT JOIN untuk menghindari error jika tidak ada id_members
    $this->db->where('DATE(order_date)', $date);
    $this->db->order_by('order_date', 'DESC');
    
    $query = $this->db->get();
    $transactions = $query->result();
    
    echo json_encode($transactions); // Kembalikan data JSON
}


public function get_transaction_details($orderId) {
    // Get order information including member name
    $this->db->select('orders.*, members.name AS member_name');
    $this->db->from('orders');
    $this->db->join('members', 'orders.id_members = members.id_members', 'left'); // LEFT JOIN to handle orders without members
    $this->db->where('orders.id_order', $orderId);
    $order = $this->db->get()->row();

    // Get order details with item information
    $this->db->select('order_details.*, items.name_items');
    $this->db->from('order_details');
    $this->db->join('items', 'items.id_items = order_details.id_items');
    $this->db->where('order_details.id_order', $orderId);
    $details = $this->db->get()->result();

    $response = array(
        'order' => $order,
        'details' => $details
    );

    echo json_encode($response);
}


public function get_all_members()
{
    $this->load->model('Kasir_model');
    $members = $this->Kasir_model->get_all_members();

    echo json_encode(['status' => 'success', 'data' => $members]);
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


public function export_report_excel() {
        try {
            // Clean any previous output
            if (ob_get_length()) ob_end_clean();
            
            // Get parameters
            $type = $this->input->get('type');
            $date = $this->input->get('date');

            // Get sales data
            $sales = $this->Kasir_model->get_sales_report($type, $date);

            if (empty($sales)) {
                show_error('Data laporan tidak tersedia untuk periode yang dipilih.');
                return;
            }

            // Format date for display
            $formatted_date = date('d F Y', strtotime($date));
            if ($type == 'monthly') {
                $formatted_date = date('F Y', strtotime($date));
            } else if ($type == 'yearly') {
                $formatted_date = date('Y', strtotime($date));
            }

            // Load PHPSpreadsheet
            require_once FCPATH . 'vendor/autoload.php';
            
            // Create new Spreadsheet object
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            
            // Set document properties
            $spreadsheet->getProperties()
                ->setCreator('ERP System')
                ->setLastModifiedBy('ERP System')
                ->setTitle('Laporan Penjualan')
                ->setSubject('Laporan Penjualan ' . ucfirst($type))
                ->setDescription('Laporan Penjualan ' . $formatted_date);

            // Get active sheet
            $sheet = $spreadsheet->getActiveSheet();

            // Set header style
            $headerStyle = [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4B5563'],
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ];

            // Set title
            $sheet->setCellValue('A1', 'LAPORAN PENJUALAN');
            $sheet->setCellValue('A2', 'Periode: ' . ucfirst($type));
            $sheet->setCellValue('A3', 'Tanggal: ' . $formatted_date);
            
            // Merge cells for title
            $sheet->mergeCells('A1:E1');
            $sheet->mergeCells('A2:E2');
            $sheet->mergeCells('A3:E3');
            
            // Set title style
            $sheet->getStyle('A1:E3')->applyFromArray([
                'font' => ['bold' => true],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);

            // Set headers
            $headers = ['No', 'ID Transaksi', 'Tanggal', 'Pemasukan', 'Metode Pembayaran'];
            $col = 'A';
            $row = 5;
            foreach ($headers as $header) {
                $sheet->setCellValue($col . $row, $header);
                $sheet->getColumnDimension($col)->setAutoSize(true);
                $col++;
            }

            // Apply header style
            $sheet->getStyle('A5:E5')->applyFromArray($headerStyle);

            // Add data
            $row = 6;
            $no = 1;
            $total = 0;
            foreach ($sales as $sale) {
                $sheet->setCellValue('A' . $row, $no);
                $sheet->setCellValue('B' . $row, $sale->id_order);
                $sheet->setCellValue('C' . $row, date('d-m-Y H:i:s', strtotime($sale->order_date)));
                $sheet->setCellValue('D' . $row, (float)$sale->final_price);
                $sheet->setCellValue('E' . $row, $sale->payment_method);
                
                // Format currency
                $sheet->getStyle('D' . $row)->getNumberFormat()
                    ->setFormatCode('_("Rp"* #,##0_);_("Rp"* -#,##0_);_("Rp"* "-"??_);_(@_)');
                
                $total += (float)$sale->final_price;
                $row++;
                $no++;
            }

            // Add total row
            $totalRow = $row;
            $sheet->setCellValue('A' . $totalRow, 'Total Pemasukan');
            $sheet->mergeCells('A' . $totalRow . ':C' . $totalRow);
            $sheet->setCellValue('D' . $totalRow, $total);
            $sheet->mergeCells('D' . $totalRow . ':E' . $totalRow);
            
            // Style total row
            $sheet->getStyle('A' . $totalRow . ':E' . $totalRow)->applyFromArray([
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'E5E7EB'],
                ],
            ]);
            
            // Format total currency
            $sheet->getStyle('D' . $totalRow)->getNumberFormat()
                ->setFormatCode('_("Rp"* #,##0_);_("Rp"* -#,##0_);_("Rp"* "-"??_);_(@_)');

            // Add borders to data
            $sheet->getStyle('A5:E' . $totalRow)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ]);

            // Create writer
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            
            // Set headers for download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="laporan_penjualan_' . $type . '_' . $date . '.xlsx"');
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: cache, must-revalidate');
            header('Pragma: public');

            // Save to PHP output
            $writer->save('php://output');
            exit();
            
        } catch (Exception $e) {
            // Log error for debugging
            log_message('error', 'Excel Export Error: ' . $e->getMessage());
            show_error('Terjadi kesalahan saat membuat file Excel. Silakan coba lagi.');
        }
    }


public function export_report_pdf() {
        // Get parameters
        $type = $this->input->get('type');
        $date = $this->input->get('date');

        // Load Dompdf
        require_once FCPATH . 'vendor/autoload.php';
        $dompdf = new \Dompdf\Dompdf();
        
        // Set options
        $options = $dompdf->getOptions();
        $options->setIsRemoteEnabled(true);
        $options->setIsHtml5ParserEnabled(true);
        $dompdf->setOptions($options);

        // Get sales data based on type and date
        $sales = $this->Kasir_model->get_sales_report($type, $date);

        if (empty($sales)) {
            show_error('Data laporan tidak tersedia untuk periode yang dipilih.');
            return;
        }

        // Format date for display
        $formatted_date = date('d F Y', strtotime($date));
        if ($type == 'monthly') {
            $formatted_date = date('F Y', strtotime($date));
        } else if ($type == 'yearly') {
            $formatted_date = date('Y', strtotime($date));
        }

        // Calculate total income
        $total_income = 0;
        foreach ($sales as $sale) {
            $total_income += $sale->final_price;
        }

        // Prepare data for view
        $data = array(
            'sales' => $sales,
            'type' => $type,
            'date' => $formatted_date,
            'total_income' => $total_income
        );

        // Load view dan convert ke HTML
        $html = $this->load->view('transaksi_pdf', $data, true);

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Set paper size dan orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output PDF
        $dompdf->stream("laporan_penjualan_{$type}_{$date}.pdf", [
            "Attachment" => true
        ]);
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



    // =================
    // SECTION = MEMBERS
    // =================    
// Mendapatkan semua anggota (untuk AJAX)
public function get_members()
{
    $members = $this->Kasir_model->get_all_members();
    echo json_encode($members);
}

// Menambahkan anggota baru
public function add_member()
{
    // Pastikan request adalah AJAX
    if (!$this->input->is_ajax_request()) {
        show_404();
    }

    // Validasi input
    $this->form_validation->set_rules('name', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[members.email]');
    $this->form_validation->set_rules('phone', 'Telepon', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kirim error
        $errors = validation_errors();
        echo json_encode(['status' => 'error', 'message' => $errors]);
    } else {
        // Jika validasi berhasil, simpan data
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone')
        );
        $insert = $this->Kasir_model->add_member($data);
        if ($insert) {
            echo json_encode(['status' => 'success', 'message' => 'Member berhasil ditambahkan.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan saat menambahkan member.']);
        }
    }
}

// Mendapatkan detail anggota berdasarkan ID (untuk edit)
public function get_member($id)
{
    if (!$this->input->is_ajax_request()) {
        show_404();
    }

    $member = $this->Kasir_model->get_member_by_id($id);

    if ($member) {
        echo json_encode(['status' => 'success', 'data' => $member]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Member tidak ditemukan.']);
    }
}


// Memperbarui data anggota
public function update_member()
{
    // Pastikan request adalah AJAX
    if (!$this->input->is_ajax_request()) {
        show_404();
    }

    // Validasi input
    $this->form_validation->set_rules('id_members', 'ID', 'required|integer');
    $this->form_validation->set_rules('name', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('phone', 'Telepon', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kirim error
        $errors = validation_errors();
        echo json_encode(['status' => 'error', 'message' => $errors]);
    } else {
        $id = $this->input->post('id_members');
        $existing_member = $this->Kasir_model->get_member_by_id($id);

        if (!$existing_member) {
            echo json_encode(['status' => 'error', 'message' => 'Member tidak ditemukan.']);
            return;
        }

        // Cek apakah email diubah dan apakah unik
        if ($this->input->post('email') != $existing_member->email) {
            // Tambahkan validasi unik jika email diubah
            $this->form_validation->set_rules('email', 'Email', 'is_unique[members.email]');
            if ($this->form_validation->run() == FALSE) {
                $errors = validation_errors();
                echo json_encode(['status' => 'error', 'message' => $errors]);
                return;
            }
        }

        // Update data
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone')
        );
        $update = $this->Kasir_model->update_member($id, $data);
        if ($update) {
            echo json_encode(['status' => 'success', 'message' => 'Member berhasil diperbarui.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan saat memperbarui member.']);
        }
    }
}

// Menghapus anggota
public function delete_member($id)
{
    // Pastikan request adalah AJAX
    if (!$this->input->is_ajax_request()) {
        show_404();
    }

    $existing_member = $this->Kasir_model->get_member_by_id($id);
    if (!$existing_member) {
        echo json_encode(['status' => 'error', 'message' => 'Member tidak ditemukan.']);
        return;
    }

    $delete = $this->Kasir_model->delete_member($id);
    if ($delete) {
        echo json_encode(['status' => 'success', 'message' => 'Member berhasil dihapus.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan saat menghapus member.']);
    }
}





public function logout() {
    $this->session->sess_destroy();
    $this->session->set_flashdata('success', 'Anda berhasil logout.');
    redirect('auth/login');
}
}







?>