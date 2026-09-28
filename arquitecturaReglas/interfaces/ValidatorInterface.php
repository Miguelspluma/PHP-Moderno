<?php

declare(strict_types=1);
namespace app\interfaces;


interface ValidatorInterface {
    public function getError():string;
    public function validateAdd($data):bool;
    public function validateUpdate($data):bool;

}
