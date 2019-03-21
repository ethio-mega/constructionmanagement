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
              <span>Project Manager</span>
              </a>
			  <ul class="sub">
              <li><a href="approve_purchasing_request_pm.php">Approve Purchasing Request</a></li>
            </ul>
          </li> 
		  <!-- <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-user-md"></i>
              <span>Site Engineers</span>
              </a>
			  <ul class="sub">
              <li><a href="post_material_used_daily.php">Post Material Used daily</a></li>
              <li><a href="recieve_materials.php">Recieve Matrials</a></li>
            </ul>
          </li> -->
		  <!-- <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-user-md"></i>
              <span>Office Engineers</span>
              </a>
          </li> -->
		  <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-user-md"></i>
              <span>HR Management</span>
              </a>
			  <ul class="sub">
                <li><a href="attendance.php">Attendance</a></li>
              </ul>
          </li>
		  <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-building"></i>
              <span>Site Management</span>
              </a>
          </li>
		  <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-money"></i>
              <span>Finance</span>
              </a>
              <ul class="sub">
                <li><a href="approve_purchasing_request_casher.php">Purchasing</a></li>
              </ul>
          </li>
		   <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-user-md"></i>
              <span>Casher</span>
              </a>
			  <ul class="sub">
              <li><a href="approve_purchasing_request.php">Approve Purchase Request</a></li>
              
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
    </aside>