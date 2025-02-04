<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model {
    private $table = 'karyawan';

    public function get_all_karyawan($limit = null, $offset = 0) {
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get($this->table)->result();
    }

    public function count_all_karyawan() {
        return $this->db->count_all($this->table);
    }

    public function insert_karyawan($data) {
        return $this->db->insert($this->table, $data);
    }

    public function get_karyawan_by_id($id) {
        return $this->db->get_where($this->table, ['id_karyawan' => $id])->row();
    }

    public function update_karyawan($id, $data) {
        $this->db->where('id_karyawan', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_karyawan($id) {
        return $this->db->delete($this->table, ['id_karyawan' => $id]);
    }

    public function search_karyawan($keyword) {
        $this->db->like('nama', $keyword);
        $this->db->or_like('posisi', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get($this->table)->result();
    }

    public function filter_karyawan($params = []) {
        if (!empty($params['posisi'])) {
            $this->db->where('posisi', $params['posisi']);
        }
        if (!empty($params['status_karyawan'])) {
            $this->db->where('status_karyawan', $params['status_karyawan']);
        }
        if (!empty($params['jenis_kelamin'])) {
            $this->db->where('jenis_kelamin', $params['jenis_kelamin']);
        }
        if (!empty($params['gaji_min'])) {
            $this->db->where('gaji >=', $params['gaji_min']);
        }
        if (!empty($params['gaji_max'])) {
            $this->db->where('gaji <=', $params['gaji_max']);
        }
        if (!empty($params['start_date'])) {
            $this->db->where('tanggal_masuk >=', $params['start_date']);
        }
        if (!empty($params['end_date'])) {
            $this->db->where('tanggal_masuk <=', $params['end_date']);
        }

        return $this->db->get($this->table)->result();
    }
}