<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/ttt/stylesheets/styles.css">

    <!-- Scripts -->
    <!-- <script src="/var/www/html/ttt/play/node_modules/jquery/src/jquery.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="cs.js"></script>
    <title>Tic Tac Toe</title>
  </head>
  <body>

<?php include ('html/header.html'); ?>

      <div class="leftDiv">
        <div class="formContainer">
        <form action="./" method="post">

                <div class="col-sm-7">
                  <input type="text" class="form-control mb-2" id="username" placeholder="Username" name="username">
                </div>
                <div class="col-sm-7">
                   <input type="email" class="form-control mb-2" id="email" placeholder="Email">
                </div>
                <div class="col-sm-7">
                   <input type="password" class="form-control mb-2" id="password" placeholder="Password">
                </div>


                <div class="col-auto">
                  <button id="submitBtn" onclick="onSignUpClick()" type="submit" class="btn btn-primary mb-2"> Sign Up</button>
                </div>
        </form>
      </div>
      </div>

      <div class="rightDiv">
        <div class="formContainer2">
          <form action="./" method="post" class="form-inline">

              <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input type="text" class="form-control" id="logInUsername" placeholder="Username">
              </div>

              <label class="sr-only" for="inputPassword4">Password</label>
              <input type="password" class="form-control mb-2 mr-sm-2" id="logInPswd" placeholder="Password">

              <div class="form-check mb-2 mr-sm-2">
                <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                <label class="form-check-label" for="inlineFormCheck">
                  Remember me
                </label>
              </div>

              <button type="submit" onclick="onLogInClick()" class="btn btn-primary mb-2">Log In</button>
          </form>
        </div>
      </div>

<div class="greetingContainer">

    <?php
    include '/etc/php/vendor/autoload.php'; // include Composer's autoloader
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->testdb->movies;
    $result = $collection->insertOne( [ 'name' => 'Avengers'] );
    echo "Inserted with Object ID '{$result->getInsertedId()}'";


      if (isset($_POST["username"])) {
          echo "Hello " . $_POST["username"]. ", ";
          echo "\n";
          echo date("d/m/Y");
        }
    ?>
</div>

<div class="boardContainer">

      <?php

          if (!empty($_POST["username"])) {
              include ('html/board.html');
          }
      ?>

</div>

  <?php include ('html/footer.html'); ?>



</body>
</html>
