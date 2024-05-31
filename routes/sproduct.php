<?php
    $order_id=$paras[0];
    $user_id=$paras[1];
    $paras=[];

    if (isset($_GET['active']) && !$_GET['active']){
        $where=[];
    }
    else{
        $where = ['available=1']
    }

    serve(['supplier'=>[
        'name'=>[],
        'product' => [
            'all',
            '_where' => $where,
            '_append'=>['ORDER BY category'],
            'category' => [
                'name' => [],
            ],
            'order_product'=>[
                '_snippets' => [], //create snippet that calculates the sujm of the argument (i.e. quantity) of all entries
                '_where'=>['`order` = '.$order_id, 'user='.$user_id], //replace with selected user and order
                'quantity'=>[],
                'order'=>[],
                'user'=>[],
                'product'=>[],
            ]
        ]
    ]]);

    ?>