<?php
user_role('is_admin');

if ($paras[0] == 'bysupplier'){
    $paras=[];
    serve(['product'=>['all', '_append' => 'ORDER BY supplier']], ['GET']);
}
else{
    serve(['product'=>['all']]);
}
?>