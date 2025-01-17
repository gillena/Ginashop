<section class="add-wrap-admin">
    <div class="container-fluid ">
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-8 m-auto ">
                    <div class="card">
                        <div class="card-title-top">
                            <h5>Thông tin danh mục</h5>
                        </div>
                        <div class="form-input">
                            <div class="mb-5 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Tên danh mục</label>
                                <div class="col-sm-9">
                                    <input name="name" class="form-control input-text" value="<?= $dataValueOld['name'] ?? '' ?>" type="text" placeholder="Tên danh mục" required>
                                </div>
                            </div>
                            <!--  -->

                            <div class="mb-5 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Ảnh danh mục</label>
                                <div class="col-sm-9">
                                    <input name="image" class="form-control input-file" type="file" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="btn_ele" class="btn btn-custom col-sm-8 m-auto ">Thêm danh mục mới <span class="spin"><i class="fas fa-spinner"></i></span></button>
            </div>
        </form>
    </div>

</section>