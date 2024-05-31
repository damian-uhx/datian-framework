<?php
user_role('is_admin');
$headers = "From: info@examprep.ch\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$users = get(['da_user'=>['all']])['da_user'];
$order = get(['order'=>['all', '_where'=>['id='.$paras[0]]]])['order'][0];

$sentmails=0;
foreach ($users as $user){ 
    $products = get(['order_product'=>[
        'all',
        '_where'=>['`order`='.$order['id'], 'user='.$user['id'], 'quantity>0'],
        'user'=>[],
        'product'=>['name'=>[], 'unit'=>[], 'price'=>[], 'discount'=>[], 'supplier'=>['name'=>[]]],
        
    ]]);

    if (count($products['order_product'])>0){
        $mail='';
        $mail .= 'Bestellung vom '.$order['order_date'].' für '.$user['name'].'<br/>';
        $et=0;
        $total=0;

        foreach ($products['order_product'] as $entry){
            $mail .= '<br/>CHF '.number_format($entry['quantity']*$entry['product']['price'], 2).' für '.$entry['quantity'].' x '.$entry['product']['name'].' ('.$entry['product']['unit'].' = CHF '.$entry['product']['price'].')'.' von '.$entry['product']['supplier']['name'];
            $total+=$entry['quantity']*$entry['product']['price'];
            if ($user['is_member']>0){
                $et+=$entry['quantity']*$entry['product']['price']*$entry['product']['discount']/100;
            }
        }
        $mail.= '<br/><h3>Gesamt: CHF '.number_format($total, 2).'</h3>'.'<h3> Rabatt: ET '.number_format($et,2);
        mail('debug@examprep.ch', 'Bestellung', $mail, $headers);
        $sentmails+=mail($config['email'], 'Bestellung', $mail, $headers);
        /*ob_end_clean();
        echo $mail;*/

    }
}

$return['data']['sentmails']=$sentmails;

?>