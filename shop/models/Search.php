<?php

class Search {
    
    const SHOW_BY_DEFAULT_SIX = 6;
    
    public static function searchResult($searchq, $page) {
        
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT_SIX;
        
        $db = Db::getConnection();
        $searchList = array();
        
        $result = $db->query("SELECT * FROM product "
                . "WHERE name LIKE '%$searchq%' OR brand LIKE '%$searchq%' "
                . "AND status = '1' "
                . "ORDER BY id DESC "
                . "LIMIT ". self::SHOW_BY_DEFAULT_SIX. " "
                . "OFFSET ". $offset);
        
        $i = 1;
        while ($row = $result->fetch()) {
            $searchList[$i]['id'] = $row['id'];
            $searchList[$i]['name'] = $row['name'];
            $searchList[$i]['brand'] = $row['brand'];
            $searchList[$i]['price'] = $row['price'];
            $searchList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $searchList;
    }
    
    public static function getFoundTotalProducts($searchq) {
        
        $db = Db::getConnection();
        
        $result = $db->query("SELECT count(id) AS count FROM product "
                . "WHERE name LIKE '%$searchq%' OR brand LIKE '%$searchq%'");
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }
    
    public static function getEndOfWord($total) {
        if($total <= 20){
            if($total == 1){
                $result = 'товар';
            }elseif($total == 2 || $total == 3 || $total == 4){
                $result = 'товара';
            }else{
                $result = 'товаров';
            }
        } else {
            if(($total%10) == 1){
                $result = 'товар';
            }elseif(($total%10) == 2 || ($total%10) == 3 || ($total%10) == 4){
                $result = 'товара';
            }else{
                $result = 'товаров';
            }
        }
        
        return $result;
    }
    
    public static function match($uri, $searchValue){
        $param_uri = $uri;
        $param_searchValue = $searchValue;
        preg_match($param_searchValue, $param_uri, $match);

        if(isset($match[0])){
            echo 'selected';
        }
    }
    
}
