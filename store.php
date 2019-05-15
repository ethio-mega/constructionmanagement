
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

            <?php include 'nav.php'; ?>

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
                                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                            <thead>
                                                <tr>
                                                    <th> No</th>     
                                                    <th > Material Description</th>                            
                                                    <th hidden> Purchasor Name</th>
                                                    <th hidden>Unit</th>
                                                    <th>Quantity</th>
                                                    <th hidden>Approved Date</th>
                                                    <th hidden>Final date to submit</th>
                                                    <th hidden>Unit Price</th>
                                                    <th hidden>Total Price</th>
                                                    <th hidden>Remark</th>
                                                    <th>Paper to Manager</th>
                                                    <th>Paper to Purchasor</th>
                                                    <th> Receive</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once 'db_functions.php';
                                                $db = new DB_Functions();
                                                $res = $db->getApprovedMaterial();
                                                $role = $_SESSION["role"];
                                                if ($res) {
                                                    $found_user = mysqli_num_rows($res);
                                                    if ($found_user > 0) {
                                                        $i = 0;
                                                        ?>                               
                                                        <?php
                                                        while ($row = mysqli_fetch_array($res)) {
                                                            $j = $i + 1;
                                                            $information = json_decode($row['information'], true);
                                                            if ($information['is_accepted_by_finance'] === 1 && $information['is_accepted_by_inventory_officer'] === 1 && $information['is_accepted_by_project_manager'] === 1 && $information['is_recorded'] === 0) {
                                                                ?>   
                                                                <tr>
                                                            <input name="materialdesc[]"  value="<?php echo $information["material_description"] ?> " class="form-control" type="hidden"> 
                                                            <input name="delivered_by[]"  value=" <?php echo $information["requestor_name"]; ?> " class="form-control" type="hidden">   
                                                            <input name="unit[]"  value=" <?php echo $information["unit"]; ?> " class="form-control" type="hidden">
                                                            <input name="quantity[]"  value=" <?php echo $information["quantity"]; ?> " class="form-control" type="hidden">
                                                            <input name="unit_price[]"  value=" <?php echo $information["unit_price"]; ?> " class="form-control" type="hidden">
                                                            <input name="total_price[]"  value=" <?php echo $information["total_price"]; ?> " class="form-control" type="hidden">
                                                            <input name="remark[]"  value=" <?php echo $information["remark"]; ?> " class="form-control" type="hidden">  
                                                            <th> <?php echo $j; ?></th> 
                                                            <th><?php echo $information["material_description"]; ?></th>  
                                                            <th hidden><?php echo $information["requestor_name"]; ?></th>  
                                                            <th hidden><?php echo $information["unit"]; ?></th>
                                                            <th><?php echo $information["quantity"]; ?></th>
                                                            <th hidden><?php echo $row["updated_at"]; ?></th>
                                                            <th hidden><?php echo $row["created_at"]; ?></th>
                                                            <th hidden><?php echo $information["unit_price"]; ?></th>
                                                            <th hidden><?php echo $information["total"]; ?></th>
                                                            <th hidden><?php echo $information["remark"]; ?></th>
                                                            <th><a href="#"><i class="fa fa-download"></i></a> </th>
                                                            <th><a href="#"><i class="fa fa-download"></i></a> </th>
                                                            <th><button id="dialogApprove" type="submit"  name="sub" value=" <?php echo $row['id'] ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>  </th>
                                                            <?php $i++; ?>
                                                            </tr>
                                                            <?php
                                                        }
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