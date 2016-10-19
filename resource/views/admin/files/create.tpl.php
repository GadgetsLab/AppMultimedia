<?php $this->layout('layout/base', ['user' => $user]); ?>
<div class="row">
	<div class="col-s12 m12 l12">
		<?php if ($user->rol_id == 1): ?>
		<form action="<?= BASE_PUBLIC ?>/admin/files" method="post" enctype="multipart/form-data" >
			<?php else: ?>
			<form action="<?= BASE_PUBLIC ?>/files" method="post" enctype="multipart/form-data" >
				<?php endif; ?>
				<div class="row">
					<div class="input-field col s12 m12 l12">
						<input type="text" name="title_file" required>
						<label for="title_file">T&iacute;tulo del Archivo</label>
					</div>
					<div class="input-field col s12 m12 l12">
						<div class="file-field input-field">
							<div class="btn light-blue">
								<span>Seleccionar archivo</span>
								<input id="user_file" type="file" name="user_file">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
					</div>
					<div class="input-field col s12 m12 l12">
						<textarea name="description" id="textarea1" cols="30" rows="10" class="materialize-textarea"></textarea>
						<label for="textarea1">Descripci&oacute;n	</label>
					</div>
					<div class="input-field col s12 m12 l12">
						<button class="btn light-blue">Guardar</button>
					</div>
				</div>
			</form>
	</div>
</div>