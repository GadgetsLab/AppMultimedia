<?php

namespace RDuuke\Newbie\Controllers;


use MartynBiz\Slim3Controller\Controller;
use RDuuke\Newbie\Comment;
use RDuuke\Newbie\Shared;
use RDuuke\Newbie\Notification;

class HomeController extends Controller
{

    public function Index()
    {
        //mailer();
        $title = 'Didactico repository';
        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            $title = 'Didactico repository';
            return view('home/index', compact('title', 'user'));

        }
        return $this->redirect(BASE_PUBLIC, 500);

    }

    public function Home()
    {
        return view('home/login', compact('title'));
    }
    public function Videos()
    {
        $title = 'All videos';

        return view('home/item', compact('title'));

    }

    public function Login()
    {
        $data = self::getPost();
        $adapter = self::authAdapter();
        $auth_factory = self::authFactory();
        $auth = $auth_factory->newInstance();
        $login_service = $auth_factory->newLoginService($adapter);
        $login_service->login($auth, $data);
        if ($auth->isValid()) {
            echo '1';
            return true;
        }
        echo '0';
        return false;
    }

    public function Images()
    {
        $title = 'All images';

        return view('home/images', compact('title'));
    }

    public function Contact()
    {
        $title = 'This is contact';

        return view('home/contact', compact('title'));
    }

    public function Fileup()
    {

        $title = 'Subir Archivos';

        return view('files/fileup', compact('title'));
    }

    public function addComments()
    {

        $comment = Comment::create(self::getPost());
        $notification = new Notification;

        $notification = new Notification;
        $notification->notification_id = $comment->id;
        $notification->type= 'comment';
        $notification->save();
        echo '1';
        return true;
    }

    public function allComments()
    {
        $allComments = Comment::join('users', 'comments.user_id', '=', 'users.id')
            ->select('users.names', 'users.last_names', 'comments.comment', 'comments.created_at', 'users.id')
            ->limit(10)
            ->get();
        header("Content-type:appliaction/json");
        echo $allComments->toJson();
        die();
    }

    public function logout(){

        if (self::checkUser()) {
            $logout_service = $this->auth_factory->newLogoutService($this->adapter);
            $logout_service->logout($this->auth);
            return $this->redirect(BASE_PUBLIC, 500);
        } else {
            return $this->redirect(BASE_PUBLIC, 500);
        }
    }
    public function shareFile()
    {
        $data = self::getPost();
        $people_shares = $data['people-share'];
        $file = $data['file'];
        //print_r($data);
        //die();
        foreach($people_shares as $user){
            $share = new Shared;
            $share->of_who = 2;
            $share->for_who = $user;
            $share->file_id = $file;
            $share->save();

            $notification = new Notification;
            $notification->notification_id = $share->id;
            $notification->type= 'shared';
            $notification->save();

            unset($share, $notification);

        }
        echo '1';
        return true;

    }

    public function notifications()
    {
        $notifications = Notification::all();
        return view('admin/users/notifications', compact('notifications'));
    }

    public function checkNotifications()
    {
        $total = Notification::where('state','1')->count();
        echo $total;
        return true;
    }
}