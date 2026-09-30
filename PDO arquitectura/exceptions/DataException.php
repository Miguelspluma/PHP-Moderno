<?php
declare(strict_types=1); 

namespace app\exceptions;
use Exception;

//hereda del padre Exception
class DataException extends Exception{
    
    public function __construct($message)
    {
        //manda el mensaje al padre
        return parent::__construct($message);
    }
}
