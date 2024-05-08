<?php
include_once "../model/location_model.php";
include_once "../model/category_model.php";
include_once "../model/product_model.php";
include_once "../model/color_model.php";
include_once "../model/size_model.php";
include_once "../model/userModel.php";
include_once "../model/orderModel.php";
include_once "../lib/session.php";
include_once "../lib/database.php";

class Controller
{
    public function invoke()
    {
        if (isset($_GET["controller"])) {
            // $action = $_GET["action"];
            $controller = $_GET['controller'];
            require '../controller/' . $controller . 'Controller.php';
            $request = new User;
        } else if (isset($_GET['logic'])) {
            include_once "../view/layouts/account/order-detail.logic.php";
        } else {
            session_start();
            $this->controlHeader();
            $this->controlContent();
            $this->controlFooter();
        }
    }

    public function controlHeader()
    {
        $category_model = new Category_Model();
        $cart_id = $this->get_cart_id();

        $cart_items = [];
        $total_price = null;

        if ($cart_id and $cart_items = $this->get_cart($cart_id)) {
            $total_price = array_reduce($cart_items,
                fn($total_price, $cart_item) => $total_price + $cart_item["price"] * $cart_item["cart_quantity"], 0);
        }

        include_once "../view/partials/header.php";
    }

    public function control_item_list()
    {
        $location = new Location_Model();
        $product_model = new Product_Model();
        // $size_model = new Size_Model();
        $search = '';
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $product_list = $product_model->search_product_list($search);
        } else {
            $sort = '';
            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            }

            $category_model = new Category_Model();
            $category = $category_model->get_category_by_id($_GET['category_id']);
            $product_list = $product_model->filter_apartment_list($category['id'], $sort);
        }

        $viewmore = true;
        $limited = false;
        $product_count = 15;
        if (!isset($_GET['viewmore']) && $product_list) {
            if (count($product_list) <= $product_count) {
                $limited = true;
            } else {
                $viewmore = false;
                $product_list = array_slice($product_list, 0, $product_count);
            }
        }
        include_once "../view/layouts/product/item-list.php";
    }

    public function control_detail_item()
    {
        $product_id = $_GET['product_id'];
        $product_model = new Product_Model();
        $location = new Location_Model();
        $apartment_model = new Location_Model();
        $category_model = new Category_Model();
        $apartment_room_model = new Location_Model();
        $catagory_model = new Location_Model();
        $roomtyp_model = new Location_Model();
        $product = $product_model->get_product_by_id($product_id);
        // lay name
        $apartment= $apartment_model->get_all_apartment($product_id);
        $category = $category_model->get_category_by_id($product['category_id']);
        //star
        $star_model = new Location_Model();
        $star = $star_model->get_star_by_id($product_id);
        // img_room
        $apartment_room = $apartment_room_model->get_apartment_has_room($product_id);
        // catagory
        $catagory = $catagory_model->get_category_by_id($product_id);
        // roomtyp
        // if (isset($apartment_room['room_id'])){
        //     $room_id = $apartment_room['room_id'];
        //     $roomtyp = $roomtyp_model->get_roomtyp_by_id($room_id);
        // }
        // $roomtyp = $roomtyp_model->get_roomtyp_by_id($apartment_room['room_id']);
        include_once "../view/layouts/product/breadcrumb.php";
        include_once "../view/layouts/product/detail-item.php";
    }

    public function control_account_update()
    {
        /*
        if (isset($_POST['update'])) {
        $user_model = new UserModel();
        $fullname =  $_POST['fullname'];
        $date = $_POST['date'];
        $province = $_POST['provinceOption'];
        $district = $_POST['districtOption'];
        $detail = $_POST['detail'];
        $phone =     $_POST['phone'];
        $id = $_POST['id'];
        }
         */
        $user_model = new UserModel();
        if (isset($_POST["fullname"])) {
            $fullname = $_POST["fullname"];
        }
        if (isset($_POST["date"])) {
            $date = $_POST["date"];
        }
        if (isset($_POST["text_province"])) {
            $province = $_POST["text_province"];
        }
        if (isset($_POST["text_district"])) {
            $district = $_POST['text_district'];
        }
        if (isset($_POST['detail'])) {
            $detail = $_POST['detail'];
        }
        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
        }
        $id = $_SESSION['user-id'];

        $result = $user_model->__update($id, $fullname, $date, $province, $district, $detail, $phone);
        $_SESSION['success-update'] = $result;
        if ($result) {

            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=' . '?account' . '">';
            die();
        }
    }

    public function control_account_update_add()
    {
        $user_model = new UserModel();

        if (isset($_POST["fullname"])) {
            $fullname = $_POST["fullname"];
        }
        if (isset($_POST["text_province"])) {
            $province = $_POST["text_province"];
        }
        if (isset($_POST["text_district"])) {
            $district = $_POST['text_district'];
        }
        if (isset($_POST['detail'])) {
            $detail = $_POST['detail'];
        }
        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
        }

        if (isset($_POST['address-default'])) {
            $default = 1;
        } else {
            $default = 0;
        }
        $id = $_SESSION['user-id'];
        $result = $user_model->__insertAdd($id, $fullname, $province, $district, $detail, $phone, $default);

        $_SESSION['success-update'] = $result;
        if ($result) {

            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=' . '?account&&action=maps' . '">';
            die();
        }
    }
    public function control_account_delete($id)
    {
        $user_model = new UserModel();
        $result = $user_model->__deleteById($id);

        $_SESSION['success-delete'] = $result;

        if ($result) {

            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=' . '?account&&action=maps' . '">';
            die();
        }
    }
    public function control_account_modify($id, $user_id)
    {
        $user_model = new UserModel();
        $result = $user_model->__modifyDefault($id, $user_id);

        $_SESSION['success-update'] = $result;

        if ($result) {

            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=' . '?account&&action=maps' . '">';
            die();
        }
    }

    public function controlContent()
    {
        if (isset($_GET["item_list"])) {
            $this->control_item_list();
            $this->control_item_list();
        } else if (isset($_GET["detail_item"])) {
            $this->control_detail_item();
        } else if (isset($_GET['cart'])) {
            $this->cart_control_content();
        } else if (isset($_GET['checkout'])) {
            $this->checkout_control_content();
        } else if (isset($_GET["account"])) {

            if (isset($_GET["action"])) {
                $action = $_GET["action"];
                switch ($action) {
                    case "":{

                            include_once "../view/layouts/account/account.php";

                            break;
                        }
                    case "update":{
                            // $user_model = new UserModel();
                            include_once "../view/layouts/account/account-update.php";
                            if (isset($_POST["update"])) {
                                $this->control_account_update();
                            }
                            break;
                        }
                    case "manage":{
                            include_once "../view/layouts/account/account-manage.php";
                            break;
                        }
                    case "maps":{
                            include_once "../view/layouts/account/account-maps.php";
                            if (isset($_POST["update-add"])) {
                                $this->control_account_update_add();
                            }

                            break;
                        }
                    case "notifi":{
                            include_once "../view/layouts/account/account-notifi.php";
                            break;
                        }
                    case "delete":{
                            if (isset($_GET["id"])) {
                                $id = $_GET["id"];
                                $this->control_account_delete($id);
                            }

                            break;
                        }
                    case "modify":{
                            if (isset($_GET["id"])) {
                                $id = $_GET["id"];
                                $user_id = $_SESSION["user-id"];
                                $this->control_account_modify($id, $user_id);
                            }

                            break;
                        }
                    case "logic":{
                            include_once "../view/layouts/account/order-detail.logic.php";
                            break;
                        }
                    default:{
                            include_once "../view/layouts/account/account.php";
                            break;
                        }
                }
            } else {
                include_once "../view/layouts/account/account.php";
            }
        } else {
            include_once "../view//layouts/homepage.php";
            include_once "../view//layouts/homepage.php";
        }
    }

    public function controlFooter()
    {
        include_once "../view//partials/footer.php";
        include_once "../view//partials/footer.php";
    }

    public function cart_control_content()
    {
        $order_id = $this->get_cart_id();
        $db = new Database();

        $cart_items = null;

        if ($order_id) {
            $query = "SELECT order_has_product.product_id, product.product_name, order_has_product.color_id, color.color_name, order_has_product.size_id, size_name, order_has_product.product_count as cart_quantity, color_has_sizes.quantity as max_quantity, price, product_has_colors.product_img
                FROM order_has_product
                JOIN product ON order_has_product.product_id = product.id
                JOIN orderdetails ON orderdetails.id = order_has_product.order_id
                JOIN color ON order_has_product.color_id = color.id
                JOIN size ON order_has_product.size_id = size.id
                JOIN product_has_colors
                    ON order_has_product.product_id = product_has_colors.product_id
                    AND order_has_product.color_id = product_has_colors.color_id
                JOIN color_has_sizes ON
                    color_has_sizes.product_id = order_has_product.product_id
                    AND color_has_sizes.color_id = order_has_product.color_id
                    AND color_has_sizes.size_id = order_has_product.size_id
                WHERE order_has_product.order_id = " . $order_id . ";";

            $cart_items = $db->select($query);
        }

        include_once "../view/layouts/cart/cart.php";
    }

    private function check_cart($id)
    {
        $db = new Database();
        $check_cart_q = "SELECT is_cart FROM orderdetails WHERE id = " . $id . ";";
        $check_cart_res = $db->select($check_cart_q);
        if (!$check_cart_res) {
            return false;
        }
        $row = $check_cart_res->fetch_assoc();
        return $row["is_cart"] != 0;
    }

    private function get_cart_id()
    {
        $session = new Session();
        $db = new Database();

        if (!$session->get('user-id')) {
            if (isset($_COOKIE['order-id']) and $this->check_cart($_COOKIE['order-id'])) {
                return $_COOKIE['order-id'];
            }
            return null;
        }
        $q = "SELECT id FROM orderdetails WHERE customer_id = " . $_SESSION['user-id'] . " AND is_cart = 1";
        $res = $db->select($q);
        if ($res) {
            return $res->fetch_assoc()["id"];
        }
        return null;
    }

    private function get_cart($cart_id)
    {
        $db = new Database();
        $query = "SELECT order_has_product.product_id, product_name, order_has_product.color_id, color.color_name,
                order_has_product.size_id, size_name, order_has_product.product_count as cart_quantity,
                color_has_sizes.quantity as max_quantity, price, product_has_colors.product_img
            FROM order_has_product
            JOIN product ON order_has_product.product_id = product.id
            JOIN orderdetails ON orderdetails.id = order_has_product.order_id
            JOIN color ON order_has_product.color_id = color.id
            JOIN size ON order_has_product.size_id = size.id
            JOIN product_has_colors
                ON order_has_product.product_id = product_has_colors.product_id
                AND order_has_product.color_id = product_has_colors.color_id
            JOIN color_has_sizes ON
                color_has_sizes.product_id = order_has_product.product_id
                AND color_has_sizes.color_id = order_has_product.color_id
                AND color_has_sizes.size_id = order_has_product.size_id
            WHERE order_has_product.order_id = " . $cart_id . ";";

        $query_res = $db->select($query);
        if (!$query_res) {
            return false;
        }
        return $query_res->fetch_all(MYSQLI_ASSOC);
    }

    private function checkout_control_content()
    {


        $cart_id = $this->get_cart_id();
        $db = new Database();

        if ($cart_id) {
            $cart_items = $this->get_cart($cart_id);

            if (!$cart_items) {
                http_response_code(500);
                exit;
            }

            $total_price = array_reduce($cart_items,
                fn($total_price, $cart_item) => $total_price + $cart_item["price"] * $cart_item["cart_quantity"], 0);

            include_once "../view/layouts/cart/checkout.php";

        } else {
            include_once "../view/layouts/cart/checkout-error.php";
        }
    }
}