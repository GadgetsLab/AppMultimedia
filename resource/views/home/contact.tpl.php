<?php $this->layout('layout/base', ['user' => $user]); ?>
<br>
<hr class="blue lighten-3">
<h5 class="center-align">Contacto con el administrador</h5>
<hr class="blue lighten-3">
<form action="">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix blue-text text-lighten-3">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix" data-error="wrong" >Nombre:</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix blue-text text-lighten-3">email</i>
                    <input id="icon_telephone" type="email" class="validate" required>
                    <label for="icon_telephone" data-error="*">Correo:</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix blue-text text-lighten-3">subject</i>
                    <input id="icon_subject" type="text" class="validate" required>
                    <label for="icon_subject" data-error="*">Asunto:</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix blue-text text-lighten-3">message</i>
                    <textarea id="icon_message" class="materialize-textarea validate" required></textarea>
                    <label for="icon_message" data-error="*">Mensaje:</label>
                </div>
                <div class="input-field col s12 m6 offset-m3 center-align">
                    <button class="btn waves-effect waves-light blue lighten-3" type="submit" name="action">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>

</form>