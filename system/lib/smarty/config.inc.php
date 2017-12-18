<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->cache_dir = 'cache/smarty'; //缓存文件目录 
$smarty->caching = 1; //0表示开启缓存
$smarty->cache_lifetime = 60 * 60 * 24; //设定缓存周期，一天
$smarty->template_dir = 'view';
$smarty->caching = false; 
$smarty->compile_dir  = 'system/lib/smarty/templates_c';
?>