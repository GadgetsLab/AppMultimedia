<?php $this->layout('layout/base', ['user' => $user]); ?>
<br>
<div class="col s12 m4 l6 offset-s4 offset-l3 center-align">
    <div class="row">
        <div class="input-field col s12">
            <label for="filter-home">Filtro de archivos</label><br>
            <select class="browser-default" id="filter-home">
                <option value="" selected disabled>Elija una opción</option>
                <option value="1">Documentos</option>
                <option value="2">Imagenes</option>
                <option value="3">Videos</option>
            </select>
        </div>
    </div>
</div>
<?php foreach ($files as $file): ?>
<div class="card">
    <div class="card-content">
        <span class="card-title activator grey-text text-darken-4">
            <?= $this->e($file->title) ?> </span>
        <p>
            <a href="#">
                <span class="badge  light-blue left" style="color: #fff; position: relative;margin-left: 15px;">
                    <?= $this->e($file->user->getFullNameAttribute()) ?> </span>
            </a>
            <a href="<?= BASE_PUBLIC ?>/files/<?= $file->id ?>">
                <span class="badge grey  right" style="color: #fff;position:relative;">Ver</span>
            </a>
            <a href="#">
                <span class="badge blue lighten-3 left" style="color: #fff;position: relative">
                    <?php getNameType($file->format->type_id) ?>
                </span>
            </a>
        <div class="clearfix"></div>
        </p>
    </div>
    <div class="card-reveal">
        <span class="card-title grey-text text-darken-4"><i class="material-icons right ">close</i></span>
        <p>Descripcion: <?= $this->e($file->description); ?>
        </p>
    </div>
</div>
<?php endforeach; ?>
