<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the Payment Model
        $this->load->model('Payment_model');
    }

    public function process_payment() {
        // Get the payment data from POST
        $payment_data = $this->input->post();

        // Prepare data for insertion
        $data = array(
            'order_id' => $payment_data['order_id'],
            'subtotal' => $payment_data['subtotal'],
            'discount' => $payment_data['discount'],
            'tax' => $payment_data['tax'],
            'total' => $payment_data['total'],
            'payment_method' => $payment_data['payment_method'],
            'cash_amount' => isset($payment_data['cash_amount']) ? $payment_data['cash_amount'] : null,
            'change_amount' => isset($payment_data['change_amount']) ? $payment_data['change_amount'] : null,
        );

        // Insert the payment data into the database
        $payment_id = $this->Payment_model->insert_payment($data);

        // Return a response (JSON or redirect based on your need)
        if ($payment_id) {
            // Redirect or send success response
            echo json_encode(['status' => 'success', 'payment_id' => $payment_id]);
        } else {
            // Handle failure
            echo json_encode(['status' => 'error']);
        }
    }
}
