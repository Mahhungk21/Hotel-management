<!-- main wrapper -->
<div class="main_wrapper d-flex flex-row">
    <!-- side navigate wrapper -->
    <div class="sidenav text-wrap p-0 m-0">
        <nav class="nav nav-pills flex-column text-center p-0 m-0">
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4 " aria-current="page" href="../app/index.php?">Dashboard</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4" href="../app/index.php?page=category">Danh mục khách sạn</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4 active" href="../app/index.php?page=product-list">Danh sách
                khách sạn</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4" href="../app/index.php?page=add-product">Thêm khách sạn</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4 " href="../app/index.php?page=add-room">Thêm phòng khách sạn</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4 " href="../app/index.php?page=manage">Quản lý phòng đặt</a>
        </nav>
    </div>

    <!-- main content wrapper -->
    <div class="maincontent container container-fluid">
        <!-- to do -->
        <div class="mb-2">
            <div class="backbutton">
                <a href="index.php?page=product-list" type="button" class="update_info_product btn btn-sm btn-primary me-0 m-1">
                    TRỞ VỀ DANH SÁCH
                </a>
            </div>
            <h5>CẬP NHẬT THÔNG TIN KHÁCH SẠN</h5>
        </div>
        <form id="formForUpdateProduct" class="row g-3" action="index.php?page=product-list&edited= <?= $product_id ?>" method="post" onsubmit="checkInputValue('formForUpdateProduct')">

            <!-- php variable $productInfo: id, product_name, price, description, category_id -->
            <!-- php variable $product_id -->
            <!-- $inventoryObj, $categoryObj, $productObj -->
            <div class="new_avatar mx-4 my-3">
                <div>
                    <img class="selectedAvatarClass" id="selectedAvatar<?= 100 ?>"
                        src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="Choose avatar" style="width: 300px;" />
                </div>
            </div>

            <!-- name -->
            <div class="update_form__name col-12">
                <label for="name" class="form-label">Tên khách sạn</label>
                <input type="text" name="unUpdateName" value="<?php echo $productInfo['name'] ?>" class="form-control" id="name" onchange="onUpdateInfoElement('name')" required>
            </div>


            <?php
            $category = $categoryObj->get_category_by_id($productInfo['category_id']);
            $location_name = $categoryObj->get_location_with_id($category['location_id']);
            ?>

            <!-- doi tuong/customer -->
            <div class="undate_formm__cus col-md-6 col-lg-4">
                <label for="customertype" class="form-label">Địa điểm</label>
                <input type="text" value=" <?php echo $location_name ?>" class="form-control" id="customertype"
                    disabled>
            </div>

            <!-- type -->
            <div class="update_form__type col-md-6 col-lg-4">
                <label for="producttype" class="form-label">Loại khách sạn</label>
                <input type="text" value=" <?php echo $category['catagory_name'] ?>" class="form-control" id="customertype" disabled>
            </div>
            <div class="new_avatar mx-4 my-3 col-lg-3">
                <label class="form-label m-0 mb-2" for="avatarId<?= 100 ?>">Chọn hình ảnh mới (nhập link)</label>
                <input type="url" value="" name="updateApAvatarId" class="form-control mb-1" style="width: 300px;"
                    id="avatarColorId<?= $room_type ?>"
                    onchange="displayAvatarFromInputLink(this.value, 'selectedAvatar<?= 100 ?>')" placeholder="url" />
            </div>
            <!-- img -->
           
            <?php
            $appartment_room_img_list = $inventoryObj->get_room_by_appartment_id($product_id);

            ?>
            <div class="view_image col-12">
                <div>
                    Các loại phòng khách sạn
                </div>
            <!-- code -->
                <div class="productImage">

                    <?php
                    if (!empty($appartment_room_img_list)) {
                        $i = 0;
                        foreach ($appartment_room_img_list as $room_type_img) {
                            $img = $room_type_img['image'];
                            $price = $room_type_img['price'];
                            $room_type = $room_type_img['room_id'];
                            $room_name = $inventoryObj->get_name_by_room_id($room_type);
                            $i++;
                            ?>
                            <div class="wrapper-image d-flex flex-wrap align-items-start">
                                <div class="mx-4 my-3 d-flex flex-column">
                                    <figure class="" style="width:200px">
                                    <img src="<?= $img ?>" alt="Hình ảnh phòng mã <?= $room_name ?>" style="width:200px">
                                    <figcaption class="text-center"><?= $room_name ?> - <?= $price ?> VNĐ</figcaption>
                                    </figure>
                                    <a href ="index.php?page=product-list&edited=<?= $product_id ?>&del=<?= $room_type_img['room_id'] ?>" class="button-del btn btn-danger justify-content-center align-items-center p-2 m-auto">Xoa</a>
                                </div>

                                <div class="new_avatar mx-4 my-3">
                                    <label class="form-label m-0 mb-2" for="avatarId<?= $room_type ?>">Chọn hình ảnh mới (nhập link)</label>
                                    <input type="url" value="" name="updateAvatarId<?= $room_type ?>" class="form-control mb-1" style="width: 300px;" id="avatarColorId<?= $room_type ?>" onchange="displayAvatarFromInputLink(this.value, 'selectedAvatar<?= $i ?>')" placeholder="url"/>
                                    <div>
                                        <img class="selectedAvatarClass" id="selectedAvatar<?= $i ?>" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="Choose avatar" style="width: 100px;" />
                                    </div>
                                    <label class="form-label m-0 mb-2" for="avatarId<?= $room_type ?>">Chọn giá mới</label>
                                    <input type="text" value="" name="updatePriceId<?= $room_type ?>" class="form-control mb-1" style="width: 300px;"
                                        id="RoomPriceId<?= $room_type ?>" placeholder="VNĐ"/>
                                </div>
                            </div>

                    <?php
                        }
                    }else{
                        echo "<p>Khách sạn không có phòng nào!</p>";
                    }
                    ?>
                </div>
            </div>

            <!-- description -->
            <div class="update_form__description col-12">
                <label for="description" class="form-label">Mô tả khách sạn</label>
                <textarea name="unUpdateDescription" class="form-control" id="description" onchange="onUpdateInfoElement('description')" rows="5" required><?php echo $productInfo['description'] ?></textarea>
            </div>

            <!-- submit -->
            <div class="update_form__submit col-12">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger px-3 py-2">CẬP NHẬT</button>
                </div>
            </div>

            <div class="update_form__cancel col-12">
                <div class="d-flex justify-content-center">
                </div>
            </div>
        </form>
    </div>

</div>