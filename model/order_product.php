<?php
$m['order_product']=[
    'id' => ['id'],
    'quantity' => ['float'],
    'product' => ['fkey', 'table'=>'product', 'key'=>'id'],
    'user' => ['fkey', 'table'=>'da_user', 'key'=>'id'],
    'order' => ['fkey', 'table'=>'order', 'key'=>'id'],
];
?>