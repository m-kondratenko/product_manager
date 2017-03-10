<?php $title = 'Authentication' ?>

<?php ob_start() ?>

<h1 style="text-align: center">Authentication</h1>

<?php
//show logon form if not logged
if (empty($_SESSION["logged"])) {
 ?>

<form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label class="control-label col-lg-2" for="username">Insert your username</label>
    <div class="col-lg-8">
      <input id="username" class="form-control" type="text" name="username" maxlength="12" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-2" for="password">Insert your password</label>
    <div class="col-lg-8">
      <input id="password" class="form-control" type="password" name="password" maxlength="12" required><br>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-2" for="send"></label>
    <button id="send" class="btn btn-primary btn-lg col-lg-8" type="submit">Logon</button>
  </div>
</form>
<h2 id="mes" class="text-info" style="text-align: center"> <?php echo $message; ?></h2>
 <?php
  }
  //show message and logout form if logged
  else {
 ?>

 <h3 class="help-block" style="text-align: center">You have been authorized as <span class="text-info"><?=$_SESSION["login"]?></span></h3>
 <form class="form-horizontal" action="" method="post">
   <div class="form-group">
     <div class="col-lg-8">
       <input id="check" class="form-control" type="hidden" name="logout" value="1">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-lg-2" for="send"></label>
     <button id="logout" class="btn btn-primary btn-lg col-lg-8" type="submit">Logout</button><br>
   </div>
 </form>

 <?php
}
?>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
