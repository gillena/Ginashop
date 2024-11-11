<section class="contact-page-area">
    <div class="container">
        <div class="contact-page">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form">                  
                        <!-- Google Map Area đã được đổi vị trí vào đây -->
                        <div class="google-map-wrap mb-4">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6548877830346!2d106.6657830745748!3d10.761058459477939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee4595019ad%3A0xf2a1b15c6af2c1a6!2zxJDhuqFpIEjhu41jIEtpbmggVOG6vyBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmggKFVFSCkgQ1MgQg!5e0!3m2!1svi!2s!4v1723366734170!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" style="margin-top: 60px;">
                    <div class="contact-form-about">
                        <div class="contact-location mb--40">
                            <h4 class="title mb--20">Cửa hàng của chúng tôi</h4>
                            <span class="address mb--20"><?= $dataStoreCustom['address'] ?></span>
                            <span class="phone">Số điện thoại: <?= $dataStoreCustom['phone'] ?></span>
                            <span class="email">Email: <?= $dataStoreCustom['email'] ?></span>
                        </div>
                        <div class="opening-hour">
                            <h4 class="title mb--20">Giờ mở cửa</h4>
                            <p><?= $dataStoreCustom['open_time'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Mạng xã hội Area đã được đổi vị trí vào đây -->
<div class="container mt-5">
    <h3 class="title mb-4 text-center">Chúng tôi rất mong nhận được phản hồi từ bạn.</h3>
    <p class="bot-title text-center">Nếu bạn có những sản phẩm tuyệt vời mà bạn đang tạo ra hoặc muốn hợp tác với chúng tôi thì hãy liên hệ với chúng tôi qua email, số điện thoại hoặc các mạng xã hội dưới đây.</p>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="d-flex flex-wrap justify-content-center align-items-center">
                <!-- Facebook -->
                <a href="https://www.facebook.com/yourpage" target="_blank" class="d-flex align-items-center me-lg-5 mb-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" width="40" height="40">
                    <span class="ms-2">Facebook</span>
                </a>
                <!-- X (Twitter) -->
                <a href="https://x.com/yourprofile" target="_blank" class="d-flex align-items-center me-lg-5 mb-3">
                    <img src="https://static.vecteezy.com/system/resources/previews/027/395/710/original/twitter-brand-new-logo-3-d-with-new-x-shaped-graphic-of-the-world-s-most-popular-social-media-free-png.png" alt="X" width="40" height="40">
                    <span class="ms-2">X</span>
                </a>
                <!-- Instagram -->
                <a href="https://www.instagram.com/yourprofile" target="_blank" class="d-flex align-items-center me-lg-5 mb-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram" width="40" height="40">
                    <span class="ms-2">Instagram</span>
                </a>
                <!-- LinkedIn -->
                <a href="https://www.linkedin.com/in/yourprofile" target="_blank" class="d-flex align-items-center me-lg-5 mb-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png" alt="LinkedIn" width="40" height="40">
                    <span class="ms-2">LinkedIn</span>
                </a>
                <!-- YouTube -->
                <a href="https://www.youtube.com/yourchannel" target="_blank" class="d-flex align-items-center mb-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" alt="YouTube" width="40" height="40">
                    <span class="ms-2">YouTube</span>
                </a>
            </div>
        </div>
    </div>
</div>


    </div>
</section>

<!-- Đẩy lên đầu trang -->
 <!-- Nút Đẩy lên đầu trang -->
 <button id="scrollToTopBtn" class="btn btn-primary">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Hiển thị nút khi cuộn xuống
        window.addEventListener('scroll', function() {
            var scrollToTopBtn = document.getElementById('scrollToTopBtn');
            if (window.scrollY > 200) { // Hiển thị nút khi cuộn xuống 200px
                scrollToTopBtn.classList.remove('hidden');
            } else {
                scrollToTopBtn.classList.add('hidden');
            }
        });

        // Cuộn lên đầu trang khi nhấp vào nút
        document.getElementById('scrollToTopBtn').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
<style>
        /* Định dạng và căn chỉnh nút */
        #scrollToTopBtn {
            position: fixed;
            bottom: 20px; /* Khoảng cách từ dưới cùng */
            left: 50%; /* Căn giữa theo chiều ngang */
            transform: translateX(-50%); /* Đẩy nút về giữa */
            background-color: #ccc; 
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.3s;
            z-index: 1000;
        }

        #scrollToTopBtn:hover {
            background-color: #e65c00; /* Màu cam đậm hơn khi hover */
        }

        #scrollToTopBtn i {
            margin: 0;
        }

        /* Ẩn nút khi không cuộn xuống */
        #scrollToTopBtn.hidden {
            display: none;
        }
    </style>
