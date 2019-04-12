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
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
      <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Purchasing Request</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div >
            <div class="form-panel">
            
             <form class="form-horizontal style-form" method="post">
			   
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Requestor Name</label>
                  <div class="col-sm-3">
                    <input name="purchasor_name" type="text"  class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Material Description</label>
                  <div class="col-sm-3">
                    <input name="type" type="text" class="form-control" required>
                  </div>
				  </div>
			 <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Unit</label>
                  <div class="col-sm-3">
                    <input name="standard" type="text" class="form-control" required>
                  </div>
                </div>   
				
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Quantity</label>
                  <div class="col-sm-3">
                    <input name="amount" type="number" class="form-control" required>
                  </div>
				  </div>
				  <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Remarks</label>
                  <div class="col-sm-3">
                    <select name="remarks" class="btn btn-default" required>
            <option value="" selected="true" disabled>Select Remark</option>
			<option value="construction_material">Construction Material</option>
			<option value="stationary_material">stationary Material</option>
			<option value="machine_carpentry_material">Machine and Carpentry Material</option>
			<option value="others">Others</option>
          </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"></label>
                  <div class="col-sm-3">
                    <button name="request"  type="submit" class="btn btn-round btn-warning">Send Request</button>   
                  </div>
                </div> 
              </form>
              <?php
                include_once './db_functions.php';
                if(isset($_POST["request"])) {
                  $db = new DB_Functions();
                  //Insert the requests into MySQL DB
                  $purchasorName = $_POST["purchasor_name"];
                  $type = $_POST["type"];
                  $standard = $_POST["standard"];
                  $amount = $_POST["amount"];
				   $remarks = $_POST["remarks"];
                  $res = $db-> sendPurchaserRequest($purchasorName, $type, $standard, $amount, $remarks);

                  //Check if the value is inserted successfully
                  if($res) {
                    
                  } else {?>
                    <div id="msg">We couldn't register your request at the moment.</div>
                    <div id="msg">Please, try again later.</div>                    
                  <?php
                  }
                }
              ?>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
	
	
	
	
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
