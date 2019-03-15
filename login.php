<?php
  if(isset($_GET["id"]) && $_GET["id"] == 0) {
    session_start();
    session_destroy();
  }
?>
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
      <?php
        session_start();
        // unset($_SESSION['login_chances']);
        if(isset($_GET["id"]) && $_GET["id"] == 1) {
          if(isset($_SESSION["login_chances"])) {
            if($_SESSION["login_chances"] > 0) {
               $_SESSION["login_chances"] -= 1;  
            }          
          } else {
            $_SESSION["login_chances"] = 3;              
          }
          ?>
          <div class="form-login">
          <h2 class="form-login-heading"><?php echo $_SESSION["login_chances"] ?> Tries Left!</h2>
          <div class="login-wrap">          
            <label class="checkbox">Invalid E-mail/Password.</label>
            <label class="checkbox">You can't sign in if your Sign up process is stll pending.</label>
            <br>
            <a href="login.php"><button class="btn btn-theme btn-block" name="signup"> Try again!</button></a>
          </div>
          </div>
          <?php
        }  else {
          if(isset($_SESSION["login_chances"]) && $_SESSION["login_chances"] <= 0) { 
          ?>
            <div class="form-login">
          <h2 class="form-login-heading">You are banned!</h2>
          <div class="login-wrap">          
            <br>
            <a href="login.php"><button class="btn btn-theme btn-block" name="signup"> Try again!</button></a>
          </div>
          </div>
          <?php
          } else {
          ?>
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
      }
    }
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
            $_SESSION["loggedin"] = true;
            while($row = mysqli_fetch_array($res)) {
               $_SESSION["firstname"] = $row["first_name"];
               $_SESSION["lastname"] = $row["last_name"];
            }   
            if(isset($_SESSION["login_chances"])) {
              unset($_SESSION['login_chances']);
            }
          } else {
            header("Location: login.php?id=1");            
          }
        } else { 
          header("Location: login.php?id=1");
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
