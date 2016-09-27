<?php $this->layout('layout/base'); ?>
<div class="row">
	<div class="col s12 m6 l6">
		<h3 class="n_user"><?= $user->names ?></h3>
		<img class="materialboxed center" src="https://blog.seibert-media.net/wp-content/uploads/2011/01/Avatar_Martin-Seibert1.png">
	</div>
	<div class="col s12 m6 l6">
		<h5> Mi infrmación </h5>
		<ul>
			<li>
				<strong>Nombres :</strong> 
				<?= utf8_encode($user->names); ?>
			</li>
			<li>
				<strong>Apellidos :</strong>
				<?= utf8_encode($user->last_names); ?></li>
			<li>
				<strong>Correo :</strong> 
				<?= $user->email ?></li>
			<li>
				<strong>Tipo de usuario:</strong> 
				<?php if ($user->rol_id == 1): ?>
					Administrador
				<?php elseif ($user->rol_id == 2): ?>
					Moderador
				<?php elseif ($user->rol_id == 3): ?>
					Usuario
				<?php elseif ($user->rol_id == 4): ?>
					Invitado
				<?php endif ?></div>
			</li>
		</ul>
		<?= route('admin/users/'.$user->id.'/edit', '<i class="material-icons tiny">mode_edit</i> <span>Editar</span>', null, ['class' => 'btn lime darken-4']) ?>
	</div>
</div>