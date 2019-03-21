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
        if(isset($_GET["id"]) && $_GET["id"] == 1) {
          ?>
          <div class="form-login">
          <h2 class="form-login-heading">Success!</h2>
          <div class="login-wrap">          
            <label class="checkbox">Your request for new account has been sent! You can sign in after the admin approved your request</label>
            <br>
            <a href="login.php"><button class="btn btn-theme btn-block" name="signup"> GO BACK!</button></a>
          </div>
          </div>
          <?php
        } else if(isset($_GET["id"]) && $_GET["id"] == 2) {
          ?>
          <div class="form-login">
          <h2 class="form-login-heading">Failure!</h2>
          <div class="login-wrap">          
            <label class="checkbox">Seems like the e-mail address is used or there is a server issue. Try another email or be back in a little bit.</label>
            <br>
            <a href="signup.php"><button class="btn btn-theme btn-block" name="signup">TRY ANOTHER E-MAIL</button></a>
            <br>
            <a href="login.php"><button class="btn btn-theme btn-block" name="signup">GO BACK!</button></a>
          </div>
          <
          <?php
        } else {
      ?>
      <form class="form-login" method="POST">
        <h2 class="form-login-heading">Create New Account</h2>
        <div class="login-wrap">          
          <input name="fname" type="text" class="form-control" placeholder="First Name" autofocus required>
          <br>
          <input name="lname" type="text" class="form-control" placeholder="Last Name" required>
          <br>
          <input name="email" type="email" class="form-control" placeholder="E-mail" required>
          <br>
          <input name="password" type="password" class="form-control" placeholder="Password" required>            
          <br>
          <select name="role" class="btn btn-default" required>
            <option value="" selected="true" disabled>Select Role</option>
			<option value="project_manager">Project Manager</option>
			<option value="site_engineer">Site Engineer</option>
			<option value="0ffice_engineer">Office Engineer</option>
			<option value="finance">Finance</option>
            <option value="purchaser">Purchaser</option>
            <option value="Inventory_officer">Inventory Officer</option>
            <option value="cashier">Cashier</option>
            <option value="site_manager">Site Manager</option>
          </select>
          <label class="checkbox"></label>
          <br>
          <button class="btn btn-theme btn-block" name="signup" type="submit"> SING UP</button>
        </div>
      </form>
      <?php
        }
        include_once './db_functions.php';
        if(isset($_POST["signup"])) {
          $db = new db_Functions();
          $fname = $_POST["fname"];
          $lname = $_POST["lname"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $role = $_POST["role"];
          $res = $db->signUpUser($fname, $lname, $email, $password, $role);

          if($res) {
            header("Location: signup.php?id=1");
          } else { 
            header("Location: signup.php?id=2");
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
