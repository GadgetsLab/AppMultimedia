<?php $this->layout('layout/base', ['user' => $user]); ?>
<h4><?= $this->e($file->title); ?></h4>
<div class="card">
	<?php include 'partial/'.$type->type.'.tpl.php'; ?>
	<div class="card-content">
		<p><?= $this->e($file->description) ?></p>
		<h5>Opciones:</h5>
	</div>
	<div class="card-action">
		<a href="<?= $this->e(BASE_URL.'/resource/'.$file->url); ?>" download="true">
			<i class="material-icons small blue-text">system_update_alt</i>
		</a>
		<a href="#">
			<i class="material-icons small green-text">thumb_up</i>
		</a>
		<a  href="#comment" class="modal-trigger">
			<i class="material-icons small  blue-grey-text">comment</i>
		</a>
		<a  class="modal-click" href="#">
			<i class="material-icons small deep-purple-text">person_pin</i>
		</a>
		<a class="modal-trigger" href="#report">
			<i class="material-icons small red-text right ">report_problem</i>
		</a>
	</div>
	<ul id="allComments" class="collection">
	</ul>
	<?php include 'partial/comments.tpl.php';?>
	<?php include 'partial/report.tpl.php';?>
	<?php include 'partial/user_share.tpl.php';?>
	<script>
		document.addEventListener("DOMContentLoaded", function(){
			var id = j('#file_id').val();
			functions.allcomments(id);
		});
	</script>

