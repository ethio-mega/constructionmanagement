
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
?>