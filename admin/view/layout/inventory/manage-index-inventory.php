<!-- main wrapper -->
<div class="main_wrapper d-flex flex-row">
    <!-- side navigate wrapper -->
    <div class="sidenav text-wrap p-0 m-0">

        <nav class="nav nav-pills flex-column text-center p-0 m-0">
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4" href="../app/index.php?page=dashboard">Dashboard</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4 " aria-current="page" href="../app/index.php?page=category">Danh mục sản
                phẩm</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4" href="../app/index.php?page=product-list">Danh sách
                sản phẩm</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4" href="../app/index.php?page=add-product">Thêm sản phẩm</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4 active" href="../app/index.php?page=inventory">Nhà kho</a>
            <a class="nav-link px-3 py-3 px-0 my-2 rounded-4 " href="../app/index.php?page=manage">Quản lý đơn hàng</a>
        </nav>
    </div>

    <!--list product main content wrapper -->
    <div class="productlist_main mx-0 px-0 container-fluid bg-light">

        <div class="productlist_content_header">
            <!-- mot phan cua product main content header gom: tieu de va nut them san pham -->

            <!-- phan con lai cua product main content header gom: tim  kiem va select   -->
            <div id="filter_header_two" class="p-2 mx-0 d-flex flex-row flex-wrap justify-content-between align-items-center">
                <div class="productlist_filter__search ms-4 w-25">
                    <form action="?page=inventory" method="get">
                        <div class="input-group input-group-sm">
                            <input type="hidden" name="page" value="inventory">
                            <input type="search" id="inputForSearchProduct" name="SearchProduct" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="search product name">
                            <button type="submit" class="btn btn-secondary">FIND</button>
                        </div>
                    </form>
                </div>

                <div class="">
                    <a href="index.php?page=add-product" type="button" class="btn btn-primary me-4 rounded-4">Thêm sản phẩm</a>
                </div>
            </div>
        </div>

        <!-- danh sach san pham -->
        <div class="productlist mx-2">
            <div class="table-responsive text-center mb-1">
                <table class="producttable table
                        table-hover
                        align-middle
                        table-sm mb-1">
                    <thead class="table-secondary table-sm">
                        <tr>
                            <th class="text-center" style="width: 50px;">Mã</th>
                            <th>Tên sản phẩm</th>
                            <th class="text-center">Đối tượng</th>
                            <th class="text-center">Loại</th>
                            <th style="width: 150px;" class="text-center">Giá</th>
                            <th style="width: 200px;" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="producttable__body">
                        <?php foreach ($productList as $product) {
    // echo var_dump($product['id']);

    $productHasColor = true;

    if (empty($inventoryObj->get_colors_of_product($product['id']))) {
        $productHasColor = false;
    }
    // echo var_dump($productHasColor);

    $category = $categoryObj->get_category_by_id($product['category_id']);
    ?>
                            <tr class="table__row">
                                <td class="text-center">
                                    <?php echo $product['id'] ?>
                                </td>

                                <td>
                                    <?php echo $product['product_name'] ?>
                                </td>

                                <td class="text-center">
                                    <?php echo $category['object'] ?>
                                </td>

                                <td class="text-center">
                                    <?php echo $category['category_name'] ?>
                                </td>

                                <td style="width: 150px;" class="text-center">
                                    <?php echo $product['price'] ?>
                                </td>

                                <td style="width: 200px;" class="text-center">
                                    <a class="btn btn-secondary p-1 m-1 ms-0" href="index.php?page=inventory&product=<?php echo $product['id'] ?>" role="button" aria-label="check color of the product">
                                        KIỂM TRA
                                    </a>
                                    <button class="btn btn-danger p-1 m-1 me-0" role="button" name="submitRemoveProduct" value="TRUE" onclick="return confirmSubmitRemoveProduct(<?php echo $product['id'] ?>, 'formRemoveProduct')" form="formRemoveProduct" formaction="index.php?page=inventory&removeProduct=TRUE" aria-label="remove the product" <?php if ($productHasColor == true) {
        echo 'disabled';
    }?>>
                                        XOÁ
                                    </button>
                                </td>
                            </tr>

                        <?php
}
?>
                    </tbody>
                </table>
                <hr>
                <?php if (empty($productList)) {
    echo "<div><h6>Không có sản phẩm nào được tìm thấy</h6></div>";
}?>
                <div hidden class="mt-1">
                    <div>Pagination</div>
                </div>
            </div>
        </div>

        <div hidden>
            <h3>this is hidden form to contain infor product removed</h3>
            <form id="formRemoveProduct" method="post">
                <input id="inputIdOfProductRemoved" type="hidden" name="removeProductId" value="-1">
            </form>
        </div>


    </div>

</div>