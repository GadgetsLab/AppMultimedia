<?php $this->layout('layout/base', ['user' => $user]); ?>
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
       
        <h4>Comentarios</h4>
        <hr>
        <ul id="allComments" class="collection">
        </ul>
    </div>
</div>

