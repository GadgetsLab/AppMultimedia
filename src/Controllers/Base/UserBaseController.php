<?php
namespace RDuuke\Newbie\Controllers\Base;

use MartynBiz\Slim3Controller\Controller;
use RDuuke\Newbie\File;
use RDuuke\Newbie\User;

class UserBaseController extends Controller
{

    public function Index()
    {
        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            $users = User::all();
            return view('admin/users/index', compact('users','user'));
        }
        return $this->redirect(BASE_PUBLIC,200);
    }

    public function Create()
    {

        return view('admin/users/create');
    }

    public function Show($id)
    {
        if(self::checkUser()){
            $user = User::find($id);
            $total_post = $user->files->count();
            return view('admin/users/show', compact('user', 'total_post'));
        }
        return $this->redirect(BASE_PUBLIC, 200);
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

}