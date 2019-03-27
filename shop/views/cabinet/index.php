<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="cabinet">
            <h2 class="title text-center">Кабинет пользователя</h2>
            <h4><b><?php echo $user['name']; ?></b>, добро пожаловать в личный кабинет!</h4><br>
            <h4>Учетная запись</h4>
            <a href="/cabinet/edit">Редактировать данные</a><br>
            <h4>Заказы</h4>
            <a href="/cabinet/shoping-list">Список товаров</a><br>
            <a href="/cabinet/history">История покупок</a> 
        </div>             
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>


