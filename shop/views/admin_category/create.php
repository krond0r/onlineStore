<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <a class="btn a-back" href="/admin/category"><i class="fa fa-arrow-left"></i> Список категорий</a>

        <h2 class="title-management">Управление категориями</h2>

        <h3 class="title-create">Добавить категорию</h3><br> 

        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-4">
                <div class="login-form admformp">
                    <form action="#" method="post">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="">

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

</body>
</html>