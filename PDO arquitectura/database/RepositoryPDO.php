<?php 
namespace app\database;

use app\database\BaseRepository;
use app\interfaces\RepositoryInterface;
use PDO;



class RepositoryPDO extends BaseRepository implements RepositoryInterface {
    const TABLE='beer';

    public function get():array{
        $sql="SELECT * FROM ".self::TABLE;
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function exists($id):bool{
        $sql="SELECT * FROM ".self::TABLE. " WHERE id=:id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result=$stmt->rowCount()>0;
        return $result;
    }

    public function create($data){
        $sql="INSERT INTO ".self::TABLE. "(name, alcohol, idBrand) VALUES (:name, :alcohol, :idBrand) ";

        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($data);

    }
    public function update($data){
    $sql= "UPDATE ".self::TABLE." "
        ."SET name=:name, alcohol = :alcohol, idBrand = :idBrand "
        ."WHERE id = :id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
    }
    public function delete($id){
        $sql = "DELETE FROM ".self::TABLE ." WHERE id=:id";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute(['id'=>$id]);
    }

}