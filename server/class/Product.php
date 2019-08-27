<?php

class Product {

    private $connection;

    function __construct() {
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
        $connection->set_charset("utf8");
        $this->connection = $connection;
    }

    public function get_products($limit = false) {
        $products = [];
        $sql = "SELECT * FROM selling_items WHERE available = 1";

        if($limit) 
            $sql .= " LIMIT $limit";
        
        $result = $this->connection->query($sql);

        if($result) {
            while($row = $result->fetch_assoc()) {
                $products[] = $row;
            } 
        }

        return $products;
    }

}