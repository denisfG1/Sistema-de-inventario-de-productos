
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="script2.php" method="post">
                      
                    <div class="form-group">

                    <label>Fecha inicial</label>
                    <input type="date" name="date_in" class="form-control" placeholder="dd/mm/yyyy" required>

                    </div>

                    <div class="form-group">

                    <label>Fecha final</label>
                    <input type="date" name="date_out" class="form-control" placeholder="dd/mm/yyyy" required>

                    </div>


                    <div class="form-group">

                    <label>ID del producto</label>
                    <input type="number" name="id_product" class="form-control" required>

                    </div>


                    <div class="form-group">

                    <label>Stock</label>
                    <input type="number" name="stock_in" class="form-control" required>

                    </div>

                    <div class="form-group">

                    <label>Entradas</label>
                    <input type="number" name="entries" class="form-control" required>

                    </div>


                    <div class="form-group">

                    <label>Salidas</label>
                    <input type="number" name="outlets" class="form-control" required>

                    </div>

                        <input type="hidden" name="id_inventory" value="id_inventory"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="inventory.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
