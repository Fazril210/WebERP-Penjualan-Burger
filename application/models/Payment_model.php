<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Insert payment details into the database
    public function insert_payment($data) {
        $this->db->insert('payments', $data);
        return $this->db->insert_id(); // Return the ID of the inserted payment
    }
}
