<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Construction Management System</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b><span>C</span>M<span>S</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="login.php?id=0">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/1.png" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo ucfirst($_SESSION["firstname"])." ".ucfirst($_SESSION["lastname"])?> </h5>
          <li class="mt">
            <a class="active" href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-user-md"></i>
              <span>HR Management</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-barcode"></i>
              <span>Inventory Management</span>
              </a>
              <ul class="sub">
              <li><a href="make_request.php">Make Request</a></li>
              <li><a href="buttons.html">Perchase Methods</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-flash"></i>
              <span>Admin Options</span>
              </a>
            <ul class="sub">
              <li><a href="daily_post.php">Approve Users</a></li>
              <!-- <li><a href="buttons.html">Buttons</a></li> -->
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <?php 
                include_once 'db_functions.php';
                $db = new DB_Functions();
                $res = $db->getrequestFromPurchaser();

                if($res) {
              ?>
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Matrials that need to buy.</h4>
                <hr>
                <thead>
                  <tr>
				    <th><i class="fa fa-bookmark"></i> ID</th>
                    <th><i class="fa fa-bullhorn"></i> Requestor Name</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> type</th>
                    <th><i class="fa fa-bookmark"></i> standard</th>
					<th><i class="fa fa-bookmark"></i> Amount</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(mysqli_num_rows($res) == 0) {
                      ?>
                      <tr>
                        <td>THERE ARE NO REQUESTS YET.</td>
                      </tr>
                      <?php
                    }
                    while($row = mysqli_fetch_array($res)) {
                  ?>
                  <tr>
				  	<td><?php echo $row["id"];?></td>
                    <td><?php echo $row["purchasor_name"]; ?>
                    </td>
                    <td class="hidden-phone"><?php echo $row["type"];?></td>
                    <td><?php echo $row["standard"]; ?> </td>
					<td><?php echo $row["amount"]; ?> </td>
                    <td>
                      <form method="POST">
                        <button type="submit" name="accept" value="<?php echo $row["id"]; ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                        <button type="submit" name="decline" value="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                      </form>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php
                } else {
                  ?>
                  <div>Something went wrong!</div>
                  <?php
                }

                if(isset($_POST["accept"])) {
                  $id = $_POST["accept"];
                  $res = $db->acceptPurchasorRequest($id);

                  if($res) {
                    ?>
                    <div>You have accepted the request!</div>
                    <?php
                    echo "<meta http-equiv='refresh' content='0'>";
                  } else {
                    ?>
                    <div>Something went wrong!</div>
                    <?php
                  }
                } else if(isset($_POST["decline"])) {
                  $id = $_POST["decline"];
                  $res = $db->declinePurchasorRequest($id);
                  if($res) {
                    ?>
                    <div>You have accepted the request!</div>
                    <?php
                    echo "<meta http-equiv='refresh' content='0'>";                       
                  } else {
                    ?>
                    <div>Something went wrong!</div>
                    <?php
                  }
                }
              ?>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
</body>

</html>
<?php
} else {
  header("Location: login.php");  
}
?>