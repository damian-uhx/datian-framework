<?php

    $order_id=$paras[0];
    $supplier_id=$paras[1];
    $paras=[];
    serve(['supplier'=>[
        '_where'=>['id='.$supplier_id],
        'name'=>[],
        'product' => [
            'all',
            '_snippets'=>['sumarize/sum'=>['subtable'=>'order_product', 'input'=>'quantity', 'output'=>'quantity']],
            'order_product'=>[
                '_where'=>['`order` = '.$order_id], //replace with selected user and order
                'all',
            ]
        ]
    ]]);

    ?>