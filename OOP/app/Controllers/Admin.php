<?php

namespace App\Controllers;

use App\Services\Router;

class Admin
{
    public static function statusConfirmed($data) : void
    {
        $order  = \R::load('order', $data['id']);
        $order->id_status = $data['id_status'];
        \R::store( $order );
        Router::redirect('/admin');
    }
}