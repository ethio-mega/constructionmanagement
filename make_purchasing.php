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
    <?php include 'nav.php';?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

 <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Choose Purchasing Method</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">

               <div class="row">
              <!--  TODO PANEL -->
              <div class="col-lg-12 col-md-12 col-sm-12 mb">
                <div class="steps pn">
                  <a href="direct_bidding.php"><label for='op1'>Direct Bidding</label></a>
                  <a href="limited_procurement.php"><label for='op2'>Limited Procurement</label></a>
                  <a><label for='op3'>Giltse Chareta</label></a>
                  <a href="proforma_form.php"><label for='op3'>Proforma</label></a>
                </div>
              </div>
          </div>
          <!-- col-lg-12-->
</div>
        <!-- /row -->
      </section>

    <!--main content end-->
    <!--footer start-->
    
    <!--footer end-->
  </section>
  <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <?php 
                include_once 'db_functions.php';
                $db = new DB_Functions();
                $res = $db->getApprovedMaterial();

                if($res) {
              ?>
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Matrials that are requested.</h4>
                <hr>
                <thead>
                  <tr>
				    <th><i class="fa fa-bookmark"></i> ID</th>
                    <th><i class="fa fa-bullhorn"></i> Requestor Name</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Material Description</th>
                    <th><i class="fa fa-bookmark"></i> Unit</th>
					<th><i class="fa fa-bookmark"></i> Quantity</th>
					<th><i class="fa fa-wrench"></i>Remarks</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(mysqli_num_rows($res) == 0) {
                      ?>
                      <tr>
                        <td>THERE ARE NO Approved material YET.</td>
                      </tr>
                      <?php
                    }
                    while($row = mysqli_fetch_array($res)) {
                  ?>
                  <tr>
				  	<td><?php echo $row["id"];?></td>
                    <td><?php echo $row["purchasor_name"]; ?>
                    </td>
                    <td><?php echo $row["type"];?></td>
                    <td><?php echo $row["standard"]; ?> </td>
					<td><?php echo $row["amount"]; ?> </td>
					<td><?php echo $row["remark"]; ?> </td>
                    <td>
                      <form method="POST">
                        <button name="assign_db"  type="submit" class="btn btn-round btn-warning">DB</button>
						<button name="assign_lp"  type="submit" class="btn btn-round btn-warning">LP</button>
						<button name="assign_op"  type="submit" class="btn btn-round btn-warning">OP</button>
						<button name="assign_pro"  type="submit" class="btn btn-round btn-warning">Pro</button>
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

                if(isset($_POST["assign_db"])) {
					include_once 'db_functions.php';
                $db = new DB_Functions();
                  //Insert the requests into MySQL DB
				 /*
				  $db = new DB_Functions();
				  $id = $_POST["id"];
                  $purchasorName = $_POST["purchasor_name"];
                  $type = $_POST["type"];
                  $standard = $_POST["standard"];
                  $amount = $_POST["amount"];
				   $remarks = $_POST["remarks"];
				 */
				   
                  $res = $db->assign_direct_biding();

                  if($res) {
                    ?>
                    <div>You have assign to direct bidding!</div>
                    <?php
                    echo "<meta http-equiv='refresh' content='0'>";
                  } else {
                    ?>
                    <div>Something went wrong!</div>
                    <?php
                  }
                } else if(isset($_POST["assign_lp"])) {
					$db = new DB_Functions();
				  $purchasorName = $_POST["purchasor_name"];
                  $type = $_POST["type"];
                  $standard = $_POST["standard"];
                  $amount = $_POST["amount"];
				  $remarks = $_POST["remarks"];
                  $res = $db->assign_limited_pro($purchasorName, $type, $standard, $amount, $remarks);
                  if($res) {
                    ?>
                    <div>You have assign to limited procurment!</div>
                    <?php
                    echo "<meta http-equiv='refresh' content='0'>";                       
                  } else {
                    ?>
                    <div>Something went wrong!</div>
                    <?php
                  }
                }else if(isset($_POST["assign_op"])) {
					$db = new DB_Functions();
                  $purchasorName = $_POST["purchasor_name"];
                  $type = $_POST["type"];
                  $standard = $_POST["standard"];
                  $amount = $_POST["amount"];
				   $remarks = $_POST["remarks"];
                  $res = $db->assign_open_pro($purchasorName, $type, $standard, $amount, $remarks);
                  if($res) {
                    ?>
                    <div>You have assign to open procurment!</div>
                    <?php
                    echo "<meta http-equiv='refresh' content='0'>";                       
                  } else {
                    ?>
                    <div>Something went wrong!</div>
                    <?php
                  }
                }else if(isset($_POST["assign_pro"])) {
					$db = new DB_Functions();
                  $purchasorName = $_POST["purchasor_name"];
                  $type = $_POST["type"];
                  $standard = $_POST["standard"];
                  $amount = $_POST["amount"];
				   $remarks = $_POST["remarks"];
                  $res = $db->assign_proforma($purchasorName, $type, $standard, $amount, $remarks);
                  if($res) {
                    ?>
                    <div>You have assign to proforma!</div>
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
