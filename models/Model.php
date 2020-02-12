<?php
require_once('db/.env.php');

class Model {
    private $mysqli;
    public static $tableName;
    public $model;
    private $columns;
    private $id;

    function __construct($id) {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->mysqli->connect_errno) {
            printf("Connect failed: %s\n", $this->mysqli->connect_error);
            exit();
        }
        $this->id = $this->mysqli->real_escape_string($id);
        $tableName = static::$tableName;
        $this->model = $this->mysqli
                            ->query("SELECT * FROM $tableName WHERE id=$this->id")
                            ->fetch_assoc();
        $this->columns = key($this->model);
    }

    function get($columnName) {
        return $this->model[$columnName];
    }

    function set($columnName, $value) {
        $this->model[$columnName];
    }

    function persist() {
        $tableName = static::$tableName;
        $sql = "UPDATE $tableName SET ";
        foreach ($column as $key => $this->columns) {
            $name = $this->mysqli->real_escape_string($column);
            $value = $this->mysqli->real_escape_string($this->model[$column]);
            $sql .= "$name = $value";
            if ($key != count($this->columns)) {
                $sql .= ',';
            }
        }
        $sql .= "WHERE id=$this->id;";
        $this->mysqli->query($sql);
    }

    public function getAll() {
        return $this->model;
    }

    static function fetchAll() {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $tableName = static::$tableName;
        $query = $mysqli->query("SELECT * FROM $tableName;");
        $rows = [];
        while($row = $query->fetch_assoc())
        {
            $rows[] = $row;
        }
        return $rows;
    }
}
