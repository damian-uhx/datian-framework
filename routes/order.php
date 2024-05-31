<?php
if ($paras[0]=='latest'){
    $data['order'] = get(['order'=>['all', '_where'=>['active>0'], '_append'=>['order by order_date']]]);
}
else{
    serve(['order'=>['all']], ['GET']);
}
user_role('is_admin');
serve(['order'=>['all']], ['POST', 'PATCH', 'PUT', 'DELETE']);

?>