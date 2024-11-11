<section class="banner position-relative" >
    <!-- Add the image as a full-width background -->
    <img src="<?= $backgroundImage ?>" alt="Banner Image" class="img-fluid position-absolute w-100 h-100" style="object-fit: cover; top: 0; left: 0;">

    <div class="container position-relative" style="z-index: 1; margin-top: 120px;">
        <div class="row align-items-center" style="height: 100%;">
            <div class="col-lg-6 col-xl-6 pr--80" >
                <div>
                    <span class="title-highlighter highlighter-secondary"> 
                        <i class="fas fa-fire"></i><?= $dataBannerTitle['title'] ?>
                    </span>

                    <h1 class="title"><?= $dataBannerTitle['description'] ?></h1>

                    <div class="shop-btn">
                        <a href="product-category?category=<?= $dataBannerTitle['cate_id'] ?>" class="btn btn-bg-white right-icon">
                            Khám phá <i class="fal fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<section class="home-category">
    <div class="container">
        <div class="title section-title-wrapper text-center">
            <span class="title-highlighter justify-content-center highlighter-secondary"> <i class="far fa-tags"></i> Danh mục</span>
            <h2 class="title">Tìm kiếm theo danh mục</h2>
        </div>

        <div class="category">
            <?php
            foreach ($dataCate as $cateItem) {
            ?>
                <a class="category-item" href="product-category?category=<?= $cateItem['id'] ?>">
                    <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                        <div class="categorie-link">
                            <img class="img-fluid" src="public/images/category/<?= $cateItem['image'] ?>" alt="<?= $cateItem['name'] ?>">
                            <h6 class="cate-title "><?= $cateItem['name'] ?></h6>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Deal of the week -->

<div class="deal_ofthe_week mt-2">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<div class="deal_ofthe_week_img">
						<img src="https://cdn.nguyenkimmall.com/images/product/829/dien-thoai-iphone-14-pro-max-1tb-tim-1.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-7 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center">
						<div class="section_title">
							<h2>Giá tốt nhất trong tuần</h2>
						</div>
						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="day" class="timer_num">03</div>
								<div class="timer_unit">Ngày</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num">15</div>
								<div class="timer_unit">Giờ</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num">45</div>
								<div class="timer_unit">Tuần</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num">23</div>
								<div class="timer_unit">Giây</div>
							</li>
						</ul>
                        <ul class="cart-action">
                            <li class="select-option">
                                <a href="product" class="btn-custom">Xem chi tiết</a>
                            </li>
                        </ul>
					</div>
				</div>
			</div>
		</div>
	</div>



<section class="new-arrivals-product-area pb--0">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="title-highlighter justify-content-center highlighter-secondary"> <i class="fas fa-cart-plus"></i> Trong tuần này</span>
            <h2 class="title">Sản phẩm vừa ra mắt</h2>
        </div>
        <div class="new-arrivals-product">
            <?php
            foreach ($dataProdNewDate as $prodNewDateItem) :
            ?>
                <div class="product-area-two">
                    <div class="thumbnail">
                        <a href="product/<?= $prodNewDateItem['slug'] ?>-<?= $prodNewDateItem['id'] ?>">
                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500" src="<?= $prodNewDateItem['thumb'] ?>" alt="<?= $prodNewDateItem['title'] ?>">
                        </a>
                        <?php
                        if ($prodNewDateItem['discount'] != 0) :
                        ?>
                            <div class="label-block">
                                <div style="background-color:#FF0000;"class="product-badget">Giảm <?= $prodNewDateItem['discount'] ?> %</div>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="product-content">
                        <div class="inner">
                            <h5 class="title">
                                <a href="product/<?= $prodNewDateItem['slug'] ?>-<?= $prodNewDateItem['id'] ?>"><?= $prodNewDateItem['title'] ?></a>
                            </h5>
                            <div class="product-price-variant">
                                <?php
                                if ($prodNewDateItem['discount'] != 0) :
                                ?>
                                    <span class="price old-price"><?= Format::calculateOriginalPrice($prodNewDateItem['price'], $prodNewDateItem['discount']) ?></span>
                                <?php endif ?>
                                <span class="price current-price"><?= Format::formatCurrency($prodNewDateItem['price']) ?></span>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">

                                    <li class="select-option">
                                        <a href="product/<?= $prodNewDateItem['slug'] ?>-<?= $prodNewDateItem['id'] ?>">Xem chi tiết
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>
</section>

<section class="home-poster">
    <div class="container">
        <div class="poster-wrap">
            <div class="row align-items-center ">
                <div class="col-xl-5 col-lg-6">
                    <div class="content">
                        <div class="title">
                            <span class="title-highlighter highlighter-secondary"> <i class="fal fa-headphones-alt"></i> Không Nên Bỏ Lỡ!!</span>

                            <h2 class="title">Khám phá bộ sưu tập điện thoại mới nhất</h2>
                        </div>

                        <a href="product-category?category=29" class="btn-custom btn-bg-primary">Kiểm tra ngay!</a>
                    </div>

                </div>

                <div class="col-xl-7 col-lg-6">
                    <div class="thumb">
                        <img src="public/images/others/poster-smartphone.png" alt="Poster Product">
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>


<section class="product-area">
    <div class="container">
        <div class="section-title-wrapper text-center ">
            <span class="title-highlighter justify-content-center highlighter-secondary"> <i class="far fa-shopping-basket"></i>Lượt xem sản phẩm</span>
            <h2 class="title">Sản phẩm được quan tâm nhiều nhất</h2>
        </div>

        <div class="main-product">
            <div class="row">
                <?php foreach ($dataProdRecent as $itemDataProdRecent) : ?>
                    <?php
                    $productLink = "product/{$itemDataProdRecent['slug']}-{$itemDataProdRecent['id']}";
                    $thumbSrc = "{$itemDataProdRecent['thumb']}";
                    $quantity = $itemDataProdRecent['quantity'];
                    $discount = $itemDataProdRecent['discount'];
                    $price = $itemDataProdRecent['price'];
                    $totalRatings = $itemDataProdRecent['totalRatings'];
                    $prodTitle = $itemDataProdRecent['title'];
                    $prodTotalUserRatings = $itemDataProdRecent['totalUserRatings'];
                    ?>

                    <div class="col-xl-3 mb-5 col-lg-4 col-sm-6 col-12">
                        <div class="product-item px-3">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <a class="thumb-link" href="<?= $productLink ?>">
                                        <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" src="<?= $thumbSrc ?>" alt="<?= $itemDataProdRecent['title'] ?>">
                                    </a>

                                    <div class="actions-hover">
                                        <ul class="action-list mb-0 ">
                                            <li class="select-option">
                                                <?php if ($quantity > 0) : ?>
                                                    <a href="<?= $productLink ?>" class="btn-action-lagre">
                                                        Xem chi tiết
                                                    </a>
                                                <?php else : ?>
                                                    <a class="btn-action-lagre disabled" href="#">
                                                        Sản phẩm hết hàng
                                                    </a>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="lable-sale">
                                    <?php if ($discount != 0) { ?>
                                        <div class="product-badget">Giảm <?= $discount . ' %' ?> </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="content">
                                <div class="inner">
                                    <div class="product-rating">
                                        <span class="icon">
                                            <?= Format::renderStars($totalRatings) ?>
                                        </span>
                                        <span class="rating-number">(<?= $prodTotalUserRatings ?>)</span>
                                    </div>
                                    <h5 class="title">
                                        <a href="<?= $productLink ?>"><?= $itemDataProdRecent['title']  ?></a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price"><?= Format::formatCurrency($price) ?></span>
                                        <?php if ($discount) : ?>
                                            <span class="price old-price"><?= Format::calculateOriginalPrice($price, $discount) ?></span>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="col-lg-12 text-center mt--20 mt_sm--0">
                    <a href="product-category" class="btn-custom btn-bg-lighter">Xem tất cả</a>
                </div>
            </div>
        </div>


    </div>
</section>

<section>
    <div class="sale-off-banner" style="margin-bottom:50px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="sale-off-banner_img">
                                <a href="coupon"><img src="https://th.bing.com/th/id/R.7f0f839825c681a1525a103c8988c468?rik=oP81miJ2r8LDEg&pid=ImgRaw&r=0" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</section>




<section class="most-sold-product">
    <div class="container">
        <div class="most-sold-product-wrap">
            <div class="section-title-wrapper text-center ">
                <span class="title-highlighter highlighter-primary"><i class="fas fa-star"></i> BestSeller</span>
                <h2 class="title">Sản phẩm bán chạy trong cửa hàng</h2>
            </div>

            <div class="content">
                <div class="row row-cols-xl-2 row-cols-1">
                    <?php
                    foreach ($dataProdMostSold as $itemDataProdMostSold) {
                    ?>
                        <?php
                        $productLink = "product/{$itemDataProdMostSold['slug']}-{$itemDataProdMostSold['id']}";
                        $thumbSrc = "{$itemDataProdMostSold['thumb']}";
                        $quantity = $itemDataProdMostSold['quantity'];
                        $discount = $itemDataProdMostSold['discount'];
                        $price = $itemDataProdMostSold['price'];
                        $totalRatings = $itemDataProdMostSold['totalRatings'];
                        $prodTitle = $itemDataProdMostSold['title'];
                        $prodTotalUserRatings = $itemDataProdMostSold['totalUserRatings'];
                        ?>
                        <div class="col">
                            <div class="product-list">
                                <div class="thumbnail">
                                    <a href="<?= $productLink  ?>">
                                        <img data-sal="zoom-in" data-sal-delay="100" data-sal-duration="1500" src="<?= $thumbSrc ?>" alt="<?= $prodTitle ?>">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-rating">
                                        <span class="rating-icon">
                                            <?= Format::renderStars($totalRatings) ?>
                                        </span>
                                        <span class="rating-number">
                                            <span><?= $prodTotalUserRatings ?></span> Đánh giá
                                        </span>
                                    </div>
                                    <h6 class="product-title text-truncate ">
                                        <a href="<?= $productLink ?>"><?= $prodTitle  ?> </a>
                                    </h6>
                                    <div class="product-price-variant">
                                        <span class="price current-price"><?= Format::formatCurrency($price) ?></span>
                                        <?php if ($discount != 0) : ?>
                                            <span class="price old-price"><?= Format::calculateOriginalPrice($price, $discount) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>


        </div>
    </div>
</section>




<!-- Start Why Choose Area  -->
<section class="why-choose-area pb--50 ">
    <div class="container">
        <div class="section-title-wrapper text-center ">
            <span class="title-highlighter justify-content-center  highlighter-secondary"><i class="fal fa-thumbs-up"></i>Tại sao chọn chúng tôi</span>
            <h2 class="title">Tại sao bạn chọn chúng tôi</h2>
        </div>
        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="public/images/icons/service6.png" alt="Service">
                    </div>
                    <h6 class="title">Giao hàng nhanh tróng &amp; an toàn</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="public/images/icons/service7.png" alt="Service">
                    </div>
                    <h6 class="title">Đảm bảo 100% về sản phẩm</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="public/images/icons/service8.png" alt="Service">
                    </div>
                    <h6 class="title">Hàng ngàn mã ưu đãi hập dẫn</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="public/images/icons/service9.png" alt="Service">
                    </div>
                    <h6 class="title">Chính sách hoàn trả 24 giờ</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="public/images/icons/service10.png" alt="Service">
                    </div>
                    <h6 class="title">Chất lượng chuyên nghiệp</h6>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Why Choose Area  -->

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
        .timer {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .timer li {
            margin: 0 20px; /* Increased margin for better spacing */
            text-align: center;
        }

        .timer_num {
            font-size: 4rem; /* Increased size for larger numbers */
            font-weight: bold;
            color: #333; /* Adjust color as needed */
        }

        .timer_unit {
            font-size: 1.25rem; /* Adjust size to complement the larger numbers */
            color: #666; /* Adjust color as needed */
        }


    </style>

<script>
    function startCountdown(endTime) {
        function updateTimer() {
            const now = new Date();
            const timeRemaining = endTime - now;

            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                document.getElementById('day').textContent = '00';
                document.getElementById('hour').textContent = '00';
                document.getElementById('minute').textContent = '00';
                document.getElementById('second').textContent = '00';
                return;
            }

            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            document.getElementById('day').textContent = String(days).padStart(2, '0');
            document.getElementById('hour').textContent = String(hours).padStart(2, '0');
            document.getElementById('minute').textContent = String(minutes).padStart(2, '0');
            document.getElementById('second').textContent = String(seconds).padStart(2, '0');
        }

        const timerInterval = setInterval(updateTimer, 1000);
        updateTimer(); // Initial call to display the timer immediately
    }

    // Set the end time here (example: 1 day from now)
    const endTime = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
    startCountdown(endTime);
</script>

