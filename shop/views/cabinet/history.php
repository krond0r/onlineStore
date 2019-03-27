<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container cabinet-history">
        <h4 class="color_blue">История покупок</h4><br>

        <table class="table-admin-medium table-bordered table-striped table tab-le">
            <tr>
                <th>ID товара</th>
                <th>Артикул товара</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['code']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?> грн</td>
                    <td><?php echo $productsQuantity[$product['id']]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="/cabinet" class="btn back"><i class="fa fa-arrow-left"></i> Назад</a>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>

