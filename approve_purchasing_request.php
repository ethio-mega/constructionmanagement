
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
            <?php include 'nav.php'; ?>
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
                                $res = $db->getApprovedMaterial();
                                $role = $_SESSION["role"];

                                if ($res) {
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
                                            if (mysqli_num_rows($res) == 0) {
                                                ?>
                                                <tr>
                                                    <td>THERE ARE NO REQUESTS YET.</td>
                                                </tr>
                                                <?php
                                            }
                                            while ($row = mysqli_fetch_array($res)) {
                                                $information = json_decode($row['information'], true);
                                                if ($information['is_accepted_by_inventory_officer'] === 0 && $role === "inventory_officer") {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row["id"]; ?></td>
                                                        <td><?php echo $information["requestor_name"]; ?>
                                                        </td>
                                                        <td class="hidden-phone"><?php echo $information["material_description"]; ?></td>
                                                        <td><?php echo $information["unit"]; ?> </td>
                                                        <td><?php echo $information["quantity"]; ?> </td>
                                                        <td><?php echo $information["remark"]; ?> </td>
                                                        <td>
                                                            <form method="POST">
                                                                <button type="submit" name="accept" value="<?php echo $row["id"]; ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                                                <button type="submit" name="decline" value="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                } else if ($information['is_accepted_by_project_manager'] === 0 && $role === "project_manager") {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row["id"]; ?></td>
                                                        <td><?php echo $information["requestor_name"]; ?>
                                                        </td>
                                                        <td class="hidden-phone"><?php echo $information["material_description"]; ?></td>
                                                        <td><?php echo $information["unit"]; ?> </td>
                                                        <td><?php echo $information["quantity"]; ?> </td>
                                                        <td><?php echo $information["remark"]; ?> </td>
                                                        <td>
                                                            <form method="POST">
                                                                <button type="submit" name="accept" value="<?php echo $row["id"]; ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                                                <button type="submit" name="decline" value="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                } else if ($information['is_accepted_by_finance'] === 0 && $role === "finance") {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row["id"]; ?></td>
                                                        <td><?php echo $information["requestor_name"]; ?>
                                                        </td>
                                                        <td class="hidden-phone"><?php echo $information["material_description"]; ?></td>
                                                        <td><?php echo $information["unit"]; ?> </td>
                                                        <td><?php echo $information["quantity"]; ?> </td>
                                                        <td><?php echo $information["remark"]; ?> </td>
                                                        <td>
                                                            <form method="POST">
                                                                <button type="submit" name="accept" value="<?php echo $row["id"]; ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                                                <button type="submit" name="decline" value="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                } else {
                                    ?>
                                    <div>Something went wrong!</div>
                                    <?php
                                }

                                if (isset($_POST["accept"])) {
                                    $id = $_POST["accept"];
                                    $res = $db->acceptPurchasorRequest($id, $role);

                                    if ($res) {
                                        ?>
                                        <div>You have accepted the request!</div>
                                        <?php
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    } else {
                                        ?>
                                        <div>Something went wrong!</div>
                                        <?php
                                    }
                                } else if (isset($_POST["decline"])) {
                                    $id = $_POST["decline"];
                                    $res = $db->declinePurchasorRequest($id, $role);
                                    if ($res) {
                                        ?>
                                        <div>You have accepted the request!</div>
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