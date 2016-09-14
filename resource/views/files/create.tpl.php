
<form action="<?= BASE_PUBLIC ?>/admin/files" method="post" enctype="multipart/form-data" >
    <label for="title_file">Título del Archivo</label>
    <input type="text" name="title_file" required></br></br>
    <label for="user_file">Subir Archivo</label>
    <input type="file" name="user_file"></br></br>
    <textarea name="description" id="" cols="30" rows="10" placeholder="Descripcion"></textarea></br></br>
    <button>Enviar</button>
</form>