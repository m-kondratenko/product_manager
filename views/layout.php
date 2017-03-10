<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title ?></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div>
            <ul class="nav navbar-nav">
              <li><a href="/" title="Login">Login</a></li>
              <li><a href="/registration" title="Registration">Registration</a></li>
              <?php if (isset($_SESSION["logged"])) {
              ?>
              <li><a href="/list" title="List of products">List of products</a></li>
              <li><a href="/create" title="Create new product">Create new product</a></li>
              <li><a href="/modify" title="Modify existing product">Modify existing product</a></li>
              <?php
               }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="container">
    <?php echo $content ?>
    </div>
  </body>
</html>
