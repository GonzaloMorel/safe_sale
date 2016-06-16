<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <?php  foreach($data->css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php  echo $file; ?>" />
            <?php endforeach; ?>
                 <!-- CSS Estilo -->
            <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/_css/styles.css" />-->
            <?php foreach($data->js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>  
        <title>Mantenedor</title>
    </head>
    <body>
        <div class="container" id="contenedor">

            <!--menu-->
            <nav class="navbar navbar-fixed-top" id="header" role="navigation" style="background-color: #eee;height:100px;">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a style="padding: 13px 15px;" href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/_images/logo.jpg" alt="Your Logo" id="logo" height="80"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   
                        
                        
                        <?php if($this->session->userdata('logged')):?>
                        
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo ucwords($this->session->userdata('nombres'))." ".ucwords($this->session->userdata('apPat'))." ".ucwords($this->session->userdata('apMat')); ?> <strong class="caret"></strong></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>&ThinSpace;Configuración</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-refresh"></span>&ThinSpace;Actualización</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url(); ?>control_sesion/logout"><span class="glyphicon glyphicon-off"></span>&ThinSpace;Cerrar Sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php else: ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url(); ?>control_sesion/valida_usuario"><span class="glyphicon glyphicon-user"></span>&ThinSpace; Inicio Sesión</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#sign_up"><small>Sign up</small></a></li>
                        </ul>
                        <?php endif; ?>
                        
                        <?php if(isset($menu)): ?>
                        <?php echo $menu; ?>
                        <?php endif; ?>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="container" style="margin-top: 110px;min-height: 700px;">
                <div class="row row-offcanvas row-offcanvas-left">
                    <p class="pull-left visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Categor&iacute;as</button>
                    </p>

                    <div class="col-xs-12 col-sm-12">
                        <?= $data->output; ?> 
                    </div>
                </div><!-- end row-->
            </div>
            
        </div>
    </body>
</html>
