<?php

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\RouteParser;
use Illuminate\Database\Capsule\Manager;
use App\Models\User;
use App\Controller\HomeController;


require_once 'vendor\autoload.php';
session_start();


$manager=new Manager();
$manager->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'ppi_ecommerce',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',

]);
$manager->setAsGlobal();
$manager->bootEloquent();
$users=manager::table('users')->first();
$parser =new  RouteParser();
$router = new RouteCollector($parser);
 require_once __DIR__.'/routes.php';


$dispatcher = new Dispatcher($router->getData());
try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} catch (Exception $e) {
    echo $e->getMessage();
}
//echo $response;





