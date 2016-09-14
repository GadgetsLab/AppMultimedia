<?php
/**
 * Created by PhpStorm.
 * User: SrDaniel
 * Date: 13/09/2016
 * Time: 10:46
 */

namespace RDuuke\Newbie\Controllers\Base;


use MartynBiz\Slim3Controller\Controller;
use RDuuke\Newbie\Files;

class FileBaseController extends Controller
{

    protected $file;

    public function Index()
    {
        $users = User::all();

        return view('admin/users/index', compact('users'));
    }

    public function Create()
    {
        return view('files/create');
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

    public function Store($request)
    {
        //return view('files/result');
        self::setRequest($request);
        $data = self::getPost();

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
                    $this->file->moveTo($validateFormat['MoveTo']);
                    $fr = new Files();
                    $fr->title = $data['title_file'];//$this->file->getClientFileName();
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

    public function Update($id)
    {
        $user = User::find($id);
        $request = self::getPost();
    }

    public function Destroy($id)
    {

        $dl = Files::findOrFail($id);
        if(unlink(RESOURCE.$dl->url)){
            $dl->delete();
        }
        return false;
        // TODO: Implement Destroy() method.
    }
/*
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
                    $fr->title = $data['title_file']//$this->file->getClientFileName();
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
*/
}