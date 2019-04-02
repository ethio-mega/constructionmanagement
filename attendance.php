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
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <?php 
                include_once 'db_functions.php';
                $db = new DB_Functions();
                $res = $db->getofficer();

                if($res) {
              ?>
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Permanent Officers.</h4>
				 <div class="registration">
            <a class="" href="add_officer.php">
              Add officer
              </a>
          </div>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> ID</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
                    <th><i class="fa fa-bookmark"></i> Position</th>
                    <th>Total hours</th>
					<th><i class="fa fa-checkdate">day</i> 1 </th>
					<th><i class="fa fa-checkdate">day</i> 2 </th>
					<th><i class="fa fa-checkdate">day</i> 3 </th>
					<th><i class="fa fa-checkdate">day</i> 4 </th>
					<th><i class="fa fa-checkdate">day</i> 5 </th>
					<th><i class="fa fa-checkdate">day</i> 6 </th>
					<th><i class="fa fa-checkdate">day</i> 7 </th>
					<th><i class="fa fa-checkdate">day</i> 8 </th>
					<th><i class="fa fa-checkdate">day</i> 9 </th>
					<th><i class="fa fa-checkdate">day</i> 10 </th>
					<th><i class="fa fa-checkdate">day</i> 11</th>
					<th><i class="fa fa-checkdate">day</i> 12</th>
					<th><i class="fa fa-checkdate">day</i> 13</th>
					<th><i class="fa fa-checkdate">day</i> 14 </th>
					<th><i class="fa fa-checkdate">day</i> 15 </th>
					<th><i class="fa fa-checkdate">day</i> 16 </th>
					<th><i class="fa fa-checkdate">day</i> 17 </th>
					<th><i class="fa fa-checkdate">day</i> 18 </th>
					<th><i class="fa fa-checkdate">day</i> 19 </th>
					<th><i class="fa fa-checkdate">day</i> 20</th>
					<th><i class="fa fa-checkdate">day</i> 21</th>
					<th><i class="fa fa-checkdate">day</i> 22</th>
					<th><i class="fa fa-checkdate">day</i> 23</th>
					<th><i class="fa fa-checkdate">day</i> 24</th>
					<th><i class="fa fa-checkdate">day</i> 25</th>
					<th><i class="fa fa-checkdate">day</i> 26</th>
					<th><i class="fa fa-checkdate">day</i> 27</th>
					<th><i class="fa fa-checkdate">day</i> 28</th>
					<th><i class="fa fa-checkdate">day</i> 29</th>
					<th><i class="fa fa-checkdate">day</i> 30</th>
                    <th></th>
                  </tr>
                </thead>
				
                <tbody>
                  <?php 
                    if(mysqli_num_rows($res) == 0) {
                      ?>
                      <tr>
                        <td>THERE ARE NO Officer.</td>
                      </tr>
                      <?php
                    }
                    while($row = mysqli_fetch_array($res)) {
                  ?>
                  <tr>
                    <td><?php echo $row["id"]; ?>
                    </td>
                    <td class="hidden-phone"><?php echo $row["name"];?></td>
                    <td><?php echo $row["position"]; ?> </td>
                    <td id="total-work-day-<?php echo $row['id']?>"><?php echo $row["total_work_day"];?></td>
					<td><input max="100" min="0" id="day_1<?php echo $row["id"] ?>" type="number" name="day-1" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_1')" value=<?php echo $row["day_1"];?>></td>
                   <td><input max="100" min="0" id="day_2<?php echo $row["id"] ?>" type="number" name="day-2" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_2')" value=<?php echo $row["day_2"];?>></td>
				   <td><input max="100" min="0" id="day_3<?php echo $row["id"] ?>" type="number" name="day-3" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_3')" value=<?php echo $row["day_3"];?>></td>
				   <td><input max="100" min="0" id="day_4<?php echo $row["id"] ?>" type="number" name="day-4" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_4')" value=<?php echo $row["day_4"];?>></td>
				   <td><input max="100" min="0" id="day_5<?php echo $row["id"] ?>" type="number" name="day-5" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_5')" value=<?php echo $row["day_5"];?>></td>
				   <td><input max="100" min="0" id="day_6<?php echo $row["id"] ?>" type="number" name="day-6" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_6')" value=<?php echo $row["day_6"];?>></td>
				   <td><input max="100" min="0" id="day_7<?php echo $row["id"] ?>" type="number" name="day-7" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_7')" value=<?php echo $row["day_7"];?>></td>
				   <td><input max="100" min="0" id="day_8<?php echo $row["id"] ?>" type="number" name="day-8" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_8')" value=<?php echo $row["day_8"];?>></td>
				   <td><input max="100" min="0" id="day_9<?php echo $row["id"] ?>" type="number" name="day-9" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_9')" value=<?php echo $row["day_9"];?>></td>
				   <td><input max="100" min="0" id="day_10<?php echo $row["id"] ?>" type="number" name="day-10" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_10')" value=<?php echo $row["day_10"];?>></td>
				   <td><input max="100" min="0" id="day_11<?php echo $row["id"] ?>" type="number" name="day-11" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_11')" value=<?php echo $row["day_11"];?>></td>
				   <td><input max="100" min="0" id="day_12<?php echo $row["id"] ?>" type="number" name="day-12" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_12')" value=<?php echo $row["day_12"];?>></td>
				   <td><input max="100" min="0" id="day_13<?php echo $row["id"] ?>" type="number" name="day-13" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_13')" value=<?php echo $row["day_13"];?>></td>
				   <td><input max="100" min="0" id="day_14<?php echo $row["id"] ?>" type="number" name="day-14" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_14')" value=<?php echo $row["day_14"];?>></td>
				   <td><input max="100" min="0" id="day_15<?php echo $row["id"] ?>" type="number" name="day-15" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_15')" value=<?php echo $row["day_15"];?>></td>
				   <td><input max="100" min="0" id="day_16<?php echo $row["id"] ?>" type="number" name="day-16" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_16')" value=<?php echo $row["day_16"];?>></td>
				   <td><input max="100" min="0" id="day_17<?php echo $row["id"] ?>" type="number" name="day-17" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_17')" value=<?php echo $row["day_17"];?>></td>
				   <td><input max="100" min="0" id="day_18<?php echo $row["id"] ?>" type="number" name="day-18" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_18')" value=<?php echo $row["day_18"];?>></td>
           <td><input max="100" min="0" id="day_19<?php echo $row["id"] ?>" type="number" name="day-19" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_19')" value=<?php echo $row["day_19"];?>></td>
				   <td><input max="100" min="0" id="day_20<?php echo $row["id"] ?>" type="number" name="day-20" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_20')" value=<?php echo $row["day_20"];?>></td>
				   <td><input max="100" min="0" id="day_21<?php echo $row["id"] ?>" type="number" name="day-21" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_21')" value=<?php echo $row["day_21"];?>></td>
				   <td><input max="100" min="0" id="day_22<?php echo $row["id"] ?>" type="number" name="day-22" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_22')" value=<?php echo $row["day_22"];?>></td>
				   <td><input max="100" min="0" id="day_23<?php echo $row["id"] ?>" type="number" name="day-23" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_23')" value=<?php echo $row["day_23"];?>></td>
				   <td><input max="100" min="0" id="day_24<?php echo $row["id"] ?>" type="number" name="day-24" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_24')" value=<?php echo $row["day_24"];?>></td>
				   <td><input max="100" min="0" id="day_25<?php echo $row["id"] ?>" type="number" name="day-25" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_25')" value=<?php echo $row["day_25"];?>></td>
				   <td><input max="100" min="0" id="day_26<?php echo $row["id"] ?>" type="number" name="day-26" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_26')" value=<?php echo $row["day_26"];?>></td>
				   <td><input max="100" min="0" id="day_27<?php echo $row["id"] ?>" type="number" name="day-27" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_27')" value=<?php echo $row["day_27"];?>></td>
				   <td><input max="100" min="0" id="day_28<?php echo $row["id"] ?>" type="number" name="day-28" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_28')" value=<?php echo $row["day_28"];?>></td>
				   <td><input max="100" min="0" id="day_29<?php echo $row["id"] ?>" type="number" name="day-29" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_29')" value=<?php echo $row["day_29"];?>></td>
				   <td><input max="100" min="0" id="day_30<?php echo $row["id"] ?>" type="number" name="day-30" onChange = "ondaychange(<?php echo $row["id"] ?>, this.value, 'day_30')" value=<?php echo $row["day_30"];?>></td>
				   </tr>
                  <?php } ?>
                </tbody>
              </table>
			  <div class="registration">
            <a class="" href="clear_table.php">
              clear table
              </a>
          </div>
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
  <!--common script for all pages-->
  <script>
    function ondaychange(itemId, value, day) {
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "bidding_calculator.php", //Relative or absolute path to response.php file
      data: {item_id_date: itemId, value_date: value, day: day},
      success: function(data) {        
        $("#total-work-day-"+itemId).html(data.total_work_day);
      }
    });
    }
  </script>
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