<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title  ?? 'Error' ?></title>
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
    <script src="public/js/vendor/jquery.js"></script>
    <script src="public/js/vendor/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="main ">

        <main>
            <?php require_once 'app/views/pages/client/' . $pages . '.php' ?>
        </main>

    </div>


    <!-- Main JS -->
    <!-- <script src="public/js/main.js"></script> -->

    <!-- Api JS -->
    <script src="public/js/include/base.js"></script>
    <script src="public/js/include/user.js"></script>

</body>


</html>