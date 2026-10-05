<?php 
declare(strict_types=1); 

namespace app\business;

use app\interfaces\RepositoryInterface;

class Get{
    private RepositoryInterface $repository;

    public function __construct($repository)
    {
        $this->repository=$repository;
    }


    public function get():array{
        return $this->repository->get();
    }

}