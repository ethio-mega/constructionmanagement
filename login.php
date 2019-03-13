<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="POST">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input name="email" type="text" class="form-control" placeholder="E-mail" autofocus required>
          <br>
          <input name="password" type="password" class="form-control" placeholder="Password" required>
          <label class="checkbox">
            </label>
          <button class="btn btn-theme btn-block" name="signin" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
          <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="signup.php">
              Create an account
              </a>
          </div>
        </div>
      </form>
      <?php
      if(isset($_POST["signin"])){
        include_once 'db_functions.php';
        $db = new DB_Functions();
        $email = $_POST["email"];
        $password = $_POST["password"];
        $res = $db->loginUser($email, $password);

        if($res) {
          $found_user = mysqli_num_rows($res);
          if($found_user > 0) {
            header("Location: index.php");   
            session_start();
            $_SESSION["loggedin"] = true;
                 while($row = mysqli_fetch_array($res)) {
                   $_SESSION["firstname"] = $row["fname"];
                   $_SESSION["lastname"] = $row["lname"];
                   $_SESSION["role"] = $row["role"];
                 }   
          }
        } else { ?>
          <div id="msg"> Invalid user name or password. </div>
          <?php
        }
      }
      ?>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
