<?php

class CabinetController {
    
    public function actionIndex()
    {
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        require_once(ROOT. '/views/cabinet/index.php');
        
        return true;
    }
    
    public function actionEdit()
    {
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        $name = $user['name'];
        $password = $user['password'];
        
        $result = false;
        
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            
            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }
        
        require_once(ROOT. '/views/cabinet/edit.php');
        
        return true;
    }
    
    public function actionHistory()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $name = $user['name'];
        
        $order = Order::getOrderByUserName($name);
        
        $productsQuantity = json_decode($order['products'], true);
        
        $productsIds = array_keys($productsQuantity);
        
        $products = Product::getProductsByIds($productsIds);
        
        require_once(ROOT. '/views/cabinet/history.php');
        
        return true;
    }
    
    public function actionShopingList()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }
        
        require_once(ROOT. '/views/cabinet/shoping_list.php');
        
        return true;
    }
}
