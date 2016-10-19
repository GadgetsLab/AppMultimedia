<?php $this->layout('layout/base', ['user' => $user]); ?>
<div class="row">
	<div class="col s8 l6">
		<h4 class="n_user">Perfil de: <?= $user->getFullNameAttribute() ?></h4>
		<h5> Información </h5>
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
				<?= $this->e(ucwords($user->rol->name)) ?>
			</li>
		</ul>
		<?= route('admin/users/'.$user->id.'/edit', '<i class="material-icons tiny">mode_edit</i> <span>Editar</span>', null, ['class' => 'btn blue darken-4']) ?>
	</div>
	<div class="col s4 l6">
		<h4>Archivos</h4>
		<h5>Total archivos subidos:
			<strong>
				<a href="<?= BASE_PUBLIC ?>/user/<?= $user->id ?>/files"><?= $this->e($total_post) ?></a>
			</strong>
		</h5>
	</div>
</div>