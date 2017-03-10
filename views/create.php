<?php $title = 'Create new product' ?>

<?php ob_start() ?>

<h1 style="text-align: center">Create new product</h1>
<form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label class="control-label col-lg-2" for="name">Insert product name</label>
    <div class="col-lg-8">
      <input id="name" class="form-control" type="text" name="name" maxlength="12" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-2" for="description">Insert its description</label>
    <div class="col-lg-8">
      <textarea id="description" class="form-control" type="text" name="description" rows="5" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-2" for="send"></label>
    <button id="send" class="btn btn-primary btn-lg col-lg-8" type="submit">Create</button>
  </div>
</form>
<h2 id="mes" class="text-info" style="text-align: center"> <?php echo $message; ?></h2>

<?php if (($done)&&(is_bool($done)))
  echo "<h3 class=\"text-info\" style=\"text-align: center\">The product has been created</h3>";
?>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
