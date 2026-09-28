<?php

declare(strict_types=1);

require_once __DIR__ . '/autoload.php';

use app\business\Add;
use app\business\Delete;
use app\business\Get;
use app\business\Update;
use app\data\Repository;
use app\exceptions\DataException;
use app\exceptions\ValidationException;
use app\validators\Validator;

$repository = new Repository(); //contiene todos los verbos que escriben y leen la bd 
$validator = new Validator(); //tiene todo lo de validacion de datos y cacha errores
try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $get = new Get($repository); //solo el metodo get
            echo json_encode($get->get());

            break;
        case 'POST':
            $body = json_decode(file_get_contents('php://input'), true);
            $add = new Add($repository, $validator);
            $add->add($body);
            break;
        case 'PUT':
            $body = json_decode(file_get_contents('php://input'), true);
            $update = new Update($repository, $validator);
            $update->update($body);
            break;
        case 'DELETE':
            $id =(int) $_GET['id'];
            $delete = new Delete($repository);
            $delete->delete($id);

            break;

        default:
            http_response_code(405);
            
            break;
    }
} catch (ValidationException $th) {
    http_response_code(400); //algo llego mal del cliente
    echo json_encode(["error" => $th->getMessage()]);
} catch (DataException $th) {
    http_response_code(404); //no se encuentra el recurso de lo que pides
    echo json_encode(["error" => $th->getMessage()]);
} catch (\Throwable $th) {
    http_response_code(500); //error en la bd
    echo json_encode(["error" => $th->getMessage()]);
}
