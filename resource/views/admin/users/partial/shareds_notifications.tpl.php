<br>
<?php if($notification->state === '0'):?>
        <div class="col s12 blue">
            <a class="white-text" href="admin/files/<?= $notification->shared->file_id ?>">
                Alguien te ha compartido este archivo.
            </a>
        </div>
<?php else: ?>
    <div class="col s12 blue lighten-5">
        <a href="admin/files/<?= $notification->shared->file_id ?>">
            Alguien te ha compartido este archivo.
        </a>
    </div>
<?php endif ?>