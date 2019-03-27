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
                <div class="contact_shop">
                    <h2 class="title text-center">Контакты</h2>
                    <p><br><b>Многоканальный телефон горячей линии. Ежедневно 8:00-21:00</b></p>
                    <h3>(095) 616-90-81</h3>
                    <p>
                        (звонки с мобильных и стационарных телефонов в пределах Украины бесплатные)
                        <br><br>
                        E-mail: <b><i>&nbsp;lorem_ipsum@gmail.com</i></b>
                        <br><br>
                        Если у вас есть жалобы, предложения или комментарии по работе нашего 
                        магазинов — обязательно сообщите нам об этом по телефону!
                        <br><br>
                        Адрес принятия письменных претензий: 49100, город Днепр, бульвар Славы,
                        дом 6 Б (служба поддержки потребителей ООО «TrueShop») или по месту
                        нахождения любого из магазинов.
                        <br><br>
                        Адрес для принятия претензий по обмену/возврата товаров: местонахождение
                        любого из магазинов.
                    </p>
                </div>
            </div>
        </div>
    </div><br><br> 
</section>



<?php include ROOT.'/views/layouts/footer.php'; ?>
