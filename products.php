<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

// Database connection
$conn = mysqli_connect("localhost", "root", "", "shop");

if (!$conn) {
    echo json_encode(["message" => "Database connection failed"]);
    exit;
}

// Get request method-----------------------------------------------------------------------------
$method = $_SERVER['REQUEST_METHOD'];

/* ===============================================================================================
   GET - Fetch all products
==============================*/
if ($method == "GET") {

    $result = mysqli_query($conn, "SELECT * FROM products");
    $products = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    echo json_encode($products);
}


/* ==================================================================================================
   POST - Add product
========================= */
if ($method == "POST") {

    $data = json_decode(file_get_contents("php://input"));

    $name = $data->name;
    $price = $data->price;

    $sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
    mysqli_query($conn, $sql);

    echo json_encode(["message" => "Product added"]);
}


/* =========================
   PUT - Update product
========================= */
if ($method == "PUT") {

    $data = json_decode(file_get_contents("php://input"));

    $id = $data->id;
    $name = $data->name;
    $price = $data->price;

    $sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
    mysqli_query($conn, $sql);

    echo json_encode(["message" => "Product updated"]);
}


/* =========================
   DELETE - Delete product
========================= */
if ($method == "DELETE") {

    $data = json_decode(file_get_contents("php://input"));

    $id = $data->id;

    $sql = "DELETE FROM products WHERE id=$id";
    mysqli_query($conn, $sql);

    echo json_encode(["message" => "Product deleted"]);
}

?>