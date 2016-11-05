<div id="veil">
    <div id="modal-d">
        <h5>Compartir</h5>
        <form id="compartir">
                <?php foreach($users as $user): ?>
                    <input type="checkbox" id="cbox<?= $this->e($user->id) ?>" name="people-share[]" value="<?= $this->e($user->id) ?>" />
                    <label for="cbox<?= $this->e($user->id) ?>" style="margin-right: 10px;"><?= $this->e($user->getFullNameAttribute()) ?></label>
                <?php endforeach ?>
            <input type="hidden" name="file" value="<?= $this->e($file->id) ?>">
        </form>
        <div class="row">
            <div class="col s12">
                <div class="chip error text-white danger" style="display:none">
                    Debes seleccionar minimo a una persona
                    <i class="close material-icons">close</i>
                </div>
            </div>
            <br>
            <br>
            <div class="col s6">
                <a id="sh" class="btn-flat blue text-white">Compartir</a>
            </div>
            <div class="col s6">
                <a id="close-modal" class="btn-flat blue darken-1 text-white">Cancelar</a>
            </div>
        </div>
    </div>
</div>
