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
    $body = MemcacheManage::get("/peopleApi/{$id}");
    if ( ! $body)
    {
        $products = Product::find($id);
        if (!$products) $body = '{}';
        else            $body = $products->toJson();
        MemcacheManage::set("/peopleApi/{$id}", $body);
    }
    $response = $app->response();
    $response['Content-Type'] = 'application/json';
    $response->status(200);
    $response->body($body);
});

$app->notFound(function () use ($app) {
    echo '404 Not Found.';
});

$app->run();
