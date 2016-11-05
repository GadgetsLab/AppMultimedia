<div id="comment" class="modal">
    <div class="modal-content">
        <h5 class="thin">Agrega tu opinión</h5>
        <hr class="blue">
        <form id="formComment">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <textarea name="comment" id="textarea1" cols="30" rows="10" class="materialize-textarea"></textarea>
                    <label for="textarea1">Comentario....</label>
                    <input type="hidden" name="of_who" value="<?= $this->e($user->id) ?>">
                    <input type="hidden" name="file_id" id="file_id" value="<?= $this->e($file->id) ?>">
                    <input type="hidden" name="for_who" value="<?= $this->e($file->user_id) ?>">
                </div>
                <a href="#!" id="addComment" class="btn blue darken-4 white-text btn-flat ">Enviar</a>
            </div>
        </form>
    </div>
</div>