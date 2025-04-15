<?php

namespace App\Views\Admin;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Người dùng</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['total_user'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i> <!-- Biểu tượng nhiều người dùng -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Loại sản phẩm</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['total_category'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-th-large fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sản phẩm
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $data['total_product'] ?></div>
                                        </div>
                                        <!-- <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-box fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Bình luận</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['total_comment'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thống kê sản phẩm cùng loại</h4>
                        </div>
                        <canvas id="product_by_category"></canvas>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thống kê 5 sản phẩm được bình luận nhiều nhất</h4>
                        </div>
                        <canvas id="comment_by_product"></canvas>

                    </div>
                </div>
            </div>


            

        </div>
        <!-- /.container-fluid -->



        <script>
            function productByCategoryChart() {
                var php_data = <?= json_encode($data['product_by_category']) ?>;
                console.log(php_data);
                var labels = [];
                var data = [];


                for (let i of php_data) {
                    console.log(i);
                    labels.push(i.name);
                    data.push(i.count);
                }

                const ctx = document.getElementById('product_by_category');

                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Số lượng sản phẩm',
                            data: data,
                            borderWidth: 1
                        }]
                    },
                    // options: {
                    //     scales: {
                    //         y: {
                    //             beginAtZero: true
                    //         }
                    //     }
                    // }
                });
            }



            function commentByProductChart() {
                var php_data = <?= json_encode($data['comment_by_product']) ?>;
                console.log(php_data);
                var labels = [];
                var data = [];

                console.log(labels);
                console.log(data);

                for (let i of php_data) {
                    console.log(i);
                    labels.push(i.name);
                    data.push(i.count);
                }

                const ctx = document.getElementById('comment_by_product');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Số lượng bình luận',
                            data: data,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            productByCategoryChart();
            commentByProductChart();
        </script>

<?php

    }
}

?>