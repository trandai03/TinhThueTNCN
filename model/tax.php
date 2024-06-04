<?php

// namespace model;
require_once(dirname(__DIR__) . "/database.php");


class tax
{
    private $db;
    public $table = 'thue';

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllthue() {
        return $this->db->getAll('thue');
    }

    public function getTaxById($id) {
        return $this->db->getById('thue', $id);
    }

    public function getTaxByUserID($user_id){
        return $this->db->getByUserID('thue', $user_id);
    }

    public function addTax($thue) {
        return $this->db->insert('thue', $thue);
    }

    public function updateTax($thue) {
        return $this->db->update('thue', $thue);
    }

    public function deleteTax($id) {
        return $this->db->delete('thue', $id);
    }

    public function searchthue($query) {
        $sql = "SELECT * FROM thue WHERE thang LIKE '%$query%'";
        return $this->db->exeQuery($sql);
    }
}