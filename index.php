
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
require_once 'config/database.php';
require_once 'src/Order.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);

// Verificar la acción de la solicitud
$action = $_POST['action'] ?? 'read';

if ($action == "read") {
   include 'read_orders.php';
}

// Crear un nuevo pedido
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action == 'create') {
    $order->customer_name = $_POST['customer_name'];
    $order->product = $_POST['product'];
    $order->quantity = $_POST['quantity'];
    $order->status = $_POST['status'];

    if ($order->create()) {

        header("Location: index.php?action=read");
        exit();
    } else {
        echo "No se pudo crear el pedido.";
    }
}

// Actualizar un pedido
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action == 'update') {
    $order->id = $_POST['id'];
    $order->customer_name = $_POST['customer_name'];
    $order->product = $_POST['product'];
    $order->quantity = $_POST['quantity'];
    $order->status = $_POST['status'];

    if ($order->update()) {
        header("Location: index.php?action=read");
        exit();
    } else {
        echo "No se pudo actualizar el pedido.";
    }
}

// Eliminar un pedido
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action == 'delete') {
    $order->id = $_POST['id'];

    if ($order->delete()) {
        header("Location: index.php?action=read");
        exit();
    } else {
        echo "No se pudo eliminar el pedido.";
    }
}

// Cargar la vista correspondiente
//switch ($action) {
//    case 'create':
//        include 'create_order.php';
//        break;
//    case 'read':
//        include 'read_orders.php';
//        break;
//    case 'update':
//        $order->id = $_GET['id'] ?? null;
//        include 'update_order.php';
//        break;
//    case 'delete':
//        $order->id = $_GET['id'] ?? null;
//        include 'delete_order.php';
//        break;
//    default:
//        include 'read_orders.php';
//        break;
//}


