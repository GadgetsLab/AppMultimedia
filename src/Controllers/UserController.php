<?php

namespace RDuuke\Newbie\Controllers;

use RDuuke\Newbie\Auth\Adapter;
use RDuuke\Newbie\Auth\AuthFactory;
use RDuuke\Newbie\Controllers\Base\UserBaseController;
use RDuuke\Newbie\User;

class UserController extends UserBaseController
{
    
    public function log(){
        $adapter = self::authAdapter();
        $auth_factory = self::authFactory();
        $auth = $auth_factory->newInstance();
        echo $auth->getStatus();
        echo '<br>';
        $login_service = $auth_factory->newLoginService($adapter);
        $username = 'juuanduuke@gmail.com';
        $userdata = [
            'username' => 'juuanduuke@gmail.com',
            'password' => '1990duqe',
        ];

         $login_service->login($auth, $userdata);

        //echo $auth->getStatus();
        echo '<br>';
        print_r($_SESSION);
        //$auth = $auth_factory->
        echo '<br>';
        //$logout_service = $login_service = $auth_factory->newLogoutService($adapter);
        //$logout_service->logout($auth);
        echo '<br>';
        $resume_service = $auth_factory->newResumeService($adapter);
        $resume_service->resume($auth);

        //echo $auth->getStatus();
        echo '<br>';


    }

    public function test(){
        $adapter = new Adapter();
        $auth_factory = new AuthFactory($_COOKIE);
        $auth = $auth_factory->newInstance();
        $resume_service = $auth_factory->newResumeService($adapter);
        $resume_service->resume($auth);

        echo $auth->getStatus();
        echo '<br>';
        $logout_service = $login_service = $auth_factory->newLogoutService($adapter);
        $logout_service->logout($auth);
        echo $auth->getStatus();
        echo '<br>';
        $resume_service->resume($auth);
        echo $auth->getStatus();
        echo '<br>';

    }
}