<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if($result): ?>
                <br/>
                    <div class="text-center" style="margin-bottom: 287px; font-size: 22px;">
                        <p><b>Вы зарегистрированы!</b></p>
                        <p><a href="/cabinet/">Перейти в личный кабинет</a></p>
                    </div>
                    
                <?php else: ?>
                    <?php if(isset($errors) && is_array($errors)): ?>
                        <ul class="errors">
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                
                    <div class="signup-form">
                        <h2>
                            <a class="log-reg" href="/user/login/"><button class="btn btn-unactiv" style="width: 49%;">Вход</button></a>
                            <a class="log-reg" href="/user/register/"><button class="btn btn-log-reg" style="width: 49%;">Регистрация</button></a>
                        </h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name;?>"/>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email;?>"/>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password;?>"/>
                            <input type="submit" name="submit" class="btn btn-default login-form-btn" value="Регистрация"/>
                        </form>
                    </div>
                    
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>
