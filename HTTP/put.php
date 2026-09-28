<?php

header('Content-Type: application/json');
$array = [
    [
        'id' => 1,
        'name' => 'mikis'
    ],
    [
        'id' => 2,
        'name' => 'Evelin'
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    extract((array)$data);

    if ($data !== null && isset($name) && isset($id)) {
        $index = get($id, $array);
        if($index>=0){
            //si existe
            $array[$index]['name']=$name;
            http_response_code(201);
            echo json_encode(["status"=>"Operación realizada correctamente"]);
        }else{
            http_response_code(404);
            echo json_encode(["error"=>'No existe el id']);
        };
    } else {
        http_response_code(400);
        echo json_encode(["Error" => "Información erronea"]);
    }
} else {
    http_response_code(405);
    echo json_encode([
        'Error' => "Solo métodos PUT"
    ]);
}

function get($id, $array)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]["id"] === $id) {
            return $i;
        }
    }
    return -1;
};
