<?php
declare(strict_types=1); 


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
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {


    extract($_GET);

    if (isset($id)) {
        $index = get($id, $array);
     
        if ($index >= 0) {
            //si existe
            unset($array[$index]);
            $array = array_values($array);
            http_response_code(201);
            echo json_encode(["status" => "Eliminada correctamente"]);
            
        } else {
            http_response_code(404);
            echo json_encode(["error" => 'No existe el id']);
        };
    } else {
        http_response_code(400);
        echo json_encode(["Error" => "Información erronea"]);
    }
} else {
    http_response_code(405);
    echo json_encode([
        'Error' => "Solo métodos DELETE"
    ]);
}

function get(int $id, array $array)
{

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]["id"] === $id) {
            return $i;
        }
    }
    return -1;
};
