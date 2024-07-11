<!DOCTYPE html>
<!--
/**
 * Description of create_order
 *
/**
 * @author CRISTIAN R. PAZ
 * @date 10 jul 2024
 * @time 1:48:56 p.m.
 */       
 
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Pedido</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <div class="container-fluid">

            <h1>Crear Pedido</h1>
            <form action="index.php" method="post" class="p-5">
                <input type="hidden" name="action" value="create">
                <label for="customer_name">Nombre del Cliente:</label>
                <input class="form-control col-md-2" type="text" id="customer_name" name="customer_name" required><br>
                <label for="product">Producto:</label>
                <input class="form-control col-md-2" type="text" id="product" name="product" required><br>
                <label for="quantity">Cantidad:</label>
                <input class="form-control col-md-2" type="number" id="quantity" name="quantity" required><br>
                <label for="status">Estado:</label>
                <input class="form-control col-md-2" type="text" id="status" name="status" required><br>
                <button type="submit" class="btn btn-primary">Crear Pedido</button>
            </form>
            <a class="btn btn-secondary" href="read_orders.php">Ver Pedidos</a>

        </div>
        <br>
    </body>
</html>
