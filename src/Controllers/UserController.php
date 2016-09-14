<?php

namespace RDuuke\Newbie\Controllers;

use RDuuke\Newbie\Auth\Authenticate;
use RDuuke\Newbie\Controllers\Base\UserBaseController;
use RDuuke\Newbie\Contracts\Controller\ResourceController;
use RDuuke\Newbie\User;

class UserController extends UserBaseController
{
    
    public function Index($id){
        //$user = User::findOrFail($id);
        $authenticate = new Authenticate('juuanduuke@gmail.com', md5('1990duqe'));
        if ($authenticate->validate()) {
            echo 'login';
        }else{
            echo 'no login';
        }
        echo '<pre>';
      //  print_r($user);

    }
}