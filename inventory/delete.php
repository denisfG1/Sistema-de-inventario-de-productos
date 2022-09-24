<?php
// Process delete operation after confirmation
if(isset($_POST["id_inventory"]) && !empty($_POST["id_inventory"])){
    // Include config file
    require_once "../connection/config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM inventory WHERE id_inventory = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id_inventory"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){

          echo "<script>alert('record deleted successfully');</script>"; 
          header("location: inventory.php");


        } else{

          echo "<script>alert('sorry! there was an error deleted the record');</script>"; 

        }


    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id_inventory"]))){
        // URL doesn't contain id parameter. Redirect to error page
        //header("location: error.php");
        
        echo "Error";
        
        exit();
    }

    //header("refresh: 0;url=inventory.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id_inventory" value="<?php echo trim($_GET["id_inventory"]); ?>"/>
                            <p>Are you sure you want to delete this inventory record?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="inventory.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


