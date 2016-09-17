<?php
namespace RDuuke\Newbie\Controllers\Base;

use MartynBiz\Slim3Controller\Controller;
use RDuuke\Newbie\User;

class UserBaseController extends Controller
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
        $user = User::find($id);

        return view('admin/users/edit', compact('user'));
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
        $user = User::find($id);
        $request = self::getPost();
        $user->fill($request);
        $user->save();
    }

    public function Destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
    
    public function authFactory()
    {
        return new \RDuuke\Newbie\Auth\AuthFactory($_COOKIE);
    }

    public function authAdapter()
    {
        return new \RDuuke\Newbie\Auth\Adapter();
    }
}