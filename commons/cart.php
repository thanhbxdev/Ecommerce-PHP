<?php
session_start();

function cartAll()
{
    return isset($_SESSION[CART]) ? $_SESSION[CART] : [];
}

function cartFind($id)
{
    return countCart() > 0 ? $_SESSION[CART][$id] : null;
}

function cartAdd($product)
{
    $id = $product['id'];
    $cart = isset($_SESSION[CART]) ? $_SESSION[CART] : null;

    if (!$cart) { // If cart null
        $cart[$id] = [
            'name' => $product['name'],
            'image' => $product['image'],
            'origin_price' => $product['origin_price'],
            'price' => $product['price'],
            'quantity' => 1
        ];
        $message = [
            'status' => 'success',
            'title' => 'Success',
            'content' => 'Đã thêm ' . $product['name'] . ' vào giỏ'
        ];
    } else {
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $message = [
                'status' => 'success',
                'title' => 'Success',
                'content' => 'Đã cập nhật số lượng ' . $product['name']
            ];
        } else {
            $cart[$id] = [
                'name' => $product['name'],
                'image' => $product['image'],
                'origin_price' => $product['origin_price'],
                'price' => $product['price'],
                'quantity' => 1
            ];
            $message = [
                'status' => 'SUCCESS',
                'title' => 'Success',
                'content' => 'Đã thêm ' . $product['name'] . ' vào giỏ hàng'
            ];
        }
    }
    $_SESSION[CART] = $cart;
    return $message;
}

function cartUpdate($ids, $quantities)
{
    $cart = $_SESSION[CART];
    if (!cartCheck()) {
        $message = [
            'status' => 'WARNING',
            'title' => 'Warning',
            'content' => 'Giỏ hàng trống'
        ];
    } else {
        for ($i = 0; $i < count($cart); $i++) {
            if ($quantities[$i] <= 0) {
                unset($cart[$ids[$i]]);
            } else {
                $cart[$ids[$i]]['quantity'] = $quantities[$i];
            }
        }

        // Save
        $_SESSION[CART] = $cart;
        $message = [
            'status' => 'SUCCESS',
            'title' => 'Success',
            'content' => 'Cập nhật thành công'
        ];
    }

    return $message;
}

function cartRemove($id)
{
    unset($_SESSION[CART][$id]);
}

function countCart()
{
    return isset($_SESSION[CART]) ? count($_SESSION[CART]) : 0;
}

function cartTotalPrice()
{
    $total = 0;
    if (cartCheck()) {
        foreach ($_SESSION[CART] as $item) {
            $total += $item['quantity'] * $item['price'];
        }
    }
    return $total;
}

function cartCheck()
{
    return isset($_SESSION[CART]) && count($_SESSION[CART]) > 0;
}

function cartDestroy()
{
    unset($_SESSION[CART]);
}
