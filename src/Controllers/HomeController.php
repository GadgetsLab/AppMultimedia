<?php

namespace RDuuke\Newbie\Controllers;


use MartynBiz\Slim3Controller\Controller;
use RDuuke\Newbie\Comment;
use RDuuke\Newbie\Shared;

class HomeController extends Controller
{

    public function Index()
    {
        $title = 'Didactico repository';

        return view('home/index', compact('title'));
    }

    public function Videos()
    {
        $title = 'All videos';
        
        return view('home/item', compact('title'));

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

        Comment::create(self::getPost());
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
            unset($share);

        }
        echo '1';
        return true;

    }
}