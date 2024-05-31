<?php
//CRUD


//make 2 link in bestellungen: 1. nach nutzer, 2. nach lieferanten
if ($method == 'SUPPLIER' && count($paras)>=2)
{
    $method='GET';
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
}
else if ($method == 'PRODUCT' && count($paras)>=2){
    $method='GET';
    $order_id=$paras[0];
    $user_id=$paras[1];
    $paras=[];
    serve(['supplier'=>[
        'name'=>[],
        'product' => [
            'all',
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
}
else{
    user_role('is_admin');
    serve(['supplier'=>['all']]);
}


?>