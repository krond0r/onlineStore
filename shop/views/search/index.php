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
                    <h2 class="title text-center">Результаты поиска</h2>
                    
                    <?php if(isset($searchResult)): ?> 
                        <div class="search_result">
                            <p>Найдено <?php echo $total.' '.$total_product ?></p> 
                            <h2><span class="quotes">&laquo;</span><?php echo $searchq; ?><span class="quotes">&raquo;</span></h2> 
                        </div>
                        <?php foreach ($searchResult as $product) : ?>
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
                    <?php endif; ?>
                </div>
                <div class="text-center"><?php echo $pagination->get(); ?></div>
            </div>
        </div><br>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>



<!--<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Search</title>
</head>
<body>

	<form action="#" method="post">
		<input type="text" name="search" placeholder="Search for members...">
		<input type="submit" value=">>">
	</form>
        <?php // if(isset($searchres)): ?>  
            <?php // foreach ($searchres as $sr): ?>                                        
                <p>
                    <?php // echo $sr['id']; ?>
                    <?php // echo $sr['name']; ?>
                    <?php // echo $sr['brand']; ?><br>
                </p>
            <?php // endforeach; ?>
        <?php // endif; ?>
</body>
</html>-->