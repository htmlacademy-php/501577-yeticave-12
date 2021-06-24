<?php

$is_auth =      rand(0, 1);
$user_name =    'serg';
// $user_name =    htmlspecialchars($user_name);

$page_title = 'Название страницы';
$categories =   [   
    [
        'title' => 'Доски и лыжи',
        'code'  => '',
    ],
    [
        'title' => 'Крепления',
        'code'  => '',
    ],
    [
        'title' => 'Ботинки',
        'code'  => '',
    ],
    [
        'title' => 'Одежда',
        'code'  => '',
    ],
    [
        'title' => 'Инструменты',
        'code'  => '',
    ],
    [
        'title' => 'Разное',
        'code'  => '',
    ],
];

$items =    [
    [
        'title' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' =>    10999,
        'url_img' => 'img/lot-1.jpg',
        'date_range' => '2021-06-24 11:20:40',

    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' =>    159999,
        'url_img' => 'img/lot-2.jpg',
        'date_range' => '2021-07-01',
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' =>    8000,
        'url_img' => 'img/lot-3.jpg',
        'date_range' => '2021-06-26',
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' =>    10999,
        'url_img' => 'img/lot-4.jpg',
        'date_range' => '2021-06-22',
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' =>    7533.123,
        'url_img' => 'img/lot-5.jpg',
        'date_range' => '2021-06-24 23:00',
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => 5400,
        'url_img' => 'img/lot-6.jpg',
        'date_range' => '2021-06-24 12:30',
    ],
];

function price_format($x){
    $x = ceil($x);
    if ($x > 1000) {
        $x = number_format($x, 0, '', ' ');
    }
    return $x . ' ₽';
};

function time_left($date){
    $hours = $minutes = 0;
    $target_time = date_create($date);
    $target_time = new DateTime($target_time->format('Y-m-d H:i:s'));
    $now_time = new DateTime('now');
    
    if ($now_time < $target_time) {
        $diff = date_diff($now_time, $target_time);
        $hours = $diff->h + ($diff->days*24);
        $minutes = $diff->i;
    }
    $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
    $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
    $date = [$hours, $minutes];

    return $date;
};


require('helpers.php');

$main = include_template('main.php', [
    'categories' => $categories,
    'items' => $items,
]);

$layout = include_template('layout.php', [
    'categories' => $categories,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'page_title' => $page_title,
    'main' => $main,
]);

print($layout);
