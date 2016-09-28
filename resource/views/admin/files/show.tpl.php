<?php $this->layout('layout/base'); ?>
<h4><?= $this->e($file->title); ?></h4>
<div class="card">
    <?php include 'partial/'.$type->type.'.tpl.php'; ?>
	<div class="card-content">
		<p><?= $this->e($file->description) ?></p>
	</div>
	<div class="card-action">
	    <a href="#">
	    	<i class="material-icons small blue-text">system_update_alt</i>
	    </a>
	    <a href="#">
	    	<i class="material-icons small green-text">thumb_up</i>
	    </a>
	    <a href="#">
	    	<i class="material-icons small deep-orange-text">thumb_down</i>
	    </a>
	    <a href="#">
	    	<i class="material-icons small  blue-grey-text">comment</i>
	    </a>
	    <i class="material-icons small red-text right ">report_problem</i>
	</div>
</div>