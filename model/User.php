<?php

namespace model;
require_once("database.php");
class User
{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllusers() {
        return $this->db->getAll('users');
    }

    public function getUserById($id) {
        return $this->db->getById('users', $id);
    }

    public function addUser($user) {
        return $this->db->insert('users', $user);
    }

    public function updateUser($user) {
        return $this->db->update('users', $user);
    }

    public function deleteUser($id) {
        return $this->db->delete('users', $id);
    }
}