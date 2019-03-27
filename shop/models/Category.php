<?php

class Category
{
    public static function nameCategory($categoryId){
        switch ($categoryId) {
            case 1:
                echo 'НОУТБУКИ';
                break;
            case 2:
                echo 'СИСТЕМНЫЕ БЛОКИ';
                break;
            case 3:
                echo 'МОНОБЛОКИ';
                break;
            case 4:
                echo 'ПЛАНШЕТЫ';
                break;
            case 5:
                echo 'МОНИТОРЫ';
                break;
            case 6:
                echo 'КЛАВИАТУРЫ И МЫШИ';
                break;
            case 7:
                echo 'АКУСТИЧЕСКИЕ СИСТЕМЫ';
                break;
            case 8:
                echo 'НАУШНИКИ';
                break;
            case 9:
                echo 'ВЕБ-КАМЕРЫ';
                break;
        }
    }

    public static function getCategoriesList()
    {

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name FROM category '
                . 'ORDER BY sort_order ASC');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;
    }
    
    public static function getCategoriesListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Запрос к БД
        $result = $db->query('SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC');
        // Получение и возврат результатов
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }
    
    public static function getStatusText($status)
    {
        switch ($status) {
            case 1:
                return 'Отображается';
                break;
            case 0:
                return 'Скрыта';
                break;
        }
    }

    public static function createCategory($options)
    {
        $db = Db::getConnection();
        
        $sql = 'INSERT INTO category (name, sort_order, status) VALUES (:name, :sort_order, :status)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->execute();
    }
    
    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();
        
        $sql = 'DELETE FROM category WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
    }
    
    public static function getCategoryById($id)
    {
        $id = intval($id);
        
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM category WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $result->execute();
        
        return $result->fetch();
    }
    
    public static function updateCategoryById($options)
    {        
        $db = Db::getConnection();
        
        $sql = 'UPDATE category SET name = :name , sort_order = :sort_order , status = :status WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->execute();
    }
    
    public static function nextNumberCategory()
    {        
        $db = Db::getConnection();
        
        $sql = 'SELECT count(id) AS count FROM category';
        
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $number = $result->fetch();

        return $number['count'];
    }   
    
}
