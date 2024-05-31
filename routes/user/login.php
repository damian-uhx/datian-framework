<?php
//retrieves first user with matching credentials
//creates new token and returns it
//token can be sent in header to authenticate

$users=get(
    ['da_user'=>
    [
        '_where'=>['mail="'.$data['mail'].'"'],
        'name'=>[],
        'mail'=>[],
        'password'=> [],
        'is_admin' => [],
        'is_member' => [],
        'token' => [], //generate token
    ]] 
)['da_user'];

$return['data']['user']=[];

foreach ($users as $user){
    if (password_verify($data['password'], $user['password'])){
        $return['data']['user'][]=$user;
    }
}

if (count($return['data']['user'])){
    $random = random(50);
    $return['data']['user']=$return['data']['user'][0];
    sql_update('da_user', ['token' => $random, 'valid_until' => date('Y-m-d H:i:s', time()+60*60*24)], $return['data']['user']['id']);
    $return['data']['user']['token'] = $random;
    $return['data']['user']['valid'] = true;
}
else{
    $return['data']['user']=[];
}