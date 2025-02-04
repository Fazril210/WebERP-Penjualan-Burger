<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_bahan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Ingredient_usage_model');
        $this->load->library('session');
        
        // Cek login
        if (!$this->session->userdata('admin_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        // Default tampilkan data hari ini
        $data['ingredient_usage'] = $this->Ingredient_usage_model->get_daily_usage(date('Y-m-d'));
        $this->load->view('templates/header');
        $this->load->view('content/laporan_analisis', $data);
        $this->load->view('templates/footer');
    }

    public function get_usage_data() {
        $type = $this->input->post('type');
        $date = $this->input->post('date');
        
        switch($type) {
            case 'daily':
                $data = $this->Ingredient_usage_model->get_daily_usage($date);
                break;
            case 'monthly':
                $year = date('Y', strtotime($date));
                $month = date('m', strtotime($date));
                $data = $this->Ingredient_usage_model->get_monthly_usage($year, $month);
                break;
            case 'yearly':
                $year = date('Y', strtotime($date));
                $data = $this->Ingredient_usage_model->get_yearly_usage($year);
                break;
            default:
                $data = $this->Ingredient_usage_model->get_daily_usage(date('Y-m-d'));
        }
        
        echo json_encode($data);
    }
}
