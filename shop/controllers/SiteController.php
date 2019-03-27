<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class SiteController
{

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);
        
        $sliderProducts = array();
        $sliderProducts = Product::getRecommendedProducts();
        
        require_once(ROOT . '/views/site/index.php');   

        return true;
    }
    
    public function actionAbout()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        
        require_once(ROOT . '/views/site/about.php');   

        return true;
    }
    
    public function actionContact()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        
        require_once(ROOT . '/views/site/contact.php');   

        return true;
    }

}
