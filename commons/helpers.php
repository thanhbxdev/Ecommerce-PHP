<?php
function dd($var){
    echo "<pre>";
    var_dump($var);
    die;
}


//Hàm format vnđ
function vnd($price){
    $price = number_format($price, 0, '', ',');
    return $price . '₫';
}
define('BASE_URL', 'http://localhost:8080/PRO-1014/');
define('CART', 'Cart shop');
?>