<?php $title = 'Registration' ?>

<?php ob_start() ?>

<h1 style="text-align: center">Registration</h1>
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
      <input id="password" class="form-control" type="password" name="password" maxlength="12" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-2" for="send"></label>
    <button id="send" class="btn btn-primary btn-lg col-lg-8" type="submit">Register</button>
  </div>
</form>
<h2 id="mes" class="text-info" style="text-align: center"> <?php echo $message; ?></h2>

<?php if (($done)&&(is_bool($done)))
  echo "<h3 class=\"text-info\" style=\"text-align: center\">User has been created. You can log on now.</h3>";
?>


<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
