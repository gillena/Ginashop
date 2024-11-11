<div class="cart-dropdown-area" id="cart-dropdown">
    <div class="cart-content-wrap">
        <div class="cart-header">
            <h2 class="header-title">Giỏ hàng</h2>
            <button class="cart-close"><i class="fas fa-times"></i></button>
        </div>
        <div class="cart-body">
            <ul id="cartList" class="cart-item-list ps-0 mb-0 "></ul>
            <div id="emptyCartMessage" style="display: none; color: red;">Vui lòng thêm sản phẩm vào giỏ hàng.</div>
        </div>
        <div class="cart-footer">
            <h3 class="cart-subtotal">
                <span class="subtotal-title">Thành tiền:</span>
                <span id="subtotal-amount" class="subtotal-amount">0</span>
            </h3>
            <div class="group-btn">
                <a href="cart" class="btn-custom viewcart-btn">Xem giỏ hàng</a>
                <a href="javascript:void(0);" class="btn-custom btn-bg-secondary checkout-btn" onclick="handleCheckout()">Thanh toán</a>
            </div>
        </div>
    </div>
</div>

<script>
function handleCheckout() {
    const subtotalAmount = parseFloat(document.getElementById('subtotal-amount').innerText);

    // Kiểm tra nếu tổng tiền lớn hơn 0
    if (subtotalAmount > 0) {
        // Chuyển hướng đến trang thanh toán
        window.location.href = 'checkout';
    } else {
        // Hiển thị thông báo nếu tổng tiền bằng 0
        document.getElementById('emptyCartMessage').style.display = 'block';
    }
}
</script>
