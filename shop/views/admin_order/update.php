<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <a class="btn a-back" href="/admin/order"><i class="fa fa-arrow-left"></i> Список заказов</a>

        <h2 class="title-management">Управление заказами</h2>

        <h3 class="title-update">Редактировать заказ #<?php echo $id; ?></h3><br>
        <div class="row">

            <div class="col-lg-4">
                <div class="login-form admformp-update">
                    <form action="#" method="post">

                        <p>Имя клиента</p>
                        <input type="text" name="userName" placeholder="" value="<?php echo $order['user_name']; ?>">

                        <p>Телефон клиента</p>
                        <input type="text" name="userPhone" placeholder="" value="<?php echo $order['user_phone']; ?>">

                        <p>Комментарий клиента</p>
                        <input type="text" name="userComment" placeholder="" value="<?php echo $order['user_comment']; ?>">

                        <p>Дата оформления заказа</p>
                        <input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                            <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
                            <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                            <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Закрыт</option>
                        </select>
                        <br>
                        <br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

</body>
</html>