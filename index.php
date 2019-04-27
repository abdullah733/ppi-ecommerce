<?php

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\RouteParser;

require_once 'vendor\autoload.php';
//use App\Models\User;;
//
//use App\Models\Category;
//$User=new User();
//$User->greet();
//echo "<hr>";
//$Category=new Category();
//$Category->greet();
//echo "<hr>";
$parser =new  RouteParser();
$router = new RouteCollector($parser);
 require_once __DIR__.'/routes.php';


$dispatcher = new Dispatcher($router->getData());
try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} catch (Exception $e) {
    echo $e->getMessage();
}
echo $response;





