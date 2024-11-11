<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trang không tồn tại</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        
        // Loại bỏ dấu '/' ở cuối nếu có và đảm bảo không thừa '/'
        $basePath = trim(dirname($_SERVER['SCRIPT_NAME']), '/');
        
        // Tạo base URL chuẩn
        $baseUrl = $protocol . "://" . $host;
        if ($basePath) {
            $baseUrl .= '/' . $basePath . '/';
        } else {
            $baseUrl .= '/';
        }

        echo "<base href='$baseUrl'>";
    ?>



    <!-- favicon  -->
    <link rel="icon" href="public/images/logo/logo.png" type="image/png">

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="public/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/base.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

</head>

<body>
    <div class="main">
    <main>
    <section class="error-page-area">
        <div class="container">
            <div class="row align-items-center justify-content-center"> <!-- Căn giữa các cột -->
                <div class="col-lg-6 text-center"> <!-- Căn giữa nội dung trong cột -->
                    <div class="thumbnail" style="width: 100%; max-width: 500px;">
                        <img src="./public/images/others/image.png" alt="404" style="width: 100%; height: auto;">
                    </div>
                </div>
                <div class="col-lg-6 text-center"> <!-- Căn giữa nội dung trong cột -->
                    <div class="content">
                        <h1 class="title">Trang không tồn tại</h1>
                        <p>
                            Dường như chúng tôi không tìm thấy điều bạn tìm kiếm. Trang bạn đang tìm không tồn tại, không khả dụng, hoặc đang tải không đúng cách.
                        </p>
                        <a href="" class="btn btn-custom btn-bg-secondary">Quay lại trang chủ
                            <i class="fal fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


    </div>
</body>


</html>