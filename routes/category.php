<?php

/*serve(
    [
        'product'=>[
            'name'=>[], 
            'price'=>[],
            'category'=>[
                'id'=>[]
            ]
        ]
    ]
);*/

serve(
    [
        'category' => ['all', 'product'=>['all']]
    ], ['GET']
);