<?php
namespace RDuuke\Newbie\Controllers;

use RDuuke\Newbie\Controllers\Base\FileBaseController;
use RDuuke\Newbie\File;

class FileController extends FileBaseController
{
    public function Index($id)
    {
        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            $files = File::all();
            return view('admin/files/index', compact('files', 'user'));
        }
        return $this->redirect(BASE_PUBLIC, 500);
    }

    public function Store($request)
    {
        if(self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            self::setRequest($request);
            $data = self::getPost();
            //$this->request->getUploadedFiles();
            $files = $this->request->getUploadedFiles();
            $this->file = $files['user_file'];
            if ($this->file->getError() == UPLOAD_ERR_OK) {
                $format = end(explode('.', $this->file->getClientFileName()));
                //$validateFormat = formatType($format); //$validateFormat = formatInfo($format, $this->file->getClientFileName)
                $validateFormat = formatInfo('1', $format, $this->file->getClientFileName());
                // echo '<pre>';
                // print_r($validateFormat);
                // die();
                try {
                    if ($validateFormat != false) {
                        //$this->file->moveTo(RESOURCE.$this->file->getClientFileName());
                        $this->file->moveTo($validateFormat['MoveTo']);
                        $fr = new File();
                        $fr->title = $data['title_file'];//$this->file->getClientFileName();
                        $fr->description = $data['description'];
                        $fr->url = $validateFormat['saveIn'];//$this->file->getClientFileName();
                        $fr->format_id = $validateFormat['id_format'];
                        $fr->user_id = $user->id;
                        $fr->materia_id = 1;
                        $fr->save();
                        return self::Index($user->id);
                    } else {
                        return view('admin/files/create');
                    }
                }catch( \Exception $e){
                    print_r($e);
                }
            } else {
                throw new \Exception('Invalid Format');
            }
        }
    }

}
