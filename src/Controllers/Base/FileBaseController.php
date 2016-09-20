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
        $files = Files::all();

        return view('admin/files/index', compact('files'));
    }

    public function Create()
    {
        return view('admin/files/create');
    }

    public function Show($id)
    {
        $file = Files::find($id);
        return view('admin/files/show', compact('file'));

    }

    public function Edit($id)
    {
        $file = Files::find($id);

        return view('admin/files/edit', compact('file'));
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

    public function Update($id, $request)
    {
        //self::setRequest($request);
        //$data = $this->request->getParsedBody();
        //echo "<pre>";
        //print_r($data);

        self::setRequest($request);
        $data = self::getPost();
        $f = $this->request->getUploadedFiles();
        $file_client = $f['user_file'];
        //print_r($file_client->getClientFileName());
        //die();
        $file = Files::find($id);
        $file->title = $data['title_file'];
        $file->description = $data['description'];
        $v = validateFile($file_client);
        if ($v != false) {
            try{

                //unlink(RESOURCE.$file->url);
                $path = formatInfo(1, $v['format'],$file_client->getClientFileName());
                if($path === false){
                    return false;
                }
                $file->url = $path['saveIn'];
                $file->format_id = $path['id_format'];
                $f['user_file']->moveTo($path['MoveTo']);
            }
            catch(\Exception $e){
                echo '<pre>';
                printf($e);
            }
        }
        $file->save();

        return view('admin/files/result');


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

    public function FilterResult($typeFile, $limit, $oldResponse)
    {
        //$files = Files::whereBetween('format_id', array($typeFile, $limit))->get();
        //header("Content-type:application/json");
        //echo json_encode($files);
        $files = filter($typeFile, $limit);
        if(! $files) {
            echo "0";
            return false;
        }
        header("Content-type:appliaction/json");
        echo $files->toJson();
        die();
        //echo json_encode($files);
         //$newresponse = $oldResponse->withHeader('Content-type','application/json');
       // $newresponse->withJson($files);
        //return $newresponse;


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