<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php $title = (empty($title)) ? 'Didactico repository' : $title ; ?>
    <title><?php echo $title; ?></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php style('css/template.css'); ?>
    <?php style('css/materialize.min.css'); ?>
    <?php style('css/chosen.min.css');?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        .containt{
            background-color: #f9f9f9;
            padding: 4em 0 !important;
            margin-top: 4em;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3 center-align containt">
            <h5 class="thin uppercase-text">The</h5>
            <i class="material-icons large blue-text">perm_media</i><br>
            <h5 class="thin uppercase-text">Didactico repository</h5>
            <br>
            <a class="btn blue modal-trigger" href="#login">Ingresar</a>
            <br>
            <br>
            <a class="btn blue darken-4">Registrate</a>
        </div>

        <div id="login" class="modal col s12 m4 offset-m4"style="left: 0; right: 0">
            <div class="modal-content center-align">
                <h5 class="thin center-align">Bienvenido</h5>
                <form id="formLogin">
                    <div class="row">
                        <div class="input-field col s12 m8 offset-m2">
                            <input id="username" type="email" class="validate" name="username">
                            <label for="username">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m8 offset-m2">
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password">Contraseña</label>
                        </div>
                    </div>
                </form>
                <button class="btn blue" id="postLogin">Ingresar!</button>
            </div>
            <!--<div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Ingresar</a>
            </div>-->
        </div>
    </div>
    <?php script('js/jquery.min.js')?>
    <?php script('js/materialize.min.js')?>
    <?php script('js/functions.js');?>
    <?php script('js/template.js'); ?>

    <script>
        j('.modal-trigger').leanModal();
    </script>
</body>
</html>