<?php $this->layout('layout/base', ['user' => $user]); ?>
<h4><?= $this->e($file->title); ?></h4>
<div class="card">
	<?php include 'partial/'.$type->type.'.tpl.php'; ?>
	<div class="card-content">
		<p><?= $this->e($file->description) ?></p>
	</div>
    <h3>Opciones</h3>
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
        <a  class="modal-click" href="#">
            <i class="material-icons small deep-purple-text">person_pin</i>
        </a>
		<a class="modal-trigger" href="#report">
	    	<i class="material-icons small red-text right ">report_problem</i>
		</a>
</div>

	<?php include 'partial/report.tpl.php';?>
	<?php include 'partial/user_share.tpl.php';?>


