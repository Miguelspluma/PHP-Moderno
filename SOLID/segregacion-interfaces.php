<?php

//segregación de interfaces se basa en crear pequeñas interfaces para implementar funcionamientos 
//version larga
interface CrudBaseInterface
{
    //estas son definiciones abstractas    
    public function create();
    public function read();
}

interface UpdateCrudInterface
{
    public function update();
}

interface DeleteCrudInterface
{
    public function delete();
}


//version corta

interface CrudFullInterface extends CrudBaseInterface, UpdateCrudInterface, DeleteCrudInterface {}

//usando las interfaces

class UserCrud implements CrudFullInterface
{
    public function create()
    {
        echo "Se crea";
    }

    public function read()
    {
        echo "Se lee";
    }

    public function update()
    {
        echo "Se actualiza";
    }
    public function delete()
    {
        echo "Se elimina";
    }
}


class SaleCrud implements CrudBaseInterface, DeleteCrudInterface
{
    public function create()
    {
        echo "Se crea";
    }

    public function read()
    {
        echo "Se lee";
    }
    public function delete(){
        echo "Se elimina";
    }
}


function update(UpdateCrudInterface $crud){
    $crud->update();
    

    //el objeto muere al no tener una variable
}
//creacion del objeto al vuelo, instanciacion anonima
update(new UserCrud);


function general(CrudFullInterface $crud){
    $crud->create();
    $crud->update();
    $crud->delete();
}

general(new UserCrud);