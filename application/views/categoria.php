<div class="col-xs-12 col-sm-9 ">
    <div class="panel panel-primary">
        <div class="panel-body">
            <!--<div class="panel panel-info">-->

            <div class="row">

                <?php if (isset($data)): ?>

                    <?php //print_r($data); ?>

                    <?php foreach ($data as $row): ?>

                        <?php if ($row == NULL): ?>

                            <div class="panel">

                                <h1 class="">No Existen Datos Para Mostrar</h1>

                            </div><!-- end panel default -->

                        <?php endif; ?>
                        <ul class="products padding-none">   
                            <?php foreach ($row as $key): ?>
                                <div class="panel panel-default col-sm-12 col-md-4">

                                    <div class="panel-body">
                                        <li class="product">
                                            <div class="product-container">
                                                <figure>
                                                    <div class="product-wrap">
                                                        <div class="product-images">
                                                            <div class="shop-loop-thumbnail">
                                                                <img width="200" height="250" src="data:image/jpeg;base64,<?= $key->foto_data; ?>" alt="<?= $key->producto_nombre; ?>"/>
                                                            </div>
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <div class="yith-wcwl-add-button">
                                                                    <!--                                                <a href="#" class="add_to_wishlist">
                                                                                                                        Add to Wishlist
                                                                                                                    </a>-->
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="shop-loop-quickview">
                                                                <a href="#" data-rel="quickViewModal"><i class="fa fa-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <figcaption>
                                                        <div class="shop-loop-product-info">
                                                            <div class="info-title">
                                                                <h4 class="product_title"><a href="<?php echo base_url(); ?>producto/detalle/<?= $key->producto_id; ?>"><?= $key->producto_nombre; ?></a></h4>
                                                            </div>
                                                            <div class="info-meta">
                                                                <div class="info-price">
                                                                    <span class="price">
                                                                        <span class="amount">&#36;USD <?= $key->producto_precio; ?></span>
                                                                    </span>
                                                                </div>
                                                                <div class="loop-add-to-cart">
                                                                    <!--<a href="#">Select options</a>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </li>
                                    </div>
                                    
                                </div><!-- end panel-default -->

                            <?php endforeach; ?>
                        </ul>    
                    <?php endforeach; ?>

                <?php endif; ?>

            </div><!-- end row -->

            <!--</div> end panel-->
        </div>
    </div>
</div><!-- end col -->





