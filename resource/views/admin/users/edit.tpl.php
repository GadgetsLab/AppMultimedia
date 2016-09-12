<form action="<?= BASE_PUBLIC ?>/admin/users/<?= $user->id ?>" method="PUT">
    <input type="text" name="names" value="<?= $user->names ?>" required placeholder="Nombres"><br>
    <input type="text" name="last_names" value="<?= $user->last_names ?>" required placeholder="Apellidos"><br>
    <input type="email" name="email" value="<?= $user->email ?>" required placeholder="Correo"><br>
    <select name="role_id" id="role_id">
        <option value="1">Administrador</option>
    </select><br>
    <button>Actualizar</button>
</form>