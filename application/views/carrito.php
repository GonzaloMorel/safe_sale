<div class="col-xs-12 col-sm-9">

    <div class="panel panel-primary">

        <div class="panel-heading">
            <h3 class="panel-title"><strong>Carro de Compras</strong>&ThinSpace;<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h3>
        </div><!-- end panel-heading-->

        <div class="panel-body">
            <?php //echo anchor('categoria', 'Volver al listado'); ?>
            <!--<hr>-->
            <form action="<?php echo base_url(); ?>producto/actualizar_carrito" method="post">
                <div class="table-responsive">
                    <table class="table table-borderer table-striped ">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td>Total:</td>
                                <td>$USD <?php echo number_format($this->cart->total(), 2, ',', '.'); ?></td>
                            </tr>
                            
                        </tfoot>
                        <tbody>
                            <?php foreach ($this->cart->contents() as $item): ?>
                            <input type="hidden" name="rowid[]" value="<?php echo $item['rowid']; ?>">
                            <tr>
                                <td>
                                    <div>
                                        <h4>Nombre: <?= $item['name']; ?></h4>
                                            <?php if ($this->cart->has_options($item['rowid']) === TRUE): ?>

                                                    <?php foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value): ?>
                                                        <?php if($option_name === "foto"):?>
                                                            <img src="<?= $option_value;?>" style="height: 150px;"/>
                                                    <?php else:?>
                                                        <h5><?php  echo ucfirst($option_name); ?>: <small><?php echo $option_value; ?></small></h5>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>

                                            <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    $USD <?php echo number_format($item['price'], 2, ',', '.'); ?>
                                </td>
                                <td>
                                    <input type="text" name="qty[]" value="<?php echo $item['qty']; ?>" maxlength="3" size="5">
                                </td>
                                <td>
                                    $ <?php echo number_format($item['subtotal'], 2, ',', '.'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>

        </div><!-- end panel-body-->

        <div class="panel-footer">
            <div class="btn-group">
                <input class="btn btn-success" type="submit" name="actualizar" value="Actualizar Carrito">
                
                <?php echo anchor('producto/vaciar_carrito', 'Vaciar Carrito','class="btn btn-info"'); ?>
                
            </div>
            <?php if($this->cart->contents() != NULL AND $this->session->userdata('logged') === TRUE): ?>
            <div class="btn-group">
                <?php echo anchor('paypalPayment/realizar_pago', 'Pagar Paypal','class="btn btn-primary"'); ?>
            </div>
            <?php endif; ?>
            
            </form>
        </div><!-- end panel-footer-->
        
    </div>
</div>