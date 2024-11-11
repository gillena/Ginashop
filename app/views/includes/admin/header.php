
<header>
    <div class="admin-header">

        <div class="header-wrapper m-0">
            <style>
                .icon-container:hover i {
                    cursor: pointer;
                }
            </style>

            <div class="icon-container" id="toggleSidebar"style="margin-right: auto;">
                <i class="fas fa-list" style="color:aliceblue; font-size: 24px; float:left;"></i>
            </div>

            <div class="nav-menus">
                
                <div class="profile-media">
                    <div class="me-4 ">
                        <img class="user-profile" src="<?php echo isset($userData) && !empty($userData) && isset($userData['avatar']) ? $userData['avatar'] : 'https://t4.ftcdn.net/jpg/05/49/98/39/360_F_549983970_bRCkYfk0P6PP5fKbMhZMIb07mCJ6esXL.jpg' ?>" alt="avatarUser">
                    </div>
                    <div class="media-body">
                        <span><?php echo isset($userData) && !empty($userData) ? $userData['fullname'] : 'Admin' ?></span>
                        <p class="mb-0"><i class="fas fa-chevron-down"></i></p>
                    </div>
                </div>


                <ul class="profile-dropdown position-absolute">
                    <li>
                        <a href="admin/user">
                            <i class="fas fa-user"></i>
                            <span>Tài khoản</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin/order">
                            <i class="fas fa-archive"></i>
                            <span>Đơn hàng</span>
                        </a>
                    </li>

                    <li>
                        <a href="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Đăng xuất</span>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Header Ends-->
</header>


<script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        const sidebar = document.querySelector('.sidebar-wrapper');
        const contentBody = document.querySelector('.content-body-admin');
        const header = document.querySelector('.admin-header');

        // Toggle lớp để ẩn sidebar và mở rộng header, content ra toàn màn hình
        sidebar.classList.toggle('sidebar-hidden');
        contentBody.classList.toggle('content-full');
        header.classList.toggle('header-full');
    });
</script>





