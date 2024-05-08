<!-- main wrapper -->
<div class="main_wrapper d-flex flex-row">
    <!-- side navigate wrapper -->
    <div class="sidenav text-wrap p-0 m-0">
        <nav class="nav nav-pills flex-column text-center p-0 m-0">
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4" href="../app/index.php?page=dashboard">Dashboard</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4" href="../app/index.php?page=category">Danh mục sản
                phẩm</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4" href="../app/index.php?page=product-list">Danh sách
                sản phẩm</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4" href="../app/index.php?page=add-product">Thêm sản phẩm</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4 active" aria-current="page" href="#">Nhà kho</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4 " href="../app/index.php?page=manage">Quản lý đơn hàng</a>
        </nav>
    </div>
    <!--list product main content wrapper -->
    <div class="productlist_main mx-0 px-0 container-fluid bg-light">

        <!-- header of side -->
        <div class="gobackBTN p-1 d-md-flex" style="background-color: #E8CA7E;">
            <a class="btn btn-secondary p-1 mx-2" href="index.php?page=inventory" role="button" aria-label="Button go back">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                </svg>
                TRỞ VỀ
            </a>
            <div class="text-center flex-grow-1">
                <h4>Quản lý màu của sản phẩm</h4>
            </div>
        </div>

        <!-- danh sach san pham, mau hien co -->
        <div class="productinfor mx-2 mb-3">
            <div class="table-responsive text-center">
                <table class="producttable table
                        align-middle
                        table-sm mb-0">
                    <thead class="table-secondary table-sm">
                        <tr>
                            <th class="text-center" style="width: 50px;">Mã</th>
                            <th style="width: 90px;">Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th class="text-center">Màu</th>
                            <th style="width: 200px;" class="text-left">Những size hiện có</th>
                            <th style="width: 120px;" class="text-center">Tổng tồn kho</th>
                            <th style="width: 100px;" class="text-center">Tồn kho</th>
                        </tr>
                    </thead>
                    <tbody class="producttable__body">
                        <?php
                        // variable
                        $product = $inventoryObj->get_product_by_id_not_desc($product_id);
                        $product_color_img_list = $inventoryObj->get_colors_of_product($product_id);

                        if (!empty($product_color_img_list)) {
                            foreach ($product_color_img_list as $product_color_img) {
                                $img = $product_color_img['product_img'];
                                $color = $product_color_img['color_name'];
                                $color_id = $product_color_img['color_id'];

                                $total_stock = -999;
                                $all_size_product_has = '';

                                $productSizeList = $inventoryObj->get_sizes_of_productColor($product_id, $color_id);

                                if (empty($productSizeList)) {
                                    $total_stock = -1;
                                    $all_size_product_has = 'Sản phẩm hiện không có size';
                                } else {
                                    $total_stock = 0;
                                    foreach ($productSizeList as $productSize) {
                                        $total_stock += (int)$productSize['quantity'];
                                        $all_size_product_has .= ($productSize['size_name'] . ', ');
                                    }
                                }
                        ?>
                                <tr class="table__row">
                                    <td class="text-center">
                                        <?php echo $product_id ?>
                                    </td>

                                    <td scope="row">
                                        <img class="" src="<?php echo $img ?>" width="80px" height="80px" alt="avatar">
                                    </td>

                                    <td>
                                        <?php echo $product['product_name'] ?>
                                    </td>

                                    <td class="text-center">
                                        <?php echo $color ?>
                                    </td>

                                    <td style="width: 200px;" class="text-left">
                                        <?php
                                        echo rtrim($all_size_product_has, ', ');
                                        ?>
                                    </td>

                                    <td style="width: 120px;" class="text-center">
                                        <?php echo $total_stock ?>
                                    </td>
                                    <td style="width: 100px;" class="text-center">
                                        <a class="btn btn-secondary p-2 m-0" href="index.php?page=inventory&product=<?php echo $product_id ?>&color=<?php echo $color_id ?>" role="button" aria-label="check stock of the product">
                                            KIỂM TRA
                                        </a>
                                    </td>

                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php
            if (empty($product_color_img_list)) {
                echo "<hr>";
                echo "<div>
                        <h5>SẢN PHẨM HIỆN KHÔNG CÓ MÀU NÀO.</h5>
                        <h6>BẠN CÓ THỂ THÊM MÀU CHO SẢN PHẨM Ở CHỨC NĂNG BÊN DƯỚI.</h6>
                        <h6>BẠN CÓ THỂ XOÁ LOẠI SẢN PHẨM NÀY.</h6>
                    </div>";
            ?>
                <hr>
            <?php
            }
            ?>



        </div>

        <!-- xoa mau cua san pham neu san pham voi mau do khong co size nao -->
        <div class="remove_color_of_product mx-2 mb-3">
            <!-- to do -->
            <div class="mx-2">
                <h6> XOÁ MÀU CỦA SẢN PHẨM </h6>
            </div>
            <!-- Form -->
            <?php
            $arrColorhadNoSize = [];
            if (!empty($product_color_img_list)) {
                foreach ($product_color_img_list as $product_color_img) {
                    $color_id = $product_color_img['color_id'];
                    $color = $product_color_img['color_name'];

                    $productSizeList = $inventoryObj->get_sizes_of_productColor($product_id, $color_id);

                    if (empty($productSizeList)) {
                        $arrColorhadNoSize[$color] = $color_id;
                    }
                }
            }
            ?>
            <form class="inventoryFormForRemoveColorOfProduct row g-3 border m-1 p-1" name="remove_color_of_product" method="post" action="#">
                <div class="form__btn col-12">
                    <button class="btn btn-primary" id="resetRemoveColorOfProduct" type="reset" onclick="disableInputs_number_of_stocks_inventory('RemoveColorOfProduct')">HUỶ</button>
                    <button class="btn btn-primary" id="enableRemoveColorOfProduct" type="button" onclick="enableInputs_number_of_stocks_inventory('RemoveColorOfProduct')" <?php if (empty($arrColorhadNoSize)) {
                                                                                                                                                                                echo 'disabled';
                                                                                                                                                                            } ?>>
                        THAO TÁC
                    </button>
                    <button type="submit" name="submitRemoveColorOfProduct" value="TRUE" id="submitRemoveColorOfProduct" class="checkproduct btn btn-danger" disabled>XOÁ</button>
                </div>


                <!--a select remove productColor -->
                <!-- color -->
                <!-- php -->
                <div class="form__color col-md-6 col-lg-4 mb-2">
                    <label for="productcolor" class="form-label">Các màu của sản phẩm có thể xoá (chỉ có thể xoá những màu không có size):</label>
                    <select name="removeColorId" class="inputForRemoveColorOfProduct form-select" disabled>
                        <?php
                        if (empty($arrColorhadNoSize)) {
                            echo "<option selected>Không có màu nào có thể xoá</option>";
                        } else {
                            echo "<option selected>Chọn màu muốn xoá</option>";
                            foreach ($arrColorhadNoSize as $key => $value) {
                        ?>
                                <option value="<?php echo $value ?>"><?php echo $key ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <!-- php -->

            </form>
        </div>

        <!-- form them mau moi cho san pham-->
        <div class="add_color_of_product mx-2 mb-3">
            <!-- to do -->
            <div class="mx-2">
                <h6>THÊM MÀU MỚI CHO SẢN PHẨM</h6>
            </div>
            <!-- Form -->
            <form class="row g-3 border m-1 p-1" name="addNewColorForProduct" method="post" action="#">

                <!-- color -->
                <!-- php -->
                <div class="form__color col-md-6 col-lg-4">
                    <label for="productcolor" class="form-label">Màu sản phẩm</label>
                    <select id="productcolor" name="colorid" class="form-select">
                        <?php
                        $colorNotHadList = $inventoryObj->get_colors_not_of_product($product_id);
                        foreach ($colorNotHadList as $color) {
                        ?>
                            <option value="<?php echo $color['id'] ?>"><?php echo $color['color_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- php -->

                <!-- avatar -->
                <div class="form__avatar col-md-6 col-lg-4">
                    <label class="form-label" for="avatar">Chọn hình ảnh (nhập link)</label>
                    <input type="text" name="productimage" class="form-control" id="avatar" onchange="displayAvatarFromInputLink(this.value, 'selectedAvatar')" required />
                </div>
                <div class="form__avatar col-12">
                    <div>
                        <img class="selectedAvatarClass" id="selectedAvatar" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="Choose avatar" style="width: 200px;" />
                    </div>
                </div>

                <!-- size and stock -->
                <div class="form__size col-12">
                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#size" aria-expanded="false" aria-controls="collapse-size">
                        Các kích thước của sản phẩm
                    </button>
                    <div class="collapse" id="size">
                        <div class="border border-1 rounded-2 px-1 py-2">
                            <div class="d-flex flex-row flex-wrap">
                                <?php
                                $sizeList = $sizeObj->get_size_list_in_db();
                                if (!empty($sizeList)) {
                                    // $minSize = $sizeObj->get_min_size();
                                    // $maxSize = $sizeObj->get_max_size();
                                    foreach ($sizeList as $size) {
                                ?>
                                        <div class="form-check-inline m-3">
                                            <input class="form-check-input" type="checkbox" name="<?= 'size' . $size['size_name'] ?>" value="TRUE" id="<?= 'size' . $size['size_name'] ?>">
                                            <label class="form-check-label" for="<?= 'size' . $size['size_name'] ?>">
                                                Size <?= $size['size_name'] ?>
                                            </label>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- submit -->
                <div class="form__submit col-12">
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submitAddNewColorForProduct" value="TRUE" class="btn btn-primary px-3 py-2">THÊM</button>
                    </div>
                </div>

                <!-- cancel -->
                <div class="form__cancel col-12">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-warning" type="reset" onclick="resetDisplayAvatar('selectedAvatarClass')">HUỶ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>