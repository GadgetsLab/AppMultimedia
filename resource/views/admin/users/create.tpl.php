<?php $this->layout('layout/base'); ?>
<div class="row"> 
	<div class="dol s12">
		<h4 class="text-center">Creación de Usuarios</h4> 		
		<hr>
		<form action="<?= BASE_PUBLIC ?>/admin/users" method="post">
		    <div class="input-field col s12"> 
		    	<input type="text" name="names" required>
		    	<label class="active" for="first_name2">Nombres</label>
		    </div>
		    <div class="input-field col s12"> 
		    	<input type="text" name="last_names" required>
		    	<label class="active" for="first_name2">Apellidos</label>
		    </div>
		    <div class="input-field col s12"> 
		    	<input type="email" name="email" required>
		    	<label class="active" for="first_name2">E-Mail</label>
		    </div>
		    <div class="input-field col s12"> 
		    	<input type="password" name="password" required>
		    	<label class="active" for="first_name2">Contraseña</label>
		    </div>
		    <div class="input-field col s12"> 
			    <select name="role_id" id="role_id">
			        <option value="1">Administrador</option>
			    </select>
		    </div>
		    <div class="input-field col s12"> 
		    	<button class="btn blue darken-3">Guardar</button>
		    </div>
		</form>
	</div>
</div>