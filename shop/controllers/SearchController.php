<?php

class SearchController
{

//    public function actionIndex($page = 1)
//    {
//        $categories = array();
//        $categories = Category::getCategoriesList();
//        
//        if(isset($_POST['search']) ){
//            $searchq = $_POST['search'];
//            $searchres = Search::searchResult($searchq, $page);
//            
//            $total = Search::getFoundTotalProducts($searchq);
//            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT_NINE, 'page-');
//        }
//               
//        require_once(ROOT . '/views/search/index.php');   
//
//        return true;
//    }
    
    public function actionIndex($page = 1)
    {       
        $categories = array();
        $categories = Category::getCategoriesList();
        
        if(isset($_POST['search'])){
            $searchq = $_POST['search'];
            $_SESSION['sear'] = $searchq;

            $searchResult = Search::searchResult($searchq, $page);

            $total = Search::getFoundTotalProducts($searchq);
            $total_product = Search::getEndOfWord($total);
            
            $pagination = new Pagination($total, $page, Search::SHOW_BY_DEFAULT_SIX, 'page-');
        }else{
            $searchq = $_SESSION['sear'];

            $searchResult = Search::searchResult($searchq, $page);

            $total = Search::getFoundTotalProducts($searchq);
            $total_product = Search::getEndOfWord($total);
            
            $pagination = new Pagination($total, $page, Search::SHOW_BY_DEFAULT_SIX, 'page-');
        }
        
        
               
        require_once(ROOT . '/views/search/index.php');   

        return true;
    }

}
