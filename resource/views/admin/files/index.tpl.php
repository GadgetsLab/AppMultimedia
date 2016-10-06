<?php $this->layout('layout/base', ['user' => $user ]); ?>
<select name="format" id="type" class="browser-default">
    <option value="" selected disabled>Filtrar por tipos</option>
    <option value="0">Todos</option>
    <option value="1">Videos</option>
    <option value="2">Imagenes</option>
    <option value="3">Archivos</option>
</select>
<div class="row"> 
    <table> 
        <thead>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Descripcción</td>
                <td>Tipo</td>
                <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($files as $file): ?>
                <tr>
                    <td><?= $file->id ?></td>
                    <td><?= route('admin/files/'.$file->id, $file->title, null, ['class' => 'my_class']) ?></td>
                    <td><?= $this->e($file->description) ?></td>
                    <td><?= $this->e($file->type)?></td>
                    <td>
                        <?= route('admin/files/'.$file->id.'/edit', '<i class="material-icons tiny">mode_edit</i>', null, ['class' => 'btn blue']) ?>
                    </td>
                    <td>
                        <?= route('admin/files/'.$file->id.'/destroy', '<i class="material-icons tiny">delete</i>', null, ['class' => 'btn blue darken-4']) ?>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>