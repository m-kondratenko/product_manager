<?php $title = 'List of Products' ?>

<?php ob_start() ?>

<h1 style="text-align: center">List of Products</h1>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr class="info">
        <th>№</th>
        <th>Name</th>
        <th>Text</th>
      </tr>
    </thead>
    <tbody class="text" id="body">
      <?php
        if (!is_string($products))
          for ($i=0; $i<count($products); $i++) {
            echo '<tr><td id="num">'.$products[$i]["id"].'</td>
              <td>'.$products[$i]["name"].'</td>
              <td id="taskCol">'.$products[$i]["description"].'</td></tr>';
          }
      ?>
    </tbody>
  </table>
</div>
<h2 id="mes" class="text-info" style="text-align: center"> <?php echo $message; ?></h2>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
