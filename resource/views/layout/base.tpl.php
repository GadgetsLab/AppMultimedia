<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php $title = (empty($title)) ? 'Didactico repository' : $title ; ?>
    <title><?php echo $title; ?></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php style('css/template.css'); ?>
    <?php style('css/materialize.min.css'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<ul id="slide-out" class="side-nav">
    <li class="blue lighten-2">
        <a href="<?= BASE_PUBLIC ?>/users/1" class="waves-effect"><span class="white-text"> <i class="material-icons tiny">person_pin</i>&nbsp; Mi perfil </span></a>
    </li>
    <li class="blue lighten-2">
        <a href="#!email" class="waves-effect"><span class="white-text"><i class="material-icons tiny">cloud</i>&nbsp; Mis Archivos</span></a>
    </li>
    <li class="blue lighten-2">
        <a href="#!" class="waves-effect"><span class="white-text"><i class="material-icons tiny">input</i>&nbsp; Cerrar sesión</a>
    </li>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="#!"><i class="material-icons tiny">video_library</i>&nbsp; Videos</a></li>
    <li><a class="waves-effect" href="#!"><i class="material-icons tiny">perm_media</i>&nbsp; Imagenes</a></li>
    <li><a class="waves-effect" href="#!"><i class="material-icons tiny">work</i>&nbsp; Documentos</a></li>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="#!"><i class="material-icons tiny">perm_device_information
            </i>&nbsp;  Contacto</a></li>
</ul>
<div class="navbar-fixed">
    <nav class="blue lighten-3">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        <a href="#" class="brand-logo thin">Didactic repository</a>
    </nav>
</div>
<div class="container">
<?= utf8_encode($this->section('content'))?>
</div>
<?php script('js/jquery.min.js')?>
<?php script('js/materialize.min.js')?>
<?php script('js/template.js'); ?>
</body>
</html>