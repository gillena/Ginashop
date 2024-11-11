<?php class Response
{
    function redirect($uri = "") {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
    
        // Loại bỏ dấu '/' ở cuối nếu có và đảm bảo không thừa '/'
        $basePath = trim(dirname($_SERVER['SCRIPT_NAME']), '/');
    
        // Tạo base URL chuẩn
        $baseUrl = $protocol . '://' . $host;
        if ($basePath) {
            $baseUrl .= '/' . $basePath;
        }
    
        // Lưu trữ URI sau khi loại bỏ '/' ở đầu
        $url = $baseUrl . '/' . ltrim($uri, '/');
    
        // Chuyển hướng đến URL đã tạo.
        header('Location: ' . $url);
        exit;
     }
    


    function dataApi($code, $mess, $data = [])
    {
        $data = [
            'code' => $code,
            'message' => $mess,
            'data' => $data,
        ];
        return json_encode($data);
    }

    function setToastSession($type, $mess, $uri = '')
    {
        Session::set('toastType', $type);
        Session::set('toastMessage', $mess);
        if (!empty($uri)) {
            return $this->redirect($uri);
        }
        return;
    }
}
