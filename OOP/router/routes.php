<?php

session_start();

use App\Controllers\Admin;
use App\Services\Router;
use App\Controllers\Auth;
use App\Controllers\Order;

Router::page('/login', 'login');
Router::page('/register', 'register');
Router::page('/home', 'home');
Router::page('/profile', 'profile');
Router::page('/admin', 'admin');
Router::page('/order', 'order');
Router::page('/userOrder', 'userOrder');
Router::page('/admin', 'admin');

Router::post('/auth/register', Auth::class, 'register', true, true);
Router::post('/auth/login', Auth::class, 'login', true);
Router::post('/auth/logout', Auth::class, 'logout');
Router::post('/order/add', Order::class, 'addOrder', true);
Router::post('/admin/status/confirmed', Admin::class, 'statusConfirmed', true);



Router::enable();