<?php
$m['order']=[
    'id' => ['id'],
    'name' => ['word'],
    'active' => ['bool'],
    'order_date' => ['date'],
    'collect_date' => ['date'],
    'order_product' => ['rkey', 'table'=>'order_product', 'key'=>'order'],
];
?>