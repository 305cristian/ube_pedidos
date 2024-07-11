<!DOCTYPE html>
<!--
/**
 * Description of update_order
 *
/**
 * @author CRISTIAN R. PAZ
 * @date 10 jul 2024
 * @time 1:49:50 p.m.
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

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $order->id = $_GET['id'];
    $stmt = $order->readOne();
    $order_data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Pedido</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
    <h1>Actualizar Pedido</h1>
    <form action="index.php" method="post" class="p-5">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?php echo $order_data['id']; ?>">
        <label for="customer_name">Nombre del Cliente:</label>
        <input class="form-control col-md-2" type="text" id="customer_name" name="customer_name" value="<?php echo $order_data['customer_name']; ?>" required><br>
        <label for="product">Producto:</label>
        <input class="form-control col-md-2" vtype="text" id="product" name="product" value="<?php echo $order_data['product']; ?>" required><br>
        <label for="quantity">Cantidad:</label>
        <input class="form-control col-md-2" type="number" id="quantity" name="quantity" value="<?php echo $order_data['quantity']; ?>" required><br>
        <label for="status">Estado:</label>
        <input class="form-control col-md-2" type="text" id="status" name="status" value="<?php echo $order_data['status']; ?>" required><br>
        <button type="submit" class="btn btn-primary">Actualizar Pedido</button>
    </form>
    <br>
    <a class="btn btn-secondary" href="read_orders.php">Ver Pedidos</a>
    </div>
</body>
</html>

