<?php
include_once __DIR__ . '/../model/category/category_model.php';
include_once __DIR__ . '/../model/product/product_model.php';
include_once __DIR__ . '/../model/color/color_model.php';
include_once __DIR__ . '/../model/size/size_model.php';
include_once __DIR__ . '/../model/inventory/inventory_model.php';
include_once __DIR__ . '/../model/order/orderModel.php';

class Controller
{
    public function invoke()
    {
        if (isset($_GET['page']) && $_GET['page'] == 'logic') {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                switch ($action) {
                    case "process": {
                            include_once "../view/layout/manage/process-logic.php";
                            break;
                        }
                    case "accept": {
                            include_once "../view/layout/manage/accept-logic.php";
                            break;
                        }
                    case "confirm": {
                            include_once "../view/layout/manage/confirm-logic.php";
                            break;
                        }
                    default: {
                            include_once "../view/layout/manage/manage-logic.php";
                        }
                }
            } else {
                include_once "../view/layout/manage/manage-logic.php";
            }
        } else {
            $this->controlHeader();
            $this->controlContent();
            $this->controlFooter();
        }
    }

    public function controlHeader()
    {
        include_once __DIR__ . '/../view/partials/header.php';
    }

    public function controlFooter()
    {
        include_once __DIR__ . '/../view/partials/footer.php';
    }

    //index?page=
    public function controlContent()
    {
        $page = '';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        // index?page=
        switch ($page) {
            case 'add-product': {
                   $this->control_add_product();
                   // $this->control_product_list();
                    break;
                }

            case 'product-list': {
                    $this->control_product_list(); // dinh nghia ham o duoi
                   //$this->control_inventory();
                    break;
                }

            case 'category': {
                    //todo : co ham public function control_add_category() o duoi
                    $this->control_category();
                    break;
                }

            case 'manage': {
                    $this->control_manage();
                    //$this->control_category();
                    break;
                    //todo co ham function control_inventory() o duoi

                }
            case "logic": {
                    include_once "../view/layout/manage/manage-logic.php";
                    break;
                }
            case "add-room":{
                $this->control_add_room();
                break;
            }
            default: {
                    #$this->control_dashboard();
                    $this->control_category();
                    break;
                }
        }
    }

    // function to handle request get page = ?
    public function control_manage()
    {
        include_once __DIR__ . '/../view/layout/manage/manage.php';
    }
    public function control_dashboard()
    {
        include_once __DIR__ . '/../view/layout/dasboard.php';
    }
    public function control_add_room()
    {

        $action = '';

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }

        if ($action == 'submit') {

            if (isset($_POST['addSubmitBTN'])) {

                echo "<h1>add</h1>";

                $apartmentName = $_POST['location'];
                $roomid = $_POST['roomid'];
                $price = $_POST['price'];
                $image = $_POST['image'];


                $product = new Product_Model();
                $category = new Category_Model();
                $iventory = new Inventory_Model();
                $appId = $product->get_product_by_name($apartmentName);
                if(!$iventory->get_roomtype_by_apartmentId($appId, $roomid)){
                    $res = $iventory->addRoomInfo($appId, $roomid, $price, $image);
                }
                // $res = $iventory->addRoomInfo($appId, $roomid, $price, $image);
                header("location: ../app/index.php?page=product-list&view=" . $appId);
            } else {
                header('location: ../app/index.php?page=add-room');
            }
        } else {
            $categoryObj = new Category_Model();
            $apartmentObj = new Inventory_Model();
            include_once __DIR__ . '/../view/layout/add-room/manage-index-add-room.php';
        }
    }
    public function control_add_product()
    {

        $action = '';

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }

        if ($action == 'submit') {

            if (isset($_POST['addSubmitBTN'])) {

                echo "<h1>add</h1>";

                $productname = $_POST['productname'];
                $categoryname = $_POST['categoryname'];
                $productdesc = $_POST['productdesc'];
                $location = $_POST['location'];
                $img = $_POST['productimage'];
                $product = new Product_Model();
                $category = new Category_Model();
                $categoryid = $category->get_id_by_name_and_location($categoryname, $location);
                $res = $product->addApartmentInfo($productname, $productdesc, $categoryid, $img);

                header('location: ../app/index.php?page=product-list');
            } else {
                header('location: ../app/index.php?page=add-product');
            }
        } else {
            $categoryObj = new Category_Model();
            include_once __DIR__ . '/../view/layout/add-product/manage-index-add.php';
        }
    }

    public function control_product_list()
    {

        if (isset($_GET['view'])) {

            $product_id = $_GET['view'];

            // model
            $productObj = new Product_Model();
            $categoryObj = new Category_Model();
            $inventoryObj = new Inventory_Model();

            // variable product info
            $productInfo = $productObj->get_product_by_id($product_id);

            include_once __DIR__ . '/../view/layout/product-list/manage-index-view-info-product.php';
        } elseif (isset($_GET['del'])){
            $delObj = new Product_Model();
            $product_id = $_GET['del'];
            $delRoom = $delObj->deleteAllRoomById($product_id);
            $delRate = $delObj->del_rate_by_id($product_id);
            $delApartment = $delObj->delApartmentById($product_id);
            $this->display_product_list_page();


        }elseif (isset($_GET['edit'])) {

            $productObj = new Product_Model();
            $categoryObj = new Category_Model(); //use
            $inventoryObj = new Inventory_Model();


            $product_id = $_GET['edit'];
            $productInfo = $productObj->get_product_by_id($product_id);

            include_once __DIR__ . '/../view/layout/product-list/manage-index-edit-product.php';
        } elseif (isset($_GET['edited'])) {


            $productObj = new Product_Model();
            $inventoryObj = new Inventory_Model();


            $product_id = $_GET['edited'];

            $updateName = '';
            $updateDescription = '';
            $updateAvatar = '';
            if(isset($_GET['del'])){
                $room_id = $_GET['del'];
                $res = $productObj->deleteRoomById($product_id, $room_id);
            } else {
                if (isset($_POST['updateName'])) {
                    $updateName = $_POST['updateName'];

                    $res = $productObj->updateNameProductById($product_id, $updateName);
                }

                if (isset($_POST['updateDescription'])) {
                    $updateDescription = $_POST['updateDescription'];

                    $res = $productObj->updateDescriptionProductById($product_id, $updateDescription);
                }

                if (isset($_POST['updateApAvatarId'])) {
                    $updateApAvatarId = $_POST['updateApAvatarId'];

                    $res = $productObj->updateImgProductById($product_id, $updateApAvatarId);
                }

                $appartment_room_img_list = $inventoryObj->get_room_by_appartment_id($product_id);

                foreach ($appartment_room_img_list as $room_type_img) {
                    if (isset($_POST['updateAvatarId' . $room_type_img['room_id']])) {
                        $updateAvatar = $_POST['updateAvatarId' . $room_type_img['room_id']];

                        if ($updateAvatar != "") {
                            $res = $productObj->updateAvatarRoomById($product_id, $room_type_img['room_id'], $updateAvatar);
                        }
                    }
                    if (isset($_POST['updatePriceId' . $room_type_img['room_id']])) {
                        $updatePrice = $_POST['updatePriceId' . $room_type_img['room_id']];

                        if ($updatePrice != "") {
                            $res = $productObj->updatePriceRoomById($product_id, $room_type_img['room_id'], $updatePrice);
                        }
                    }
                }
            }
            header("location: index.php?page=product-list&view=" . $product_id);
        } else {
            $this->display_product_list_page();
        }
    }

    public function display_product_list_page()
    {

        $checkSearcherUsed = false;
        $productList = [];

        if (isset($_GET['SearchProduct'])) {
            $searchInput = $_GET['SearchProduct'];

            $inventoryObj = new Inventory_Model();
            $searchRes = $inventoryObj->search_product_list($searchInput);
            $checkSearcherUsed = true;

            if (!empty($searchRes)) {
                $productList = $searchRes;
            }
        }

        $productObj = new Product_Model();
        $categoryObj = new Category_Model();
        $inventoryObj = new Inventory_Model();

        if ($checkSearcherUsed == false) {
            $searchRes = $inventoryObj->get_all_product_not_desc();
            if (!empty($searchRes)) {
                $productList = $searchRes;
            }
        }

        include_once __DIR__ . '/../view/layout/product-list/manage-index-product-list.php';
    }

    public function control_category()
    {
        // todo

        if (isset($_GET['addCategory']) && isset($_GET['addCategory']) == "TRUE") {
            $objName = $_POST['categoryObject'];
            $newCategoryName = $_POST['newCategoryName'];

            $categoryObj = new Category_Model();
            $res = $categoryObj->add_category($objName, $newCategoryName);

            header("location: index.php?page=category");
        } elseif (isset($_GET['delete'])) {
            $category_id = $_POST['deleteCategoryId'];

            $categoryObj = new Category_Model();
            $res = $categoryObj->delete_category_by_id($category_id);
            header("location: index.php?page=category");
        } elseif (isset($_GET['edit'])) {

            $category_id = $_GET['edit'];
            $editCategory = $_POST['editCategory'];

            $categoryObj = new Category_Model();
            $res = $categoryObj->edit_category_by_id_object($category_id, $editCategory);
        }

        $categoryObj = new Category_Model();
        $objectList = $categoryObj->get_object_list();

        // echo "<hr>";
        // echo "<pre>" . var_dump($objectList) . "</pre>";
        // echo "<hr>";

        // if (empty($objectList)) {
        //     echo "<hr>";
        //     echo "<pre> hello </pre>";
        //     echo "<hr>";
        // }

        include_once __DIR__ . '/../view/layout/category/manage-index-category.php';
    }

    public function control_inventory()
    {

        $checkSearcherUsed = false;
        $productList = [];

        if (isset($_GET['product'])) {
            $product_id = $_GET['product'];
            $this->manage_color_of_product($product_id);
        } else {

            if (isset($_GET['SearchProduct'])) {
                $searchInput = $_GET['SearchProduct'];

                $inventoryObj = new Inventory_Model();

                $searchRes = $inventoryObj->search_product_list($searchInput);

                $checkSearcherUsed = true;

                if (!empty($searchRes)) {
                    $productList = $searchRes;
                }

                // neu co dau hieu xoa mot san pham
            } else if (isset($_GET['removeProduct']) && $_GET['removeProduct'] == "TRUE") {

                if (isset($_POST['submitRemoveProduct']) && $_POST['submitRemoveProduct'] == "TRUE") {
                    if (isset($_POST['removeProductId'])) {
                        $removeProductId = $_POST['removeProductId'];
                        $this->handle_remove_product_by_id($removeProductId);
                    }
                }
            }

            $categoryObj = new Category_Model();
            $inventoryObj = new Inventory_Model();

            if ($checkSearcherUsed == false) {
                $searchRes = $inventoryObj->get_all_product_not_desc();
                if (!empty($searchRes)) {
                    $productList = $searchRes;
                }
            }

            include_once __DIR__ . '/../view/layout/inventory/manage-index-inventory.php';
        }
    }

    // public function manage_color_of_product($product_id)
    // {
    //     if (isset($_GET['color'])) {
    //         $color_id = $_GET['color'];

    //         $this->manage_stock_of_product_of_color($product_id, $color_id);
    //     } else {

    //         // handle add new color for product
    //         if (isset($_POST['submitAddNewColorForProduct']) && $_POST['submitAddNewColorForProduct'] == 'TRUE') {

    //             $colorid = $_POST['colorid'];
    //             $productimage = $_POST['productimage'];
    //             $productsize = [];

    //             // fixed maxsize = 45, minsize = 24
    //             for ($i = 0; $i < 45 - 24 + 1; $i++) {
    //                 if (isset($_POST['size' . $i + 24])) {
    //                     array_push($productsize, true);
    //                 } else {
    //                     array_push($productsize, false);
    //                 }
    //             }

    //             $inventoryObj = new Inventory_Model();
    //             $res = $inventoryObj->add_new_color_for_product($product_id, $colorid, $productimage, $productsize);
    //         } elseif (isset($_POST['submitRemoveColorOfProduct']) && $_POST['submitRemoveColorOfProduct'] == 'TRUE') {

    //             $removeColorId = $_POST['removeColorId'];
    //             $inventoryObj = new Inventory_Model();
    //             $res = $inventoryObj->remove_color_of_product($product_id, $removeColorId);
    //         }

    //         $sizeObj = new Size_Model();
    //         $inventoryObj = new Inventory_Model();
    //         include_once __DIR__ . '/../view/layout/inventory/mange-color-of-product.php';
    //     }
    // }

    // public function manage_stock_of_product_of_color($product_id, $color_id)
    // {

    //     if (isset($_POST['submitAddNewSizeForProduct']) && $_POST['submitAddNewSizeForProduct'] == 'TRUE') {
    //         // ADD
    //         $newSizeList = [];

    //         for ($i = 0; $i < 45 - 24 + 1; $i++) {
    //             if (isset($_POST['size' . $i + 24])) {
    //                 array_push($newSizeList, $i + 24);
    //             } else {
    //                 array_push($newSizeList, NULL);
    //             }
    //         }

    //         $this->handle_add_new_size_for_productColor($product_id, $color_id, $newSizeList);
    //     } elseif (isset($_POST['submitUpdateQuantity']) && $_POST['submitUpdateQuantity'] == 'TRUE') {
    //         // UPDATE
    //         $sizeQuantityList = [];

    //         for ($i = 0; $i < 45 - 24 + 1; $i++) {
    //             if (isset($_POST['numOfSize' . $i + 24])) {
    //                 array_push($sizeQuantityList, ($_POST['numOfSize' . $i + 24]));
    //             } else {
    //                 array_push($sizeQuantityList, NULL);
    //             }
    //         }

    //         $this->handle_update_quantity_for_productColor($product_id, $color_id, $sizeQuantityList);
    //     } elseif (isset($_POST['submitRemoveSizeOfProduct']) && $_POST['submitRemoveSizeOfProduct'] == 'TRUE') {
    //         // REMOVE
    //         $removeSizeList = [];

    //         for ($i = 0; $i < 45 - 24 + 1; $i++) {
    //             if (isset($_POST['size' . $i + 24])) {
    //                 array_push($removeSizeList, $i + 24);
    //             } else {
    //                 array_push($removeSizeList, NULL);
    //             }
    //         }

    //         $this->handle_remove_size_of_productColor($product_id, $color_id, $removeSizeList);
    //     }

    //     $inventoryObj = new Inventory_Model();
    //     include_once __DIR__ . '/../view/layout/inventory/manage-stock.php';
    // }


    // public function handle_add_new_size_for_productColor($product_id, $color_id, $newSizeList)
    // {

    //     $inventoryObj = new Inventory_Model();
    //     foreach ($newSizeList as $newSize) {
    //         if ($newSize != NULL) {
    //             $res = $inventoryObj->add_new_size_for_productColor($product_id, $color_id, $newSize);
    //         }
    //     }
    // }

    // public function handle_update_quantity_for_productColor($product_id, $color_id, $sizeQuantityList)
    // {
    //     $inventoryObj = new Inventory_Model();
    //     $sizeCount = 24;
    //     foreach ($sizeQuantityList as $sizeQuantity) {
    //         if ($sizeQuantity != NULL) {
    //             $res = $inventoryObj->update_quantity_for_aSize_of_productColor($product_id, $color_id, $sizeCount, $sizeQuantity);
    //         }
    //         $sizeCount += 1;
    //     }
    // }

    // public function handle_remove_size_of_productColor($product_id, $color_id, $removeSizeList)
    // {

    //     $inventoryObj = new Inventory_Model();
    //     foreach ($removeSizeList as $removeSize) {
    //         if ($removeSize != NULL) {
    //             $res = $inventoryObj->remove_size_of_productColor($product_id, $color_id, $removeSize);
    //         }
    //     }
    // }


    // public function handle_remove_product_by_id($removeProductId)
    // {

    //     $inventoryObj = new Inventory_Model();
    //     $colorOfProduct = $inventoryObj->get_colors_of_product($removeProductId);

    //     if ($colorOfProduct == false) {
    //         $res = $inventoryObj->remove_product_notHasColor_by_id($removeProductId);
    //     }
    // }
}





// ------------------
// Dung code
// Other one don't edit this code
//handle some some some
// ajax select category associated object
// neu tao file khac thi bi loi o ket noi database. khong biet sua sao.
if (isset($_POST['valueCustomerTypeSelected'])) {
    $categoryObj = new Category_Model();
    $categoryList = $categoryObj->get_category_by_object($_POST['valueCustomerTypeSelected']);
    foreach ($categoryList as $category) {
        echo "<option value='" . $category['id'] . "'>" . $category['category_name'] . "</option>";
    }
}



// ------------------
// Nghia code
// Other one don't edit this code
//handle some some some
// todo
