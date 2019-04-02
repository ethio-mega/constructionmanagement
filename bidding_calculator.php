
<?php
if(isset($_POST["item_id"])) {
  $itemId = $_POST['item_id'];
  $value = $_POST['value'];
  $quantity = 0;
  $subtotal = 0;
  $total = 0;
  $vat = 0.0;
  
  $con = mysqli_connect('localhost','root','','cms');
  if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
  }
  
  mysqli_select_db($con,"cms");
  $sql="SELECT quantity, vat, total FROM purchasing_request WHERE id = '".$itemId."'";
  $result = mysqli_query($con,$sql);
  
  while($row = mysqli_fetch_array($result)) {
      $quantity = $row["quantity"];
      $vat = $row["vat"];
      $subtotal = $value * $quantity;
      $total = $subtotal + ($subtotal * $vat * 1/100);

  }

  $post_data = json_encode(array('unit_price' => $value, 'subtotal' => $subtotal, 'vat'=> $vat, 'total'=>$total), JSON_FORCE_OBJECT);

  echo $post_data;

  $result = mysqli_query($con, "UPDATE purchasing_request SET sub_total = $subtotal, total = $total, unit_price = $value WHERE id = '$itemId'");

  mysqli_close($con);
  
}

if(isset($_POST["item_id_vat"])) {
  $itemId = $_POST['item_id_vat'];
  $value = $_POST['value_vat'];
  $subtotal = 0;
  $total = 0;
  $unitprice = 0;

  $con = mysqli_connect('localhost','root','','cms');
  if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
  }
  
  mysqli_select_db($con,"cms");
  $sql="SELECT * FROM purchasing_request WHERE id = '".$itemId."'";
  $result = mysqli_query($con,$sql);
  
  while($row = mysqli_fetch_array($result)) {
      $subtotal = $row["sub_total"];
      $unitprice = $row["unit_price"];
      $total = $subtotal + ($subtotal * $value * 1/100);
  }

  $post_data = json_encode(array('unit_price' => $unitprice, 'subtotal' => $subtotal, 'vat'=> $value, 'total'=>$total), JSON_FORCE_OBJECT);

  echo $post_data;

  $result = mysqli_query($con, "UPDATE purchasing_request SET total = $total, vat = $value WHERE id = '$itemId'");

  mysqli_close($con);
}

if(isset($_POST["item_id_date"])) {
    $itemId = $_POST['item_id_date'];
    $value = $_POST['value_date'];
    $total_work_day = 0;
    $day = $_POST['day'];
  
    $con = mysqli_connect('localhost','root','','cms');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    
    mysqli_select_db($con,"cms");
    $result = mysqli_query($con, "UPDATE attendance_pw SET $day = $value WHERE id = '$itemId'");


    $sql="SELECT * FROM attendance_pw WHERE id = '".$itemId."'";
    $result = mysqli_query($con,$sql);    
  
    
    while($row = mysqli_fetch_array($result)) {
        $total_work_day = $row["day_1"] + $row["day_2"] + $row["day_3"] + $row["day_4"] + $row["day_5"] + $row["day_6"] + $row["day_7"] + $row["day_8"] + $row["day_9"] + $row["day_10"] + $row["day_11"] + $row["day_12"] + $row["day_13"] + $row["day_14"]
        + $row["day_15"] + $row["day_16"] + $row["day_17"] + $row["day_18"] + $row["day_19"] + $row["day_20"] + $row["day_21"] + $row["day_22"] + $row["day_23"] + $row["day_24"]
        + $row["day_25"] + $row["day_26"] + $row["day_27"] + $row["day_28"] + $row["day_29"] + $row["day_30"];
    }
  
    $post_data = json_encode(array('total_work_day'=>$total_work_day), JSON_FORCE_OBJECT);
  
    echo $post_data;
  
    mysqli_close($con);
  }
?>