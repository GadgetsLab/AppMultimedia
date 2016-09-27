<?php $this->layout('layout/base'); ?>
<div class="row"> 
	<div class="col-s12 m12 l12"> 
		<form action="<?= BASE_PUBLIC ?>/admin/files" method="post" enctype="multipart/form-data" >
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<input type="text" name="title_file" required>
		    		<label for="title_file">Título del Archivo</label>
				</div>
				<div class="input-field col s12 m12 l12">
					<div class="file-field input-field">
					  <div class="btn">
					    <span>File</span>
					    <input id="user_file" type="file" name="user_file">
					  </div>
					  <div class="file-path-wrapper">
					    <input class="file-path validate" type="text">
					  </div>
					</div>
				</div>
				<div class="input-field col s12 m12 l12"> 
		    		<textarea name="description" id="textarea1" cols="30" rows="10" class="materialize-textarea"></textarea>
		    		<label for="textarea1">Descripcion	</label>
				</div>
				<div class="input-field col s12 m12 l12"> 
		    		<button class="btn">Enviar</button>
				</div>
			</div>
		</form>
	</div>
</div>