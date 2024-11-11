<section class="news-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row g-5">
                    <?php foreach ($dataNews as $dataNewsItem) {
                        extract($dataNewsItem);
                    ?>
                        <div class="col-md-6">
                            <div class="content-blog">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="news/<?= "$slug-$id" ?>">
                                            <img src="<?= $thumb ?>" alt="<?= $title ?>">
                                        </a>

                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="news/<?= "$slug-$id" ?>"><?= $title ?></a></h5>

                                        <div class="read-more-btn">
                                            <a class="right-icon" href="news/<?= "$slug-$id" ?>">Đọc thêm <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-lg-4">
                <aside class="news-sidebar-area">

                    <div class="news-single-widget">
                        <h6 class="widget-title">Bài viết mới nhất</h6>

                        <?php foreach ($dataNews as $newsItem) {
                        ?>
                            <div class="content-blog-side">
                                <div class="thumbnail">
                                    <a href="news/<?= "{$newsItem['slug']}-{$newsItem['id']}" ?>">
                                        <img src="<?= $newsItem['thumb'] ?>" alt="<?= $newsItem['title'] ?>">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="title"><a href="news/<?= "{$newsItem['slug']}-{$newsItem['id']}" ?>"><?= $newsItem['title'] ?></a></h6>
                                    <div class="news-post-meta">
                                        <div class="post-meta-content">
                                            <ul class="post-meta-list">
                                                <li><?= date('d M, Y', strtotime($newsItem['create_at'])) ?></li>
                                                <li><?= $newsItem['view'] ?> Lượt xem</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                   

                </aside>
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
