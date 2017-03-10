<?php
session_start();
require_once 'models/config.php';
require_once 'models/products.php';
require_once 'models/users.php';
require_once 'controllers/controllers.php';
$uri = $_SERVER['REQUEST_URI'];
if ($uri == '/') {
  loginAction();
} elseif ($uri == '/registration') {
  registrationAction();
} elseif (($uri == '/list')&&(isset($_SESSION["logged"]))) {
  listAction();
} elseif (($uri == '/create')&&(isset($_SESSION["logged"]))) {
  createAction();
} elseif (($uri == '/modify')&&(isset($_SESSION["logged"]))) {
  modifyAction();
}
?>
