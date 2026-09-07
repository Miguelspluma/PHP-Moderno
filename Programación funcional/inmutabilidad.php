<?php
class Location
{
    private int $x;
    private int $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    public function getX()
    {
        return $this->x;
    }
    public function getY()
    {
        return $this->y;
    }

    public function move(float $x, float $y): Location
    {
        $location = new Location($this->x + $x, $this->y + $y);
        return $location;
    }
}

$location = new Location(1, 2);
$newLocation=  $location->move(10,22);

echo $location->getX()." ".$location->getY()."<br>";
echo $newLocation->getX()." ".$newLocation->getY()."<br>";

