<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title ?? 'Error'; ?></title>
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
    <link rel="stylesheet" type="text/css" href="public/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/slick.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/datatables.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/sal.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="public/css/vendor/base.css">
    <link rel="stylesheet" type="text/css" href="public/css/client/client.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
  
    <script src="public/js/vendor/sweetalert2.all.min.js"></script>
    <script src="public/js/vendor/jquery.js"></script>
    

</head>

<body>
    <div class="main">

        <?php
        require_once 'app/views/includes/header.php';
        $dataStoreCustom = ViewShare::$dataShare['dataStoreCustom'];
        //hide breadcumb
        if ($pages != 'product/detailProduct' && $pages != 'home' && $pages != 'checkout/checkout') {
            require_once 'app/views/includes/breadcumb.php';
        }
        ?>

        <main>
            <?php require_once 'app/views/pages/client/' . $pages . '.php' ?>
        </main>

        <?php
        require_once 'app/views/includes/footer.php'
        ?>

    </div>
    
    <!-- JS Vendor-->
    <script src="public/js/vendor/popper.min.js"></script>
    <script src="public/js/vendor/bootstrap.min.js"></script>
    <script src="public/js/vendor/slick.min.js"></script>
    <script src="public/js/vendor/jquery.dataTables.js"></script>
    <script src="public/js/vendor/sal.js"></script>
    <script src="public/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="public/js/vendor/counterup.js"></script>
    <script src="public/js/vendor/jquery.nice-select.min.js"></script>

    <!-- Main JS -->
    <script src="public/js/main.js"></script>

    <!-- Api JS -->
    <script src="public/js/include/base.js"></script>
    <script src="public/js/client/cart.js"></script>
    <script src="public/js/client/rating.js"></script>
    <script src="public/js/include/product.js"></script>
  


     <!-- <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
        intent="WELCOME"
        chat-title="GINA_SHOP"
        agent-id="71813017-972b-4fe4-9271-b99ed1a07c47"
        language-code="en">
    </df-messenger> -->


    <script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=66cdb2f33d9da76deb4e8bda" 
    async="async"></script>
     
</body>
</html>
