<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //declaramos que es un tipo json
    header('Content-Type: application/json');
    //leemos el json
    $json = file_get_contents('php://input');
    //convertimos a objeto, si le poner true en la funcion se vuelve array
    $data = json_decode($json);
    // $name=$data->name;
    // $age=$data->age;
    extract((array)$data);
    echo $name;

    http_response_code(201); //ok y se creo un recurso
    echo json_encode([
        "message" => "Datos recibidos correctamente"
    ]);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'No es una solicitud del tipo POST']);
}
