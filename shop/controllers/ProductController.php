<?php

include_once ROOT. '/models/Category.php';
include_once ROOT. '/models/Product.php';

class ProductController 
{
    
    public function actionView($productId)
    {  
        //проверка на существование
        if(Product::ifProductExists($productId)){
            
            if(isset($_SESSION['user'])){
                Product::saveProductSaw($productId, $_SESSION['user']);
                Product::saveNumberOfViews($productId, $_SESSION['user']);
            }

            $categories = array();
            $categories = Category::getCategoriesList();

            $product = Product::getProductById($productId);
            
            $similarProducts = Product::getSimilarProducts($product['name']);
            
            if($product['category_id'] <= 5){
                $connectedProducts = Product::getConnectedProducts($product['category_id']);
            }
            
            require_once (ROOT.'/views/product/view.php');

            return true;
            
        } else {
            header("Location: /catalog");
        }
        
        
        
        
//        if(isset($_SESSION['user'])){
//            Product::saveProductSaw($productId, $_SESSION['user']);
//        }
//        
//        $categories = array();
//        $categories = Category::getCategoriesList();
//
//        $product = Product::getProductById($productId);
//        
//        require_once (ROOT.'/views/product/view.php');
//
//        return true;
    }
}
