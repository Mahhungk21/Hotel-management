<?php
include_once __DIR__ . '/../../lib/database.php';

class Product_Model
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    // neu khong tim san pham nao se tra ve false
    public function get_product_by_id($id)
    {
        $query = "SELECT * FROM `apartment` WHERE id = $id;";
        $result = $this->database->select($query);
        if ($result == false) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }
    public function get_product_by_name($name)
    {
        $name = $this->database->validateInput($name);
        $query = "SELECT * FROM `apartment` WHERE `name` = '$name';";
        $result = $this->database->select($query);
        if ($result == false) {
            return false;
        }
        return $result->fetch_assoc()['id'];
    }
    // rename 'get_product_list()' to 'get_product_list_by_category()' - 2/12/2023
    // neu khong co san pham nao thi tra ve []
    public function get_product_list_by_category($category_id)
    {
        $query = "SELECT * FROM `product` WHERE category_id = '$category_id';";
        $result = $this->database->select($query);
        if ($result == false){
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function sort_product_list($sort)
    {
        if ($sort == '1') {
            return " ORDER BY price ASC";
        } elseif ($sort == "2") {
            return " ORDER BY price DESC";
        } elseif ($sort == "3") {
            return " ORDER BY product_name ASC";
        } elseif ($sort == "4") {
            return " ORDER BY product_name DESC";
        } else {
            return "";
        }
    }

    public function filter_product_list($color, $size, $price, $category_id, $sort)
    {
        if (empty($color) && empty($size) && empty($price)) {

            $query = "SELECT DISTINCT product.id,product.product_name,product.price,product.avatar
            FROM `product` WHERE category_id = $category_id";
        } elseif (empty($color) && empty($size)) {

            $query = "SELECT DISTINCT product.id,product.product_name,product.price,product.avatar
            FROM product
            WHERE category_id = $category_id
            AND product.price < $price";
        } elseif (empty($size) && empty($price)) {

            if (substr($color, -1) == ',') {
                $color = substr($color, 0, -1);
            }
            $query = "SELECT DISTINCT product.id,product.product_name,product.price,product.avatar
            FROM product, product_has_colors
            WHERE category_id = $category_id
            AND product.id = product_has_colors.product_id
            AND product_has_colors.color_id in ($color)";
        } elseif (empty($color) && empty($price)) {

            if (substr($size, -1) == ',') {
                $size = substr($size, 0, -1);
            }

            $query = "SELECT DISTINCT product.id,product.product_name,product.price,product.avatar
            FROM product, color_has_sizes
            WHERE category_id = $category_id
            AND product.id = color_has_sizes.product_id
            AND color_has_sizes.size_id in ($size)";
        } elseif (empty($color)) {

            if (substr($size, -1) == ',') {
                $size = substr($size, 0, -1);
            }

            $query = "SELECT DISTINCT product.id,product.product_name,product.price,product.avatar
            FROM product, color_has_sizes
            WHERE category_id = $category_id
            AND product.id = color_has_sizes.product_id
            AND product.price < $price
            AND color_has_sizes.size_id in ($size)";
        } elseif (empty($size)) {

            if (substr($color, -1) == ',') {
                $color = substr($color, 0, -1);
            }

            $query = "SELECT DISTINCT product.id,product.product_name,product.price,product.avatar
            FROM product, product_has_colors
            WHERE category_id = $category_id
            AND product.id = product_has_colors.product_id
            AND product.price < $price
            AND product_has_colors.color_id in ($color)";
        } elseif (empty($price)) {

            if (substr($color, -1) == ',') {
                $color = substr($color, 0, -1);
            }
            if (substr($size, -1) == ',') {
                $size = substr($size, 0, -1);
            }

            $query = "SELECT DISTINCT product.id,product.product_name,product.price,product.avatar
            FROM product, color_has_sizes
            WHERE category_id = $category_id
            AND product.id = color_has_sizes.product_id
            AND color_has_sizes.color_id in ($color)
            AND color_has_sizes.size_id in ($size)";
        } else {

            if (substr($color, -1) == ',') {
                $color = substr($color, 0, -1);
            }
            if (substr($size, -1) == ',') {
                $size = substr($size, 0, -1);
            }

            $query = "SELECT DISTINCT product.id,product.product_name,product.price,product.avatar
            FROM product, color_has_sizes
            WHERE category_id = $category_id
            AND product.id = color_has_sizes.product_id
            AND product.price < $price
            AND color_has_sizes.color_id in ($color)
            AND color_has_sizes.size_id in ($size)";
        }

        $query .= $this->sort_product_list($sort);

        $result = $this->database->select($query);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function search_product_list($search)
    {
        $query = "SELECT * FROM `product` WHERE product_name like '%$search%';";
        $result = $this->database->select($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_colors_of_product($product_id)
    {
        $query = "SELECT color_id, product_img, color_name FROM `product_has_colors`, `color` WHERE id=color_id and product_id = $product_id;";
        $result = $this->database->select($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_sizes_of_productColor($product_id, $color_id)
    {
        $query = "SELECT size_id, size_name, quantity FROM `color_has_sizes`, `size` WHERE size_id=id and color_id=$color_id and product_id = $product_id;";
        $result = $this->database->select($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_quantity($product_id, $color_id, $size_id)
    {
        $query = "SELECT quantity FROM `color_has_sizes` WHERE size_id=$size_id and color_id=$color_id and product_id = $product_id;";
        $result = $this->database->select($query);
        return $result->fetch_all(MYSQLI_ASSOC)[0]['quantity'];
    }

    public function get_avatar($product_id, $color_id)
    {
        $query = "SELECT product_img FROM `product_has_colors` WHERE color_id=$color_id and product_id = $product_id;";
        $result = $this->database->select($query);
        return $result->fetch_all(MYSQLI_ASSOC)[0]['product_img'];
    }

    // Dung's function
    public function add_product_infor($productname, $productprice, $productdesc, $category_id, $colorid, $productimage, $productsize)
    {
        // validate input
        // echo "<h1>inner</h1>";
        $productname = $this->database->validateInput($productname);
        $productdesc = $this->database->validateInput($productdesc);
        $productimage = $this->database->validateInput($productimage);

        // echo "<h1>inner 1</h1>";
        
        $query = "INSERT INTO `product`(`id`, `product_name`, `price`, `description`, `category_id`) VALUES (NULL, '$productname', '$productprice', '$productdesc', '$category_id')";
        $product_id = $this->database->insert_for_autoIncrement($query);

        // echo "<h1>inner 2</h1>";

        $query = "INSERT INTO `product_has_colors` (`product_id`, `color_id`, `product_img`) VALUES ('$product_id', '$colorid', '$productimage')";

        // echo "<h1>inner 2</h1>";

        $result1 = $this->database->insert($query);

        // echo "<h1>inner 2</h1>";

        // insert size
        for ($i = 24; $i <= 45; $i++) {
            if ($productsize[$i - 24] == true) {

                // echo "<h1>" . $i . "</h1>";

                $query_sizeid = "SELECT * FROM `size` WHERE `size_name` = '$i'";
                $result_sizeid = $this->database->select($query_sizeid);

                $size_id = $result_sizeid->fetch_all(MYSQLI_ASSOC)[0]['id'];

                $query = "INSERT INTO `color_has_sizes` (`product_id`, `color_id`, `size_id`, `quantity`) VALUES ('$product_id', '$colorid', '$size_id', '0')";

                $result2 = $this->database->insert($query);

                // if ($result2 == true) {
                //     echo "<pre> insert size '$i' thanh cong </pre>";
                // }
            }
        }

        // echo "<h1>" . var_dump($product_id) . "</h1>";
        return $product_id;
    }

    public function get_all_product()
    {
        $query = "SELECT *  FROM product";
        $result = $this->database->select($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    function get_rate_by_id($id){
        $query = "SELECT *  FROM `rating` WHERE `apartment_id` = $id";
        $result = $this->database->select($query);
        if ($result){
            return $result->fetch_assoc()['rating_star'];
        }
        return 0;
    }
    function del_rate_by_id($id)
    {
        $query = "DELETE FROM `rating` WHERE `rating`.`apartment_id` = '$id';";
        $result = $this->database->delete($query);
        return $result;
    }
    function updateNameProductById($product_id, $new_name)
    {
        $new_name = $this->database->validateInput($new_name);
        $query = "UPDATE `apartment` SET `name` = '$new_name' WHERE `apartment`.`id` = '$product_id';";
        $result = $this->database->update($query);
        return $result;
    }
    function updateImgProductById($product_id, $new_image)
    {
        $query = "UPDATE `apartment` SET `apartment_img` = '$new_image' WHERE `apartment`.`id` = '$product_id';";
        $result = $this->database->update($query);
        return $result;
    }
    function updatePriceProductById($product_id, $new_price)
    {
        $new_price = $this->database->validateInput($new_price);
        $query = "UPDATE `product` SET `price` = '$new_price' WHERE `product`.`id` = '$product_id';";
        $result = $this->database->update($query);
        return $result;
    }

    function updateDescriptionProductById($product_id, $new_des)
    {
        $new_des = $this->database->validateInput($new_des);
        $query = "UPDATE `apartment` SET `description` = '$new_des' WHERE `apartment`.`id` = '$product_id';";
        $result = $this->database->update($query);
        return $result;
    }
    function deleteRoomById($product_id, $room_id){
        $query = "DELETE FROM `apartment_has_room` WHERE `apartment_has_room`.`apartment_id` = '$product_id' AND `apartment_has_room`.`room_id` ='$room_id';";
        $result = $this->database->delete($query);
        return $result;
    }
    function deleteAllRoomById($product_id)
    {
        $query = "DELETE FROM `apartment_has_room` WHERE `apartment_has_room`.`apartment_id` = '$product_id';";
        $result = $this->database->delete($query);
        return $result;
    }
    function updateAvatarProductById($product_id, $color_id, $new_avatar)
    {
        $new_avatar = $this->database->validateInput($new_avatar);
        $query = "UPDATE `product_has_colors` SET `product_img` = '$new_avatar' WHERE `product_has_colors`.`product_id` = '$product_id' AND `product_has_colors`.`color_id` = '$color_id';";
        $result = $this->database->update($query);
        return $result;
    }
    function updateAvatarRoomById($product_id, $room_id, $new_avatar)
    {
        $new_avatar = $this->database->validateInput($new_avatar);
        $query = "UPDATE `apartment_has_room` SET `image` = '$new_avatar' WHERE `apartment_has_room`.`apartment_id` = '$product_id' AND `apartment_has_room`.`room_id` ='$room_id' ";
        $result = $this->database->update($query);
        return $result;
    }
    function updatePriceRoomById($product_id, $room_id, $new_price){
        $price = $this->database->validateInput($new_price);
        $query = "UPDATE `apartment_has_room` SET `price` = '$price' WHERE `apartment_has_room`.`apartment_id` = '$product_id' AND `apartment_has_room`.`room_id` ='$room_id' ";
        $result = $this->database->update($query);
        return $result;
    }

    function addApartmentInfo($productname, $productdesc, $categoryid, $img){
        $name = $this->database->validateInput($productname);
        $desc = $this->database->validateInput($productdesc);

        $query = "INSERT INTO `apartment`(`id`, `name`, `description`,`apartment_img`, `category_id`) VALUES (NULL, '$name', '$desc', '$img','$categoryid')";
        $result = $this->database->insert_for_autoIncrement($query);
        return $result;
    }
    function delApartmentById($id)
    {
        $query = "DELETE FROM `apartment` WHERE `apartment`.`id` = '$id';";
        $result = $this->database->delete($query);
        return $result;
    }



}