<?php 

class Car{
    private string $model;
    private string $brand;
    private int $year;

    public function __construct (string $model, string $brand, int $year){
        $this->model=$model;
        $this->brand=$brand;
        $this->year=$year;
    }

    public function __toString(){
        return "El carro es modelo $this->model de la marca $this->brand";
    }
}

$car= new Car("HRV", "Honda", 2025);
echo $car;