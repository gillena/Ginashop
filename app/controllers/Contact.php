<?php

class Contact extends Controller
{

   //Hiển thị trang cửa hàng
    function Default()
    {
        $this->view('layoutClient', [
            'title' => 'Cửa hàng',
            'currentPath' => 'contact',
            'pages' => 'contact/contact',

        ]);
    }
}
