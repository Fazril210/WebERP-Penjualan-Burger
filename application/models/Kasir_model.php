    <?php 

// application/models/Kasir_model.php

class Kasir_model extends CI_Model
{
    protected $members_table = 'members'; // Tambahkan ini

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Insert a new order
     * @param array $orderData - Contains order_date and total_price
     * @return int|bool - Inserted order ID or FALSE on failure
     */
    

    /**
     * Insert order items
     * @param int $orderId
     * @param array $items - Each item should have id_order, id_items, qty, unit_price, order_date, total_price
     * @return bool
     */
    

    /**
     * Optionally, fetch orders for the transactions view
     */
    public function get_all_orders() {
        $this->db->select('items.*');
        $this->db->from('items');
        $query = $this->db->get();
        return $query->result();
    }

    // Mendapatkan semua anggota
    public function get_all_members()
{
    return $this->db->get('members')->result();
}


    // Mendapatkan anggota berdasarkan ID
    public function get_member_by_id($id)
    {
        $query = $this->db->get_where($this->members_table, array('id_members' => $id));
        return $query->row();
    }

    // Menambahkan anggota baru
    public function add_member($data)
    {
        return $this->db->insert($this->members_table, $data);
    }

    // Memperbarui data anggota
    public function update_member($id, $data)
    {
        $this->db->where('id_members', $id);
        return $this->db->update($this->members_table, $data);
    }

    // Menghapus anggota
    public function delete_member($id)
    {
        return $this->db->delete($this->members_table, array('id_members' => $id));
    }

    // Mendapatkan pesanan berdasarkan ID (ditambahkan)
    public function get_order_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id_order' => $id));
        return $query->row();
    }
    
    // Ambil semua data customers
    public function get_all_customers()
    {
        return $this->db->get('customers')->result(); // Ambil data dari tabel customers
    }
    
    // Ambil semua data items
    public function get_all_items()
    {
        return $this->db->get('items')->result(); // Ambil data dari tabel items
    }

    public function get_monthly_data($year, $month)
    {
        $start_date = "$year-$month-01";
        $end_date = date('Y-m-t', strtotime($start_date));

        $this->db->select('
            items.name_items AS product_name,
            SUM(order_details.quantity) AS quantity_sold,
            SUM(order_details.price * order_details.quantity) AS total_revenue
        ');
        $this->db->from('order_details');
        $this->db->join('items', 'order_details.id_items = items.id_items');
        $this->db->join('orders', 'order_details.id_order = orders.id_order');
        $this->db->where('DATE(orders.order_date) >=', $start_date);
        $this->db->where('DATE(orders.order_date) <=', $end_date);
        $this->db->group_by('items.id_items');
        $this->db->order_by('quantity_sold', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_final_price_by_members_and_non_members($limit = 5)
    {
        // Query untuk Member
        $this->db->select('
            members.name AS member_name,
            members.email,
            members.phone,
            SUM(orders.final_price) AS total_final_price,
            COUNT(orders.id_order) AS transaction_count
        ');
        $this->db->from('members');
        $this->db->join('orders', 'members.id_members = orders.id_members', 'inner');
        $this->db->group_by('members.id_members');
        $this->db->order_by('total_final_price', 'DESC');
        $this->db->limit($limit);
    
        $members = $this->db->get()->result();
    
        // Query untuk Non-Member
        $this->db->select('
            "Non-Member" AS member_name,
            "No Email" AS email,
            "No Phone" AS phone,
            SUM(orders.final_price) AS total_final_price,
            COUNT(orders.id_order) AS transaction_count
        ');
        $this->db->from('orders');
        $this->db->where('orders.id_members IS NULL');
        $this->db->group_by('orders.id_members');
        $this->db->order_by('total_final_price', 'DESC');
        $this->db->limit($limit);
    
        $non_members = $this->db->get()->result();
    
        // Kembalikan data Member dan Non-Member
        return [
            'members' => $members,
            'non_members' => $non_members
        ];
    }
    

    public function getMonthlySalesByYear($year)
{
    $this->db->select("DATE_FORMAT(order_date, '%Y-%m') as month, SUM(final_price) as total");
    $this->db->where("YEAR(order_date)", $year);
    $this->db->group_by("DATE_FORMAT(order_date, '%Y-%m')");
    $this->db->order_by("month", "ASC");  // Using the aliased column name 'month'

    return $this->db->get('orders')->result();
}

public function get_sales_report($type, $date)
    {
        $this->db->select('*');
        $this->db->from('orders');

        if ($type === 'daily') {
            $this->db->where('DATE(order_date)', $date);
        } elseif ($type === 'monthly') {
            $this->db->where('MONTH(order_date)', date('m', strtotime($date)));
            $this->db->where('YEAR(order_date)', date('Y', strtotime($date)));
        } elseif ($type === 'yearly') {
            $this->db->where('YEAR(order_date)', date('Y', strtotime($date)));
        }

        $this->db->order_by('order_date', 'DESC');
        return $this->db->get()->result();
    }

    public function get_all_penjualan()
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->order_by('order_date', 'DESC');
        return $this->db->get()->result();
    }

    public function get_top_selling_products($limit = 5) {
        $this->db->select('items.name_items, items.images, SUM(order_details.quantity) as total_sold');
        $this->db->from('order_details');
        $this->db->join('items', 'items.id_items = order_details.id_items');
        $this->db->join('orders', 'orders.id_order = order_details.id_order');
        $this->db->group_by('items.id_items, items.name_items');
        $this->db->order_by('total_sold', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }
    

    public function add_ingredient($data) {
        if (!$this->db->insert('ingredients', $data)) {
            // Debug query dan error database
            echo $this->db->last_query();
            print_r($this->db->error());
            exit;
        }
        return true;
    }
    

// Mendapatkan semua data ingredients
public function get_all_ingredients() {
    $this->db->select('ingredients.id_ingredient, items.name_items, products.name_product, ingredients.quantity');
    $this->db->from('ingredients');
    $this->db->join('items', 'ingredients.id_items = items.id_items', 'left');
    $this->db->join('products', 'ingredients.id_produk = products.id_produk', 'left');
    $this->db->order_by('items.name_items', 'asc'); // Mengurutkan berdasarkan nama menu secara ascending
    return $this->db->get()->result();
}

// Mendapatkan ingredient berdasarkan ID
public function get_ingredient_by_id($id) {
    $this->db->select('id_ingredient, id_items, id_produk, quantity');
    $this->db->from('ingredients');
    $this->db->where('id_ingredient', $id);
    return $this->db->get()->row();
}

// Mengupdate data ingredient
public function update_ingredient($id, $data) {
    $this->db->where('id_ingredient', $id);
    return $this->db->update('ingredients', $data);
}

// Menghapus ingredient
public function delete_ingredient($id) {
    $this->db->where('id_ingredient', $id);
    return $this->db->delete('ingredients');
}

// Ambil semua data products (bahan baku)
public function get_all_products() {
    return $this->db->get('products')->result();
}

public function add_ingredient_batch($data) {
    return $this->db->insert_batch('ingredients', $data);
}

    public function get_sorted_ingredients($quantity_order = '', $menu_order = '') {
        $this->db->select('ingredients.*, items.name_items, products.name_product');
        $this->db->from('ingredients');
        $this->db->join('items', 'items.id_items = ingredients.id_items');
        $this->db->join('products', 'products.id_produk = ingredients.id_produk');
        
        // Urutkan berdasarkan menu jika ada
        if (!empty($menu_order)) {
            $this->db->order_by('items.name_items', $menu_order);
        }
        
        // Urutkan berdasarkan quantity jika ada
        if (!empty($quantity_order)) {
            $this->db->order_by('ingredients.quantity', $quantity_order);
        }
        
        $query = $this->db->get();
        return $query->result();
    }

    public function get_monthly_report($year, $month) {
        // Format tanggal untuk query
        $start_date = sprintf('%d-%02d-01', $year, $month);
        $end_date = date('Y-m-t', strtotime($start_date));

        // Mengambil ringkasan penjualan
        $this->db->select('
            COUNT(DISTINCT o.id_order) as total_orders,
            SUM(o.final_price) as total_revenue,
            COUNT(DISTINCT o.id_members) as total_customers,
            AVG(o.final_price) as average_order_value
        ');
        $this->db->from('orders o');
        $this->db->where('DATE(o.order_date) >=', $start_date);
        $this->db->where('DATE(o.order_date) <=', $end_date);
        
        $summary = $this->db->get()->row_array();

        // Mengambil produk terlaris
        $this->db->select('
            i.name_items,
            SUM(od.quantity) as total_quantity,
            SUM(od.price * od.quantity) as total_sales
        ');
        $this->db->from('order_details od');
        $this->db->join('orders o', 'o.id_order = od.id_order');
        $this->db->join('items i', 'i.id_items = od.id_items');
        $this->db->where('DATE(o.order_date) >=', $start_date);
        $this->db->where('DATE(o.order_date) <=', $end_date);
        $this->db->group_by('i.id_items, i.name_items');
        $this->db->order_by('total_quantity', 'DESC');
        $this->db->limit(5);
        
        $top_products = $this->db->get()->result_array();

        // Menggabungkan semua data
        return array(
            'summary' => $summary,
            'top_products' => $top_products
        );
    }

    public function get_sales_trends($year, $month) {
        $start_date = sprintf('%d-%02d-01', $year, $month);
        $end_date = date('Y-m-t', strtotime($start_date));

        $this->db->select('
            DATE(o.order_date) as date,
            COUNT(DISTINCT o.id_order) as total_orders,
            SUM(o.final_price) as daily_revenue
        ');
        $this->db->from('orders o');
        $this->db->where('DATE(o.order_date) >=', $start_date);
        $this->db->where('DATE(o.order_date) <=', $end_date);
        $this->db->group_by('DATE(o.order_date)');
        $this->db->order_by("date", "ASC");  // Using the aliased column name 'date'

        return $this->db->get()->result_array();
    }

    }

    ?>
