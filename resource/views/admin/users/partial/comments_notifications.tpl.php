<br>
<?php if($notification->state === '1'):?>
    <div class="col s12 blue">
        <a class="white-text" href="admin/files/<?= $notification->shared->file_id ?>">
            Alguien ha comentado tu archivo.
        </a>
    </div>
<?php else: ?>
    <div class="col s12 blue lighten-5">
        <a href="admin/files/<?= $notification->shared->file_id ?>">
            Alguien comentado archivo.
        </a>
    </div>
<?php endif ?>