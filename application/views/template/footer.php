</div><!-- end row -->
</div><!-- end container-->

</div><!-- fin contenedor -->

<div class="modal fade" id="sign_up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registro</h4>
            </div><!-- end modal-header -->
            <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        if (isset($error)) : echo "<p>" . $error . "</p>";
                        endif;
                        ?>
                        <?php echo validation_errors(); ?>
                        <?php $atributos = array('class' => 'form-sigin form-horizontal', 'role' => 'form', 'id' => 'formSigin', 'name' => 'formSigin'); ?>
                        <?php echo form_open('control_sesion/sign_up', $atributos); ?>
                        
                        <div class="form-group form-group">
                            <label for="rut" class="control-label col-xs-4">Rut:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="rut" id="rut" value="" maxlength="15" size="50" placeholder="12.345.678-9.."/>
                            </div>
                        </div> 
                        <div class="form-group form-group">
                            <label for="nombres" class="control-label col-xs-4">Nombres:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="nombres" id="nombres" maxlength="45" size="50" placeholder="Juan Jose.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="apPat" class="control-label col-xs-4">Apellido Paterno:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="apPat" id="apPat" maxlength="45" size="50" placeholder="Jara.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="apMat" class="control-label col-xs-4">Apellido Materno:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="apMat" id="apMat" maxlength="45" size="50" placeholder="Jimenez.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="fechaNac" class="control-label col-xs-4">Fecha Nacimiento:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="fechaNac" id="fechaNac" maxlength="10" size="50" placeholder="00-00-0000.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="mail" class="control-label col-xs-4">E-mail:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="mail" id="mail" maxlength="100" size="50" placeholder="juan.jara@loquesea.cl.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="telefono" class="control-label col-xs-4">Tel&eacute;fono:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="telefono" id="telefono" maxlength="100" size="50" placeholder="12345678.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="celular" class="control-label col-xs-4">Celular:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="celular" id="celular" maxlength="100" size="50" placeholder="12345678.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="pass" class="control-label col-xs-4">Password:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="password" name="pass" id="pass" maxlength="8" size="50" placeholder="Password.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="pass2" class="control-label col-xs-4">Re-Password:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="password" name="pass2" id="pass2" maxlength="8" size="50" placeholder="Repeat Password.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="Direccion" class="control-label col-xs-4">Direcci&oacute;n:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="direccion" id="direccion" maxlength="45" size="50" placeholder="Av siempre viva.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="numeroDire" class="control-label col-xs-4">Numero:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="numeroDire" id="numeroDire" maxlength="8" size="50" placeholder="1234.."/>
                            </div>
                        </div>
                        <div class="form-group form-group">
                            <label for="departamento" class="control-label col-xs-4">Casa/Departamento:</label>
                            <div class="col-xs-6">
                            <input class="form-control" type="text" name="departamento" id="departamento" maxlength="100" size="50" placeholder="12345678.."/>
                            </div>
                        </div>
                        
<!--                        <div class="form-group center-block">
                            
                        </div>-->
                    
 
                </div><!-- end container -->    
            </div><!-- end modal-body -->
            <div class="modal-footer">
                <input class="btn btn-lg btn-primary" type="submit" value="Enviar"/>
                <input class="btn btn-lg btn-success" type="reset" value="Limpiar"/>
<!--                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>-->
            </div><!-- end modal-footer -->
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<footer>
    <div class="container">
        <div class="footer-widget-wrap">
            <div class="row">
<!--                <div class="footer-widget-col col-md-2 col-sm-6">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title"><span>Infomation</span></h3>
                        <ul class="menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Work Here</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Dealer Locator</a></li>
                            <li><a href="#">Happenings</a></li>
                        </ul>
                    </div>
                </div>-->
<!--                <div class="footer-widget-col col-md-2 col-sm-6">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title"><span>Customer Care</span></h3>
                        <ul class="menu">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Repair Center</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>-->
<!--                <div class="footer-widget-col col-md-2 col-sm-6">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title"><span>Quick Link</span></h3>
                        <ul class="menu">
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Shipping Policy</a></li>
                            <li><a href="#">Return Policy</a></li>
                            <li><a href="#">Digital Gift Card</a></li>
                        </ul>
                    </div>
                </div>-->
<!--                <div class="footer-widget-col col-md-2 col-sm-6">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title"><span>Help</span></h3>
                        <ul class="menu">
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms and Conditions</a></li>
                            <li><a href="#">Social Responsibility</a></li>
                        </ul>
                    </div>
                </div>-->
                <div class="footer-widget-col col-md-4 col-sm-6">
                    <div class="widget widget_text">
                        <h3 class="widget-title"><span>Safe Sale</span></h3>
                        <div class="textwidget">
                            <p><i class="fa fa-map-marker"></i> providencia 10001, providencia, santiago, RM</p>
                            <p><i class="fa fa-phone"></i> (012) 1234 7824</p>
                            <p>
                                <i class="fa fa-envelope"></i> <a href="mailto:email@domain.com">email@domain.com</a>
                            </p>
                            <!--<p class="payment"><img src="images/footer-payment-color.png" alt=""></p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h6 class="text-center">
                    Desarrollado por Pequen. Copyright &copy; 2015 
                </h6>
            </div><!-- end col-sm-2 -->
        </div><!-- end row -->
    </div><!-- end container footer -->
</footer><!-- fin footer-->




<script type="text/javascript" src="<?php echo base_url(); ?>assets/_bootstrap/js/bootstrap.min.js"></script><!-- Funciones JS Bootstrap -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/_timepicker/js/bootstrap-timepicker.min.js"></script><!-- JqueryUi timepicker-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/_rut/jquery.Rut.js"></script> <!-- Validacion de Rut-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/_holder/holder.js"></script><!-- Holder - creacion de imagenes-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/_datepicker/js/bootstrap-datepicker.js"></script><!-- Datepciker -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/_datepicker/js/locales/bootstrap-datepicker.es.js"></script><!-- Datepciker -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/_tinymce/tinymce.min.js"></script><!-- TinyMCE -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script><!--Google graficos -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/_js/funcionesJquery.js"></script><!-- Funciones Jquery -->

        <?php // foreach($js_files as $file): ?>
                <!--<script src="<?php // echo $file; ?>"></script>-->
        <?php // endforeach; ?>    
</body>
</html>