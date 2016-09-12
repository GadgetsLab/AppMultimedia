<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php $title = (empty($title)) ? 'Framewok Newbie' : $title ; ?>
    <title><?php echo $title; ?></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php // style('css/template.css'); ?>
    <?php //style('css/materialize.min.css'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
    <header>
        <nav>
            <ul id="menu">
                <li><a href="<?= BASE_PUBLIC ?>">Inicio</a></li>
                <li><a href="<?= BASE_PUBLIC ?>/videos">Todos los videos</a></li>
                <li><a href="<?= BASE_PUBLIC ?>/images">Todas las imagens</a></li>
                <li><a href="<?= BASE_PUBLIC ?>/contact">Contacto</a></li>
            </ul>
        </nav>
        <nav>
            <ul id="actions">
                <li><a href="<?= BASE_PUBLIC ?>/fileup">Subir archivo</a></li>
                <li><a href="<?= BASE_PUBLIC ?>/users/1/videos">Mis videos</a></li>
                <li><a href="<?= BASE_PUBLIC ?>/users/1/imagenes">Mis imagenes</a></li>
                <li><a href="<?= BASE_PUBLIC ?>/users/1">Mi perfil</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <?= $this->section('content')?>
    </div>
    <?php script('js/jquery.min.js')?>
    <?php script('js/materialize.min.js')?>
    <?php script('js/template.js'); ?>
</body>
</html>