<?php
define('ROOT',dirname(__FILE__));
require_once 'components/Router.php';
require_once 'model/DataGame.php';
$router = new Router();
$router->run();
?>
