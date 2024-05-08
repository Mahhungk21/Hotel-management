<?php
include_once __DIR__ . '/../../lib/database.php';

class Inventory_Model
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    //check product id is exist
    public function is_exist_product_id($id)
    {
        $query = "SELECT * FROM `product` WHERE id = $id;";
        $result = $this->database->select($query);
        if ($result != false) {
            return true;
        } else {
            return false;
        }
    }

    // get product infor in product table by id
    public function get_product_by_id($id)
    {
        $query = "SELECT * FROM `product` WHERE id = $id;";
        $result = $this->database->select($query);
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    // rename 'get_product_list()' to 'get_product_list_by_category()' - 2/12/2023
    public function get_product_list_by_category($category_id)
    {
        $query = "SELECT * FROM `product` WHERE category_id = '$category_id';";
        $result = $this->database->select($query);
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

    // if search to result, return a list, otherwise return []
    public function search_product_list($search)
    {
        $searchInput = $this->database->validateInput($search);

        $query = "SELECT * FROM `apartment` WHERE name like '%$searchInput%';";

        $result = $this->database->select($query);
        if ($result == false){
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_color_name_by_id($color_id)
    {

        $query = "SELECT `color_name` FROM `color` WHERE id = $color_id;";
        $result = $this->database->select($query);
        if ($result == false) {
            return 'Khong tim thay mau';
        }
        return $result->fetch_all(MYSQLI_ASSOC)[0]['color_name'];
    }

    // if search to result, return a list, otherwise return []
    public function get_colors_of_product($product_id)
    {
        $query = "SELECT color_id, product_img, color_name FROM `product_has_colors`, `color` WHERE id=color_id and product_id = $product_id;";
        $result = $this->database->select($query);
        if ($result == false) {
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_room_by_appartment_id($apartment_id){
        $query = "SELECT room_id, price, image FROM `apartment_has_room` WHERE apartment_id=$apartment_id;";
        $result = $this->database->select($query);
        if ($result == false) {
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_name_by_room_id($room_id){
        $query = "SELECT * FROM `room_typ` WHERE id = $room_id";
        $result = $this->database->select($query);
        if ($result) {
            return $result->fetch_assoc()['name'];
        }
        return -1;
    }

    // if search to result, return a list, otherwise return []
    public function get_colors_not_of_product($product_id)
    {
        $query = "SELECT id, color_name FROM color LEFT JOIN product_has_colors ON color.id = product_has_colors.color_id AND product_has_colors.product_id = $product_id WHERE product_has_colors.color_id IS NULL;";
        $result = $this->database->select($query);
        if ($result == false) {
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // if search to result, return a list, otherwise return []
    public function get_sizes_of_productColor($product_id, $color_id)
    {
        $query = "SELECT size_id, size_name, quantity FROM `color_has_sizes`, `size` WHERE size_id=id and color_id=$color_id and product_id = $product_id;";
        $result = $this->database->select($query);
        if ($result == false) {
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // if search to result, return a list, otherwise return []
    public function get_sizes_not_of_productColor($product_id, $color_id)
    {

        $query = "SELECT id, size_name FROM `size` LEFT JOIN `color_has_sizes` ON size.id = color_has_sizes.size_id AND color_has_sizes.product_id = $product_id AND color_has_sizes.color_id = $color_id WHERE color_has_sizes.size_id IS NULL;";
        $result = $this->database->select($query);
        if ($result == false) {
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // tra ve mot so
    public function get_quantity($product_id, $color_id, $size_name)
    {
        $size_id = $this->get_id_of_size_name($size_name);

        $query = "SELECT quantity FROM `color_has_sizes` WHERE size_id = $size_id and color_id = $color_id and product_id = $product_id;";
        $result = $this->database->select($query);
        return $result->fetch_all(MYSQLI_ASSOC)[0]['quantity']; // tra ve mot so
    }

    public function get_id_of_size_name($size_name)
    {
        $query = "SELECT `id` FROM `size` WHERE size_name = $size_name;";
        $result = $this->database->select($query);
        if ($result == false) {
            return -999;
        }
        return $result->fetch_all(MYSQLI_ASSOC)[0]['id'];
    }

    // return a link to img

    // neu co san pham, tra ve danh sach, khong co san pham, tra ve []
    public function get_all_product_not_desc()
    {
        $query = "SELECT `id`, `name`,`category_id` FROM apartment";
        $result = $this->database->select($query);
        if ($result == false){
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_roomtype_by_apartmentId($id , $roomid)
    {
        $query = "SELECT * FROM `apartment_has_room` WHERE `apartment_id` = $id AND `room_id` = $roomid";
        $result = $this->database->select($query);
        if ($result == false) {
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_image_by_id($id)
    {
        $query = "SELECT * FROM `apartment` WHERE `id` = $id";
        $result = $this->database->select($query);
        if ($result == false) {
            return [];
        }
        return $result->fetch_assoc()['apartment_img'];;
    }
    public function get_product_by_id_not_desc($id)
    {
        $query = "SELECT `id`, `product_name`, `price`, `category_id` FROM `product` WHERE id = $id;";
        $result = $this->database->select($query);
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    // them mot mau cho mot san pham nao do
    public function add_new_color_for_product($product_id, $colorid, $productimage, $productsize)
    {
        $productimage = $this->database->validateInput($productimage);

        $query = "INSERT INTO `product_has_colors` (`product_id`, `color_id`, `product_img`) VALUES ('$product_id', '$colorid', '$productimage')";
        $result1 = $this->database->insert($query);

        // insert size
        for ($i = 24; $i <= 45; $i++) {
            if ($productsize[$i - 24] == true) {

                $size_id = $this->get_id_of_size_name($i);

                $query = "INSERT INTO `color_has_sizes` (`product_id`, `color_id`, `size_id`, `quantity`) VALUES ('$product_id', '$colorid', '$size_id', '0')";

                $result2 = $this->database->insert($query);
            }
        }

        return true;
    }

    // xoa mot mau cua mot san pham nao do
    public function remove_color_of_product($product_id, $color_id)
    {
        $query = "DELETE FROM `product_has_colors` WHERE `product_has_colors`.`product_id` = $product_id AND `product_has_colors`.`color_id` = $color_id";
        $result = $this->database->delete($query);
        return true;
    }

    // them size cho mot san pham voi mot mau cu the
    public function add_new_size_for_productColor($product_id, $colorid, $size_name)
    {
        // insert size
        $size_id = $this->get_id_of_size_name($size_name);
        $query = "INSERT INTO `color_has_sizes` (`product_id`, `color_id`, `size_id`, `quantity`) VALUES ('$product_id', '$colorid', '$size_id', '0')";
        $result = $this->database->insert($query);
        return true;
    }
    public function addRoomInfo($appId, $roomid, $price, $image)
    {

        $query = "INSERT INTO `apartment_has_room` (`apartment_id`, `room_id`, `price`, `image`) VALUES ('$appId', '$roomid', '$price', '$image')";
        $result = $this->database->insert($query);
        return true;
    }
    // xoa size cho mot san pham voi mot mau cu the
    public function remove_size_of_productColor($product_id, $colorid, $size_name)
    {
        $size_id = $this->get_id_of_size_name($size_name);
        $query = "DELETE FROM `color_has_sizes` WHERE `color_has_sizes`.`product_id` = $product_id AND `color_has_sizes`.`color_id` = $colorid AND `color_has_sizes`.`size_id` = $size_id";
        $result = $this->database->delete($query);
        return true;
    }

    //thay doi so luong san pham cua mot size cua mot san pham voi mot mau cu the
    public function update_quantity_for_aSize_of_productColor($product_id, $colorid, $size_name, $quantity)
    {

        $oldQuantity = $this->get_quantity($product_id, $colorid, $size_name);

        if ((int)$oldQuantity == (int)$quantity) {
            return true;
        }

        $size_id = $this->get_id_of_size_name($size_name);

        $query = "UPDATE `color_has_sizes` SET `quantity` = $quantity WHERE `color_has_sizes`.`product_id` = $product_id AND `color_has_sizes`.`color_id` = $colorid AND `color_has_sizes`.`size_id` = $size_id;";
        $result = $this->database->update($query);

        return $result;
    }

    public function remove_product_notHasColor_by_id($product_id)
    {
        $query = "DELETE FROM `product` WHERE `product`.`id` = $product_id";
        $result = $this->database->delete($query);
        if ($result == false) {
            return false;
        }
        return true;
    }


}