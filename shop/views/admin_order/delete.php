<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <a class="btn a-back" href="/admin/order"><i class="fa fa-arrow-left"></i> Список заказов</a>

        <div class="text-center">
            <h3 class="title-delete">Удаление заказа</h3><br>
            <p>Вы действительно хотите удалить <b>заказ #<?php echo $id; ?></b> ?</p>
            <form method="post">
                <input class="adm-btn-delte" type="submit" name="submit" value="Удалить" />
            </form>
        </div>
    </div>
</section>

</body>
</html>

