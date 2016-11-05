<?php

namespace RDuuke\Newbie\Controllers;


use MartynBiz\Slim3Controller\Controller;
use RDuuke\Newbie\Comment;
use RDuuke\Newbie\File;
use RDuuke\Newbie\Shared;
use RDuuke\Newbie\Notification;


class HomeController extends Controller
{

    public function Index()
    {
        //mailer();
        $title = 'Didactico repository';
        self::Files();

    }

    public function Home()
    {
        return view('home/login', compact('title'));
    }

    public function Files()
    {
        $title = 'All videos';

        if (self::checkUser()) {
            $files = File::all();
            $user = (object)$this->auth->getUserData();
            return view('home/index', compact('title', 'user', 'files'));
        }
        return $this->redirect(BASE_PUBLIC, 200);

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
        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            return view('home/images', compact('title', 'user'));
        }
        return $this->redirect(BASE_PUBLIC, 200);
    }

    public function Contact()
    {
        $title = 'This is contact';

        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            return view('home/contact', compact('title', 'user'));
        }
        return $this->redirect(BASE_PUBLIC, 200);
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
        $notification->notification_id = $comment->id;
        $notification->type= 'comment';
        $notification->save();
        echo '1';
        return true;
    }

    public function allComments($id)
    {
        $allComments = Comment::join('users', 'comments.of_who', '=', 'users.id')
            ->select('users.names', 'users.last_names', 'comments.comment', 'comments.created_at', 'users.id')
            ->where(['comments.file_id' => $id])
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
            return $this->redirect(BASE_PUBLIC, 200);
        } else {
            return $this->redirect(BASE_PUBLIC, 200);
        }
    }
    public function shareFile()
    {
        $data = self::getPost();
        $people_shares = $data['people-share'];
        $file = $data['file'];

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
        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            $notifications = Notification::all();
            return view('admin/users/notifications', compact('notifications', 'user'));
        }
        return $this->redirect(BASE_PUBLIC, 200);
    }

    public function notification_update()
    {
        $data = self::getPost();
        $where = ['notification_id' => $data['id']];
        Notification::where($where)->update(['state' => 1]);
        return true;
    }

    public function checkNotifications()
    {
        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            $total = countNotifications($user->id);
            echo $total;
            return true;
        }
    }
    public function report()
    {
        self::checkUser();
        $user = (object) $this->auth->getUserData();
        $email = $user->email;
        $data = self::getPost();
        $type_report = $data['type-report'];
        $comment = $data['comment'];
        $file = $data['file'];
        $send = mailer($email, $comment, $type_report, $file);
        if($send) {
            echo '1';
            return true;
        }
        echo '0';
        return false;

    }
}