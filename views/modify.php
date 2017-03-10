<?php $title = 'Modify existing product' ?>

<?php ob_start() ?>

<h1 style="text-align: center">Modify existing product</h1>
<form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label class="control-label col-lg-2" for="id">Insert product id</label>
    <div class="col-lg-8">
      <input id="id" class="form-control" type="text" name="id" maxlength="4" <?php if ((isset($_POST["id"]))&&(empty($_POST["name"]))) echo "readonly" ?>
        required value="<?php echo $_POST['id'] ?>">
    </div>
  </div>

  <?php if ((isset($_POST["id"]))&&(empty($_POST["name"]))) {
  ?>

  <div class="form-group">
    <label class="control-label col-lg-2" for="name">Change product name</label>
    <div class="col-lg-8">
      <input id="name" class="form-control" type="text" name="name" maxlength="12" value="<?php echo $data[0]['name'] ?>" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-2" for="description">Change its description</label>
    <div class="col-lg-8">
      <textarea id="description" class="form-control" type="text" name="description" rows="5" required><?php echo $data[0]["description"] ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-4" for=""></label>
    <div class="checkbox col-lg-4">Check if you want to delete this product
      <label class="control-label col-lg-4" for="del">
        <input id="del" type="checkbox" name="del" value="true"> Delete
      </label>
    </div>
  </div>

  <?php }
  ?>

  <div class="form-group">
    <label class="control-label col-lg-2" for="send"></label>
    <button id="send" class="btn btn-primary btn-lg col-lg-8" type="submit">Send</button>
  </div>
</form>
<h2 id="mes" class="text-info" style="text-align: center"> <?php echo $message; ?></h2>

<?php if (($done)&&(is_bool($done))) {
        if (empty($_POST["del"]))
          echo "<h3 class=\"text-info\" style=\"text-align: center\">The product has been modified</h3>";
        elseif (isset($_POST["del"]))
          echo "<h3 class=\"text-info\" style=\"text-align: center\">The product has been deleted</h3>";
      }
?>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
