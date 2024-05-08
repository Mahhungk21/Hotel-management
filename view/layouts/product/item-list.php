    <div class="container-fluid p-0">
        <div class="mx-5">
            <h2 class="text-center my-4"> <?php if ($search != '') {
                                                echo 'Kết quả tìm kiếm cho "' . $search . '"';
                                            } else {
                                                echo $category['catagory_name'] . '-' . $location->get_apartment_by_id($category['location_id']);
                                            } ?> </h2>
            <div class="<?php if ($search != '') {
                            echo 'hide';
                        }
                        ?>">
            </div>
            <div class="row row-cols-1 row-cols-md-5 g-4 mt-5">
                <?php $i = 0;
                if ($product_list) {
                    foreach ($product_list as $product) {
                        $product_id = $product["id"];
                        $avatar = $product_model->get_avatar_apartment($product_id);
                        $i++;
                ?>
                <a class="item-list__card-link px-3 link-underline link-underline-opacity-0"
                    href="../app/index.php?detail_item&&product_id=<?php echo $product['id']; ?>">
                    <div class="item-list__card card col p-0 h-100 rounded-0">
                        <img src="<?php echo $avatar; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-6"><?php echo $product['name']; ?></h5>
                        </div>
                    </div>
                </a>
                <?php }
                }
                if ($i == 0) { ?>
                <div class="pb-5">Không tìm thấy kết quả phù hợp</div>
                <?php } ?>
            </div>
            <div class="<?php if (!$product_list || $limited) {
                            echo 'hide';
                        }
                        ?>">
                <div class="d-flex justify-content-center my-5">
                    <a href="<?php if ($viewmore) {
                                    echo str_replace('&&viewmore', '', $_SERVER['REQUEST_URI']);
                                } else {
                                    echo $_SERVER['REQUEST_URI'] . '&&viewmore';
                                } ?>" type="button" class="item-list__view-more-btn btn btn-primary"><?php if ($viewmore) {
                                                                        echo 'Thu gọn';
                                                                    } else {
                                                                        echo 'Xem thêm';
                                                                    } ?>
                    </a>
                </div>
            </div>


        </div>

    </div>