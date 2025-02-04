<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingredient_usage_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function record_usage($order_id, $product_id, $quantity) {
        $data = array(
            'id_order' => $order_id,
            'id_product' => $product_id,
            'quantity_used' => $quantity,
            'usage_date' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('ingredient_usage', $data);
    }

    public function get_total_usage_by_product($order = null) {
        $this->db->select('p.name_product, p.unit_of_goods, SUM(iu.quantity_used) as total_usage');
        $this->db->from('ingredient_usage iu');
        $this->db->join('products p', 'p.id_produk = iu.id_product');
        $this->db->group_by('p.id_produk, p.name_product, p.unit_of_goods');
        
        if ($order === 'asc') {
            $this->db->order_by('total_usage', 'ASC');
        } else if ($order === 'desc') {
            $this->db->order_by('total_usage', 'DESC');
        }
        
        return $this->db->get()->result();
    }

    public function get_usage_by_date_range($start_date, $end_date) {
        $this->db->select('p.name_product, p.unit_of_goods, SUM(iu.quantity_used) as total_usage');
        $this->db->from('ingredient_usage iu');
        $this->db->join('products p', 'p.id_produk = iu.id_product');
        $this->db->where('DATE(iu.usage_date) >=', $start_date);
        $this->db->where('DATE(iu.usage_date) <=', $end_date);
        $this->db->group_by('p.id_produk, p.name_product, p.unit_of_goods');
        $this->db->order_by('total_usage', 'DESC');
        return $this->db->get()->result();
    }

    public function get_daily_usage($date) {
        return $this->get_usage_by_date_range($date, $date);
    }

    public function get_monthly_usage($year, $month) {
        $start_date = "$year-$month-01";
        $end_date = date('Y-m-t', strtotime($start_date));
        return $this->get_usage_by_date_range($start_date, $end_date);
    }

    public function get_yearly_usage($year) {
        $start_date = "$year-01-01";
        $end_date = "$year-12-31";
        return $this->get_usage_by_date_range($start_date, $end_date);
    }
}
