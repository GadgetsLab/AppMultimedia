<form action="<?= BASE_PUBLIC ?>/admin/users" method="post">
    <input type="text" name="names" required placeholder="Nombres"><br>
    <input type="text" name="last_names" required placeholder="Apellidos"><br>
    <input type="email" name="email" required placeholder="Correo"><br>
    <input type="password" name="password" required placeholder="Contraseña"><br>
    <select name="role_id" id="role_id">
        <option value="1">Administrador</option>
    </select><br>
    <button>Guardar</button>
</form>