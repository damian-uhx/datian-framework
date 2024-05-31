<?php
$m['supplier']=[
    'id' => ['id'],
    'name' => ['word'],
    'address' => ['word'],
    'city' => ['word'],
    'phone' => ['word'],
    'email' => ['email'],
    'product' => ['rkey', 'table'=>'product', 'key'=>'supplier'],
];
?>