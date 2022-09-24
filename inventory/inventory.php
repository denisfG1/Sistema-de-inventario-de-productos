<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Inventory Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Inventory</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../connection/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM inventory";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Id Inventario</th>";
                                        echo "<th>Fecha Inicial</th>";
                                        echo "<th>Fecha Final</th>";
                                        echo "<th>Id Producto</th>";
                                        echo "<th>Stock</th>";
                                        echo "<th>Entradas</th>";
                                        echo "<th>Salidas</th>";
                                        echo "<th>Total</th>";
                                        echo "<th>Opciones</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_inventory'] . "</td>";
                                        echo "<td>" . $obj_fecha = date('d-m-Y', strtotime($row['date_in'])). "</td>";
                                        echo "<td>" . $obj_fecha = date('d-m-Y', strtotime($row['date_out'])) . "</td>";
                                        echo "<td>" . $row['id_product'] . "</td>";
                                        echo "<td>" . $row['stock_in'] . "</td>";
                                        echo "<td>" . $row['entries'] . "</td>";
                                        echo "<td>" . $row['outlets'] . "</td>";
                                        echo "<td>" . ($row['stock_in'] + $row['entries']) - $row['outlets']. "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id_inventory='. $row['id_inventory'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['id_inventory'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id_inventory='. $row['id_inventory'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
