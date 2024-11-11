<?php
$priceSelect = array(
    ['title' => 'Dưới 2 triệu', 'value' => '0 - 2000000'],
    ['title' => 'Từ 2 - 4 triệu', 'value' => '2000000 - 4000000'],
    ['title' => 'Từ 4 - 7 triệu', 'value' => '4000000 - 7000000'],
    ['title' => 'Từ 7 - 13 triệu', 'value' => '7000000 - 13000000'],
    ['title' => 'Từ 13 - 20 triệu', 'value' => '13000000 - 20000000'],
    ['title' => 'Từ 20 - 32 triệu', 'value' => '20000000 - 32000000'],
    ['title' => 'Trên 32 triệu', 'value' => '32000000 - 8000000000'],
);
?>

<section class="product-area">
    <div class="container">
        <div class="shop-top">
            <form id="form-prod-category" method="post">
                <div class="row">
                    <div class="col-lg-9">
                    <div class="icon-container" id="toggleSidebar">
                        <i class="fas fa-sliders-h" style="color: #333; font-size: 25px; padding: 20px; margin-right: 10px; margin-bottom:25px;"></i>
                        <span style="color: #333; font-size: 25px; font-weight: bold;">Lọc sản phẩm</span>  
                    </div>

                        <div class="category-select" >
                            <select class="niceSelect product-filter-select"  name="category">
                                <option value="">Danh mục</option>
                                <?php foreach ($dataCateList as $cateItem) : ?>
                                    <option value="<?= $cateItem['id'] ?>"><?= $cateItem['name'] ?></option>
                                <?php endforeach ?>
                            </select>

                            <select class="niceSelect product-filter-select" name="brand">
                                <option value="">Thương hiệu</option>
                                <?php foreach ($dataBrand as $brandItem) : ?>
                                    <option value="<?= $brandItem['id'] ?>"><?= $brandItem['name'] ?></option>
                                <?php endforeach ?>
                            </select>

                            <select class="niceSelect product-filter-select" name="price">
                                <option value="">Khoảng giá</option>
                                <?php foreach ($priceSelect as $priceSelectItem) : ?>
                                    <option value="<?= $priceSelectItem['value'] ?>"><?= $priceSelectItem['title'] ?></option>
                                <?php endforeach ?>
                            </select>

                            <select class="niceSelect product-filter-select" name="sort">
                                <option value="-create_at">Mới nhất</option>
                                <option value="-sold">Bán chạy nhất</option>
                                <option value="price">Giá: Thấp đến cao</option>
                                <option value="-price">Giá: Cao đến thấp</option>
                            </select>
                            <input id="limit-product-filter" type="hidden" name="limit" value="12">

                            <select class="niceSelect product-filter-select" name="rating">
                                <option value="">Đánh giá</option>
                                <option value="5">5 sao</option>
                                <option value="4">4 sao trở lên</option>
                                <option value="3">3 sao trở lên</option>
                                <option value="2">2 sao trở lên</option>
                                <option value="1">1 sao trở lên</option>
                            </select>

                            <select class="niceSelect product-filter-select" name="promotion" id="promotion-filter">
                                <option value="">Tất cả sản phẩm</option>
                                <option value="1">Có khuyến mãi</option>
                                <option value="0">Không có khuyến mãi</option>
                            </select>

                            <select class="niceSelect product-filter-select" name="rating1" id="rating-filter">
                                <option value="">Tất cả sản phẩm</option>
                                <option value="1">Có đánh giá</option>
                            </select>

      


                        </div>
                    </div>
                    <div class="col-lg-3" >
                        <div class="filter-select" >
                            <span>
                                <a href="product-category" class="btn btn-custom"  >Làm mới</a>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="main-product">
            <div id="main-product-filter" class="row">
                <?php if (!empty($dataProd)) : ?>
                    <?php foreach ($dataProd as $itemDataProd) : ?>
                        <div class="col-xl-3 mb-5 col-lg-4 col-sm-6 col-12 product-item" data-rating="<?= $itemDataProd['totalRatings'] ?>">
                            <div class="product-item px-3">
                                <div class="thumb">
                                    <div class="thumb-img">
                                        <a class="thumb-link" href="product/<?= $itemDataProd['slug'] ?>-<?= $itemDataProd['id'] ?>">
                                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" src="<?= $itemDataProd['thumb'] ?>" alt="<?= $itemDataProd['title'] ?>">
                                        </a>

                                        <div class="actions-hover">
                                            <ul class="action-list mb-0">


                                                <li class="select-option">
                                                    <a href="<?= $itemDataProd['quantity'] > 0 ? 'product/' . $itemDataProd['slug'] . '-' . $itemDataProd['id'] : '#' ?>" class="btn-action-lagre <?= $itemDataProd['quantity'] > 0 ? '' : 'disabled' ?>">
                                                        <?= $itemDataProd['quantity'] > 0 ? 'Xem chi tiết' : 'Sản phẩm hết hàng' ?>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="lable-sale">
                                        <?php if ($itemDataProd['discount'] != 0) : ?>
                                            <div class="product-badget">Giảm <?= $itemDataProd['discount'] . ' %' ?> </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <span class="icon"><?= Format::renderStars($itemDataProd['totalRatings']) ?></span>
                                            <span class="rating-number">(<?= $itemDataProd['totalUserRatings'] ?>)</span>
                                        </div>
                                        <h5 class="title">
                                            <a href="product/<?= $itemDataProd['slug'] ?>-<?= $itemDataProd['id'] ?>"><?= $itemDataProd['title'] ?></a>
                                        </h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price"><?= Format::formatCurrency($itemDataProd['price']) ?></span>
                                            <?php if ($itemDataProd['discount']) : ?>
                                                <span class="price old-price"><?= Format::calculateOriginalPrice($itemDataProd['price'], $itemDataProd['discount']) ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-12 text-center mt--20">
                        <span onclick="learnMoreProductFilter()" class="btn-custom btn-bg-lighter">Xem thêm</span>
                    </div>
                <?php else : ?>
                    <div class="text-center">
    
                        <p class="fs-4" style="font-size:large;">Chưa có sản phẩm.</p>
                    </div>
                <?php endif; ?>
            </div>
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

        .category-select-hidden {
            display: none;
        }
    </style>


