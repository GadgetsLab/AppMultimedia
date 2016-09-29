<?php $this->layout('layout/base') ?>
<br>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="http://placehold.it/550x250"/>
                <span class="card-title">Title de File</span>
            </div>
            <div class="card-content">
                <p>
                    Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Animi consequuntur dolore ducimus eius facilis,
                    incidunt itaque odio possimus repudiandae similique sunt temporibus veritatis voluptate!
                    Dignissimos distinctio dolor error illum rem.
                    <a href="#">
                        <span class="badge light-blue" style="color: #fff; position: relative;margin-left: 15px;">Usuario</span>
                    </a>
                </p>
            </div>
            <div class="card-action">
                <a href="#" ><i class="material-icons small blue-text">system_update_alt</i></a>&nbsp;
                <a href="#" ><i class="material-icons small green-text">thumb_up</i></a>&nbsp;
                <a href="#" ><i class="material-icons small deep-orange-text">thumb_down</i></a>&nbsp;
                <a href="#comment" class="modal-trigger"><i class="material-icons small  blue-grey-text">comment</i></a>
                <i class="material-icons small red-text right ">report_problem</i>

            </div>
        </div>
        <hr>
        <div id="comment" class="modal">
            <div class="modal-content">
                <h5 class="thin">Agrega tu opinión</h5>
                <hr class="blue">
                <form id="formComment">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <textarea name="comment" id="textarea1" cols="30" rows="10" class="materialize-textarea"></textarea>
                            <label for="textarea1">Comentario....</label>
                            <input type="hidden" name="user_id" value="8">
                            <input type="hidden" name="file_id" value="3">
                        </div>
                        <a href="#!" id="addComment" class="btn blue darken-4 white-text btn-flat ">Enviar</a>
                    </div>
                </form>
            </div>
        </div>
        <h4>Comentarios</h4>
        <hr>
        <ul id="allComments" class="collection">
        </ul>
    </div>
</div>

