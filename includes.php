<?php



include_once 'env.php';

require 'vendor/autoload.php';
foreach (glob("settings/*.php") as $filename)
{
    include_once $filename;
}

include_once 'datian-core/helper.php';
include_once 'datian-core/crud.php';
?>