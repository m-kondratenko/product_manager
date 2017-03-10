<?php
  //model for users
  class Users extends Model{
    //create new user
    public function createUser($username, $password) {
      $connect = $this->connectDB();
      if ($connect->connect_errno) {
        return "There is no connection to the DB";
      }
      $username = $this->implementFilters($username, $connect);
      //check if such username already exists
      $id=$connect->query("SELECT `id` FROM  `users` WHERE `username`='$username' LIMIT 0 , 1");
      if ($id->fetch_assoc()) {
        $connect->close();
        return "Such username already exists in the DB";
      }
      $password = $this->implementFilters($password, $connect);
      $lock = $connect->query("LOCK TABLES `users` WRITE");
      $success = $connect->query("INSERT INTO  `users` (`id`, `username`, `password`) VALUES (NULL, '$username', '$password')");
      $unlock = $connect->query("UNLOCK TABLES");
      $connect->close();
      return true;
    }
    //check inserted username and password
    public function checkUser($username, $password) {
      $connect = $this->connectDB();
      if ($connect->connect_errno) {
        return "There is no connection to the DB";
      }
      $username = $this->implementFilters($username, $connect);
      $password = $this->implementFilters($password, $connect);
      $id=$connect->query("SELECT `id` FROM  `users` WHERE `username`='$username' AND `password`='$password'  LIMIT 0 , 1");
      $connect->close();
      if ($id->fetch_assoc())
        return true;
      else return false;
    }
  }
?>
