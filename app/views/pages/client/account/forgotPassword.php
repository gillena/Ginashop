<section class="signin-area">
    <div class="signin-header">
        <div class="row align-items-center">
            <div class="col-xl-4 col-sm-6">
                <a href="" class="site-logo"><img src="public/images/logo/logo.png" alt="logo"></a>
            </div>
            <div class="col-xl-6 col-lg-4 col-sm-6">
                <div class="singin-header-btn">
                    <p>Bạn đã có tài khoản?</p>
                    <a href="login" class="btn-custom">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="signin-form-wrap">

        <div class="signin-form-main">
        <div class="col-md-2 d-lg-block d-none">
                <a href="login" class="back-btn"><i class="far fa-angle-left"></i></a>
            </div>
            <h3 class="title">Quên mật khẩu?</h3>
            <p class="desc mb--55">Vui lòng nhập địa chỉ email bạn đã sử dụng khi đăng ký, chúng tôi sẽ gửi hướng dẫn để đặt lại mật khẩu của bạn.</p>
            <form class="singin-form" id="formForgot" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="form-group d-flex align-items-center justify-content-between">
                    <div>
                        <button type="button" id="btn_ele" onclick="forgotPasswordUser()" class="btn btn-custom text-capitalize">Gửi ngay <span class="spin"><i class="fas fa-spinner"></i></span></button>
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
