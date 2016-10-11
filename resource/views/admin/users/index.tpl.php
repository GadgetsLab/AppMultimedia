<?php $this->layout('layout/base', ['user' => $user]); ?>
<!-- <div class="container">  -->
	<div class="row"> 
		<div class="col s8 create_user_btn"> 
			<h5>Usuarios</h5>
		</div>
		<div class="col s4 create_user_btn">
			<?= route('admin/users/create', '<i class="material-icons tiny">person_pin</i>', null, ['class' => 'btn  light-blue darken-3']) ?>
		</div>
		<div class="col s12"> 
			<table class="table bordered">
				<thead>
					<tr>
						<td><span class="">Id</span></td>
						<td><span class="">Nombre</span></td>
						<td><span class="">Correo</span></td>
						<td><span class="">Rol</span></td>
						<td colspan="2"><span class="">Accion</span></td>
					</tr>
				</thead>
				<tbody> 
		    	<?php foreach ($users as $value): ?>
					<tr>
						<td><?= $this->e($value->id);?></td>
						<td><?= $this->e($value->getFullNameAttribute())?></td>
						<td><?= utf8_encode($this->e($value->email))?></td>
						<td><?= $this->e($value->rol->name) ?></td>
						<td>
							<?= route('admin/users/'.$value->id.'/edit', '<i class="material-icons tiny">mode_edit</i>', null, ['class' => 'btn blue']) ?>
						</td>
						<td>
							<?= route('admin/users/'.$value->id.'/destroy', '<i class="material-icons tiny">delete</i>', null, ['class' => 'btn blue lighten-3']) ?>
						</td>
					</tr>	
		    	<?php endforeach?>
				</tbody>
			</table>
		</div>
	</div>
<!-- </div> -->