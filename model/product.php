<?php
$m['product']=[
    'id' => ['id'],
    'name' => ['word'],
    'unit' => ['word'],
    'quantity' => ['int'],
    'split' => ['bool'],
    'price' => ['float'],
    'discount' => ['float'],
    'available' => ['bool'],
    'supplier' => ['fkey', 'table'=>'supplier', 'key'=>'id'],
    'category' => ['fkey', 'table'=>'category', 'key'=>'id'],
    'order_product' => ['rkey', 'table'=>'order_product', 'key'=>'product']
];
?>