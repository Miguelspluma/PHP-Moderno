<?php
interface ISendProjectInterface
{
    public function send();
}

interface ISendMailInterface
{
    public function send();
}

class SendMail implements ISendMailInterface
{
    public function send()
    {
        echo "Se envia un correo electrónico";
    }
}

class Project
{
    public function create() {
        echo "Se creó el proyecto";
    }
}

class SalesProject extends Project implements ISendProjectInterface
{
    private ISendMailInterface $sender;
    public function __construct(ISendMailInterface $sender)
    {
        $this->sender=$sender;

    }
    public function send(){
        $this->sender->send();
    }
}


class InternalProject extends Project{
    //funciones extra
}

function send(ISendProjectInterface $project){
    $project->send();
}

$sendMail=new SendMail();
send(new SalesProject($sendMail));

