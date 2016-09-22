<?php $this->layout('layout/base'); ?>
<div class="row"> 
	<div class="col s12"> 
		<hr>
		<form action="<?= BASE_PUBLIC ?>/admin/users/<?= $user->id ?>" method="PUT">
			<div class="row">
				<div class="input-field col s12"> 
				    <input type="text" name="names" value="<?= $user->names ?>" required placeholder="Nombres">
				    <label class="active" for="first_name2">Nombres</label>
				</div>
				<div class="input-field col s12">
				    <input type="text" name="last_names" value="<?= $user->last_names ?>" required placeholder="Apellidos">
				    <label class="active" for="first_name2">Apellidos</label>
				</div>
				<div class="input-field col s12">
				    <input type="email" name="email" value="<?= $user->email ?>" required placeholder="Correo">
					<label class="active" for="first_name2">E-Mail</label>
				</div>
				<div class="input-field col s12"> 
				    <select name="role_id" id="role_id">
				        <option value="1">Administrador</option>
				    </select>
				</div>
				<div class="input-field col s12"> 
				    <button class="btn blue darken-3">Actualizar</button>
				</div>
			</div>
		</form>
	</div>
</div>