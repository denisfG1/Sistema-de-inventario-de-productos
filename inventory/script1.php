<?php

$date_in = date("Y-m-d", strtotime($_POST['date_in']));
$date_out = date("Y-m-d", strtotime($_POST['date_out']));;
$id_product = $_POST["id_product"];
$stock_in = $_POST["stock_in"]; 
$entries = $_POST["entries"];
$outlets = $_POST["outlets"]; 

require_once "../connection/config.php";

if ($date_in <= $date_out){
  
  $sql = "INSERT INTO inventory(date_in, date_out, id_product, stock_in, entries, outlets)
    VALUES ('$date_in','$date_out',$id_product,$stock_in,$entries,$outlets)";

  if ($link->query($sql) === TRUE) {

  echo "<script>alert('New record created successfully');</script>";   

  } else {
    
    echo "<script>alert('sorry! there was an error saving the record');</script>"; 

  }

      }else{

        echo "<script>alert('sorry! there was an error saving the record');</script>"; 

      }


      header("refresh: 0;url=create.php");

  $link->close();

?>
