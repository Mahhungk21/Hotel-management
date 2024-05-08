<?php $user_id = "null";
if (isset($_SESSION['user-id'])) {
    $user_id = $_SESSION['user-id'];
}
?>
<div class="container" style="
                background-color: #ffdee9;
                background-image: linear-gradient(
                    141deg,
                    #ffdee9 0%,
                    #b5fffc 19%,
                    #ffffff 39%,
                    #ffffff 60%,
                    #ffffff 80%,
                    #ffffff 100%
                );
            ">
    <div class="header-item-list">
        <h1><?php echo $apartment['name'] ?></h1>
        <div class="d-flex justify-content-between align-items-center">
            <div class="rate">
                <small><?php echo $apartment['name'] ?></small>
                <div class="sub-title d-flex align-items-center">
                    <span>Khách sạn</span>
                    <?php
                        for ($x = 0; $x < $star['rating_star']; $x++) {
                            echo '<span class="material-symbols-outlined" style="color: yellow">star</span>';
                        } 
                    ?>
                    <!-- <span class="material-symbols-outlined" inline-block style="color: yellow">
                        star
                    </span> -->
                </div>
            </div>
            <div class="price_room">
                <small>Gía/phòng/đêm từ</small>
                <p>1000000 VNĐ</p>
            </div>
        </div>
    </div>
    <!-- address -->
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <span class="material-symbols-outlined"> location_on </span>
            <span>
                56 - 66 Nguyễn Huệ, Bến Nghé, Quận 1, Thành phố Hồ Chí
                Minh, Việt Nam, 700000
            </span>
        </div>
        <button class="btn btn-primary">
            <a href="#btn-room" style="color: white; text-decoration: none">Chọn phòng</a>
        </button>
    </div>
    <!-- img-layout -->
    <div class="img-layout d-flex justify-content-center mt-3 gap-2">
        <div class="">
            <img src="<?php echo $apartment['apartment_img'] ?>" alt="" class="rounded-3" />
        </div>
        <div class="img-room d-flex gap-3 flex-wrap rounded-3">
            <!-- <img src="https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10022505-c874c9ac10cd201749fb328a7650464b.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640"
                alt="" style="height: 150px" />
            <img src="https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10022505-f6d75b3fcaf4409e7e815fa3fd7e6a52.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640"
                alt="" style="height: 150px" class="rounded-3" />
            <img src="https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10022505-0f0203f74f0849bd3204d8b16f7e88d5.jpeg?_src=imagekit&tr=c-at_max,h-360,q-40,w-640"
                alt="" style="height: 150px" class="rounded-3" /> -->
            <?php
                foreach ($apartment_room as $room) {
                echo '<img src=" ' . $room['image']. ' "
                alt="" style="height: 150px" />';
            }            
            ?>
        </div>
    </div>
    <!-- introduce$feature-->
    <div class="d-flex mt-3 gap-2" style="
                    background-color: #ffdee9;
                    background-image: linear-gradient(
                        315deg,
                        #ffdee9 0%,
                        #b5fffc 24%,
                        #ffffff 49%,
                        #ffffff 75%,
                        #ffffff 100%
                    );
                ">
        <!-- introduce -->
        <div class="introduce border border-1 p-3 rounded-3" style="width: 800px">
            <h3>Giới thiệu</h3>
            <p>
                <?php echo $apartment['description'] ?>
            </p>
        </div>
        <!-- feature -->
        <div class="features border border-1 p-3 rounded-3" style="width: 500px">
            <h3>Tiện ích chính</h3>
            <div class="item-icon row row-cols-2 align-items-center">
                <div class="col">
                    <span class="material-symbols-outlined">
                        wifi
                    </span>
                    <span>Wifi miễn phí</span>
                </div>
                <div class="col">
                    <span class="material-symbols-outlined">
                        ac_unit
                    </span>
                    <span>Điều hòa</span>
                </div>
                <div class="col mt-3">
                    <span class="material-symbols-outlined">
                        restaurant
                    </span>
                    <span>Nhà hàng</span>
                </div>
                <div class="col mt-3">
                    <span class="material-symbols-outlined">
                        pool
                    </span>
                    <span>Hồ bơi</span>
                </div>
            </div>
        </div>
    </div>
    <!-- room -->
    <div class="border border-1 rounded-3 mt-5 p-3 gap-5" id="btn-room" style="
                    background-color: #ffdee9;
                    background-image: linear-gradient(
                        124deg,
                        #ffdee9 0%,
                        #b5fffc 24%,
                        #ffffff 49%,
                        #ffffff 75%,
                        #ffffff 100%
                    );
                ">
        <h3 class="text-center p-2" style="font-weight: 700">
        </h3>
        <div class="box d-flex gap-5">
            <!-- left-box -->
            <div class="left-box d-flex flex-column gap-2">
                <!-- roomimg -->
                <div class="slider" style="width:400px;">
                    <div class="list">
                        <?php
                            foreach ($apartment_room as $room) {           
                        ?>
                        <div class="item">
                            <img src="<?php echo  $room['image']?>" alt="" style="width:400px;" />
                        </div>
                        <?php
                        } ?>
                    </div>
                    <div class="buttons">
                        <button id="prev">
                            < </button>
                                <button id="next">></button>
                    </div>
                    <ul class="dots">
                        <li class="active"></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="item-icon d-flex gap-4">
                    <div class="icon">
                        <span class="material-symbols-outlined">
                            bathtub
                        </span>
                        <span>Bồn tắm</span>
                    </div>
                    <div class="icon">
                        <span class="material-symbols-outlined">
                            ac_unit
                        </span>
                        <span>Điều hòa</span>
                    </div>
                </div>
                <div class="d-flex">
                    <span class="material-symbols-outlined">
                        qr_code
                    </span>
                    <span><a href="#!">Xem chi tiết phòng</a></span>
                </div>
            </div>
            <!-- right-box -->
            <div class="right-box">
                <table class="table table-bordered" style="width: 800px; height: 300px">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">Lựa chọn phòng</th>
                            <th scope="col">Khách</th>
                            <th scope="col">Giá/phòng/Đêm</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($apartment_room as $room) {
                            $room_id = $room['room_id'];
                            $roomtyp = $roomtyp_model->get_roomtyp_by_id($room_id);
                            if (!empty($roomtyp)){
                                foreach ($roomtyp as $value){
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $value['name'] ?>
                            </th>
                            <td>
                                <span class="material-symbols-outlined">
                                    person
                                </span>
                            </td>
                            <td><?php echo $room['price'] ?>VNĐ</td>
                            <td>
                                <button class="btn btn-primary round-3">
                                    Chọn
                                </button>
                            </td>
                        </tr>
                        <?php }}
                            }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
let slider = document.querySelector(".slider .list");
let items = document.querySelectorAll(".slider .list .item");
let next = document.getElementById("next");
let prev = document.getElementById("prev");
let dots = document.querySelectorAll(".slider .dots li");

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function() {
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
};
prev.onclick = function() {
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
};
let refreshInterval = setInterval(() => {
    next.click();
}, 5000);

function reloadSlider() {
    slider.style.left = -items[active].offsetLeft + "px";
    //
    let last_active_dot = document.querySelector(
        ".slider .dots li.active"
    );
    last_active_dot.classList.remove("active");
    dots[active].classList.add("active");

    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => {
        next.click();
    }, 5000);
}

dots.forEach((li, key) => {
    li.addEventListener("click", () => {
        active = key;
        reloadSlider();
    });
});
window.onresize = function(event) {
    reloadSlider();
};
</script>