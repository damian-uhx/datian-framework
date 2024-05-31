<?php

    //user_role('is_admin');
    serve(['order_product'=>['all']]);

    /*
    if (!$user){
        $user=['id'=>0, 'is_admin'=>0];
    }

    if ($user['is_admin']){
        serve(['order_product'=>['all']]);
    }
    else {
        serve(['order_product'=>[
            'quantity' => [],
            'product' => [],
            'user' => ['id'=>$user['id']],
            'order' => []
            ]]);
    }*/
?>