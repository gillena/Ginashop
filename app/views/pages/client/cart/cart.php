<section class="cart-product-cart-area">
    <div class="container">
        <div class="cart-product-cart-wrap">
            <div class="product-table-heading">
                <h4 class="title">Giỏ hàng của bạn</h4>
                <a href="cart/deleteAllCart" class="cart-clear">Xoá tất cả sản phẩm</a>
            </div>
            <div class="table-responsive">
                <table class="table cart-product-table mb--40">
                    <thead>
                        <tr>
                            <th scope="col" class="product-remove"></th>
                            <th scope="col" class="product-thumbnail">Sản phẩm</th>
                            <th scope="col" class="product-title"></th>
                            <th scope="col" class="product-price">Giá </th>
                            <th scope="col" class="product-quantity">Số lượng</th>
                            <th scope="col" class="product-subtotal">Tạm tính</th>
                        </tr>
                    </thead>
                    <tbody id="cart_main">
                        <!-- Các sản phẩm sẽ được hiển thị ở đây -->
                    </tbody>
                </table>
                <div id="not-cart-main" style="color: red; display: none;">Vui lòng thêm sản phẩm vào giỏ hàng.</div>
            </div>

            <div class="row">
                <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                    <div class="cart-order-summery mt--80">
                        <h5 class="title mb--20">Tóm tắt đơn hàng</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table mb--30">
                                <tbody>
                                    <tr class="order-subtotal">
                                        <td>Tạm tính</td>
                                        <td id="order-subtotal">0</td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>Tổng</td>
                                        <td id="order-total-amount" class="order-total-amount">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="javascript:void(0);" class="btn-custom" onclick="handleCheckout()">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function handleCheckout() {
    const orderTotalAmount = parseFloat(document.getElementById('order-total-amount').innerText.replace('$', '').replace(',', ''));

    // Kiểm tra nếu tổng tiền lớn hơn 0
    if (orderTotalAmount > 0) {
        // Chuyển hướng đến trang thanh toán
        window.location.href = 'checkout';
    } else {
        // Hiển thị thông báo nếu tổng tiền bằng 0
        document.getElementById('not-cart-main').style.display = 'block';
    }
}

// Hàm cập nhật tổng tiền (giả sử có thể gọi khi giỏ hàng thay đổi)
function updateCartTotal() {
    // Cập nhật subtotal và total ở đây dựa trên giỏ hàng
    const subtotal = 0; // Cập nhật giá trị này dựa trên sản phẩm trong giỏ hàng
    document.getElementById('order-subtotal').innerText = subtotal.toFixed(2);
    document.getElementById('order-total-amount').innerText = subtotal.toFixed(2);
}

// Gọi hàm để cập nhật tổng tiền khi trang tải hoặc khi giỏ hàng thay đổi
updateCartTotal();
</script>
