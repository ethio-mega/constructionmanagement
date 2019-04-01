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
	
	
	  <!--main content start-->
    <section id="main-content">
      <section >
        <div class="row mt">
          <div class="col-md-12">
            <div>
              <?php 
                include_once 'db_functions.php';
                $db = new DB_Functions();
                $res = $db->getBiddingRequests();

                if($res) {
              ?>
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Your request so far is:</h4>
                <hr>
                <thead>
                  <tr>
                    <th></th>
                    <th>No</th>
                    <th>Material description</th>
                    <th>Unit</th>
          					<th>Quantity</th>
					          <th>Unit price</th>
                    <th>Subtotal</th>
                    <th>VAT</th>
                    <th>Total</th>
                    <th>Remark</th>
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
                    <td><input type="checkbox"/></td>
                    <td><?php echo $row["id"]; ?> </td>
                    <td><?php echo $row["requestor_name"]; ?> </td>
                    <td><?php echo $row["unit"];?></td>
					          <td><?php echo $row["quantity"];?></td>
					          <td><input type="number" name="unit-price" onChange = "onUnitPriceChange(<?php echo $row["id"] ?>, this.value)" value=<?php echo $row["unit_price"];?>></td>
					          <td><?php echo $row["sub_total"];?></td>
					          <td><input maxlength="2" type="number" name="vat" onChange = "onVATChange(<?php echo $row["id"] ?>, this.value)"  value=<?php echo $row["vat"];?>>%</td>
					          <td><?php echo $row["total"];?></td>
					          <td><?php echo $row["remark"];?></td>
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
  <script>
    function onUnitPriceChange(itemId, value) {
    $.ajax({
      type: "POST",
      dataType: "text",
      url: "bidding_calculator.php", //Relative or absolute path to response.php file
      data: {item_id: itemId, value: value},
      success: function(data) {        
        location.reload();
      }
    });
    }
  </script>
    <script>
    function onVATChange(itemId, value) {
    $.ajax({
      type: "POST",
      dataType: "text",
      url: "bidding_calculator.php", //Relative or absolute path to response.php file
      data: {item_id_vat: itemId, value_vat: value},
      success: function(data) {    
        location.reload();
      }
    });
    }
  </script>
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
