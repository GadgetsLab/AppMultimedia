<div class="card-image">
	<div class="material-placeholder">
		<video controls class="full">
			<source src="<?= $this->e(BASE_URL.DS.'resource'.DS.$file->url) ?>">
		</video>
		<span class="card-title span_tit_video"><?= $this->e($file->title); ?></span>
	</div>
</div>