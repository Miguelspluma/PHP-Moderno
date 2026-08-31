<?php 

class Add{
    public function __invoke($a, $b)
    {
        return $a * $b;

    }
}

class Validator{
    private int $min;
    private int $max;
    public $error;

    public function __construct(int $min, int $max){
        $this->min=$min;
        $this->max=$max;
    }

    public function __invoke($text):bool
    {
        $long = strlen($text);
        if( $long < $this->min || $long > $this->max){
        $this->error="El texto es muy pequeño o muy grande"    ;
        return false;
            
        }

        return true;


    }

}

$add= new add();
echo $add(2,4);

$validador=new Validator(2, 8);



if($validador("JAJAJ")){
    echo "Todo bien";
}else{
    echo $validador->error;
}

