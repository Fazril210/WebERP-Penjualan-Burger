<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk mengambil data laporan bulanan
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
}
