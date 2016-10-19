<?php
namespace RDuuke\Newbie\Controllers\Base;
use MartynBiz\Slim3Controller\Controller;
use RDuuke\Newbie\File;
use RDuuke\Newbie\Type;
use RDuuke\Newbie\User;
use RDuuke\Newbie\Shared;

class FileBaseController extends Controller
{
    protected $file;
    public function Index()
    {
        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            $files = allFiles();
            return view('admin/files/index', compact('files', 'user'));
        }
        return $this->redirect(BASE_PUBLIC, 500);
    }
    public function Create()
    {
        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            $files = allFiles();
            return view('admin/files/create', compact('files', 'user'));
        }
        return $this->redirect(BASE_PUBLIC, 500);
    }
    public function Show($id)
    {
        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            $file = File::find($id);
            $type =  Type::find($file->format->type_id);
            $users = User::all();
            return view('admin/files/show', compact('file', 'user', 'type', 'users'));
        }
        //return redirect('');
        return $this->redirect(BASE_PUBLIC, 200);
    }
    public function Edit($id)
    {
        if (self::checkUser()) {
            $user = (object)$this->auth->getUserData();
            $file = File::find($id);
            return view('admin/files/edit', compact('file','user'));
        }
        return $this->redirect(BASE_PUBLIC, 500);
    }
    public function Store($request)
    {
        //return view('files/result');
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
                    $fr->user_id = 2;
                    $fr->materia_id = 1;
                    $fr->save();
                    return self::Index();
                } else {
                    return view('admin/files/index');
                }
            }catch( \Exception $e){
                print_r($e);
            }
        } else {
            throw new \Exception('Invalid Format');
        }
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
        $file = File::find($id);
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
        if(self::checkUser()){
            $user = (object)$this->auth->getUserData();
            $dl = File::findOrFail($id);
            if(unlink(RESOURCE.$dl->url)){
                $dl->delete();
                return self::Index();
            }
            return false;
        }

        // TODO: Implement Destroy() method.
    }
    public function FilterResult($typeFile)
    {
        //$files = Files::whereBetween('format_id', array($typeFile, $limit))->get();
        //header("Content-type:application/json");
        //echo json_encode($files);
        $files = filter($typeFile);
        if(! $files) {
            echo "0";
            return false;
        }
        header("Content-type:appliaction/json");
        echo $files->toJson();
        die();

    }
    public function ShareFile($id,$request)
    {
        self::setRequest($request);
        $data = self::getPost();
        if(! $data){
            echo "ALgo no esta bien";
            return false;
        }
        //header('Content-type: application/json');
        //echo json_encode($data);
        echo "<pre>";
        print_r($data);
        die();
    }

}