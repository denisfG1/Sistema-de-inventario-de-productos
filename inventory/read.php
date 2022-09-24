<?php
// Check existence of id parameter before processing further
if(isset($_GET["id_inventory"]) && !empty(trim($_GET["id_inventory"]))){
    // Include config file
    require_once "../connection/config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM inventory WHERE id_inventory = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id_inventory"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $row["id_inventory"];
                $row["date_in"];
                $row["date_out"];
                $row["id_product"];
                $row["stock_in"];
                $row["entries"];
                $row["outlets"];

                
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: inventory.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: inventory.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                    <h1 class="mt-5 mb-3">View Record</h1>

                    <div class="form-group">
                        <label>ID de inventario</label>
                        <p><b><?php echo $row["id_inventory"]; ?></b></p>
                    </div>

                    <div class="form-group">
                        <label>Fecha inicial</label>
                        <p><b><?php echo $row["date_in"]; ?></b></p>
                    </div>

                    <div class="form-group">
                        <label>Fecha final</label>
                        <p><b><?php echo $row["date_out"]; ?></b></p>
                    </div>

                    <div class="form-group">
                        <label>ID del producto</label>
                        <p><b><?php echo $row["id_product"]; ?></b></p>
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <p><b><?php echo $row["stock_in"]; ?></b></p>
                    </div>

                    <div class="form-group">
                        <label>Entradas</label>
                        <p><b><?php echo $row["entries"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Salidas</label>
                        <p><b><?php echo $row["outlets"]; ?></b></p>
                    </div>

                    <p><a href="inventory.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
