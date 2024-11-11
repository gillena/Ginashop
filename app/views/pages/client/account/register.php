<section class="signin-area">
    <div class="signin-header">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <a href="" class="site-logo"><img src="public/images/logo/logo.png" alt="logo"></a>
            </div>
            <div class="col-sm-8">
                <div class="singin-header-btn">
                    <p class="mb-0">Bạn đã có tài khoản?</p>
                    <a href="login" class="btn btn-custom">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
    <div class="signin-form-wrap">
        <div class="signin-form-main">
            <h3 class="title" style="text-align: center; margin-bottom: 10px">Đăng ký</h3>
            <p class="desc mb--55" style="text-align: center; margin-bottom: 55px;">Nhập chi tiết của bạn bên dưới</p>
            <form class="singin-form" id="formRegister" method="POST">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Họ và tên">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" required class="form-control" id="emailLogin" name="email" placeholder="Email">
                    <div class="invalid-feedback">
                        Email đã tồn tại.
                    </div>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" id="passwordLogin" name="password" placeholder="Mật khẩu">
                    <div class="invalid-feedback">
                        Độ dài tối thiểu là 8 ký tự, và phải bao gồm chữ hoa, chữ thường, chữ số và ký tự đặc biệt.
                    </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                    <div>
                        <button id="btn_ele" onclick="registerUser()" type="button" class="btn btn-custom text-capitalize">
                            Tạo tài khoản <span class="spin"><i class="fas fa-spinner"></i></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<style>
    .signin-area {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa; /* Thay đổi màu nền nếu cần */
    }

    .signin-header {
        width: 100%;
        padding: 20px;
        background-color: #ffffff; /* Thay đổi màu nền nếu cần */
        border-bottom: 1px solid #ddd;
    }

    .signin-form-wrap {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 600px; /* Thay đổi kích thước tối đa nếu cần */
        padding: 20px;
        background-color: #ffffff; /* Thay đổi màu nền nếu cần */
        border-radius: 8px; /* Thay đổi độ bo góc nếu cần */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Thay đổi bóng nếu cần */
    }

    .signin-form-main {
        width: 100%;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn-custom {
        background-color: #007bff; /* Thay đổi màu nền nếu cần */
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
    }

    .invalid-feedback {
        color: #dc3545; /* Thay đổi màu thông báo lỗi nếu cần */
    }

    .d-flex {
        display: flex;
    }

    .align-items-center {
        align-items: center;
    }

    .justify-content-between {
        justify-content: space-between;
    }
</style>
