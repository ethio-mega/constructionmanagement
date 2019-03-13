<?php
session_start();
if(isset($_SESSION["loggedin"]) == true) {
  $role=$_SESSION["role"];
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
    <?php   
    //get row value where acceptance_status = 0
             include_once 'db_functions.php';
             $db = new DB_Functions();
             $res = $db->numInventory(); 
             if($res) {
              $numInventory = mysqli_num_rows($res);  
             }
          
          
          ?>
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
                <span class="badge bg-warning"><?php echo $numInventory; ?></span>
                </a>
              <ul class="dropdown-menu extended notification">
                <div class="notify-arrow notify-arrow-yellow"></div>
                <li>
                  <p class="yellow">You have <?php echo $numInventory; ?> new notifications</p>
                </li>
                <li>
                  <a href="purchasing_request.php">
                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                    Purchasing Request 
                    <span class="small italic"><?php echo $numInventory;?></span>
                    </a>
                </li>
                <li>
                  <a href="requested_materials.php">
                    <span class="label label-warning"><i class="fa fa-bell"></i></span>
                    Request For Materials
                    <span class="small italic"> 0</span>
                    </a>
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
          <!--<p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>-->
          <p class="centered">
              <svg width="100" height="100">
              <g>
              <circle cx="50" cy="50" r="50" fill="#fff"></circle>
              <text x="50%" y="70%" alignment-baseline="middle" text-anchor="middle" font-size="50" fill="black">    </text>
              </g>
              </svg>
              </a>
          </p>
          <h5 class="centered">  </h5>
          <center><p><span class="label label-success"> </span></p></center>
          <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="sub-menu">
            <a href="store.php">
              <i class="fa fa-stores"></i>
              <span>Store</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="inventory_record.php">
              <i class="fa fa-record"></i>
              <span>Inventory Record</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Report Center</span>
              </a>
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
        <div class="row">
          <div class="col-lg-9 main-chart">
        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
            <div class="panel-heading">
              <h2>Requested Materials</h2>
              <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
            </div>
            <div class="panel-editbox" data-widget-controls=""></div>
                <div class="panel-body">
                   <form action="" method="POST">
                    <table class="table table-striped table-advance table-hover">
                        <hr>
                    <thead>
                        <tr>
                            <th> No</th>     
                            <th> Material&nbsp;Description</th>                            
                            <th> Requested&nbsp;Date</th>
                            <th>Requested&nbsp;By</th>
                            <th>Quantity</th>
                            <th>Paper to Manager</th>
                            <th>Paper to draw</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           include_once 'db_functions.php';
                           $db = new DB_Functions();
                           $res = $db->requestedMaterial();
                             if($res) {
                             $found_user = mysqli_num_rows($res);
                              if($found_user > 0) {
                                $i=0;                                                           
                                ?>                               
                                <?php while($row = mysqli_fetch_array($res)) {                   
                                    ?>                         
                                    <tr>
                                    <input name="materialdesc[]"  value="<?php echo $row["material_description"]?> " class="form-control" type="hidden"> 
                                    <input name="quantity[]"  value=" <?php echo $row["quantity"];?> " class="form-control" type="hidden">      
                                    <th> <?php echo  $type=$row["id"]; ?></th> 
                                    <th><?php echo $row["material_description"]; ?></th>                            
                                    <th><?php echo $row["requested_date"]; ?></th>
                                    <th><?php echo $row["requested_by"]; ?></th>
                                    <th><?php echo $row["quantity"]; ?></th>
                                    <th><a href="#"><i class="fa fa-download"></i></a> </th>
                                    <th><a href="#"><i class="fa fa-download"></i></a> </th>
                                    <th><button style="float:right;" type="submit"  name="sub" value=" <?php echo $i; ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></th>
                                    <?php $i++; ?>
                                </tr>
                             <?php
                                }   
                             }
                            }
                              ?>
                                     
                    </tbody>
                    </table>
                   </form> 
                   <?php 
                if(isset($_POST["sub"])){ 
                  include_once 'db_functions.php';
                  $db = new DB_Functions();           
                  $val=intval($_POST['sub']);
                  $material_desc =$_POST['materialdesc'][$val];
                  $quantity=$_POST['quantity'][$val];
                
                   $db->drawmaterialfromStore($material_desc,$quantity);
                   echo "<meta http-equiv='refresh' content='1'>";  
                   
                  }
                 
                  ?>
                </div>
            </div>

          </div>
         
      </section>
    </section>
   

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; <strong>EthioMega Labs</strong>. All Rights Reserved
        </p>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
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