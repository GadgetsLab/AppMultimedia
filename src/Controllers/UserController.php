<?php

namespace RDuuke\Newbie\Controllers;

use MartynBiz\Slim3Controller\Controller;
use RDuuke\Newbie\Contracts\Controller\ResourceController;
use RDuuke\Newbie\User;

class UserController extends Controller implements ResourceController
{

    public function Index()
    {
        $users = User::all();

        return view('admin/users/index', compact('users'));
    }

    public function Create()
    {
        return view('admin/users/create');
    }

    public function Show($id)
    {
        $user = User::find($id);

        return view('admin/users/show', compact('user'));
    }

    public function Edit($id)
    {
        // TODO: Implement Edit() method.
    }

    public function Store()
    {
        echo '<pre>';
        $request = self::getPost();
        print_r($request);
        User::create($request);

    }

    public function Update($id)
    {
        // TODO: Implement Update() method.
    }

    public function Destroy($id)
    {
        // TODO: Implement Destroy() method.
    }
}