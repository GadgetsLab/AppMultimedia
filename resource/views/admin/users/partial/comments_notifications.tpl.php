<br>
<?php if($notification->state === '0'):?>
    <div class="col s12 blue">
        <a class="white-text notification_link" data_id="<?= $notification->comment->id ?>" href="admin/files/<?= $notification->comment->file_id ?>">
            Alguien ha comentado tu archivo.
        </a>
    </div>
<?php else: ?>
    <div class="col s12 blue lighten-5">
        <a href="admin/files/<?= $notification->comment->file_id ?>">
            Alguien comentado archivo.
        </a>
    </div>
<?php endif ?>