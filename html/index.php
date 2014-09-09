<?php

require 'vendor/autoload.php';
require 'xhprof.php';
error_reporting(E_ALL);

// use Eloquent ORM
use Illuminate\Database\Capsule\Manager as Capsule;  
use Illuminate\Database\Schema\Blueprint as Schema;  
 
// create model for Eloquent ORM mapped to REST API resource
class Product extends Illuminate\Database\Eloquent\Model {
  public $timestamps = false;
}
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'test',
    'username'  => 'root',
    'password'  => 'root',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$app = new Bullet\App();
$app->path('v1', function ($req) use ($app) {
    $app->path('peopleApi/:id', function () use ($app) {
        $app->get(function() use ($app) {
            $products = Product::all();
            return $products->toArray();
        });
        $app->post(function() use ($app) {
            return '[json-data]';
        });
        $app->delete(function() use ($app) {
            return '[json-data]';
        });
        $app->put(function() use ($app) {
            return '[json-data]';
        });
    });
});

echo $app->run(new Bullet\Request());
