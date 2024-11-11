<?php


$active = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; 
?>
<section class="sidebar-wrapper" id="sidebar">
    <div class="top-fixed-sidebar">
        <div class="logo-wrapper">
            <a href="admin/dashboard">
                <img class="img-fluid for-white" src="<?= htmlspecialchars($dataStoreCustom['logo'], ENT_QUOTES, 'UTF-8') ?>" alt="logo">
            </a>
        </div>
    </div>
    <nav class="sidebar-main">
        <div class="sidebar-menu">
            <ul class="sidebar-links">

                <!-- Bảng điều khiển -->
                <li class="sidebar-list <?= $active == 'dashboard' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/dashboard?page=dashboard">
                        <i class="fas fa-th-large"></i>
                        <span>Thống kê</span>
                    </a>
                </li>

                <!-- Danh mục -->
                <li class="sidebar-list <?= $active == 'category' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/category?page=category">
                        <i class="fas fa-list"></i>
                        <span>Danh mục</span>
                    </a>
                </li>

                <!-- Thương hiệu -->
                <li class="sidebar-list <?= $active == 'brand' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/brand?page=brand">
                        <i class="fas fa-copyright"></i>
                        <span>Thương hiệu</span>
                    </a>
                </li>

                <!-- Sản phẩm -->
                <li class="sidebar-list <?= $active == 'product' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/product?page=product">
                        <i class="fas fa-box"></i>
                        <span>Sản phẩm</span>
                    </a>
                </li>

                <!-- Thuộc tính -->
                <li class="sidebar-list <?= $active == 'attributes' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/attributes?page=attributes">
                        <i class="fas fa-cogs"></i>
                        <span>Thuộc tính</span>
                    </a>
                </li>



                <!-- Mã giảm giá -->
                <li class="sidebar-list <?= $active == 'coupon' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/coupon?page=coupon">
                        <i class="fas fa-tag"></i>
                        <span>Mã giảm giá</span>
                    </a>
                </li>

                <!-- Hình thức thanh toán -->
                <li class="sidebar-list <?= $active == 'payment-method' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/payment-method?page=payment-method">
                        <i class="fas fa-credit-card"></i>
                        <span>Hình thức thanh toán</span>
                    </a>
                </li>

                <!-- Đơn hàng -->
                <li class="sidebar-list <?= $active == 'order' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/order?page=order">
                        <i class="fas fa-archive"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>

                <!-- Người dùng -->
                <li class="sidebar-list <?= $active == 'user' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/user?page=user">
                        <i class="fas fa-user-friends"></i>
                        <span>Người dùng</span>
                    </a>
                </li>


                <!-- Tin tức -->
                <li class="sidebar-list <?= $active == 'news' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/news?page=news">
                        <i class="fas fa-newspaper"></i>
                        <span>Tin tức</span>
                    </a>
                </li>

                <!-- Quản lý tin nhắn -->
                <li class="sidebar-list <?= $active == 'message' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="https://fchat.vn/livechat" target="_blank">
                        <i class="fas fa-envelope"></i>
                        <span>Quản lý tin nhắn</span>
                    </a>
                </li>

                <!-- Tuỳ chỉnh cửa hàng -->
                <li class="sidebar-list <?= $active == 'storeCustom' ? 'active' : '' ?>">
                    <a class="sidebar-list-link" href="admin/store-custom?page=storeCustom">
                        <i class="fab fa-centos"></i>
                        <span>Tuỳ chỉnh cửa hàng</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</section>





