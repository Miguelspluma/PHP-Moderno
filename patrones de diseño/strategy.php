<?php


interface IStrategy
{
    public function get(): array;
}

class ArrayStrategy implements IStrategy
{
    private array $data = ['title1', 'title2', 'title3'];
    public function get(): array
    {
        return $this->data;
    }
}

class ContextPrinter
{
    private IStrategy $strategy;
    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }
    public function print()
    {
        $context = $this->strategy->get();
        foreach ($context as  $value) {
            echo $value;
        }
    }
}

$arrayStrategy = new ArrayStrategy;
$contextPrinter = new ContextPrinter($arrayStrategy);

$contextPrinter->print();

class UrlStrategy implements IStrategy
{

    private string $url;
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function get(): array
    {
        $data = file_get_contents($this->url);
        $arr=json_decode($data, true);
        return array_map(fn($item)=>$item['title'], $arr);
    }
}
$urlStrategy= new UrlStrategy('https://jsonplaceholder.typicode.com/posts');

$contextPrinter2= new ContextPrinter($urlStrategy);
$contextPrinter2->print();