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
                            <option <?php Search::match($_SERVER['REQUEST_URI'], "/cheap/"); ?> value="/catalog/sort-cheap">от дешевых к дорогим</option>
                            <option <?php Search::match($_SERVER['REQUEST_URI'], "/expensive/"); ?> value="/catalog/sort-expensive">от дорогих к дешевым</option>
                            <option <?php Search::match($_SERVER['REQUEST_URI'], "/new/"); ?> value="/catalog/sort-new">новинки</option>
                            <option value="#" disabled>акционные</option>
                        </select>
                    </div>
                    
                    <?php foreach ($sortProducts as $product) : ?>
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
<!--                                        <h2><?php // echo $product['price']; ?> грн</h2>-->
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
        </div><br>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>