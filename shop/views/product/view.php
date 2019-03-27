<?php include ROOT.'/views/layouts/header.php'; ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                <?php foreach ($categories as $categoryItem): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="/category/<?php echo $categoryItem['id'];?>">
                                                    <?php echo $categoryItem['name'];?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div><!--/category-products-->
                        </div>
                    </div>                    
                    
                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="<?php echo Product::getImage($product['id']); ?>" alt=""/>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <h2><?php echo $product['name'];?></h2>
                                        <p><b>Код товара: </b><?php echo $product['code'];?></p>
<!--                                        <span>
                                            <span><?php echo $product['price'];?>$</span>
                                            <label>Количество:</label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                        </span>-->
                                        
                                        <span>
<!--                                            <span><?php // echo $product['price'];?> грн</span>-->
                                            <span><?php Product::displayPriceProductViaSpace($product['price']); ?> грн</span>
                                            <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $product['id']; ?>" style="margin-bottom: 5px;">
                                                <i class="fa fa-shopping-cart"></i>В корзину
                                            </a>
                                        </span>
                                        <?php 
                                            if($product['availability']) echo '<p><b>Наличие:</b> На складе</p>';
                                            else echo '<p><b>Наличие:</b> Нет на складе</p>';
                                        ?>
                                        <?php 
                                            if($product['is_new']) echo '<p><b>Состояние:</b> Новое</p>';
                                            else echo '';
                                        ?>
                                        <p><b>Производитель:</b> <?php echo $product['brand'];?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h4>Описание товара</h4>
                                    <?php echo $product['description'];?>
                                </div>
                            </div>
                        </div><!--/product-details-->
                    </div>
                    <div class="col-sm-12">
                        <div class="recommended_items heigh_sl"><!--similar_items-->
                            <h2 class="title viewed_items_title">Похожие товары</h2>

                            <div class="cycle-slideshow" 
                                 data-cycle-fx=carousel
                                 data-cycle-timeout=0
                                 data-cycle-carousel-visible=5
                                 data-cycle-carousel-fluid=true
                                 data-cycle-slides="div.item"
                                 data-cycle-prev="#prev"
                                 data-cycle-next="#next"
                                 >                        
                                     <?php foreach ($similarProducts as $similarProduct): ?>
                                    <div class="item">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="/product/<?php echo $similarProduct['id']; ?>">
                                                        <img src="<?php echo Product::getImage($similarProduct['id']); ?>" alt="" />
                                                    </a>
                                                    <h2><?php Product::displayPriceProductViaSpace($similarProduct['price']); ?> грн</h2>
                                                    <a href="/product/<?php echo $similarProduct['id']; ?>">
                                                        <?php echo $similarProduct['name']; ?>
                                                    </a>
                                                    <br/>
                                                    <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $similarProduct['id']; ?>" style="margin-top: 5px;"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div><!--/similar_items-->
                    </div>
                    <?php if(isset($connectedProducts)): ?>
                    <div class="col-sm-12">
                        <div class="recommended_items heigh_sl"><!--connected_items-->
                            <h2 class="title viewed_items_title">Cопутствующие товары</h2>

                            <div class="cycle-slideshow" 
                                 data-cycle-fx=carousel
                                 data-cycle-timeout=0
                                 data-cycle-carousel-visible=5
                                 data-cycle-carousel-fluid=true
                                 data-cycle-slides="div.item"
                                 data-cycle-prev="#prev2"
                                 data-cycle-next="#next2"
                                 >                        
                                     <?php foreach ($connectedProducts as $connectedProduct): ?>
                                    <div class="item">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="/product/<?php echo $connectedProduct['id']; ?>">
                                                        <img src="<?php echo Product::getImage($connectedProduct['id']); ?>" alt="" />
                                                    </a>
                                                    <h2><?php Product::displayPriceProductViaSpace($connectedProduct['price']); ?> грн</h2>
                                                    <a href="/product/<?php echo $connectedProduct['id']; ?>">
                                                        <?php echo $connectedProduct['name']; ?>
                                                    </a>
                                                    <br/>
                                                    <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $connectedProduct['id']; ?>" style="margin-top: 5px;"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <a class="left recommended-item-control" id="prev2" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" id="next2"  href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div><!--/connected_items-->
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </section>
        
<?php include ROOT.'/views/layouts/footer.php'; ?>