<section class="coupon-area">
    <div class="container">
        <!-- Deal of the week -->

        <div class="sale-off-banner" style="margin-bottom:50px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="sale-off-banner_img">
                                <img src="https://static.vecteezy.com/system/resources/previews/004/759/236/original/big-sale-abstract-background-free-vector.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
            <?php
            foreach ($dataCoupon as $dataCouponItem) {
                extract($dataCouponItem);
                // Xu ly ma giam gia
                preg_match('/(\d+)(%)/', $value, $couponValue);
                $value = end($couponValue) == '%' ?  $value : Format::formatCurrency($value)

            ?>
                <div class="col-lg-6">
                    <div class="coupon-area-wrap">
                        <div class="coupon">
                            <div class="coupon-left">
                                <figure class="thumb">
                                    <img src="<?= $thumb ?>" alt="">
                                </figure>
                                <div class="content">
                                    <div class="expired">
                                        Thời hạn: <span>
                                            <?= date('d-m-Y', strtotime($expired)) ?>
                                        </span>
                                    </div>
                                    <h4 class="title">
                                        <?= $title ?>
                                    </h4>

                                    <p class="value">
                                        <?= "- $value" ?>
                                    </p>
                                </div>
                            </div>
                            <div class="coupon-right">
                                <?php
                                if (strtotime($expired) < time()) {
                                ?>
                                    <div class="status">
                                        Ưu đãi <span class="inactive">Hết hạn</span>
                                    </div>
                                <?php } else { ?>
                                    <div class="status">
                                        Ưu đãi <span class="active">Hoạt động</span>
                                    </div>
                                <?php } ?>

                                <button type="button" class="code code-coupon">
                                    <?= $code ?>
                                </button>
                                <p class="condition">
                                    * Mã phiếu giảm giá này sẽ được áp dụng khi bạn mua sắm nhiều hơn
                                    <span><?= Format::formatCurrency($min_amount) ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Đẩy lên đầu trang -->
 <!-- Nút Đẩy lên đầu trang -->
 <button id="scrollToTopBtn" class="btn btn-primary">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Hiển thị nút khi cuộn xuống
        window.addEventListener('scroll', function() {
            var scrollToTopBtn = document.getElementById('scrollToTopBtn');
            if (window.scrollY > 200) { // Hiển thị nút khi cuộn xuống 200px
                scrollToTopBtn.classList.remove('hidden');
            } else {
                scrollToTopBtn.classList.add('hidden');
            }
        });

        // Cuộn lên đầu trang khi nhấp vào nút
        document.getElementById('scrollToTopBtn').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
<style>
        /* Định dạng và căn chỉnh nút */
        #scrollToTopBtn {
            position: fixed;
            bottom: 20px; /* Khoảng cách từ dưới cùng */
            left: 50%; /* Căn giữa theo chiều ngang */
            transform: translateX(-50%); /* Đẩy nút về giữa */
            background-color: #ccc; 
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.3s;
            z-index: 1000;
        }

        #scrollToTopBtn:hover {
            background-color: #e65c00; /* Màu cam đậm hơn khi hover */
        }

        #scrollToTopBtn i {
            margin: 0;
        }

        /* Ẩn nút khi không cuộn xuống */
        #scrollToTopBtn.hidden {
            display: none;
        }
    </style>
