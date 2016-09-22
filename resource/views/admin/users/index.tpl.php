<?php $this->layout('layout/base'); ?>
<!-- <div class="container">  -->
	<div class="row"> 
		<div class="col s8 create_user_btn"> 
			<h5>Home Usuarios en panel admin</h5>
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
						<td><?= $this->e($value->getFullNameAttribute());?></td>
						<td><?= utf8_encode($this->e($value->email));?></td>
						<td>
							<?php if ($value->rol_id == 1): ?>
								Administrador
							<?php elseif ($value->rol_id == 2): ?>
								Moderador
							<?php elseif ($value->rol_id == 3): ?>
								Usuario
							<?php elseif ($value->rol_id == 4): ?>
								Invitado
							<?php endif ?>		
						</td>
						<td>
							<?= route('admin/users/'.$value->id.'/edit', '<i class="material-icons tiny">mode_edit</i>', null, ['class' => 'btn lime darken-4']) ?>
						</td>
						<td>
							<?= route('admin/users/'.$value->id.'/destroy', '<i class="material-icons tiny">delete</i>', null, ['class' => 'btn red darken-4']) ?>
						</td>
					</tr>	
		    	<?php endforeach?>
				</tbody>
			</table>
		</div>
	</div>
<!-- </div> -->