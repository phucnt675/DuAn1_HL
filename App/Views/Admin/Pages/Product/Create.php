<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null): void
    {

?>

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form class="form-horizontal" action="/admin/products" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <h4 class="card-title">Thêm sản phẩm</h4>
                                <input type="hidden" name="method" id="" value="POST">

                                <!-- Các trường thông tin sản phẩm -->
                                <div class="form-group">
                                    <label for="name">Tên*</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm..." name="name">
                                </div>
                                <div class="form-group">
                                    <label for="image">Hình ảnh</label>
                                    <input type="file" class="form-control" id="image" placeholder="Nhập hình ảnh..." name="image">
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá tiền*</label>
                                    <input type="number" class="form-control" id="price" placeholder="Nhập giá tiền..." name="price">
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">Giá giảm*</label>
                                    <input type="number" class="form-control" id="discount_price" placeholder="Nhập giá giảm..." name="discount_price">
                                </div>
                                <div class="form-group">
                                    <label for="short_description">Mô tả ngắn</label>
                                    <textarea class="form-control" id="short_description" placeholder="Nhập mô tả..." name="short_description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea class="form-control" id="description" placeholder="Nhập mô tả..." name="description"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="category_id">Loại sản phẩm*</label>
                                    <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="category_id" name="category_id">
                                        <option value="" selected disabled>Vui lòng chọn...</option>

                                        <?php
                                        foreach ($data as $item) :
                                        ?>
                                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_featured">Nổi bật*</label>
                                    <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="is_featured" name="is_featured">
                                        <option value="" selected disabled>Vui lòng chọn...</option>
                                        <option value="1">Mới</option>
                                        <option value="0">Bình thường</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái*</label>
                                    <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status">
                                        <option value="" selected disabled>Vui lòng chọn...</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <div class="form-group">
                    <label>Thêm biến thể</label>
                    <div id="sku_section">
                        
                    </div>
                    <a href="javascript:void(0)" onclick="addSku()" class="btn btn-success mt-3">Thêm SKU</a>
                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                    <button type="submit" class="btn btn-primary" name="">Cập Nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
 <!-- Bắt đầu phần script -->
 <script>
            let skuIndex = 0;

function addSku() {
    skuIndex++;
    $('#sku_section').append(`
        <div class="sku-item sku-form row mb-3" id="sku-item-${skuIndex}" data-sku-index="${skuIndex}">
            <div class="col-md-3">
                <label>Mã SKU</label>
                <input type="text" name="sku[${skuIndex}][sku]" class="form-control" placeholder="SKU">
                <small class="text-danger" style="display:none">Vui lòng nhập mã SKU</small>
            </div>
            <div class="col-md-3">
                <label>Giá</label>
                <input type="number" name="sku[${skuIndex}][price]" class="form-control" placeholder="Giá">
                <small class="text-danger" style="display:none">Vui lòng nhập giá</small>
            </div>
            <div class="col-md-3">
                <label>Giá giảm</label>
                <input type="number" name="sku[${skuIndex}][discount_price]" class="form-control" placeholder="Giá giảm">
                <small class="text-danger" style="display:none">Vui lòng nhập giá giảm</small>
            </div>
            <div class="col-md-3">
                <label>Số lượng</label>
                <input type="number" name="sku[${skuIndex}][quantity]" class="form-control" placeholder="Số lượng">
                <small class="text-danger" style="display:none">Vui lòng nhập số lượng</small>
            </div>
            <div class="col-md-3">
                <label>Hình ảnh</label>
                <input type="file" name="sku[${skuIndex}][images]" class="form-control" accept="image/*">
                <small class="text-danger" style="display:none">Vui lòng tải hình ảnh</small>
            </div>
            <div class="col-12 properties-container mt-2"></div>
            <span class="text-danger" style="display:none" id="propertyCheck-${skuIndex}">Vui lòng nhập thuộc tính</span>
            <div class="col-12 mt-3">
                <a href="javascript:void(0)" onclick="addProperty(this)" class="btn btn-primary">Thêm Thuộc tính</a>
                <a href="javascript:void(0)" onclick="removeSku(${skuIndex})" class="btn btn-danger">Xóa biến thể</a>
            </div>
        </div>
    `);
}

function removeSku(index) {
    $(`#sku-item-${index}`).remove();
}

function addProperty(element) {
    const parent = $(element).closest('.sku-item');
    const index = parent.data('sku-index');
    parent.find('.properties-container').append(`
        <div class="row mb-2">
            <div class="col-md-5">
                <input type="text" name="sku[${index}][properties][]" class="form-control" placeholder="Tên thuộc tính">
            </div>
            <div class="col-md-5">
                <input type="text" name="sku[${index}][values][]" class="form-control" placeholder="Giá trị thuộc tính">
            </div>
            <div class="col-md-2">
                <a href="javascript:void(0)" onclick="$(this).closest('.row').remove()" class="btn btn-danger">Xóa</a>
            </div>
        </div>
    `);
}

        </script>
<?php

    }

    
}
