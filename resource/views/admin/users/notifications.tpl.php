<?php $this->layout('layout/base', ['user' => $user]); ?>

<h3>Tus notificaciones</h3>
<div class="row">
    <?php foreach($notifications as $notification):?>
        <?php if ($notification->shared->for_who == $user->id): ?>
            <?php  include('partial/'.$notification->type.'s_notifications.tpl.php');?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>