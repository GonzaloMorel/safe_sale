<!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                              
                        
                        <form class="navbar-form navbar-left clearfix" role="search" action="#" id="search">
                            <div class="input-group">
                                <input type="text" class="form-control" size="160" placeholder="Busque aqui...">
                                <span class="input-group-btn"><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button></span>
                            </div>
                        </form>
                        
                        
                        
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
<div class="container contenido">
    
    <div class="row row-offcanvas row-offcanvas-left">
        
        <p class="pull-left visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Categor&iacute;as</button>
        </p>