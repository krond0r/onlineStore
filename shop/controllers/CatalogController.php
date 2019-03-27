<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';
//include_once ROOT . '/components/Pagination.php';

class CatalogController
{

    public function actionIndex($page = 1)
    {
        if(isset($_SESSION['user'])){
            $userId = $_SESSION['user'];

            $viewedItems = array();
            $viewedItems = Product::getViewedProducts($userId);
            
            $recommendedProductsHis = array();
            $recommendedProductsHis = Product::getRecommendedProductsBaseHistory($userId);

        }
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $latestProducts = array();
        $latestProducts = Product::getFirstProducts($page);
        
        $popularProducts = array();
        $popularProducts = Product::getPopularProducts();
        
        $total = Product::getTotalProducts();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT_NINE, 'page-');
        
        require_once(ROOT . '/views/catalog/index.php');   

        return true;
    }
    
    public function actionCategory($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);
        
        $total = Product::getTotalProductsInCategory($categoryId);
        
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-'); 
        
        require_once(ROOT . '/views/catalog/category.php');   

        return true;
    }
    
    public function actionSortProductsByCheap($page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $sortProducts = array();
        $sortProducts = Product::getSortProductsByCheap($page);
        
        $total = Product::getTotalProducts();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT_NINE, 'page-');
        
        require_once(ROOT . '/views/catalog/sort.php');   

        return true;
    }
    public function actionSortProductsByExpensive($page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $sortProducts = array();
        $sortProducts = Product::getSortProductsByExpensive($page);
        
        $total = Product::getTotalProducts();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT_NINE, 'page-');
        
        require_once(ROOT . '/views/catalog/sort.php');   

        return true;
    }
    public function actionSortProductsByNew($page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $sortProducts = array();
        $sortProducts = Product::getSortProductsByNew($page);
        
        $total = Product::getTotalNewProducts();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        
        require_once(ROOT . '/views/catalog/sort.php');   

        return true;
    }

}

