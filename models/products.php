<?php
  //base model to store some functions implemented to both child classes
  class Model {
    //connect to the DB
    protected function connectDB() {
      $mysqli = new mysqli (DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
      $mysqli->query("SET NAMES 'utf-8'");
      return $mysqli;
    }
    //implement filters to prevent html and sql injections
    protected function implementFilters($sentdata, $connect) {
      $data = trim($sentdata);
      $data = mysqli_real_escape_string($connect, $data);
      return $data;
    }
  }
  //model for products
  class Products extends Model{
    //get a list of products
    public function getProducts() {
      $connect = $this->connectDB();
      if ($connect->connect_errno) {
        return "There is no connection to the DB";
      }
      $results = $connect->query("SELECT * FROM  `products` LIMIT 0 , 1000");
      $products = array();
      while ($row = $results->fetch_assoc())
        $products[] = $row;
      $connect->close();
      return $products;
    }
    //create new product
    public function createProduct($name, $description) {
      $connect = $this->connectDB();
      if ($connect->connect_errno) {
        return "There is no connection to the DB";
      }
      $name = $this->implementFilters($name, $connect);
      //check if such product already exists
      $id=$connect->query("SELECT `id` FROM  `products` WHERE `name`='$name' LIMIT 0 , 1");
      if ($id->fetch_assoc()) {
        $connect->close();
        return "Such product name already exists in the DB";
      }
      $description = $this->implementFilters($description, $connect);
      $lock = $connect->query("LOCK TABLES `products` WRITE");
      $success = $connect->query("INSERT INTO  `products` (`id`, `name`, `description`) VALUES (NULL, '$name', '$description')");
      $unlock = $connect->query("UNLOCK TABLES");
      $connect->close();
      return true;
    }
    //modify or delete existing product
    public function modifyOrDeleteProduct($id, $name, $description, $del = NULL) {
      $connect = $this->connectDB();
      if ($connect->connect_errno) {
        return "There is no connection to the DB";
      }
      if ($del == true) {
        $success = $connect->query("DELETE FROM `products` WHERE `id`='$id'");
      } else {
        //check if such product already exists
        $name = $this->implementFilters($name, $connect);
        $description = $this->implementFilters($description, $connect);
        $lock = $connect->query("LOCK TABLES `products` WRITE");
        $success = $connect->query("UPDATE `products` SET `name`='$name', `description`='$description' WHERE `id`='$id'");
        $unlock = $connect->query("UNLOCK TABLES");
      }
      $connect->close();
      return true;
    }
    //get one product
    public function getOneProduct($id) {
      $connect = $this->connectDB();
      if ($connect->connect_errno) {
        return "There is no connection to the DB";
      }
      $results = $connect->query("SELECT * FROM  `products` WHERE `id`='$id' LIMIT 0 , 1");
      if ($product[] = $results->fetch_assoc()) {
        $connect->close();
        return $product;
      } else {
        $connect->close();
        return "There is no such product in the DB";
      }
    }
  }
?>
