<section class="checkout-area">
    <div class="container">
        <form action="checkout-final" method="POST">
            <div class="row">
                <div class="col-lg-6 pe-5 ">
                    <div class="checkout-billing">
                        <h4 class="title mb--30">Thanh toán</h4>

                        <p class="text-danger ">Vui lòng xem kỹ thông tin nhận hàng.</p>
                        <div class="form-group">
                            <label>Họ và tên <span class="text-danger ">*</span></label>
                            <input name="fullname" type="text" value="<?= $dataAddress['fullname'] ?? '' ?>" class="mb--15" placeholder="Họ và tên">
                        </div>

                        <div class="form-group">
                            <label>Số điện thoại <span class="text-danger ">*</span></label>
                            <input name="phone" type="tel" value="<?= $dataAddress['phone'] ?? '' ?>" class="mb--15" placeholder="Số điện thoại">
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ giao hàng<span class="text-danger ">*</span></label>

                            <textarea name="address" value="<?= $dataAddress['address'] ?? '' ?>" rows="1 placeholder=" Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng."><?= $dataAddress['address'] ?? '' ?></textarea>
                        </div>


                        <div class="form-group">
                            <label>Lời nhắn cho người bán</label>
                            <textarea name="note" rows="2" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng."></textarea>
                        </div>

                        <!--  -->
                        <div class="coupon-apply mb--40">
                            <input id="coupon_code" type="text" name="coupon_code" class="mb--15" placeholder="Nhập mã giảm giá">
                            <button onclick="updateProductCoupon(<?= $dataCart[0]['totalPrice'] ?>)" type="button" class="btn">Áp dụng</button>
                        </div>

                        <a href="coupon">
                            <button type="button" 
                                    style="background-color: #999; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; font-size: 16px; cursor: pointer; transition: background-color 0.3s;">
                                Lấy mã giảm giá
                            </button>
                        </a>

                        


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="order-checkout-summery">
                        <h5 class="title mb--20">Đơn hàng của bạn</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Tạm tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($dataCart as $cartItem) {

                                    ?>
                                        <tr class="order-product">
                                            <td>
                                                <div class="inner">
                                                    <div class="thumb me-2 ">
                                                        <img src="<?= $cartItem['thumb'] ?>" alt="<?= $cartItem['title'] ?>">
                                                    </div>
                                                    <div class="title">
                                                        <a href="product/<?= "{$cartItem['slug']}-{$cartItem['product_id']}" ?>" target="_blank" rel="noopener noreferrer">
                                                            <p class="mb-0"><?= $cartItem['title'] ?>
                                                                <span class="quantity"><?= 'x' . $cartItem['quantity'] ?></span>
                                                            </p>

                                                            <span class="variant">Phân loại: <font>
                                                                    <?= $cartItem['attribute_values'] ?>
                                                                </font>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?= Format::formatCurrency(($cartItem['price'] * $cartItem['quantity'])) ?>
                                            </td>
                                        </tr>
                                    <?php } ?>



                                    <tr class="order-subtotal">
                                        <td>Tạm tính</td>
                                        <td class="order-subtotal-amount">
                                            <?= Format::formatCurrency($dataCart[0]['totalPrice']) ?>
                                        </td>
                                    </tr>

                                    <tr class="order-coupon">
                                        <td>Ưu đãi</td>
                                        <td class="order-coupon-amount">0</td>
                                    </tr>

                                    <tr class="order-total">
                                        <td>Tổng</td>
                                        <td class="order-total-amount">
                                            <?= Format::formatCurrency($dataCart[0]['totalPrice']) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-payment-method">
                            <?php
                            foreach ($dataPaymentMethod as $paymentMethod) {

                            ?>
                                <div class="single-payment">
                                    <div class="input-group justify-content-between align-items-center">
                                        <input type="radio" id="<?= $paymentMethod['name']  ?>" name="payment_method" value="<?= $paymentMethod['id']  ?> - <?= $paymentMethod['name'] ?> ">
                                        <label for="<?= $paymentMethod['name'] ?>"><?= $paymentMethod['display_name']  ?></label>
                                        <img src="<?= $paymentMethod['thumb']  ?>" alt="<?= $paymentMethod['display_name']  ?>">
                                    </div>
                                    <p class="desc"><?= $paymentMethod['description'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-custom">Thanh toán</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>