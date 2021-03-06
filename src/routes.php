<?php

use Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware;
use Slim\App;

$app = new App([
    'settings' => [
        'debug'               => true,      // On/Off whoops error
        'whoops.editor'       => 'sublime',
        'displayErrorDetails' => true     // Display call stack in orignal slim error when debug is off
    ]
]);

if ($app->getContainer()->settings['debug'] === false) {
    $container['errorHandler'] = function ($c) {
        return function ($request, $response, $exception) use ($c) {
            $data = [
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => explode("\n", $exception->getTraceAsString()),
            ];
            return $c->get('response')->withStatus(500)
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode($data));
        };
    };
}else{
    $app->add(new WhoopsMiddleware);
}
//$app->get('', 'RDuuke\Newbie\Controllers\BaseController:Index');

$app->group('', function() use ($app) {
    $controller = new RDuuke\Newbie\Controllers\HomeController($app);
    $controllerFiles = new RDuuke\Newbie\Controllers\FileController($app);
    $controllerUsers = new RDuuke\Newbie\Controllers\UserController($app);
    $this->get('/', $controller('home'));
    $this->get('/home', $controller('index'));
    $this->get('/files', $controller('files'));
    $this->get('/files/create', $controllerFiles('create'));
    $this->post('/files', function($request) use ($app) {
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->Store($request);
    });
    $this->get('/files/{id}', $controllerFiles('show'));
    $this->get('/user/{id}/files', $controllerFiles('index'));
    $this->get('/user/{id}', $controllerUsers('show'));
    $this->get('/contact', $controller('contact'));
    $this->get('/fileup', $controller('fileup'));
    $this->post('/comments', $controller('addComments'));
    $this->get('/comments/{id}', $controller('allComments'));
    $this->post('/share', $controller('shareFile'));
    $this->get('/notifications', $controller('notifications'));
    $this->get('/newnotifications', $controller('checkNotifications'));
    $this->post('/login', $controller('login'));
    $this->get('/logout', $controller('logout'));
    $this->post('/report', $controller('report'));
    $this->post('/notification/update', $controller('notification_update'));
});

/*$app->get('/text', function () {
    return view('video/upload');
});
*/

$app->group('/admin/users', function () use ($app) {
    $controller = new RDuuke\Newbie\Controllers\Base\UserBaseController($app);

    $this->get('', $controller('index'));
    $this->get('/create', $controller('create'));
    $this->post('', $controller('store'));
    $this->get('/{id}', $controller('show'));
    $this->get('/{id}/edit', $controller('edit'));
    $this->put('/{id}', $controller('update'));
    $this->get('/{id}/destroy', $controller('destroy'));

});
$app->group('/web/users', function () use ($app) {
    $controller = new RDuuke\Newbie\Controllers\UserController($app);

    $this->get('', $controller('log'));
    $this->get('/create', $controller('test'));
    //$this->post('', $controller('store'));
   // $this->get('/{id}', $controller('show'));
    //$this->get('/{id}/edit', $controller('edit'));
    //$this->put('/{id}', $controller('update'));
   // $this->get('/{id}/destroy', $controller('destroy'));

});
$app->group('/admin/files', function () use ($app){
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
    $this->get('', $controller('index'));
    $this->get('/create', function() use ($app){
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->Create();
    });
    //$this->get('/create', $controller('create'));
    $this->post('', function($request) use ($app) {
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->Store($request);
    });
    $controller = new RDuuke\Newbie\Controllers\FileController($app);
    $this->get('/{id}', $controller('show'));
    $this->get('/{id}/edit', function($request) use ($app){
        $id = $request->getAttribute('id');
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->Edit($id);
    });
    $this->post('/{id}', function($request) use ($app){
        $id = $request->getAttribute('id');
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->Update($id, $request);
    });
    $this->get('/{id}/destroy', function(\Slim\Http\Request $request) use ($app){
        $id = $request->getAttribute('id');
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->Destroy($id);
    }); 
    $this->get('/filter/{id}', function($request) use($app){
        $id = $request->getAttribute('id');
        $controller = new RDuuke\Newbie\Controllers\FileController($app);
        $controller->FilterResult($id);
    });

});