<?php $this->layout('layout/base'); ?>
<h1 class="text-center">Archivos</h1>
<select name="format" id="type">
    <option value="" selected disabled>Filtrar por tipos</option>
    <option value="0">Todos</option>
    <option value="1">Videos</option>
    <option value="2">Imagenes</option>
    <option value="3">Archivos</option>
</select>
<div class="row"> 
    <?php foreach($files as $file): ?>
        <div class="col s12 m6 l6">
            <div class="panel hoverable"> 
                <div class="panel-title  blue darken-1"> 
                    <h4><?= $file->title ?></h4>
                </div>
                <div class="panel-body"> 
                    <p>Description: <?= $this->e($file->description) ?></p>
                    <p>Tipo: <?= $this->e($file->type)?></p>
                    <?= route('admin/files/'.$file->id, 'Ver', null, ['class' => 'btn blue darken-1']) ?>
                </div>
            </div>
        </div>
    <?php endforeach?>
</div>