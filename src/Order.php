<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Order
 *
  /**
 * @author CRISTIAN R. PAZ
 * @date 10 jul 2024
 * @time 1:44:08 p.m.
 */
class Order {
    private $conn;
    private $table_name = "orders";

    public $id;
    public $customer_name;
    public $product;
    public $quantity;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

   public function create() {
    try {
        // Preparar la consulta SQL
//        $query = "INSERT INTO " . $this->table_name . "(customer_name, product, quantity, status) VALUES (?,?,?,?)";
        $query = "INSERT INTO " . $this->table_name . " SET customer_name=:customer_name, product=:product, quantity=:quantity, status=:status";
        $stmt = $this->conn->prepare($query);

        // Limpiar y asignar valores
        $this->customer_name = htmlspecialchars(strip_tags($this->customer_name));
        $this->product = htmlspecialchars(strip_tags($this->product));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(":customer_name", $this->customer_name);
        $stmt->bindParam(":product", $this->product);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":status", $this->status);
        
//          $stmt->bind_param($this->customer_name, $this->product, $this->quantity, $this->status);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;  // Éxito al insertar
        } else {
            return false; // Falló la ejecución de la consulta
        }
    } catch (PDOException $e) {
        // Capturar y mostrar errores de PDO
        echo "Error al ejecutar la consulta: " . $e->getMessage();
        return false;
    }
    
}

// $query = "INSERT INTO books (title, author, year, genre, quantity,state) VALUES (?, ?, ?, ?, ?, ?)";
//                $stmt = $conn->prepare($query);
//                $stmt->bind_param('ssisii', $title, $author, $year, $genre, $quantity, $state);
//
//                if ($stmt->execute()) {
//                    return "success";
//                } else {
//                    return "fail";
//                }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET customer_name = :customer_name, product = :product, quantity = :quantity, status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->customer_name = htmlspecialchars(strip_tags($this->customer_name));
        $this->product = htmlspecialchars(strip_tags($this->product));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":customer_name", $this->customer_name);
        $stmt->bindParam(":product", $this->product);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}