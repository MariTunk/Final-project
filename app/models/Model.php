<?php

namespace app\models;

abstract class Model {

    // Define the table name property that will be used by child classes
    protected $table;

    // Query to fetch all records from a table
    public function findAll() {
        $query = "SELECT * FROM $this->table";
        return $this->query($query);
    }

    // Private method to establish a database connection
    private function connect() {
        $string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        $con = new \PDO($string, DBUSER, DBPASS);
        return $con;
    }

    // Method to perform queries
    
    public function query($query, $data = []) {
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $check = $stm->execute($data);
    
            // If the query was a SELECT
            if (stripos($query, 'SELECT') === 0) {
                $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
                return (is_array($result) && count($result)) ? $result : [];
            }
    
            // If the query was INSERT/UPDATE/DELETE
            return $check;
    
        } catch (\PDOException $e) {
            error_log("SQL ERROR: " . $e->getMessage());
            return false;
        }
    }
    
}
