<?php


namespace RDuuke\Newbie\Controllers;


use MartynBiz\Slim3Controller\Controller;

class VideoController extends Controller
{
    protected $newFile;
    protected $uploadNameFile;

    public function Upload($request)
    {
        self::setRequest($request);
        $files = $this->request->getUploadedFiles();

        if ( empty($files['video'])) {
            throw new \Exception('Expected a newfile');
        }

        $this->newFile = $files['video'];

        if ($this->newFile->getError() === UPLOAD_ERR_OK) {

            $this->uploadN3ameFile = $this->newFile->getClientFilename();
            $this->newFile->moveTo(ROOT .'../resource/'.$this->uploadNameFile);

        }
    }
}