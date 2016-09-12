<?php

namespace RDuuke\Newbie\Controllers;

use MartynBiz\Slim3Controller\Controller;
use RDuuke\Newbie\Files;

class FileController extends Controller
{

    protected $file;

    public function SaveFile($request)
    {

        //return view('files/result');
        $data = $_POST;
        self::setRequest($request);
        //$this->request->getUploadedFiles();
        $files = $this->request->getUploadedFiles();
        $this->file = $files['user_file'];
        if($this->file->getError() === UPLOAD_ERR_OK){
            $format = end(explode('.', $this->file->getClientFileName()));
            //$validateFormat = formatType($format); //$validateFormat = formatInfo($format, $this->file->getClientFileName)
            $validateFormat = formatInfo('1',$format, $this->file->getClientFileName());
            //print_r($validateFormat);
            //die();
            try{

                if ($validateFormat != false) {


                    //$this->file->moveTo(RESOURCE.$this->file->getClientFileName());
                    $this->file->moveTo($validateFormat['saveIn']);
                    $fr = new Files();
                    $fr->title = $this->file->getClientFileName();
                    $fr->description = $data['description'];
                    $fr->url = $validateFormat['saveIn'];//$this->file->getClientFileName();
                    $fr->format_id = $validateFormat['id_format'];
                    $fr->user_id = 2;
                    $fr->materia_id = 1;
                    $fr->save();

                    echo 'Se guardo';
                    die();
                }
                else{
                    throw new \Exception('Invalid Format');
                }

            }
            catch(\Exception $e){

                print $e;
                die();
            }

        }

        return view('files/result', compact('name'));

    }
}