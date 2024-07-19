<?php
$m['product']=[ 
    'id' => ['id'],
    'name' => ['word'],
    'price' => ['int'],
    'category' => ['fkey', 'table'=>'category', 'key'=>'id'],
];

?>