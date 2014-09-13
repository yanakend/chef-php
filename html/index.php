<?php

require 'vendor/autoload.php';
require 'xhprof.php';
require 'database.php';
require 'memcache.php';

// create model for Eloquent ORM mapped to REST API resource
class People extends Illuminate\Database\Eloquent\Model {
  public $timestamps = false;
}

// routing
$app = new \Slim\Slim([
  'mode' => 'development',
  'debug' => true,
  'log.enable' => true,
]);
$app->response->headers->set('Content-Type', 'application/json');

// API group
$app->group('/api', function () use ($app) {

  $app->get('/people', function () use ($app) {
    $products = People::all();
    $app->response->status(200);
    $app->response->body($products->toJson());
  });

  $app->get('/people/:id', function ($id) use ($app) {
    $body = MemcacheManage::get("/peopleApi/{$id}");
    if ( ! $body)
    {
      $products = People::find($id);
      if (!$products) $body = '{}';
      else            $body = $products->toJson();
      MemcacheManage::set("/peopleApi/{$id}", $body);
    }
    $app->response->status(200);
    $app->response->body($body);
  });
});

$app->notFound(function () use ($app) {
  $app->response->status(200);
  $app->response->body('404 Not Found.');
});

$app->run();
