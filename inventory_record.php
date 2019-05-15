
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
        <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
        <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
        <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet">

    </head>

    <body>
        <section id="container">
            <!-- **********************************************************************************************************************************************************
                TOP BAR CONTENT & NOTIFICATIONS
                *********************************************************************************************************************************************************** -->
            <!--header start-->

            <?php include 'nav.php'; ?>
            <!--sidebar end-->
            
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <h3>List of requisted materials from purchaser </h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel col-xs-12">
                        <div class="adv-table ">
                            <form action="" method="post">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                        <tr>
                                            <th> No</th>     
                                            <th> Material Description</th>                            
                                            <th> Delivered Date</th>
                                            <th>Delivered By</th>
                                            <th hidden>Unit</th>
                                            <th>Quantity</th>
                                            <th hidden>Unit Price</th>
                                            <th hidden>Total Price</th>
                                            <th hidden>Remark</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once 'db_functions.php';
                                        $db = new DB_Functions();
                                        $res = $db->getApprovedMaterial();
                                        if($res) {
                                        $found_user = mysqli_num_rows($res);
                                        if($found_user > 0) {
                                        $i = 0;
                                        ?>                               
                                        <?php
                                        while($row = mysqli_fetch_array($res)) {
                                        $j = $i+1;
                                        $information = json_decode($row['information'], true);
                                        ?>   
                                        <tr>
                                            <th> <?php echo $row["id"]; ?></th> 
                                            <th><?php echo $information["material_description"]; ?></th>                            
                                            <th><?php echo $row["updated_at"]; ?></th>
                                            <th><?php echo $row["requester"]; ?></th>
                                            <th hidden><?php echo $information["unit"]; ?></th>
                                            <th><?php echo $information["quantity"]; ?></th>
                                            <th hidden><?php echo $information["unit_price"]; ?></th>
                                            <th hidden><?php echo $information["total"]; ?></th>
                                            <th hidden><?php echo $information["remark"]; ?></th>
                                            <th><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i> more...</button></th>

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
                        </div>
                    </div>
                    <!-- page end-->
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
                    &copy; 2019 <strong>Ethi-O-mega Labs</strong>. All Rights Reserved.
                </p>
                <a href="purchasing_request.php#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
    <!--common script for all pages-->
    <script src="lib/common-scripts.js"></script>
    <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="lib/advanced-form-components.js"></script>
    <!--script for this page-->
    <script type="text/javascript">
        /* Formating function for row details */
        

        $(document).ready(function () {
            /*
             * Initialse DataTables, with no sorting on the 'details' column
             */
            var oTable = $('#hidden-table-info').dataTable({
                "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [0]
                    }],
                "aaSorting": [
                    [1, 'asc']
                ]
            });

            /* Add event listener for opening and closing details
             * Note that the indicator for showing which row is open is not controlled by DataTables,
             * rather it is done here
             */
            
        });
    </script>
</body>
</html>
