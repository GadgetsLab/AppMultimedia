<?php

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

//$app->get('', 'RDuuke\Newbie\Controllers\BaseController:Index');

$app->group('', function() use ($app) {
    $controller = new RDuuke\Newbie\Controllers\HomeController($app);
    $this->get('/', $controller('index'));
    $this->get('/videos', $controller('videos'));
    $this->get('/images', $controller('images'));
    $this->get('/contact', $controller('contact'));
    $this->get('/fileup', $controller('fileup'));
});

$app->get('/text', function () {
    return view('video/upload');
});

$app->group('/admin/users', function () use ($app) {
    $controller = new RDuuke\Newbie\Controllers\UserController($app);

    $this->get('', $controller('index'));
    $this->get('/create', $controller('create'));
    $this->post('', $controller('store'));
    $this->get('/{id}', $controller('show'));
    $this->get('/{id}/edit', $controller('edit'));
    $this->put('/{id}', $controller('update'));
    $this->get('/{id}/destroy', $controller('destroy'));

});
$app->post('/text', function ($request) use ($app){
    /*
    $controller = new RDuuke\Newbie\Controllers\VideoController($app);
    $controller->Upload($request);
    */

    $controller = new RDuuke\Newbie\Controllers\FileController($app);
    $controller->SaveFile($request);

});