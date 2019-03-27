<?php

class Order {
    
    public static function save($userName, $userPhone, $userComment, $userId, $products) {

        $products = json_encode($products);
        
        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products)'
                . 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':products', $products, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function getOrdersList(){
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM product_order';
        
        $result = $db->query($sql);
        $val = array();
        $i = 0;
        while ($row = $result->fetch()){
            $val[$i]['id'] = $row['id'];
            $val[$i]['user_name'] = $row['user_name'];
            $val[$i]['user_phone'] = $row['user_phone'];
            $val[$i]['user_id'] = $row['user_id'];
            $val[$i]['date'] = $row['date'];
            $val[$i]['products'] = $row['products'];
            $val[$i]['status'] = $row['status'];
            $i++;
        }
        return $val;
    }
    
    public static function getOrderById($id){
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM product_order WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam('id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    
    public static function getOrderByUserName($user_name){
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM product_order WHERE user_name = :user_name';
        
        $result = $db->prepare($sql);
        $result->bindParam('user_name', $user_name, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    
    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status){
        $db = Db::getConnection();
        
        $sql = "UPDATE product_order
            SET 
                user_name = :user_name, 
                user_phone = :user_phone, 
                user_comment = :user_comment, 
                date = :date, 
                status = :status 
            WHERE id = :id";
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function deleteOrderById($id){
        $db = Db::getConnection();
        
        $sql = 'DELETE FROM product_order WHERE id = :id';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
    }
    
    public static function getStatusText($status){
        switch ($status) {
            case 1:
                return 'Новый заказ';
                break;
            case 2:
                return 'В обработке';
                break;
            case 3:
                return 'Доставляется';
                break;
            case 4:
                return 'Закрыт';
                break;
        }
    }
    
}
