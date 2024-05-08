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
            <a class="btn btn-secondary p-1 mx-2" href="index.php?page=inventory&&product=<?= $product_id ?>" role="button" aria-label="Button go back">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                </svg>
                TRỞ VỀ
            </a>
            <div class="text-center flex-grow-1">
                <h4>Quản lý số lượng tồn kho của sản phẩm</h4>
            </div>
        </div>

        <!-- product infor -->
        <div class="productinfor mx-2 mb-2">
            <div class="table-responsive text-center mb-0">
                <table class="producttable table
                        align-middle
                        table-sm mb-0">
                    <thead class="table-secondary table-sm">
                        <tr>
                            <th class="text-center" style="width: 50px;">Mã</th>
                            <th style="width: 90px;">Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th class="text-center">Màu</th>
                            <th style="width: 150px;" class="text-center">Tổng tồn kho</th>
                            <th style="width: 100px;" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="producttable__body">
                        <?php
                        // variable
                        // has default variable $inventoryObj, $product_id, $color_id

                        $product = $inventoryObj->get_product_by_id_not_desc($product_id);

                        // echo "<pre>'$color_id'</pre>";

                        // echo '<pre>ngon</pre>';

                        $product_img = $inventoryObj->get_avatar($product_id, $color_id);

                        $color_name = $inventoryObj->get_color_name_by_id($color_id);

                        // echo '<pre>khong ngon</pre>';

                        $productSizeList = $inventoryObj->get_sizes_of_productColor($product_id, $color_id);

                        $total_stock = -999;

                        if (empty($productSizeList)) {
                            $total_stock = -1;
                        } else {
                            $total_stock = 0;
                            foreach ($productSizeList as $productSize) {
                                $total_stock += (int)$productSize['quantity'];
                            }
                        }
                        ?>
                        <tr class="table__row">
                            <td class="text-center">
                                <?php echo $product_id ?>
                            </td>

                            <td scope="row">
                                <img class="" src="<?php echo $product_img ?>" width="80px" height="80px" alt="avatar">
                            </td>

                            <td>
                                <?php echo $product['product_name'] ?>
                            </td>

                            <td class="text-center">
                                <?php echo $color_name ?>
                            </td>

                            <td style="width: 150px;" class="text-center">
                                <?php echo $total_stock ?>
                            </td>
                            <td style="width: 100px;" class="text-center">
                                <button form="formRemoveColorOfProductInMangeStockPage" class="btn btn-danger p-2 m-0" role="submit" name="submitRemoveColorOfProduct" value="TRUE" <?php if ($total_stock != -1) {
                                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                                    } ?>>
                                    XOÁ
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- sise and stock -->
        <div class="view_and_update_stock p-3 mb-2">
            <div class="mx-2">
                <h6>CẬP NHẬT SỐ LƯỢNG TỒN KHO CHO SẢN PHẨM</h6>
            </div>
            <div class="containner container-fluid border m-1 p-1">
                <form class="inventoryFormForUpdateQuantity" action="#" method="POST">
                    <div class="size_stock border border-1 rounded-2 border-light bg-body-tertiary px-1 py-2 my-1">
                        <div class="size_stock d-flex flex-row flex-wrap">
                            <!-- php -->
                            <?php
                            $quantityOfsize = '';
                            $size_name = '';
                            $isHasASize = true;

                            if (!empty($productSizeList)) {

                                foreach ($productSizeList as $productSize) {
                                    $quantityOfsize = $productSize['quantity'];
                                    $size_name = $productSize['size_name'];
                            ?>
                                    <!-- end php -->

                                    <!-- size $i -->
                                    <div class="text-center m-2 p-1 border rounded-2">
                                        <label class="form-check-label px-1" for="<?= "checkSize" . $size_name ?>" aria-readonly="true">
                                            <?= "Size" . $size_name ?>
                                        </label>
                                        <input type="number" class="inputForUpdateQuantity form-control text-end p-2" name="<?= "numOfSize" . $size_name ?>" id="<?= "checkSize" . $size_name ?>" maxlength="5" max="10000" min="0" value="<?= $quantityOfsize ?>" disabled>
                                    </div>

                                    <!-- php -->
                                <?php
                                }
                            } else {
                                $isHasASize = false;
                                ?>
                                <!-- end php -->

                                <p>Sản phẩm hiện không có size nào. Bạn có thể thêm size cho sản phẩm ở chức năng bên dưới.</p>

                                <!-- php -->
                            <?php
                            }
                            ?>
                            <!-- end php -->
                        </div>
                    </div>
                    <!-- thao tac -->
                    <div class="m-1 p-1">
                        <button class="btn btn-primary" id="resetUpdateQuantity" type="reset" onclick="disableInputs_number_of_stocks_inventory('UpdateQuantity')">HUỶ</button>
                        <button class="btn btn-primary" id="enableUpdateQuantity" type="button" onclick="enableInputs_number_of_stocks_inventory('UpdateQuantity')" <?php if ($isHasASize == false) {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    } ?>>
                            THAO TÁC
                        </button>
                        <button type="submit" name="submitUpdateQuantity" value="TRUE" id="submitUpdateQuantity" class="checkproduct btn btn-danger" disabled>LƯU</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- remove a size of productColor -->
        <div class="remove_size_of_product p-3 mb-2">
            <div class="mx-2">
                <h6>XOÁ SIZE CỦA SẢN PHẨM</h6>
            </div>
            <div class="containner container-fluid border m-1 p-1">
                <form class="inventoryFormForRemoveSizeOfProduct" action="#" method="POST">
                    <div class="size_stock border border-1 rounded-2 border-light bg-body-tertiary px-1 py-2 my-1">
                        <div class="size_stock d-flex flex-row flex-wrap">
                            <!-- php -->
                            <?php
                            if (!empty($productSizeList)) {
                                foreach ($productSizeList as $productSize) {
                                    $size_name = $productSize['size_name'];
                            ?>
                                    <div class="form-check-inline m-3">
                                        <input class="inputForRemoveSizeOfProduct form-check-input" type="checkbox" name="<?= 'size' . $size_name ?>" value="TRUE" id="<?= 'size' . $size_name ?>" disabled>
                                        <label class="form-check-label" for="<?= 'size' . $size_name ?>">
                                            Size <?= $size_name ?>
                                        </label>
                                    </div>

                                    <!-- php -->
                                <?php
                                }
                            } else {
                                $isHasASize = false;
                                ?>
                                <!-- end php -->

                                <p>Sản phẩm với màu hiện tại không có size nào. Bạn có thể xoá nó.</p>

                                <!-- php -->
                            <?php
                            }
                            ?>
                            <!-- end php -->

                        </div>
                    </div>
                    <!-- thao tac -->
                    <div class="m-1 p-1">
                        <button class="btn btn-primary" id="resetRemoveSizeOfProduct" type="reset" onclick="disableInputs_number_of_stocks_inventory('RemoveSizeOfProduct')">HUỶ</button>
                        <button class="btn btn-primary" id="enableRemoveSizeOfProduct" type="button" onclick="enableInputs_number_of_stocks_inventory('RemoveSizeOfProduct')" <?php if ($productSizeList == false) {
                                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                                } ?>>THAO TÁC</button>
                        <button type="submit" name="submitRemoveSizeOfProduct" value="TRUE" id="submitRemoveSizeOfProduct" class="checkproduct btn btn-danger" disabled>XOÁ</button>
                    </div>
                </form>
            </div>
        </div>

        <div hidden class="remove_color_of_product">
            <h3>Hello. this is hidden form which contain infor product(color) wanted to remove</h3>
            <form method="post" id="formRemoveColorOfProductInMangeStockPage" action="index.php?page=inventory&product=<?php echo $product_id ?>">
                <input type="text" name="removeColorId" value="<?php echo $color_id ?>">
            </form>
        </div>

        <!-- add a new size for product -->
        <div class="add_new_size p-3 mb-2">
            <div class="mx-2">
                <h6>THÊM SIZE MỚI CHO SẢN PHẨM</h6>
            </div>
            <div class="containner container-fluid border m-1 p-1">
                <form class="inventoryFormForAddNewSizeForProduct" action="#" method="POST">
                    <div class="size_stock border border-1 rounded-2 border-light bg-body-tertiary px-1 py-2 my-1">
                        <div class="size_stock d-flex flex-row flex-wrap">
                            <!-- php -->
                            <?php
                            $sizeListNotHad = $inventoryObj->get_sizes_not_of_productColor($product_id, $color_id);
                            ?>

                            <?php
                            if (!empty($sizeListNotHad)) {
                                foreach ($sizeListNotHad as $size) {
                            ?>
                                    <div class="form-check-inline m-3">
                                        <input class="inputForAddNewSizeForProduct form-check-input" type="checkbox" name="<?= 'size' . $size['size_name'] ?>" value="TRUE" id="<?= 'size' . $size['size_name'] ?>" disabled>
                                        <label class="form-check-label" for="<?= 'size' . $size['size_name'] ?>">
                                            Size <?= $size['size_name'] ?>
                                        </label>
                                    </div>

                                    <!-- php -->
                                <?php
                                }
                            } else {
                                $isHasASize = false;
                                ?>
                                <!-- end php -->

                                <p>Không có size để thêm vào.</p>

                                <!-- php -->
                            <?php
                            }
                            ?>
                            <!-- end php -->


                        </div>
                    </div>
                    <!-- thao tac -->
                    <div class="m-1 p-1">
                        <button class="btn btn-primary" id="resetAddNewSizeForProduct" type="reset" onclick="disableInputs_number_of_stocks_inventory('AddNewSizeForProduct')">HUỶ</button>
                        <button class="btn btn-primary" id="enableAddNewSizeForProduct" type="button" onclick="enableInputs_number_of_stocks_inventory('AddNewSizeForProduct')" <?php if ($sizeListNotHad == false) {
                                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                                } ?>>THAO TÁC</button>
                        <button type="submit" name="submitAddNewSizeForProduct" value="TRUE" id="submitAddNewSizeForProduct" class="checkproduct btn btn-danger" disabled>THÊM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>