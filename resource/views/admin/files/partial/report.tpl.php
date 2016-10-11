<div id="report" class="modal">
    <div class="modal-content">
        <h4>Reportar archivo</h4>
            <form id="options-report">
                 <select class="browser-default" name="type-report">
                    <option value="" selected disabled>Elija una opcion</option>
                    <option value="Contenido inapropiado">Contenido inapropiado</option>
                    <option value="Mala Calidad">Mala Calidad</option>
                    <option value="Archivo da&ntilde;ado">Archivo da&ntilde;ado</option>
                </select>
                <br>
                <textarea name="comment" id="" cols="30" rows="10" placeholder="Comentario opcional"></textarea>
                <input type="hidden" name="file" value="<?= $file->id ?>">
            </form>
            <div class="row">
                <div class="col s4">
                    <button id="send-report" class="btn">Enviar</button>
                </div>
                <div class="col s4">
                    <button class="btn modal-close red darken-1">Cancelar</button>
                </div>
            </div>
    </div>
</div>