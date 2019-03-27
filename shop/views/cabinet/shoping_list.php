<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container cabinet-shopinglist">
        
        <?php if ($productsInCart): ?>
        <h4 class="color_blue">Выбранные товары</h4><br>

        <table class="table-admin-medium table-bordered table-striped table tab-le">
            <tr>
                <th>Код товара</th>
                <th>Название</th>
                <th>Стомость, грн</th>
                <th>Количество, шт</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['code'];?></td>
                    <td>
                        <a href="/product/<?php echo $product['id'];?>">
                            <?php echo $product['name'];?>
                        </a>
                    </td>
                    <td><?php echo $product['price'];?></td>
                    <td><?php echo $productsInCart[$product['id']];?></td> 
                </tr>
            <?php endforeach; ?>   
        </table>
        
        <div>
            <b>Общая стоимость :</b>
            <?php echo $totalPrice;?> грн
        </div><br/>
        <a href="/cabinet" class="btn back"><i class="fa fa-arrow-left"></i> Назад</a>&nbsp;&nbsp;
        <a href="/cart/checkout" class="btn back">Оформить заказ <i class="fa fa-arrow-right"></i></a> 
        
        <?php else: ?>
            <h4 class="color_blue">Выбранных товаров нет</h4><br>
            <a href="/cabinet" class="btn back"><i class="fa fa-arrow-left"></i> Назад</a>
        <?php endif; ?>
    </div>
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>

