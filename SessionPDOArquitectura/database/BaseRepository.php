<?php 
namespace app\database;

use PDO;

class BaseRepository{
    protected $pdo;

    public function __construct()
    {
        $conn="mysql:host=".BD_HOST.";dbname=".BD_NAME.";charset=utf8";
        $this->pdo=new PDO($conn, BD_USER, BD_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}