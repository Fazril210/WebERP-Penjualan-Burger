<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->library('session');
    }

    public function index() {
        // Default tampilkan data hari ini
        $data['ingredient_usage'] = $this->Laporan_model->get_daily_ingredient_usage(date('Y-m-d'));
        $this->load->view('content/laporan_analisis', $data);
    }

    public function get_ingredient_usage() {
        $type = $this->input->post('type');
        $date = $this->input->post('date');

        switch($type) {
            case 'daily':
                $data = $this->Laporan_model->get_daily_ingredient_usage($date);
                break;
            case 'monthly':
                $year = date('Y', strtotime($date));
                $month = date('m', strtotime($date));
                $data = $this->Laporan_model->get_monthly_ingredient_usage($year, $month);
                break;
            case 'yearly':
                $year = date('Y', strtotime($date));
                $data = $this->Laporan_model->get_yearly_ingredient_usage($year);
                break;
            default:
                $data = $this->Laporan_model->get_daily_ingredient_usage(date('Y-m-d'));
        }

        echo json_encode($data);
    }
}
