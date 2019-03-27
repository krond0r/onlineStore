<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
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
                    </div>

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Каталог товаров</h2>
                    
                    <div class="col-sm-12">
                        <select class="selected_sort" onchange="location=value">
                            <option value="#" hidden>сортировка</option>
                            <option value="/catalog/sort-cheap">от дешевых к дорогим</option>
                            <option value="/catalog/sort-expensive">от дорогих к дешевым</option>
                            <option value="/catalog/sort-new">новинки</option>
                            <option value="#" disabled>акционные</option>
                        </select>
                    </div>
                    
                    <?php foreach ($latestProducts as $product) : ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="/product/<?php echo $product['id']; ?>">
                                        <img src="<?php echo Product::getImage($product['id']); ?>" alt="" />
                                    </a>
                                    
                                        <p>
                                            <a href="/product/<?php echo $product['id']; ?>">
                                                <?php echo $product['name']; ?>
                                            </a>
                                        </p>
                                        <h2><?php Product::displayPriceProductViaSpace($product['price']); ?> грн</h2>
                                        <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                    <?php if ($product['is_new']): ?>
                                        <img src="/template/images/new.png" class="new" alt="" />
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center"><?php echo $pagination->get(); ?></div>
            </div>
            <!-- START-->
            <?php if(isset($_SESSION['user'])): ?>
                <div class="col-sm-12 viewed_items">
                    <div class="recommended_items heigh_sl"><!--viewed_items-->
                        <h2 class="title viewed_items_title">Просмотренные товары</h2>
                        <div class="cycle-slideshow" 
                             data-cycle-fx=carousel
                             data-cycle-timeout=0
                             data-cycle-carousel-visible=5
                             data-cycle-carousel-fluid=true
                             data-cycle-slides="div.item"
                             data-cycle-prev="#prev1"
                             data-cycle-next="#next1"
                             >                        
                                 <?php foreach ($viewedItems as $sliderItem): ?>
                                <div class="item">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="/product/<?php echo $sliderItem['id']; ?>">
                                                    <img src="<?php echo Product::getImage($sliderItem['id']); ?>" alt="" />
                                                </a>
                                                <!--<h2>$<?php // echo $sliderItem['price']; ?></h2>-->
                                                <h2><?php Product::displayPriceProductViaSpace($sliderItem['price']); ?> грн</h2>
                                                <a href="/product/<?php echo $sliderItem['id']; ?>">
                                                    <?php echo $sliderItem['name']; ?>
                                                </a>
                                                <br/>
                                                <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $sliderItem['id']; ?>" style="margin-top: 5px;"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <a class="left recommended-item-control" id="prev1" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" id="next1"  href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div><!--/viewed_items-->
                </div>
            <?php endif ?>
            
            <?php if(isset($_SESSION['user'])): ?>
                <div class="col-sm-12 viewed_items">
                    <div class="recommended_items heigh_sl"><!--viewed_items-->
                        <h2 class="title viewed_items_title">Рекомендованные товары</h2>
                        <div class="cycle-slideshow" 
                             data-cycle-fx=carousel
                             data-cycle-timeout=0
                             data-cycle-carousel-visible=5
                             data-cycle-carousel-fluid=true
                             data-cycle-slides="div.item"
                             data-cycle-prev="#prev3"
                             data-cycle-next="#next3"
                             >                        
                                 <?php foreach ($recommendedProductsHis as $recommendedProduct): ?>
                                <div class="item">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="/product/<?php echo $recommendedProduct['id']; ?>">
                                                    <img src="<?php echo Product::getImage($recommendedProduct['id']); ?>" alt="" />
                                                </a>
                                                <h2><?php Product::displayPriceProductViaSpace($recommendedProduct['price']); ?> грн</h2>
                                                <a href="/product/<?php echo $recommendedProduct['id']; ?>">
                                                    <?php echo $recommendedProduct['name']; ?>
                                                </a>
                                                <br/>
                                                <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $recommendedProduct['id']; ?>" style="margin-top: 5px;"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <a class="left recommended-item-control" id="prev3" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" id="next3"  href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div><!--/viewed_items-->
                </div>
            <?php endif ?>
            <div class="col-sm-12 viewed_items">
                <div class="recommended_items heigh_sl"><!--popular_items-->
                    <h2 class="title viewed_items_title">Популярные товары</h2>

                    <div class="cycle-slideshow" 
                         data-cycle-fx=carousel
                         data-cycle-timeout=0
                         data-cycle-carousel-visible=5
                         data-cycle-carousel-fluid=true
                         data-cycle-slides="div.item"
                         data-cycle-prev="#prev2"
                         data-cycle-next="#next2"
                         >                        
                             <?php foreach ($popularProducts as $popularProduct): ?>
                            <div class="item">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="/product/<?php echo $popularProduct['id']; ?>">
                                                <img src="<?php echo Product::getImage($popularProduct['id']); ?>" alt="" />
                                            </a>
                                            <!--<h2>$<?php // echo $sliderItem['price']; ?></h2>-->
                                            <h2><?php Product::displayPriceProductViaSpace($popularProduct['price']); ?> грн</h2>
                                            <a href="/product/<?php echo $popularProduct['id']; ?>">
                                                <?php echo $popularProduct['name']; ?>
                                            </a>
                                            <br/>
                                            <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $popularProduct['id']; ?>" style="margin-top: 5px;"><i class="fa fa-shopping-cart"></i>В корзину</a>
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
                </div><!--/popular_items-->
            </div>
            <!-- end-->
        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>
