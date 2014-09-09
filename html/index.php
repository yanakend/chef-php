<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/xhprof.php';


$app = new Bullet\App();
$app->path('v1', function ($request) use ($app) {

    $app->path('peopleApi', function ($request) use ($app) {
        $app->get(function() use ($app) {
            return '[json-data]';
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
