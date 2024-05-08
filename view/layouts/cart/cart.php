   <?php 
    $user_id = "null";
    if (isset($_SESSION["user-id"])) {
        $user_id = $_SESSION["user-id"];
    }

    $count = 0;
   ?>
   
   <div class="my-4">
        <h1 class="text-center my-3">Giỏ hàng của bạn</h1>

        <div class="container mb-2 col-6 align-self-center">
            <?php while ($cart_items and $cart_item = $cart_items->fetch_assoc()) {?>
            <?php if ($cart_item["cart_quantity"] > 0) { ?>
                <?php $count += 1; ?>
                <div class="row my-3">
                    <img src="<?php echo $cart_item['product_img'] ?>" class="col-lg-2">
                    <div class="cart-item-info col-md-8 col-sm-10">
                        <h5 class="cart-item-title">
                            <?php echo $cart_item["product_name"] ?>
                        </h5>
                        <div id="" class="d-flex justify-content-start">
                            <div class="me-3">
                                <div>
                                    Màu sắc: <p><?php echo $cart_item["color_name"] ?></p>
                                </div>
                            </div>

                            <div class="me-3">
                                <div>
                                    Kích thước: <?php echo $cart_item["size_name"] ?>
                                </div>
                            </div>

                            <div class="me-3">
                                <div>
                                    Số lượng:
                                </div>
                                <input onchange="updateQuantity(<?php echo $user_id ?>, <?php echo $cart_item['product_id'] ?>, <?php echo $cart_item['color_id'] ?>, <?php echo $cart_item['size_id'] ?>, <?php echo $cart_item['max_quantity'] ?>)(event)" id="quantity" class="form-control form-control-sm" type="number" value=<?php echo $cart_item["cart_quantity"] ?> min=1 max=<?php echo $cart_item["max_quantity"] ?>>
                            </div>
                        </div>
                    </div>
                    <div class="cart-item-price col-2 py-1">
                        <h5 class="text-end"><?php echo $cart_item["price"] ?> đ</h5>
                    </div>
                </div>
            <?php } } ?>
        </div>

        <?php if ($count) {?>
            <div class="text-center my-2">
                <button onclick="location.href='./?checkout'" type="button" class="btn btn-primary">Đặt mua</button>
            </div>
        <?php } ?>

    </div>
