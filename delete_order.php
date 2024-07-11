<!DOCTYPE html>
<!--
/**
 * Description of delete_order
 *
/**
 * @author CRISTIAN R. PAZ
 * @date 10 jul 2024
 * @time 1:50:24 p.m.
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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $order->id = $_POST['id'];
    if ($order->delete()) {
        echo "Pedido eliminado exitosamente.";
    } else {
        echo "No se pudo eliminar el pedido.";
    }
    echo "<br><a class='btn btn-secondary' href='read_orders.php'>Volver a la lista de pedidos</a>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Pedido</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container">
    <h1>Eliminar Pedido</h1>
    <p>¿Estás seguro que deseas eliminar el pedido de <strong><?php echo $order_data['customer_name']; ?></strong>?</p>
    <form action="delete_order.php" method="post">
        <input type="hidden" name="id" value="<?php echo $order_data['id']; ?>">
        <button class="btn btn-success" type="submit">SI</button>
    </form>
    <br>
    <a class="btn btn-danger" href="read_orders.php">Cancelar</a>
    </div>
</body>
</html>
