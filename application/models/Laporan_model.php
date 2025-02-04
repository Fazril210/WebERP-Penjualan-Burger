<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function get_ingredient_usage($start_date = null, $end_date = null) {
        $this->db->select('p.name_product, p.unit_of_goods, SUM(iu.quantity_used) as total_usage');
        $this->db->from('ingredient_usage iu');
        $this->db->join('products p', 'p.id_produk = iu.id_product');
        
        if ($start_date && $end_date) {
            $this->db->where('DATE(iu.usage_date) >=', $start_date);
            $this->db->where('DATE(iu.usage_date) <=', $end_date);
        }
        
        $this->db->group_by('p.id_produk, p.name_product, p.unit_of_goods');
        $this->db->order_by('total_usage', 'DESC');
        return $this->db->get()->result();
    }

    public function get_daily_ingredient_usage($date) {
        return $this->get_ingredient_usage($date, $date);
    }

    public function get_monthly_ingredient_usage($year, $month) {
        $start_date = "$year-$month-01";
        $end_date = date('Y-m-t', strtotime($start_date));
        return $this->get_ingredient_usage($start_date, $end_date);
    }

    public function get_yearly_ingredient_usage($year) {
        $start_date = "$year-01-01";
        $end_date = "$year-12-31";
        return $this->get_ingredient_usage($start_date, $end_date);
    }
}
