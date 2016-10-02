<div id="veil">
    <div id="modal-d">
        <h2>Compartir</h2>
        <form id="compartir">
            <select  id="people-share" class="select-chosen browser-default" name="people-share[]" multiple data-placeholder="Contactos para compartir">
                <?php foreach($users as $user): ?>
                    <option value="<?= $this->e($user->id) ?>"> <?=$this->e($user->names)?>&nbsp; <?= $this->e($user->lastnames) ?></option>
                <?php endforeach ?>
            </select>
            <input type="hidden" name="file" value="<?= $this->e($file->id) ?>">
        </form>
        <br><br>
        <div class="row">
            <div class="col s12">
                <div class="chip error text-white danger" style="display:none">
                    Debes seleccionar minimo a una persona
                    <i class="close material-icons">close</i>
                </div>
            </div> <br>
            <div class="col s4">
                <button id="sh" class="btn">Compartir</button>
            </div>
            <div class="col s4">
                <button id="close-modal" class="btn lime darken-1">Cancelar</button>
            </div>
        </div>
    </div>
</div>
