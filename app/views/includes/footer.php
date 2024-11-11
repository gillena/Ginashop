

 <footer class="footer-area">
     <div class="footer-top">
         <div class="container">
         <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget">
                                <h5 class="widget-title">Hỗ trợ</h5>
                                <div class="logo mb--30">
                                    <a href="">
                                        <img class="light-logo" src="<?= $dataStoreCustom['logo'] ?>" alt="Logo Images">
                                    </a>
                                </div>
                                <div class="inner">
                                    <p><?= $dataStoreCustom['address'] ?></p>
                                    <ul class="support-list-item">
                                        <li>
                                            <a href="mailto:<?= $dataStoreCustom['email'] ?>">
                                                <i class="fal fa-envelope-open"></i>
                                                <?= $dataStoreCustom['email'] ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="tel:<?= $dataStoreCustom['phone'] ?>">
                                                <i class="fal fa-phone-alt"></i>
                                                <?= $dataStoreCustom['phone'] ?>
                                            </a>
                                        </li>
                                        <li style = "color:#fff;">
                                            <i class="fal fa-map-marker-alt"></i> <?= $dataStoreCustom['address'] ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget">
                                <h5 class="widget-title">Tài khoản</h5>
                                <div class="inner">
                                    <ul class="inner-ul">
                                        <li><a href="my-account">Tài khoản của bạn</a></li>
                                        <li><a href="login">Đăng nhập / Đăng kí</a></li>
                                        <li><a href="cart">Giỏ hàng</a></li>
                                        <li><a href="product-category">Danh mục sản phẩm</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget">
                                <h5 class="widget-title">Đăng ký nhận bản tin</h5>
                                <div class="inner">
                                    <span>Nhận thông tin mới nhất và ưu đãi đặc biệt qua email.</span>
                                    <form action="your-newsletter-signup-url" method="POST" class="newsletter-form mt-3">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary" 
                                                style="
                                                background-color: #FF6F00; /* Màu nền đen */
                                                color: #FFFFFF; /* Màu chữ trắng */
                                                border: 1px solid #000000; /* Đường viền đen */
                                                ">
                                                 Đăng ký
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

             </div>
         </div>
     </div>

     <div class="copyright-area">
         <div class="container bt">
         <div class="copyright-left d-flex flex-wrap justify-content-center">
                         <ul class="quick-link">
                             <li style="text-align: center; color:#FFFFFF;">© 2024. Bản quyền thuộc về <a target="_blank" href="#"style="color:#FFFFFF;">GinaShop</a>.</li>
                         </ul>
                     </div>
             </div>
         </div>
     </div>
 </footer>