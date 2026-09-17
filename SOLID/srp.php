<?php
//principio de responsabilidad unica, solo tiene un objetivo singles responsability single

class Order
{
    private $items = [];
    private $total;

    public function getTotal()
    {
        return $this->total;
    }

    public function addItem($description, $price)
    {
        $this->items[] = [
            'description' => $description,
            'precio' => $price
        ];
        $this->total += $price;
    }

    public function getItems(): array 
    {
        return  $this->items;
    }

    public function createOrder(): void
    {
        echo "se procesa el pedido <br>";
    }
}


class EmailNotifier
{
    public function send(Order $order)
    {
        echo "Mensaje del pedido, Total: " . $order->getTotal() . "<br>";
    }
}


$order = new Order();
$order->addItem("Producto 1", 100);
$order->addItem("Producto 2", 200);
$order->createOrder();
print_r( $order->getItems());


$emailNotifier = new EmailNotifier();
$emailNotifier->send($order);
