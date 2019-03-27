<?php

class Cart {

    public static function addProduct($id) {
//        $id = intval($id);
//
//        $productsInCart = array();
//
//        if (isset($_SESSION['products'])) {
//            $productsInCart = $_SESSION['products'];
//        }
//
//        if (array_key_exists($id, $productsInCart)) {
//            $productsInCart[$id] ++;
//        } else {
//            $productsInCart[$id] = 1;
//        }
//
//        $_SESSION['products'] = $productsInCart;
//
//        return self::countItems();
        
        ///Kondor
        $id = intval($id);

        $productsInCart = array();

        
        if(isset($_SESSION['user'])){
            //определить пользователя
            $id_user = $_SESSION['user'];
            //
            if (isset($_SESSION["user($id_user)_products"])) {
                $productsInCart = $_SESSION["user($id_user)_products"];
            }

            if (array_key_exists($id, $productsInCart)) {
                $productsInCart[$id] ++;
            } else {
                $productsInCart[$id] = 1;
            }

            $_SESSION["user($id_user)_products"] = $productsInCart;
            
            return self::countItems();
        }else{
            if (isset($_SESSION['products'])) {
                $productsInCart = $_SESSION['products'];
            }

            if (array_key_exists($id, $productsInCart)) {
                $productsInCart[$id] ++;
            } else {
                $productsInCart[$id] = 1;
            }

            $_SESSION['products'] = $productsInCart;
            
            return self::countItems();
        }

//        return self::countItems();
        ///endKondor
    }
    
    public static function deleteProduct($id) {
//        $id = intval($id);
//
//        $productsInCart = self::getProducts();
//        
//        unset($productsInCart[$id]);
//        
//        $_SESSION['products'] = $productsInCart;
        
        
        ///Kondor
        $id = intval($id);

        $productsInCart = self::getProducts();
        
        unset($productsInCart[$id]);

        if(isset($_SESSION['user'])){
            //определить пользователя
            $id_user = $_SESSION['user'];
            //
            $_SESSION["user($id_user)_products"] = $productsInCart;
        }else{
            $_SESSION['products'] = $productsInCart;
        }
        ///endKondor
    }

    public static function countItems() {
//        if (isset($_SESSION['products'])) {
//            $count = 0;
//            foreach ($_SESSION['products'] as $id => $value) {
//                $count += $value;
//            }
//            return $count;
//        } else {
//            return 0;
//        }
        
        ///Kondor
        if(isset($_SESSION['user'])){
            //определить пользователя
            $id_user = $_SESSION['user'];
            //
            if (isset($_SESSION["user($id_user)_products"])) {
                $count = 0;
                foreach ($_SESSION["user($id_user)_products"] as $id => $value) {
                    $count += $value;
                }
                return $count;
            } else {
                return 0;
            }
        }else{
            if (isset($_SESSION['products'])) {
                $count = 0;
                foreach ($_SESSION['products'] as $id => $value) {
                    $count += $value;
                }
                return $count;
            } else {
                return 0;
            }
        }
        ///endKondor
    }

    public static function getProducts() {
//        if (isset($_SESSION['products'])) {
//            return $_SESSION['products'];
//        }
//        return false;
        
        ///Kondor
        if(isset($_SESSION['user'])){
            //определить пользователя
            $id_user = $_SESSION['user'];
            //
            if (isset($_SESSION["user($id_user)_products"])) {
                return $_SESSION["user($id_user)_products"];
            }
            return false;
        }else{
            if (isset($_SESSION['products'])) {
                return $_SESSION['products'];
            }
            return false;
        }
        ///endKondor
    }

    public static function getTotalPrice($products) {
        $productsInCart = self::getProducts();

        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    public static function clear() {
//        if (isset($_SESSION['products'])) {
//            unset($_SESSION['products']);
//        }
       
        ///Kondor
        if(isset($_SESSION['user'])){
            //определить пользователя
            $id_user = $_SESSION['user'];
            //
            if (isset($_SESSION["user($id_user)_products"])) {
                unset($_SESSION["user($id_user)_products"]);
            }
        }else{
            if (isset($_SESSION['products'])) {
                unset($_SESSION['products']);
            }
        }
        ///endKondor
    }

}
