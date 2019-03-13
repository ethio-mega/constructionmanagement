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
  <link href="css/table-responsive.css" rel="stylesheet">
  
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
                <li>
                  <a href="approved_pr.php">
                    <span class="label label-warning"><i class="fa fa-bell"></i></span>
                    Approved Request but not received
                    <span class="small italic"> 0</span>
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
    <!--sidebar start-->
    <aside>

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
    <section id="main-content">
      <section class="wrapper">
        <h3>Store</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4>List of materials on hand</h4>
              <section id="no-more-tables">
              <form action="" method="POST">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>

                            <th> No</th>     
                            <th> Material Description</th>                            
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Remark</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                           include_once 'db_functions.php';
                           $db = new DB_Functions();
                           $res = $db->store();
                             if($res) {
                             $found_user = mysqli_num_rows($res);
                              if($found_user > 0) {
                                $i=0;                                                           
                                ?>                               
                                <?php while($row = mysqli_fetch_array($res)) {  
                                  
                                  $j=$i+1;
                                    ?> 
                                
                                  <tr>
                                    <th> <?php echo  $j; ?></th> 
                                    <th><?php echo $row["material_description"]; ?></th>                            
                                    <th><?php echo $row["unit"]; ?></th>
                                    <th><?php echo $row["quantity"]; ?></th>
                                    <th><?php echo $row["unit_price"]; ?></th>
                                    <th><?php echo $row["total_price"]; ?></th>
                                    <th><?php echo $row["remark"]; ?></th>
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

              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; 2019 <strong>Ethi-O-Mega Labs</strong>. All Rights Reserved.
        </p>
      
        <a href="store.php#" class="go-top">
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
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
</body>

</html>
<?php
} else {
  header("Location: login.php");     
}
?>