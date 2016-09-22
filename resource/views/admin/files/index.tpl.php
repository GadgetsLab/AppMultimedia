<<<<<<< HEAD
<?php $this->layout('layout/base'); ?>
=======
<<<<<<< HEAD
<?php $this->layout('layout/baseAdmin'); ?>
=======
<?php $this->layout('layout/base'); ?>
>>>>>>> d354018317d5f8faac7490ad7d89fc988051678a
>>>>>>> 1a3ad17fc7e8fce2415998fae078da77b274a1f8
<h1>Archivos</h1>
<select name="format" id="type">
    <option value="" selected disabled>Filtrar por tipos</option>
    <option value="0">Todos</option>
    <option value="1">Videos</option>
    <option value="2">Imagenes</option>
    <option value="3">Archivos</option>
</select>

<ul id="files">
    <?php foreach($files as $file): ?>
        <li>
            <h3><?php route('admin/files/',$file->title,$file->id) ?></h3>
            <p>Description: <?= $this->e($file->description) ?></p>
            <p>Tipo: <?= $this->e($file->type)?></p>
            <!--<p><?php //route('admin/files/','Eliminar archivo',$file->id) ?></p>-->
        </li>
    <?php endforeach?>
</ul>
