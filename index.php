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
        $rl="Inventory_officer";
        
        if( $role == $rl){
          
      //get row value where acceptance_status = 0
             include_once 'db_functions.php';
             $db = new DB_Functions();
             $res = $db->numInventory(); 
             if($res) {
              $numInventory = mysqli_num_rows($res);  
             }
             $res = $db->numApr();
             if($res){
               $num_apr = mysqli_num_rows($res); 
             }

             $res = $db->no_of_mRequest();
             if($res){
               $no_of_mRequest = mysqli_num_rows($res);
             }
            $sum=$numInventory+$no_of_mRequest;
          
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
                <span class="badge bg-warning"><?php echo $sum; ?></span>
                </a>
              <ul class="dropdown-menu extended notification">
                <div class="notify-arrow notify-arrow-yellow"></div>
                <li>
                  <p class="yellow">You have <?php echo $sum; ?> new notifications</p>
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
                    <span class="small italic"> <?php echo $no_of_mRequest; ?></span>
                    </a>
                </li>
                <li>
                  <a href="approved_pr.php">
                    <span class="label label-warning"><i class="fa fa-bell"></i></span>
                    Approved Request but not received
                    <span class="small italic"> <?php echo $num_apr; ?></span>
                    </a>
                </li>
              </ul>
            </li>
            <!-- notification dropdown end -->
          </ul>
          <!--  notification end -->
        </div>
            <?php }?>
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
      <?php   
       if($role==$rl){?>
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
      <?php }else{?>
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
              <span>Project Manager</span>
              </a>
			  <ul class="sub">
              <li><a href="approve_purchasing_request.php">Approve Purchasing Request</a></li>
            </ul>
          </li>
		  <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-user-md"></i>
              <span>Site Engineers</span>
              </a>
			  <ul class="sub">
              <li><a href="post_material_used_daily.php">Post Material Used daily</a></li>
              <li><a href="recieve_materials.php">Recieve Matrials</a></li>
            </ul>
          </li>
		  <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-user-md"></i>
              <span>Office Engineers</span>
              </a>
          </li>
		  <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-user-md"></i>
              <span>HR Management</span>
              </a>
          </li>
		  <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-user-md"></i>
              <span>Finance</span>
              </a>
			  
          </li>
		  <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-user-md"></i>
              <span>Casher</span>
              </a>
			  <ul class="sub">
              <li><a href="approve_purchasing_request.php">Approve Purchasing Request</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-barcode"></i>
              <span>Purchaser</span>
              </a>
              <ul class="sub">
              <li><a href="make_request.php">Make Request</a></li>
              <li><a href="make_purchasing.php">Perchase Methods</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-flash"></i>
              <span>Admin Options</span>
              </a>
            <ul class="sub">
              <li><a href="approve_users.php">Approve Users</a></li>
              <!-- <li><a href="buttons.html">Buttons</a></li> -->
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
       </div>
      <?php }
      ?>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
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


    <?php 
      if($sum!=0 ){
    ?>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'you have new notification!',
        // (string | mandatory) the text inside the notification
        text: 'There <?php if(($sum==1)){ ?> is <?php }else{?> are <?php } ?> <?php echo $sum; ?> <?php if(($sum==1)){ ?> new request <?php }else{ ?> new requests <?php } ?>  ',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });   
  </script>
  <?php }?>
    <script>
            setTimeout(function() {
              $('.my-sticky-class').fadeOut(3000);
             }, 1000);
      </script>
</body>

</html>
<?php
} else {
  header("Location: login.php");     
}
?>
