<?php 

class User{
    public $name;
    private $email;
    private $password;
    
    public function __construct(string $name, string  $email, string $password)
    {
        $this->name=$name;
        $this->$email=$email;
        $this->$password=$password;
    }

    public function __serialize(): array
    {
        return [
            "name"=>strtoupper($this->name),
            "email"=>$this->email
        ];


    }

    public function __unserialize(array $data): void
    {
        $this->name=$data['name'];
        $this->email=$data['email'];
        $this->password=null;
        echo "Deserealizado <br> <br>";
    }

}

$user=new User('Miguel', 'correo@correo.com', 'password');
$s=serialize($user);

echo $s. "<br><br>";

$obj = unserialize($s);
echo $obj->name;