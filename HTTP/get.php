<?php 

if($_SERVER['REQUEST_METHOD']==='GET'){
    echo json_encode($_GET);
    echo $_GET["name"];
}else{
    http_response_code(404);
    echo json_encode(['error'=>'No es una solicitud del tipo GET']);
}