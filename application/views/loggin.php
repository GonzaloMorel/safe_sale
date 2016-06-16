<div class="container-fluid center-block contenido" id="loggin">
    <?php
    if (isset($error)) : echo "<p>" . $error . "</p>";
    endif;
    ?>
    <?php echo validation_errors(); ?>
    <?php $atributos = array('class' => 'form-sigin', 'role' => 'form', 'id' => 'formSigin', 'name' => 'formSigin'); ?>
<?php echo form_open('control_sesion/valida_usuario', $atributos); ?>
    <h2 class="form-sigin-heading center-block">Por Favor Ingrese</h2>
    <div class="form-group form-group-lg center-block">
        <label class="sr-only" for="rut">Rut:</label>
        <input class="form-control" type="text" name="rut" id="rut" value="" maxlength="15" size="15" placeholder="Rut.."/>
    </div>    
    <div class="form-group form-group-lg center-block">
        <label class="sr-only" for="pass">Password:</label>
        <input class="form-control" type="password" name="pass" id="pass" maxlength="8" size="15" placeholder="Password.."/>
    </div>
    <div class="form-group center-block">
        <input class="btn btn-lg btn-primary" type="submit" value="Enviar"/>
        <input class="btn btn-lg btn-success" type="reset" value="Limpiar"/>
    </div>
<?php echo form_close(); ?>
</div>
