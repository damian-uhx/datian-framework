<?php
$m['da_user']=[
    'id' => ['id'],
    'name' => ['word'],
    'password' => ['password'],
    'token' => ['token'],
    'valid_until' => ['date'],
    'is_validated' => ['bool'],
    'is_member' => ['bool'],
    'is_admin' => ['bool'],
    'name' => ['word'],
    'address' => ['word'],
    'city' => ['word'],
    'mail' => ['email'],
    'phone' => ['email'],
    'order_product' => ['rkey', 'table'=> 'order_product', 'key'=>'user'],
];
?>