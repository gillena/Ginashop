<?php
define('_DIR_ROOT', __DIR__);
// Set lại giờ Việt Nam
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Khởi tạo session
require_once './app/core/Session.php';
require_once './app/core/Cookie.php';
Session::init();

// Load thư viện
require 'vendor/autoload.php';

// Autoload config files
$directoryConfigs = './configs';
if (is_dir($directoryConfigs)) {
    $files = scandir($directoryConfigs);
    foreach ($files as $file) {
        if (is_file($directoryConfigs . '/' . $file)) {
            require_once($directoryConfigs . '/' . $file);
        }
    }
}

// Load service provider và view share
require_once './app/core/dataShare/ServiceProvider.php';
require_once './app/core/dataShare/ViewShare.php'; 

// Middleware
require_once './app/core/Middlewares.php';
require_once './app/middlewares/JWT.php';

// Route
require_once './app/core/Route.php';

// Kiểm tra và kết nối database
if (!empty($config['database'])) {
    $dbConfig = array_filter($config['database']);
    if (!empty($dbConfig)) {
        require_once './app/core/database/Connection.php';
        require_once './app/core/database/QueryBuilder.php';
        require_once './app/core/database/Database.php';
        require_once './app/core/database/DBShare.php';
    }
}

// Load core components
require_once './app/core/App.php';
require_once './app/core/database/BaseModel.php';
require_once './app/core/Controller.php';
require_once './app/core/Request.php';
require_once './app/core/Response.php';

// Autoload utils files
$directoryUtils = './utils';
if (is_dir($directoryUtils)) {
    $files = scandir($directoryUtils);
    foreach ($files as $file) {
        if (is_file($directoryUtils . '/' . $file)) {
            require_once($directoryUtils . '/' . $file);
        }
    }
}

$app = new App();
