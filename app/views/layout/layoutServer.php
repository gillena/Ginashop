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
   <!-- favicon  -->
   <link rel="icon" href="public/images/logo/logo.png" type="image/png">
    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="public/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/datatables.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/select2.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/base.css">
    <link rel="stylesheet" type="text/css" href="public/css/admin/style.css">

    <script src="public/js/vendor/jquery.js"></script>
    <script src="public/js/vendor/sweetalert2.all.min.js"></script>


</head>

<body>
    <div class="main ">

        <?php
        require_once 'app/views/includes/admin/header.php';
        ?>

        <main>
            <?php
            require_once 'app/views/includes/admin/sidebar.php';
            ?>
            <div class="content-body-admin">
                <?php require_once 'app/views/pages/admin/' . $pages . '.php' ?>

            </div>
        </main>

    </div>



    <!-- JS Vendor-->
    <script src="public/js/vendor/bootstrap.min.js"></script>
    <script src="public/js/vendor/jquery.dataTables.js"></script>
    <script src="public/js/vendor/select2.min.js"></script>
    <script src="public/js/vendor/ckeditor.js"></script>


    <!-- Apexchar js -->
    <script src="public/js/vendor/apex-chart/moment.min.js"></script>
    <script src="public/js/vendor/apex-chart/apex-chart.js"></script>

    <!-- Main JS -->
    <script src="public/js/admin/main.js"></script>

    <!-- Api JS -->

    <script src="public/js/include/base.js"></script>
    <script src="public/js/include/user.js"></script>
    <script src="public/js/include/product.js"></script>
    <script src="public/js/admin/statistical.js"></script>

</body>



</html>