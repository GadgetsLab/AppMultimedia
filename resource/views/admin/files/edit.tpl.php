<form action="<?= BASE_PUBLIC ?>/admin/files/<?= $file->id ?>" method="post" enctype="multipart/form-data" >
    <label for="title_file">Título del Archivo</label>
    <input type="text" value="<?= $file->title?>" name="title_file" required></br></br>
    <label for="user_file">Subir Archivo</label>
    <input type="file" name="user_file"></br></br>
    <textarea name="description" id="" cols="30" rows="10" placeholder="Descripcion"><?= $file->description ?></textarea></br></br>
    <button>Guardar</button>
</form>