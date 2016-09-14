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
$app->group('/admin/files', function () use ($app){
    $this->get('', function(){
        $controller = new RDuuke\Newbie\Controllers\FileController();
        $controller->Index();

    });
    $this->get('/create', function() use ($app){
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->Create();
    });
    //$this->get('/create', $controller('create'));
    $this->post('', function($request) use ($app) {
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->Store($request);
    });
    $this->get('/{id}', function($id){
        $controller = new RDuuke\Newbie\Controllers\FileController();
        $controller->Show($id);
    });
    $this->get('/{id}/edit', function($request) use ($app){
        $id = $request->
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->Edit($id);
    });
    $this->put('/{id}', function($id){
        $controller = new RDuuke\Newbie\Controllers\FileController();
        $controller->Update($id);
    });
    $this->get('/{id}/destroy', function(\Slim\Http\Request $request) use ($app){
        $id = $request->getAttribute('id');
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->Destroy($id);
    });

});
$app->post('/text', function ($request) use ($app){
    /*
    $controller = new RDuuke\Newbie\Controllers\VideoController($app);
    $controller->Upload($request);
    */

    $controller = new RDuuke\Newbie\Controllers\FileController($app);
    $controller->SaveFile($request);

});

$app->group('/user', function() use($app){
    $controller = new RDuuke\Newbie\Controllers\FileController($app);
    $this->get('', $controller('index'));
    $this->get('/create', $controller('create'));
    $this->post('', $controller('store'));
    $this->get('/{id}', $controller('show'));
    $this->get('/{id}/edit', $controller('edit'));
    $this->put('/{id}', $controller('update'));
    $this->get('/{id}/destroy', $controller('destroy'));
    $this->post('/saveFile', $controller('SaveFile'));
});



