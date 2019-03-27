<?php include ROOT . '/views/layouts/header.php'; ?>

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
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>
                    <br/>

                    <?php if ($result): ?>

                        <p><b>Заказ оформлен. Мы Вам перезвоним.</b></p>

                    <?php else: ?>

                        <div class="col-sm-4">
                            <br/><p><b>Выбрано товаров :</b> <?php echo $totalQuantity?><br/><br/> <b>Общая сумма :</b> <?php echo $totalPrice; ?> грн</p><br/><br/>
                            
                            <p style="color: #b5b599;"><b>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</b></p><br/>
                        </div>
                        <div class="col-sm-4">
                            <div class="login-form">
                                <form action="#" method="post">

                                    <p><b>Ваше имя</b></p>
                                    <input type="text" name="userName" placeholder="" value="<?php echo $userName; ?>"/>

                                    <p><b>Номер телефона</b></p>
                                    <input type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>"/>

                                    <p><b>Комментарий к заказу</b></p>
                                    <input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/>

                                    <br/>
                                    <input type="submit" name="submit" class="btn btn-default login-form-btn" value="Оформить заказ" />
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <br/><br/><br/>
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul class="errors">
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div><br><br>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>