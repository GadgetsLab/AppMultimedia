<?php

namespace RDuuke\Newbie\Controllers;

use RDuuke\Newbie\Auth\Adapter;
use RDuuke\Newbie\Auth\Auth;
use RDuuke\Newbie\Auth\AuthFactory;
use RDuuke\Newbie\Controllers\Base\UserBaseController;
use RDuuke\Newbie\Contracts\Controller\ResourceController;
use RDuuke\Newbie\User;

class UserController extends UserBaseController
{
    
    public function Index($id){


        $adapter = new Adapter();
        $auth_factory = new AuthFactory($_COOKIE);
        $auth = $auth_factory->newInstance();
        echo $auth->getStatus();
        echo '<br>';
        $login_service = $auth_factory->newLoginService($adapter);
        $username = 'juuanduuke@gmail.com';
        $userdata = [
            'first_name' => 'Juan',
            'last_name' => 'Duque',
        ];

        $login_service->forceLogin($auth, $username, $userdata);

        echo $auth->getStatus();

        
        //$auth = $auth_factory->

    }
}