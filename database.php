<?php
require_once("config.php");

class Database {
    private $conn;

    public function __construct() {
        global $dbserver, $dbuser, $dbpass, $dbname;
        $this->conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
        if (!$this->conn) {
            die("Kết nối không thành công");
        }
    }

    public function getAll($table, $limit = 10, $start = 0) {
        $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT $start, $limit";
        $result = mysqli_query($this->conn, $sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    public function getByUserID($table, $id) {
        $sql = "SELECT * FROM $table WHERE user_id = $id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    public function insert($table, $data) {
        $fields = implode(',', array_keys($data));
        $values = implode("','", $data);
        $sql = "INSERT INTO {$table} ({$fields}) VALUES ('{$values}')";
        return mysqli_query($this->conn, $sql);
    }

    public function update($table, $data) {
        $sql = "UPDATE $table SET ";
        $id = $data['id'];
        foreach ($data as $field => $value) {
            $sql .= "$field = '$value', ";
        }
        $sql = rtrim($sql, ", ");
        $sql .= " WHERE id = $id";
        return mysqli_query($this->conn, $sql);
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM $table WHERE id = $id";
        return mysqli_query($this->conn, $sql);
    }

    public function exeQuery($sql) {
        $result = mysqli_query($this->conn, $sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function Query($sql){
        return mysqli_query($this->conn, $sql);
    }
}
?>
