<?php

namespace App\Controllers;

use App\Services\Router;

class Order
{
    public function addOrder($data) : void
    {
        var_dump($data);
        $order = \R::dispense('order');
        $order->id_user = $_SESSION['user']['user_id'];
        $order->id_product = $data['id_product'];
        $order->id_status = 1;
        $order->count = $data['count'];
        $order->address = $data['address'];


        \R::store($order);
        Router::redirect('/home');
    }
}