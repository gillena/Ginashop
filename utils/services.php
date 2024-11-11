<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Cloudinary\Uploader;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class Services
{

    // Gửi mã xác nhận qua email
    static function sendCode($email, $subject, $body)
    {
        global $config;
        //Cau hinh config
        $configPhpMailer = $config['phpMailer'];

        $mail = new PHPMailer(true);

        try {
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->setLanguage('vi', '../assets/library/PHPMailer/language/');
            $mail->CharSet = 'UTF-8';
            $mail->Host       = $configPhpMailer['smtpHost'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $configPhpMailer['smtpUsername'];
            $mail->Password   = $configPhpMailer['smtpPassword'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port       = $configPhpMailer['smtpPort'];


            //thông tin người gửi và email nhận
            $mail->setFrom('no-reply@accounts.admin.com', 'Admin');
            $mail->addAddress($email);

            // Tiêu đề và nội dung email
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Gửi email
            $mail->send();
            // echo 'Gửi thành email công.';
            return true;
        } catch (Exception $e) {
            // echo 'Gửi không thành công. Lỗi: ', $mail->ErrorInfo;
            return false;
        }
    }

        // Gửi email thông báo đặt hàng thành công
        static function sendOrderConfirmationEmail($email, $orderCode, $totalMoney, $orderItems)
        {
            global $config;
            $configPhpMailer = $config['phpMailer'];
    
            $mail = new PHPMailer(true);
            try {
                // Cấu hình SMTP
                $mail->isSMTP();
                $mail->setLanguage('vi', '../assets/library/PHPMailer/language/');
                $mail->CharSet = 'UTF-8';
                $mail->Host       = $configPhpMailer['smtpHost'];
                $mail->SMTPAuth   = true;
                $mail->Username   = $configPhpMailer['smtpUsername'];
                $mail->Password   = $configPhpMailer['smtpPassword'];
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                $mail->Port       = $configPhpMailer['smtpPort'];
    
                // Nhận và gửi
                $mail->setFrom('no-reply@accounts.admin.com', 'Admin');
                $mail->addAddress($email);
    
                // Nội dung email
                $mail->isHTML(true);
                $mail->Subject = 'Thông báo đặt hàng thành công';
                $mail->Body = self::generateOrderEmailBody($orderCode, $totalMoney, $orderItems);
    
                // Gửi email
                $mail->send();
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    
        // Tạo nội dung email đặt hàng
        private static function generateOrderEmailBody($orderCode, $totalMoney, $orderItems)
        {
            $body = "<h1>Cảm ơn bạn đã đặt hàng!</h1>";
            $body .= "<p>Mã đơn hàng: <strong>{$orderCode}</strong></p>";
            $body .= "<p>Tổng tiền: <strong>" . number_format($totalMoney, 0, ',', '.') . " VNĐ</strong></p>";
            $body .= "<h2>Chi tiết đơn hàng:</h2><ul>";
    
            foreach ($orderItems as $item) {
                $body .= "<li>{$item['title']} - Số lượng: {$item['quantity']} - Giá: " . number_format($item['price'], 0, ',', '.') . " VNĐ</li>";
            }
    
            $body .= "</ul>";
            return $body;
        }

    //Upload ảnh with cloudinary
    static function uploadImageToCloudinary($uploadedFile)
    {
        global $config;
        $configCloudinary = $config['cloudinary'];
        // Thiết lập cấu hình 
        Configuration::instance([
            'cloud' => [
                'cloud_name' => $configCloudinary['cloud_name'],
                'api_key' => $configCloudinary['api_key'],
                'api_secret' => $configCloudinary['api_secret']
            ],
            'url' => [
                'secure' => true
            ]
        ]);

        // Thực hiện tải lên ảnh lên Cloudinary
        try {
            $upload = new UploadApi();
            $uploadOptions = [
                'public_id' => '',
                'use_filename' => true,
                'overwrite' => true,
                'folder' => 'uploads_GINASHOP',
                'transformation' => [
                    ['format' => 'webp'],
                ],
            ];
            $result = $upload->upload($uploadedFile, $uploadOptions);

            return $result['secure_url'];
        } catch (\Exception $e) {
            return null;
        }
    }

    static function generateVnPayUrl($orderData)
    {
        global $config;
        $configVnpay = $config['bank']['vnpay'];

        if (empty($configVnpay)) {
            return false;
        }

       // Config
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/payment-final';
        $vnp_TmnCode = $configVnpay['vnp_TmnCode'];
        $vnp_HashSecret = $configVnpay['vnp_HashSecret'];


        $time = time();
        $locale = 'vn';

        // Tạo một mảng chứa thông tin cần thiết
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $orderData['amount'] * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $_SERVER['REMOTE_ADDR'],
            "vnp_Locale" => $locale,
            "vnp_OrderInfo" => 'vnpay_payment',
            "vnp_OrderType" => 'billpayment',
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $orderData['order_code'] . $time,
        );

        // Thêm thông tin nhưng không bắt buộc
        if (isset($orderData['bank_code']) && $orderData['bank_code'] != "") {
            $inputData['vnp_BankCode'] = $orderData['bank_code'];
        }

        if (isset($orderData['txt_bill_state']) && $orderData['txt_bill_state'] != "") {
            $inputData['vnp_Bill_State'] = $orderData['txt_bill_state'];
        }


        ksort($inputData);

        // Xây dựng chuỗi hash
        $hashdata = http_build_query($inputData, '', '&');

        $vnp_Url = $vnp_Url . "?" . $hashdata;

        // Thêm vnp_SecureHash vào URL nếu có vnp_HashSecret
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
        }

        return $vnp_Url;
    }

    private static function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    static function generateMomoUrl($orderData)
    {
        global $config;
        $configMomo = $config['bank']['momo'];

        if (empty($configMomo)) {
            return false;
        }

        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        $partnerCode = $configMomo['partner_code'];
        $accessKey = $configMomo['access_key'];
        $secretKey = $configMomo['secret_key'];

        $orderInfo = "momo_payment";
        $amount = $orderData['amount'] . "";
        $orderId = $orderData['order_code'] . "";
        $returnUrl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/payment-final';
        $notifyurl = "http://" . $_SERVER['HTTP_HOST'] . "/atm/ipn_momo.php";
        $bankCode = "SML";

        $requestId = time() . "";
        $requestType = "payWithMoMoATM";
        $extraData = "";

        // echo $serectkey;die;
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data =  array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = self::execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  

        error_log(print_r($jsonResult, true));
        return $jsonResult['payUrl'];
    }
}
