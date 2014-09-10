<?php

error_reporting(E_ALL);
require 'vendor/autoload.php';
require 'xhprof.php';
require 'database.php';
require 'memcache.php';

// create model for Eloquent ORM mapped to REST API resource
class Product extends Illuminate\Database\Eloquent\Model {
  public $timestamps = false;
}

// routing
$app = new Bullet\App();
$app->path('v1', function ($req) use ($app) {
    $app->path('peopleApi', function () use ($app) {
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
