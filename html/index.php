<?php

require 'vendor/autoload.php';
require 'xhprof.php';
require 'database.php';
require 'memcache.php';

// create model for Eloquent ORM mapped to REST API resource
class Product extends Illuminate\Database\Eloquent\Model {
  public $timestamps = false;
}

// routing
$app = new \Slim\Slim([
    'mode' => 'development',
]);

$app->get('/peopleApi', function () use ($app) {
    $products = Product::all();
    echo $products->toJson();
});

$app->get('/peopleApi/:id', function ($id) use ($app) {
    $products = Product::find($id);
    echo $products->toJson();
});

$app->notFound(function () use ($app) {
    echo '404 Not Found.';
});

$app->run();
