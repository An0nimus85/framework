<?php
define('VG_ACCESS', true);
header('Content-Type:text/html;charset=utf-8');
session_start();
require_once 'config.php';
require_once 'core/base/settings/internal_settings.php';
use core\base\exceptions\RouteException;
use core\base\controller\RouteControllers;
use core\base\settings\Settings;
use core\base\settings\ShopSettings;

try {
    RouteControllers::getInstance()->route();
}
catch (RouteException $e){
 exit($e->getMessage());
}
echo 'Hello World';