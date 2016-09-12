<?php

namespace RDuuke\Newbie\Controllers;


use MartynBiz\Slim3Controller\Controller;

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
        
        return view('home/videos', compact('title'));

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

    public function Fileup(){

        $title = 'Subir Archivos';

        return view('files/fileup', compact('title'));
    }
}