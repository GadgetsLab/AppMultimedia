<?php


function getNameType($type_id)
{
    $name = \RDuuke\Newbie\Type::select('type')->find($type_id);
    echo $name['type'];
}
function countNotifications($user_id)
{
    $where = ['notifications.state' => '0', 'shareds.for_who' => $user_id ];
    $count = \RDuuke\Newbie\Notification::join('shareds', 'notifications.notification_id','=','shareds.id')
        ->where($where)
        ->count();
    $where = ['notifications.state' => '0', 'comments.for_who' => $user_id ];
    $count_ = \RDuuke\Newbie\Notification::join('comments', 'notifications.notification_id','=','comments.id')
        ->where($where)
        ->count();
    return $count + $count_;
}
function allFiles()
{
    $all = \RDuuke\Newbie\File::join('formats', 'files.format_id','=','formats.id')
        ->join('types','formats.type_id','=','types.id')
        ->select('files.id', 'files.title', 'files.description', 'files.url','types.type')
        ->get();

    return $all;

}
function validateFile($file)
{
    if($file->getError() === UPLOAD_ERR_OK){
        $format = end(explode('.', $file->getClientFileName()));
        $result = ['format'=> $format];
        return $result;
    }
    return false;
}

function formatInfo($iduser, $format, $nameFile){ //cambiar por formatInfo($format,$nameFile)

    //$fr = RDuuke\Newbie\Format::find(1);
    $fr = RDuuke\Newbie\Format::where('name',$format)->first();

    $tp = RDuuke\Newbie\Type::find(''.$fr->type_id.'');

    if($fr != null){

        $info = ['id_format' => $fr->id,
            'MoveTo' => RESOURCE.$iduser.DS.$tp->type.'s'.DS.date('D-M-Y_h_s').'_'.$nameFile,
            'saveIn' => $iduser.DS.$tp->type.'s'.DS.date('D-M-Y_h_s').'_'.$nameFile];
        return $info; // return $info = ['id' => $f->id, 'saveIn' => RESOURCE.$f->type.$nameFile ];

    }


    return false;

}

function filter($type)
{

    if($type == 0) {
        $fls = allFiles();
    }
    else{
        $fls = \RDuuke\Newbie\File::join('formats','files.format_id', '=', 'formats.id' )
            ->join('types','formats.type_id','=','types.id')
            ->select('files.id', 'files.title', 'files.description', 'files.url', 'types.type')
            ->where('formats.type_id',$type)
            ->get();
    }

    return $fls;


}


function view($template, $parameters = [])
{
    $tmpl = new \League\Plates\Engine('..\resource\views', 'tpl.php');
    echo $tmpl->render($template, $parameters);
}

/**
 * The redirect function, redirect to a specific path.
 *
 * @param $route
 */
function redirect($route)
{
    $route = BASE_PUBLIC.'/'.$route;
    header('Location: '.$route);
}

/**
 * @param $route
 */
function style($route)
{
    echo "<link rel='stylesheet' href='".BASE_URL.'/public/'.$route."'>";
}

/**
 * @param $route
 */
function script($route)
{
    echo "<script src='".BASE_URL.'/public/'.$route."'></script>";
}

/**
 * @param $route
 * @param $title
 * @param null $id
 * @param null $attributes
 */
function route($route, $title, $id = null, $attributes = null)
{
    if (!$id == null) {
        $tpl = "<a href='".BASE_PUBLIC.'/'.$route.$id."'";
    } else {
        $tpl = "<a href='".BASE_PUBLIC.'/'.$route."'";
    }
    if (is_array($attributes)) {
        foreach ($attributes as $clave => $valor) {
            $tpl .= $clave."= '".$valor."'";
        }
    }
    $tpl .= '>'.$title.'</a>';
    echo $tpl;
}

/**
 * @param $name
 * @param $message
 */
function newFlashMessage($name, $message, $type = 'news')
{
    $_SESSION[$name] = $message;
    $_SESSION['type'] = $type;
}
/**
 * @param $name
 *
 * @return bool
 */
function getFlashMessage($name)
{
    if (!isset($_SESSION[$name])) {
        return false;
    }

    return true;
}

/**
 * @param $name
 * @param string $type
 */
function printFlashMessage($name)
{
    $chip = "<div class='chip ".$_SESSION['type']."'>".$_SESSION[$name]."<i class='material-icons'>close</i></div>";
    echo $chip;
    unset($_SESSION[$name]);
    unset($_SESSION['type']);
}

/**
 * @param array $data
 * @param $key
 * @param $value
 *
 * @throws Exception
 *
 * @return array
 */
function arrayAdd($data, $key, $value)
{
    if (is_array($data)) {
        $data[$key] = $value;

        return $data;
    }
    throw new \Exception('It was expected an array');
}

/**
 * @param array $data
 *
 * @throws Exception
 *
 * @return mixed
 */
function arrayFirst($data = [])
{
    if (is_array($data)) {
        $value = array_shift($data);

        return $value;
    }
    throw new \Exception('The value transform is not an array');
}

/**
 * @param array $data
 *
 * @throws Exception
 *
 * @return mixed
 */
function arrayLast($data = [])
{
    if (is_array($data)) {
        $value = array_pop($data);

        return $value;
    }
    throw new \Exception('The value transform is not an array');
}

/**
 * @param array $array
 *
 * @throws Exception
 *
 * @return string
 */
function arrayJson($array = [])
{
    if (is_array($array)) {
        return json_encode($array);
    }
    throw new \Exception('The value transform is not an array');
}

/**
 * @param $json
 *
 * @return mixed
 */
function jsonObject($json)
{
    return json_decode($json);
}

/**
 * @param $json
 *
 * @return mixed
 */
function jsonArray($json)
{
    return json_decode($json, JSON_FORCE_OBJECT);
}

/**
 * @param $value
 * @param $limit
 *
 * @throws Exception
 *
 * @return string
 */
function strLimit($value, $limit = 10)
{
    if (is_numeric($limit)) {
        if (is_string($value)) {
            $string = substr($value, 0, $limit).'...';

            return $string;
        }
        throw new \Exception('The value must be a string value');
    }
    throw new \Exception('The limit must be a numeric value');
}

/**
 * @param int $limit
 *
 * @throws Exception
 *
 * @return string
 */
function strRandom($limit = 10)
{
    if (is_numeric($limit)) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $limit; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
    throw new \Exception('The limit must be a numeric value');
}

function mailer($from,$message = '', $subject, $file)
{
    $email = new PHPMailer;
    $email->SetFrom($from,'Usuario Aplicacion');
    $email->AddAddress('reickchozo@gmail.com','Administrator');
    $email->Subjetc = $subject;
    $email->MsgHTML("<h3>Mensaje de Reporte</h3>
                     <br>
                     <strong>Asunto: ".$subject."</strong>
                     <strong>Archivo: ".$file."</strong>
                     <br><br>
                     <p><strong>Menrsaje:</strong>".$message."</p>
                     <br><strong>Fecha</strong>: ".date('Y-M-D'));
    try{
        if($email->Send()){
            return true;
        }
    }
    catch(\Exception $e){
        print $e;
    }

}