<?php $this->layout('layout/base', ['user' => $user]); ?>

<h3>Tus notificaciones</h3>
<div class="row">
    <?php foreach($notifications as $notification):?>
            <?php  include('partial/'.$notification->type.'s_notifications.tpl.php');?>
    <?php endforeach; ?>
</div>