<?php
  //login controller
  function loginAction() {
    if (!empty($_POST["logout"])) {
     unset($_SESSION["logged"], $_SESSION["login"]);
    }
    //check if credentials are ok
    if (!empty($_POST["username"])&&!empty($_POST["password"])) {
      $user = new Users;
      $done = $user->checkUser($_POST["username"], $_POST["password"]);
      if ($done == true) {
        $_SESSION["logged"]=1;
        $_SESSION["login"]=$_POST["username"];
        $message = NULL;
      }
      elseif ($done == false)
        $message = "Your credentials are incorrect";
    }
    require 'views/login.php';
  }
  //registration controller
  function registrationAction() {
    if (!empty($_POST["username"])&&!empty($_POST["password"])) {
      $user = new Users;
      $done = $user->createUser($_POST["username"], $_POST["password"]);
    }
    else ($done = false);
    if (!is_bool($done))
      $message = $done;
    else $message = NULL;
    require 'views/registration.php';
  }
  //list products controller
  function listAction() {
    $product = new Products;
    $products = $product->getProducts();
    if (is_string($products))
      $message = $products;
    else $message = NULL;
    require 'views/list.php';
  }
  //create product controller
  function createAction() {
    if (!empty($_POST["name"])&&!empty($_POST["description"])) {
      $product = new Products;
      $done = $product->createProduct($_POST["name"], $_POST["description"]);
    }
    else ($done = false);
    if (!is_bool($done))
      $message = $done;
    else $message = NULL;
    require 'views/create.php';
  }
 //modify and delete products controller
  function modifyAction() {
    //modify or delete the product
    if (isset($_POST["name"])) {
      $product = new Products;
      $done = $product->modifyOrDeleteProduct($_POST["id"], $_POST["name"], $_POST["description"], $_POST["del"]);
    }
    //get the product by id
    elseif (isset($_POST["id"])) {
      $done = false;
      $product = new Products;
      $data = $product->getOneProduct($_POST["id"]);
    }
    //show error message
    if (!is_bool($done))
      $message = $done;
    else $message = NULL;
    if (is_string($data))
      $message = $data;
    else $message = NULL;
    require 'views/modify.php';
  }
?>
