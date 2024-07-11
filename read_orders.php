<!DOCTYPE html>
<!--
/**
 * Description of read_orders
 *
/**
 * @author CRISTIAN R. PAZ
 * @date 10 jul 2024
 * @time 1:49:25 p.m.
 */       
 
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

<?php
require_once 'config/database.php';
require_once 'src/Order.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);
$stmt = $order->read();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Pedidos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <h1>Lista de Pedidos</h1>
            <table class="table table-stripped" border="1">
                <tr>
                    <th>ID</th>
                    <th>Nombre del Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['customer_name']; ?></td>
                        <td><?php echo $order['product']; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="update_order.php?id=<?php echo $order['id']; ?>">Actualizar</a>
                            <a class="btn btn-danger" href="delete_order.php?id=<?php echo $order['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <br>
            <a href="create_order.php" class="btn btn-primary">Crear Nuevo Pedido</a>
        </div>

    </body>
</html>
