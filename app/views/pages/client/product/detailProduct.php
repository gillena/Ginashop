<section class="detail-product-area">
    <div class="detail-product-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="product-thumb-small">
                                <?php foreach ($dataImageProd as $thumbItem) {
                                ?>
                                    <div class="small-thumb-img">
                                        <img src="<?= $thumbItem['image'] ?>" alt="image <?= $dataProd['title'] ?>">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class=" zoom-gallery ">
                                <div class="product-thumb-large ">
                                    <?php foreach ($dataImageProd as $imageItem) {
                                    ?>
                                        <div class="thumbnail">
                                            <img src="<?= $imageItem['image'] ?>" alt="image <?= $dataProd['title'] ?>">

                                            <div class="product-quick-view">
                                                <a href="<?= $imageItem['image'] ?>" class="popup-zoom">
                                                    <i class="far fa-search-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="product-stock" style ="padding: 10px; font-size:20px; color:brown; text-align:center;">Virtual Model</div>
                        <div class="sketchfab-embed-wrapper" style="position: relative; width: 100%; height: 300px;">
                            <iframe title="<?= htmlspecialchars($dataProd['title']) ?>"
                                    frameborder="0"
                                    allowfullscreen
                                    mozallowfullscreen="true"
                                    webkitallowfullscreen="true"
                                    allow="autoplay; fullscreen; xr-spatial-tracking"
                                    xr-spatial-tracking
                                    execution-while-out-of-viewport
                                    execution-while-not-rendered
                                    web-share
                                    src="<?= htmlspecialchars($dataProd['vr_model_url']) ?>"
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;">
                            </iframe>
                        </div>


                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="detail-product-content">
                        <div class="inner">
                            <h2 class="product-title"><?= $dataProd['title'] ?></h2>
                            <div class="product-stock">Số lượng:
                                <span id="product-stock"><?= $dataProd['isVariant'] == 1 ? $dataVariant[0]['quantity'] : $dataProd['quantity'] ?></span>
                            </div>
                            <span class="product-sold "><?= $dataProd['sold'] ?> Đã bán</span>
                       

                            <div id="product-price" class="price">
                                <span class="price-amount">
                                    <?php
                                    echo ($dataProd['isVariant'] == 1) ?
                                        Format::formatCurrency($productPrice[0]['min_price']) . ' - ' . Format::formatCurrency($productPrice[0]['max_price']) :
                                        Format::formatCurrency($dataProd['price']);
                                    ?>

                                </span>

                                <?php if ($dataProd['isVariant'] != 1 && $dataProd['discount'] != 0) : ?>
                                    <span class="price-amount-old"><?= Format::calculateOriginalPrice($dataProd['price'], $dataProd['discount']) ?></span>
                                    <span class="text-danger "><?= ($dataProd['discount'] . '%') ?> </span>
                                <?php endif ?>
                            </div>
                            <div class="product-rating">
                                <div class="star-rating">
                                    <?= Format::renderStars($dataProd['totalRatings']) ?>
                                </div>
                                <div class="review-link">
                                    (<span><?= $dataProd['totalUserRatings'] ?></span> Đánh giá)
                                </div>
                            </div>
                            <p class="description"><?= $dataProd['short_description'] ?></p>

                            <form id="formProduct" action="cart/addCartApi" method="post">
                                <?php if (!empty($dataVariant)) : ?>
                                    <div class="product-variations-wrapper mt-5 ">

                                        <div class="product-variation">
                                            <h6 class="title">Phân loại:</h6>
                                            <div class="color-variant-wrapper">
                                                <input id="product_variant_id" type="hidden" name="product_variant_id">
                                                <ul class="product-variant">
                                                    <?php
                                                    foreach ($dataVariant as $dataVariantItem) {
                                                    ?>
                                                        <li id="<?= $dataVariantItem['id'] ?>" onclick="getVariant(<?= $dataVariantItem['id'] ?>)"><?= $dataVariantItem['attribute_values'] ?></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>

                                <div class="product-action-wrapper d-flex-center">
                                    <div class="pro-quantity">
                                        <button type="button" class="dec quantity-btn">-</button>
                                        <input type="text" name="quantity" value="1">
                                        <button type="button" class="inc quantity-btn">+</button>
                                    </div>

                                    <ul class="product-action d-flex-center mb-0 ">
                                        <li class="add-to-cart">
                                            <?php
                                            $quantity = $dataProd['quantity'];
                                            $isProductAvailable = ($quantity != 0);
                                            $buttonText = $isProductAvailable ? 'Thêm vào giỏ hàng' : 'Sản phẩm tạm hết';
                                            $buttonClass = $isProductAvailable ? 'btn btn-custom btn-bg-primary' : 'btn btn-custom btn-bg-primary disabled';
                                            ?>

                                            <button id="add-Product-To-Cart" onclick="addCart()" type="button" class="<?= $buttonClass; ?>"><?= $buttonText; ?></button>

                                        </li>


                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="woocommerce-tabs bg-vista-white">
    <div class="container" >
        <ul class="nav tabs" id="myTab" role="tablist" style="display: flex; justify-content: center;">
            <li class="nav-item" role="presentation">
                <a id="description-tab" class="active" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true" >Mô tả</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false" class="" tabindex="-1">Đánh giá</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent">
            <!-- Description -->
            <div class="tab-pane fade active show " id="description" role="tabpanel" aria-labelledby="description-tab">
                <div class="product-desc-wrapper">
                    <div class="row">
                        <div class="col-lg-12 mb-30">
                            <div class="single-desc">
                                <?= $dataProd['description'] ?>
                            </div>
                        </div>

                    </div>
                    <!-- End .row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pro-des-features">
                                <?php
                                $iconsFeatures = [
                                    [
                                        'icon' => 'icon-3.png',
                                        'title' => 'Easy Returns'
                                    ],
                                    [
                                        'icon' => 'icon-2.png',
                                        'title' => 'Quality Service'
                                    ],
                                    [
                                        'icon' => 'icon-1.png',
                                        'title' => 'Original Product'
                                    ],
                                ]
                                ?>
                                <?php
                                foreach ($iconsFeatures as $iconsFeature) {
                                ?>
                                    <li class="li-features">
                                        <div class="icon">
                                            <img src="public/images/others/<?= $iconsFeature['icon'] ?>" alt="icon">
                                        </div>
                                        <?= $iconsFeature['title'] ?>
                                    </li>
                                <?php  } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Desccription-->
            </div>
            <!-- Infor -->
            <!-- End Info -->

            <!-- Comment -->
            <div class="tab-pane fade " id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="reviews-wrapper">
                    <div class="row">
                        <div class="col-lg-6 mb--40">
                            <div class="pro-desc-commnet-area">
                                <h5 class="title">Đánh giá cho sản phẩm này</h5>
                                <ul id="comment-list" class="comment-list ps-0 "> </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 mb--40">
                            <div class="comment-respond mt-0">
                                <h5 class="title mb--30">Đánh giá sản phẩm</h5>
                                <form method="POST" id="formRatings">
                                    <div class="rating-wrapper d-flex-center mb--30">
                                        Số sao <span class="require">*</span>
                                        <div class="reating-inner ml--20">
                                            <input type="hidden" name="star" id="currentRating">
                                            <input type="hidden" name="prod_id" value="<?= $dataProd['id'] ?>">
                                            <span data-rating="1" class="star"><i class="fas fa-star"></i></span>
                                            <span data-rating="2" class="star"><i class="fas fa-star"></i></span>
                                            <span data-rating="3" class="star"><i class="fas fa-star"></i></span>
                                            <span data-rating="4" class="star"><i class="fas fa-star"></i></span>
                                            <span data-rating="5" class="star"><i class="fas fa-star"></i></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Mời bạn chia sẻ cảm nhận</label>
                                                <textarea name="comment" placeholder="Cảm nhận của bạn"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-submit">
                                                <button onclick="addRatingProd()" type="button" class="btn-custom btn-bg-primary w-auto">Gửi đánh giá</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-area">
    <div class="container">
        <div class="title">
            <span class="title-highlighter highlighter-secondary"> <i class="far fa-shopping-basket"></i>Sản phẩm liên quan</span>
            <h2 class="title">Các sản phẩm liên quan</h2>
        </div>

        <div class="main-product">
            <div class="row">
                <?php foreach ($dataProdCategory as $itemDataProd) : ?>
                    <?php
                    $productLink = "product/{$itemDataProd['slug']}-{$itemDataProd['id']}";
                    $thumbSrc = "{$itemDataProd['thumb']}";
                    $quantity = $itemDataProd['quantity'];
                    $discount = $itemDataProd['discount'];
                    $price = $itemDataProd['price'];
                    $totalRatings = $itemDataProd['totalRatings'];
                    $prodTitle = $itemDataProd['title'];
                    $prodTotalUserRatings = $itemDataProd['totalUserRatings'];
                    ?>
                    <div class="col-xl-3 mb-5 col-lg-4 col-sm-6 col-12">
                        <div class="product-item px-3">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <a class="thumb-link" href="<?= $productLink ?>">
                                        <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" src="<?= $thumbSrc ?>" alt="<?= $itemDataProd['title'] ?>">
                                    </a>

                                    <div class="actions-hover">
                                        <ul class="action-list mb-0 ">
                

                                            <li class="select-option">
                                                <?php if ($quantity > 0) : ?>
                                                    <a type="button" href="<?= $productLink ?>" class="btn-action-lagre">
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
                                        <a href="<?= $productLink ?>"><?= $itemDataProd['title'] ?></a>
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
                    <a href="product-category?category=<?= $dataProd['cate_id'] ?>" class="btn-custom btn-bg-lighter">Xem tất cả</a>
                </div>
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
    </style>
