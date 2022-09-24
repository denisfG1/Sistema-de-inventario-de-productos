<?php

$id_inventory= $_POST["id_inventory"];
$date_in = date("Y-m-d", strtotime($_POST['date_in']));
$date_out = date("Y-m-d", strtotime($_POST['date_out']));;
$id_product = $_POST["id_product"];
$stock_in = $_POST["stock_in"]; 
$entries = $_POST["entries"];
$outlets = $_POST["outlets"]; 

require_once "../connection/config.php";

if ($date_in <= $date_out){

  
  $sql = "UPDATE inventory SET date_in='$date_in', date_out='$date_out', id_product=$id_product, stock_in=$stock_in, entries=$entries, outlets=$outlets WHERE id_inventory=$id_inventory";

  
  if ($link->query($sql) === TRUE) {

    echo "<script>alert('New record created successfully');</script>"; 

  } else {

    //echo "Error updating record: " . $link->error;

    echo "<script>alert('sorry! there was an error saving the record');</script>"; 

  }

}else{

  echo "<script>alert('sorry! there was an error saving the record');</script>"; 

}
  
  header("refresh: 0;url=update.php");

  $link->close();

  ?>