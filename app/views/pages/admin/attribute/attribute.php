<section class="product-wrap">
    <div class="card">
        <div class="title-header">
            <h5 class="title" >Danh sách thuộc tính</h5>
            <div class="right-options">
                <ul>
                    <li>
                        <a class="btn btn-custom" href="admin/add-attribute">Thêm thuộc tính</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-custom">
            <table class="theme-table" id="table_id">
                <thead class="rounded-3 overflow-hidden  ">
                    <tr>
                        <th>Tên thuộc tính</th>
                        <th>Tên hiển thị</th>
                        <th>Giá trị</th>
                        <th>Thực thi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($dataAttribute as $attributeItem) {
                    ?>
                        <tr>

                            <td class="text-capitalize"><?= $attributeItem['name'] ?></td>
                            <td class="text-capitalize fw-bold "><?= $attributeItem['display_name'] ?></td>
                            <td>
                                <div class="options">
                                    <li class="m-0 ">
                                        <a class="text-decoration-underline text-primary" href="admin/attribute-value/<?= $attributeItem['id'] ?>">
                                            Xem chi tiết
                                        </a>
                                    </li>
                                </div>
                            </td>

                            <td>
                                <ul class="options">
                                    <li class="m-0 ">
                                        <a href="admin/update-attribute/<?= $attributeItem['id'] ?>">
                                            <i class="edit fas fa-edit"></i>
                                        </a>
                                    </li>

                                    <li class="m-0 ">
                                        <a onclick="setDataIdToInput(this)" href="javascript:void(0)" data-id="<?= $attributeItem['id'] ?>" data-bs-toggle="modal" data-bs-target="#deleteConfirm">
                                            <i class="delete fas fa-trash-alt"></i>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    function setDataIdToInput(link) {
        const dataId = link.getAttribute("data-id");
        document.getElementById("idAttribute").value = dataId;
    }
</script>


<div class="modal fade theme-modal" id="deleteConfirm" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-3">
            <div class="modal-header border-0  d-block text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel22">Bạn đã chắc chắn chưa?</h5>
                <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0 text-center">Nếu thực hiện 'đồng ý' xoá bạn sẽ bị xoá vĩnh viễn không thể khôi phục lại hãy suy nghĩ thật kĩ trước khi xoá.</p>
            </div>
            <div class="modal-footer border-0 ">
                <form method="POST" action="admin/attributes/deleteAttribute">
                    <input type="hidden" id="idAttribute" name="id">
                    <button type="submit" class="btn btn-custom btn-yes fw-bold">Đồng ý</button>
                </form>
                <div class="ms-3 ">
                    <button type="button" class="btn btn-custom btn-no fw-bold" data-bs-dismiss="modal">Huỷ</button>
                </div>

            </div>
        </div>
    </div>
</div>