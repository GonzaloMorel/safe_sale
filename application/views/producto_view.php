<?php if (isset($data)): ?>
    <?php foreach ($data as $row): ?>
        <?php foreach ($row as $key): ?>
            <div class="col-xs-12 col-sm-9">

                <div class="panel panel-primary">
                    <div class="panel-heading">

                        <h3 class="panel-title"><strong><?= $key->producto_nombre; ?></strong></h3>
                    </div>

                    <div class="panel-body">
                        <?php $attributes = array('role' => 'form', 'name' => 'form_carrito'); ?>
                        <?php echo form_open('producto/agregar_carrito', $attributes); ?>
                        <div class="row">
                            <div class="panel col-sm-12 col-sm-4">
                                <img src="data:image/jpeg;base64,<?= $key->foto_data; ?>" alt="foto 1" class="img-thumbnail padding-sm"/>
                            </div>

                            <div class="panel col-sm-12 col-sm-8">
                                <div>
                                    <h4>ID: <small><?= $key->producto_id; ?></small></h4>
                                    <h4>Nombre: <small><?= $key->producto_nombre; ?></small></h4>
                                    <h4>Marca: <small><?= $key->marca_nombre; ?></small></h4>
                                    <h4>Garant&iacute;a: <small><?= $key->producto_garantia_meses; ?>meses</small></h4>
                                    <h4>Stock: <small><?= $key->producto_stock; ?> unidades</small></h4>
                                    <h4>Modelo: <small><?= $key->producto_modelo; ?></small></h4>
                                    <h4 class="text-danger">Precio: USD$ <?= $key->producto_precio; ?></h4>
                                </div>
                                <div>
                                <h4>Cantidad:</h4><select name="cantidad" id="cantidad">
                                <?php for($i=1;$i<=$key->producto_stock-30;$i++):?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor;?>
                                    </select>
                                <input class="btn btn-success" type="submit" name="envia_carrito" id="envia_carrito" value="Agregar al Carro"/>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel col-sm-12 col-sm-12">
                                    <div class="caption">
                                    
                                    <h4>Descripción: <?= $key->producto_desc; ?></h4>
                                    <h4>Ficha Técnica: <?= $key->producto_ficha_tecnica; ?></h4>
                                    <h4>Garantía Descripci&oacute;n:<?= $key->producto_garantia; ?></h4>
                                    <h4>Alto: <small><?= $key->producto_alto; ?></small></h4>
                                    <h4>Ancho: <small><?= $key->producto_ancho; ?></small></h4>
                                    <h4>Profundidad: <small><?= $key->producto_profundidad; ?></small></h4>
                                    <h4>Peso: <small><?= $key->producto_peso; ?></small></h4>
                                    
                                    
                                    <input type="hidden" name="id" id="id" value="<?= $key->producto_id; ?>"/>
                                    <input type="hidden" name="nombre" id="nombre" value="<?= $key->producto_nombre; ?>"/>
                                    <input type="hidden" name="marca" id="marca" value="<?= $key->producto_marca_id; ?>"/>
                                    <input type="hidden" name="modelo" id="modelo" value="<?= $key->producto_modelo; ?>"/>
                                    <input type="hidden" name="familia" id="familia" value="<?= $key->producto_familia_id; ?>"/>
                                    <input type="hidden" name="precio" id="precio" value="<?= $key->producto_precio; ?>"/>
                                    <input type="hidden" name="stock" id="stock" value="<?= $key->producto_stock; ?>"/>
                                    <input type="hidden" name="foto" id="foto" value="data:image/jpeg;base64,<?= $key->foto_data; ?>"/>
                                 <?php echo form_close(); ?>   
                                </div>
                            </div><!-- end caption -->
                        </div>
                        </div><!-- end panel default-->

                    </div><!-- end panel-body -->

                </div><!-- end panel -->

            </div><!-- end col -->

            
        <?php endforeach; ?>
    <?php endforeach; ?>
<?php endif; ?>