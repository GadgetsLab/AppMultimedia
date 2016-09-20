<?php $this->layout('layout/base'); ?>
<h1>Archivos</h1>

<select name="" id="">
    <option value="" disabled>Filtrar por Categoria</option>
    <option value="0">Todos</option>
    <option value="1">Videos</option>
    <option value="2">Imagenes</option>
    <option value="3">Archivos</option>
</select>

<ul>
    <?php foreach($files as $file): ?>
        <li>
            <h3><?php route('admin/files/',$file->title,$file->id) ?></a></h3>
            <p>Description: <?= $this->e($file->description) ?></p>
            <p>Tipo: <?= $this->e($file->format->type)?></p>
        </li>
    <?php endforeach?>

</ul>
