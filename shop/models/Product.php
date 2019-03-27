<?php

class Product {

    const SHOW_BY_DEFAULT = 6;
    const SHOW_BY_DEFAULT_NINE = 9;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) {
        $count = intval($count);

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
                . 'WHERE status = "1" '
                . 'ORDER BY id DESC '
                . 'LIMIT ' . $count);

        $i = 0;

        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }
    
//        public static function getFirstProducts($count = self::SHOW_BY_DEFAULT) {
//        $count = intval($count);
//
//        $db = Db::getConnection();
//
//        $productsList = array();
//
//        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
//                . 'WHERE status = "1" '
//                . 'ORDER BY id ASC '
//                . 'LIMIT ' . $count);
//
//        $i = 0;
//
//        while ($row = $result->fetch()) {
//            $productsList[$i]['id'] = $row['id'];
//            $productsList[$i]['name'] = $row['name'];
//            $productsList[$i]['price'] = $row['price'];
//            $productsList[$i]['image'] = $row['image'];
//            $productsList[$i]['is_new'] = $row['is_new'];
//            $i++;
//        }
//
//        return $productsList;
//    }
    public static function getFirstProducts($page) {

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT_NINE;
            
        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                    . "WHERE status = '1' "
                    . "ORDER BY id ASC "
                    . "LIMIT ". self::SHOW_BY_DEFAULT_NINE. " "
                    . "OFFSET ". $offset);

        $i = 0;

        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductsListByCategory($categoryId = false, $page) {
        if ($categoryId) {
            
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            
//            $categoryId = intval($categoryId);
            
            $db = Db::getConnection();
            $products = array();

            $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                    . "WHERE status = '1' AND category_id = '$categoryId' "
                    . "ORDER BY id ASC "
                    . "LIMIT ". self::SHOW_BY_DEFAULT. " "
                    . "OFFSET ". $offset);


            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }
    
    public static function getProductById($id) {

        $id = intval($id);

        if($id){
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM product WHERE id='.$id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
        
    }
    
    public static function getTotalProductsInCategory($categoryId) {
        
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
                . 'WHERE status="1" AND category_id ="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }
    public static function getTotalProducts() {
        
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
                . 'WHERE status="1"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];  
    }
    public static function getTotalNewProducts() {
        
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
                . 'WHERE status="1" AND is_new = "1"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getProductsByIds($idsArray) {
        
        $products = array();
        
        $db = Db::getConnection();
        
        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;        
    }
    
    public static function getRecommendedProducts()
    {
        $recommendedProducts = array();
        
        $db = Db::getConnection();
        
        $sql = 'SELECT id, name, price, image FROM product WHERE status = "1" AND is_recommended = "1"';
        
        $result = $db->query($sql);
                
        $i = 0;
        while ($row = $result->fetch()){
            $recommendedProducts[$i]['id'] = $row['id'];
            $recommendedProducts[$i]['name'] = $row['name'];
            $recommendedProducts[$i]['price'] = $row['price'];
            $recommendedProducts[$i]['image'] = $row['image'];
            $i++;
        }
        return $recommendedProducts;
    }
    
    public static function getProductsList() {

        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
        $productsList = array();        
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['code'] = $row['code'];
            $i++;
        }

        return $productsList;
    }
    
    public static function deleteProductById($id) {

        $db = Db::getConnection();

        $sql = 'DELETE FROM product WHERE id = :id';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        $result->execute();
    }
    
    public static function updateProductById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE product
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                category_id = :category_id, 
                brand = :brand, 
                availability = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function createProduct($options)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO product '
                . '(name, code, price, category_id, brand, availability,'
                . 'description, is_new, is_recommended, status)'
                . 'VALUES '
                . '(:name, :code, :price, :category_id, :brand, :availability,'
                . ':description, :is_new, :is_recommended, :status)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }
       
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/upload/images/products/';
        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }
    
    
    
    public static function getSortProductsByCheap($page) {

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT_NINE;
            
        $db = Db::getConnection();

        $sortProductsList = array();

        $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                    . "WHERE status = '1' "
                    . "ORDER BY price ASC "
                    . "LIMIT ". self::SHOW_BY_DEFAULT_NINE. " "
                    . "OFFSET ". $offset);

        $i = 0;

        while ($row = $result->fetch()) {
            $sortProductsList[$i]['id'] = $row['id'];
            $sortProductsList[$i]['name'] = $row['name'];
            $sortProductsList[$i]['price'] = $row['price'];
            $sortProductsList[$i]['image'] = $row['image'];
            $sortProductsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $sortProductsList;
    }
    public static function getSortProductsByExpensive($page) {

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT_NINE;
            
        $db = Db::getConnection();

        $sortProductsList = array();

        $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                    . "WHERE status = '1' "
                    . "ORDER BY price DESC "
                    . "LIMIT ". self::SHOW_BY_DEFAULT_NINE. " "
                    . "OFFSET ". $offset);

        $i = 0;

        while ($row = $result->fetch()) {
            $sortProductsList[$i]['id'] = $row['id'];
            $sortProductsList[$i]['name'] = $row['name'];
            $sortProductsList[$i]['price'] = $row['price'];
            $sortProductsList[$i]['image'] = $row['image'];
            $sortProductsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $sortProductsList;
    }
    public static function getSortProductsByNew($page) {

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            
        $db = Db::getConnection();

        $sortProductsList = array();

        $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                    . "WHERE status = '1' AND is_new = '1' "
                    . "ORDER BY id ASC "
                    . "LIMIT ". self::SHOW_BY_DEFAULT. " "
                    . "OFFSET ". $offset);

        $i = 0;

        while ($row = $result->fetch()) {
            $sortProductsList[$i]['id'] = $row['id'];
            $sortProductsList[$i]['name'] = $row['name'];
            $sortProductsList[$i]['price'] = $row['price'];
            $sortProductsList[$i]['image'] = $row['image'];
            $sortProductsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $sortProductsList;
    }
    
    ////////////////////////
    public static function displayPriceProductViaSpace($value) {

            $substringRight = substr ($value, -3);
            $search = $substringRight;
            $replace = '';
            $subject = $value;
            $substringLeft = str_replace($search , $replace , $subject);
            
            $result = $substringLeft.' '.$substringRight;
            echo $result;
    }
    
    public static function saveProductSaw($idProduct, $userId){        
        $db = Db::getConnection();
        
        $counter = self::getTotalByUserId($userId);
        
        $sql = 'INSERT INTO product_history (product_id, user_id) VALUES (:product_id, :user_id); '
                . 'DELETE FROM product_history WHERE user_id = :user_id AND :counter > 9 ORDER BY date ASC LIMIT 1;';
        
//че не работает?        
//        $sql = "INSERT INTO product_history (id_product, user_id) VALUES (:id_product, :user_id) "
//                . "WHERE EXISTS (SELECT * FROM product_history WHERE id_product = :product_id)";

        $result = $db->prepare($sql);
        $result->bindParam(':product_id', $idProduct, PDO::PARAM_INT);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':counter', $counter, PDO::PARAM_INT);
        
        return $result->execute();
    }
    public static function getTotalByUserId($userId) {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product_history WHERE user_id = '.$userId);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }
    public static function saveNumberOfViews($idProduct, $userId){        
        $db = Db::getConnection();

        $sql = 'SELECT id FROM number_views WHERE product_id =:product_id AND user_id =:user_id ';
        $result = $db->prepare($sql);
        $result->bindParam(':product_id', $idProduct, PDO::PARAM_INT);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->execute();

        $idExists =  $result->fetch();
        $id = $idExists['id'];
        
        if(!$idExists['id']){
            $sql = 'INSERT INTO number_views (product_id, user_id) VALUES (:product_id, :user_id)';
            
            $result = $db->prepare($sql);
            $result->bindParam(':product_id', $idProduct, PDO::PARAM_INT);
            $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $result->execute();
        } else {
            $sql = 'UPDATE number_views SET counter = counter+1 WHERE id =:id';
            
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();
        }
    }
    
    public static function ifProductExists($id) {

//        $db = Db::getConnection();
//
//        $sql = 'SELECT id FROM product WHERE EXISTS (SELECT id FROM product WHERE id = :id)';
//        
//        $result = $db->prepare($sql);
//        
//        $result->bindParam(':id', $id, PDO::PARAM_STR);
//        
//        if ($result->execute()) {
//            return 1;
//        }else{
//            return 0;
//        }
//        ////////////
//        ///second///
//        ////////////
//        $id = intval($id);
//        
//        if($id){
//            $db = Db::getConnection();
//
//            $sql = 'SELECT EXISTS(SELECT 1 FROM product WHERE id =:id )';
//
//            $result = $db->prepare($sql);
//            $result->bindParam(':id', $id, PDO::PARAM_INT);
//            return $result->execute();
//        }

        $id = intval($id);

        if($id){
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM product WHERE id='.$id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function getViewedProducts($userId)
    {        
        $db = Db::getConnection();
        
        $sql = "SELECT product.id, product.name, product.price "
                . "FROM product, product_history "
                . "WHERE product.id = product_history.product_id AND user_id = '$userId' "
                . "ORDER BY product_history.date DESC";
        
        $result = $db->query($sql);
           
        $viewedProducts = array();
        $i = 0;              
        while ($row = $result->fetch()) {
            $viewedProducts[$i]['id'] = $row['id'];
            $viewedProducts[$i]['name'] = $row['name'];
            $viewedProducts[$i]['price'] = $row['price'];
            $i++;
        }

        return $viewedProducts;
    }
    
    public static function getPopularProducts(){
        
        $db = Db::getConnection();
              
        $result = $db->query('SELECT products FROM product_order ORDER BY id ASC');      
        
        $orderedProducts = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $orderedProducts[$i] = json_decode($row['products'], true);
            $i++;
        }

        //занести в созданный массив все ключи заказов
        foreach ($orderedProducts as $key => $value) {
            foreach ($value as $idProduct => $quantity) {
                $idsProducts[] = $idProduct;
            }
        }
        //сложение всех повторяющихся ключей
        $idsProductsRepeat = array_count_values($idsProducts);
        //выбор повторяющихся ключей, где значение больше указанного индекса (удаление остальных)
        $filteredIds = array_filter($idsProductsRepeat, function ($index) { return $index > 1; }); 
        //занести в созданный массив все отфильтрованные ключи
        $str_filteredIds = array_keys($filteredIds);
        
        return self::getProductsByIds($str_filteredIds);
    }
    
    public static function getSimilarProducts($productName){
        
        $pieces = explode(" ", $productName);
        $pieceName1 = "%$pieces[0]%";
        $pieceName2 = "%$pieces[1]%";
        $pieceName3 = "%$pieces[2]%";
        
        $db = Db::getConnection();
        $similarProducts = array();
        
        $result = $db->query("SELECT * FROM product "
                . "WHERE name LIKE '$pieceName1' OR name LIKE '$pieceName2' OR name LIKE '$pieceName3' "
                . "AND status = '1' "
                . "ORDER BY id DESC");
        
        $i = 1;
        while ($row = $result->fetch()) {
            $similarProducts[$i]['id'] = $row['id'];
            $similarProducts[$i]['name'] = $row['name'];
            $similarProducts[$i]['brand'] = $row['brand'];
            $similarProducts[$i]['price'] = $row['price'];
            $similarProducts[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $similarProducts;
    }
    public static function getConnectedProducts($categoryId){
                
        $db = Db::getConnection();
        
        $connectedProducts = array();
        
        if($categoryId == 1){
            $categMouse = 'Компьютерная мышь';
            
            $result = $db->query("SELECT * FROM product "
                    . "WHERE name LIKE '%$categMouse%' OR category_id = '7' OR category_id = '8' "
                    . "ORDER BY rand() "
                    . "LIMIT 10");
            $i = 0;
            while ($row = $result->fetch()) {
                $connectedProducts[$i]['id'] = $row['id'];
                $connectedProducts[$i]['name'] = $row['name'];
                $connectedProducts[$i]['price'] = $row['price'];
                $i++;
            }
        }elseif($categoryId == 2){
            $result = $db->query('SELECT * FROM product '
                    . 'WHERE category_id = "5" OR category_id = "6" OR category_id = "9" '
                    . 'ORDER BY rand() '
                    . 'LIMIT 10');
            $i = 0;
            while ($row = $result->fetch()) {
                $connectedProducts[$i]['id'] = $row['id'];
                $connectedProducts[$i]['name'] = $row['name'];
                $connectedProducts[$i]['price'] = $row['price'];
                $i++;
            }
        }elseif($categoryId == 3){
            $result = $db->query('SELECT * FROM product '
                    . 'WHERE category_id = "6" OR category_id = "8" '
                    . 'ORDER BY rand() '
                    . 'LIMIT 10');
            $i = 0;
            while ($row = $result->fetch()) {
                $connectedProducts[$i]['id'] = $row['id'];
                $connectedProducts[$i]['name'] = $row['name'];
                $connectedProducts[$i]['price'] = $row['price'];
                $i++;
            }
        }elseif($categoryId == 4){
            $result = $db->query('SELECT * FROM product '
                    . 'WHERE category_id = "8" '
                    . 'ORDER BY rand() '
                    . 'LIMIT 10');
            $i = 0;
            while ($row = $result->fetch()) {
                $connectedProducts[$i]['id'] = $row['id'];
                $connectedProducts[$i]['name'] = $row['name'];
                $connectedProducts[$i]['price'] = $row['price'];
                $i++;
            }
        }elseif($categoryId == 5){
            $result = $db->query('SELECT * FROM product '
                    . 'WHERE category_id = "6" OR category_id = "9" '
                    . 'ORDER BY rand() '
                    . 'LIMIT 10');
            $i = 0;
            while ($row = $result->fetch()) {
                $connectedProducts[$i]['id'] = $row['id'];
                $connectedProducts[$i]['name'] = $row['name'];
                $connectedProducts[$i]['price'] = $row['price'];
                $i++;
            }
        }
        
        return $connectedProducts;
    }

    
    public static function getRecommendedProductsBaseHistory($userId)
    {        
        $db = Db::getConnection();
                   
        $sql = "SELECT product.category_id "
                . "FROM product, product_history "
                . "WHERE product.id = product_history.product_id AND product_history.user_id =:user_id "
                . "ORDER BY product_history.date ASC";
        
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);     
        $result->execute();
        
        $idsCategories = array();
        $i = 0;              
        while ($row = $result->fetch()) {
            $idsCategories[$i] = $row['category_id'];
            $i++;
        }
            
        //повторяющиеся значения элементов
        $duplicateValues = array_count_values($idsCategories);
        //сортировка массива по возрастанию
        asort($duplicateValues);
        //вывод последних двух элементов массива
        $foundCategories = array_slice($duplicateValues, sizeof($duplicateValues)-2, 2, true);
        //вынести ключи из массива
        $keysCategories = array_keys($foundCategories);
        
        //две самые просматриваемые категории
        $firstCategory = $keysCategories[0];
        $secondCategory = $keysCategories[1];
        
        
        //выбрать из таблицы number_views продукты,которые соответствуют указанной категории и пользовтелю
        $prod = self::getMostViewedProductsByCategory($userId, $firstCategory);
        //сортировка массива по возрастанию
        asort($prod);
        //вывод последних двух элементов массива
        $mostViewed = array_slice($prod, sizeof($prod)-2, 2, true);
        //вынести ключи элементов из массива
        $twoMostViewedProducts = array_keys($mostViewed);
        //массив в строку
        $idsString = implode(',', $twoMostViewedProducts);
        //расчет средней цены продуктов
        $meanPrice = self::getProductsArithmeticMean($idsString);
        $productFirstCategory = self::getProductsFromSimilarPriceRange($meanPrice, $firstCategory);
        
        
        //выбрать из таблицы number_views продукты,которые соответствуют указанной категории и пользовтелю
        $prod = self::getMostViewedProductsByCategory($userId, $secondCategory);
        //сортировка массива по возрастанию
        asort($prod);
        //вывод последних двух элементов массива
        $mostViewed = array_slice($prod, sizeof($prod)-2, 2, true);
        //вынести ключи элементов из массива
        $twoMostViewedProducts = array_keys($mostViewed);
        //массив в строку
        $idsString = implode(',', $twoMostViewedProducts);
        //расчет средней цены продуктов
        $meanPrice = self::getProductsArithmeticMean($idsString);
        $productSecondCategory = self::getProductsFromSimilarPriceRange($meanPrice, $secondCategory);

        
        //слияние массивов продуктов из самых популярных категорий и соответствующих ценовому диапазону
        $recommendedProducts = array_merge($productFirstCategory, $productSecondCategory);
        return $recommendedProducts;
    }
    public static function getMostViewedProductsByCategory($userId, $categoryId){
        
        $db = Db::getConnection();
        
        $sql = "SELECT number_views.product_id, number_views.counter "
                . "FROM product, number_views "
                . "WHERE product.id = number_views.product_id AND number_views.user_id =:user_id AND product.category_id = :category_id";
        
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);     
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);     
        $result->execute();
        $products = array();
        $i = 0;              
        while ($row = $result->fetch()) {
            $productIds[$i] = $row['product_id'];
            $counters[$i]= $row['counter'];
            $i++;
        }
        
        //комбинирование двух массивов.Из первого элементы заносятся в ключи, из второго в значения
        $mostViewed = array_combine($productIds , $counters);
        return $mostViewed;
    }
    public static function getProductsArithmeticMean($idsString){
        $db = Db::getConnection();
        
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result2 = $db->query($sql);        
        $result2->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $result2->fetch()) {
            $priceProducts[$i] = $row['price'];
            $i++;
        }
        //подстчет средней цены продуктов
        return array_sum($priceProducts)/count($priceProducts);
    }
    public static function getProductsFromSimilarPriceRange($price, $categoryId){
        
        $db = Db::getConnection();
        
        $priceHigher = $price+2000;
        $priceLower = $price-2000;
        
        $sql = "SELECT * FROM product WHERE price > :priceLower AND price < :priceHigher AND category_id = :category_id";

        $result = $db->prepare($sql);
        $result->bindParam(':priceLower', $priceLower, PDO::PARAM_STR);     
        $result->bindParam(':priceHigher', $priceHigher, PDO::PARAM_STR);     
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);     
        $result->execute();
        $products = array();
        $i = 0;              
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products; 
    }
    

}
