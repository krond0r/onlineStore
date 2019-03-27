<?php include ROOT.'/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <a class="btn a-back" href="/admin"><i class="fa fa-arrow-left"></i> Назад</a>
            
        <h2 class="title-management">Управление товарами</h2>
        
        <h3>Список товаров</h3><br>

        <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a><br/><br/>

        <table class="table-bordered table-striped table">
            <tr>
                <th>ID товара</th>
                <th>Артикул</th>
                <th>Название товара</th>
                <th>Цена</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($productsList as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['code']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>  
                    <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer_admin.php'; ?>