<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Lấy thời gian hiện tại
$current_time = "";
// $tong = count($thongke);
$i = 1;


// Hiển thị thời gian hiện tại
// echo 'Thời gian hiện tại của Việt Nam: ' . $current_time;

?>
<div class="">  
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="card shadow mb-4 card-header d-flex flex-row align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Thống Kê doanh thu theo : </h6>
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            <select class="form-select" aria-label="Default select example" id="timeRange">
                <option value="day">1 Ngày</option>
                <option value="week">1 Tuần</option>
                <option value="month">1 Tháng</option>
                <option value="year" selected>1 Năm</option>
            </select>

        </div>


    </div>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->

        <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tổng doanh thu : </h6>
        </div> -->
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="revenueChart" width="900" height="400"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    // Giả định dữ liệu (thay thế bằng dữ liệu thực từ nguồn của bạn)
    var dayData = [
        <?php foreach ($data_ngay as $gio) {
            echo $gio['tong'] . ',';
        } ?>
        // 150000, 180000, 200000, 220000 ,100000 , 200000
    ];



    // Giả định dữ liệu tuần
    var weekData = [
        <?php foreach ($data_tuan as $ngay) {
            echo $ngay['tong'] . ',';
        } ?>
        // 150, 180, 200, 220
    ];

    // Giả định dữ liệu tháng
    var monthData = [
        <?php foreach ($data_thang as $ngay) {
            echo $ngay['tong'] . ',';
        } ?>
        // 500, 550, 600, 480, 520, 700, 680, 750, 800, 720, 600, 550
    ];

    // Giả định dữ liệu năm
    var yearData = [
        <?php foreach ($data_nam as $thang) {
            echo $thang['tong'] . ',';
        } ?>
    ];

    var revenueData = {
        day: dayData,

        week: weekData,
        month: monthData,
        year: yearData
    };
    // Lấy thẻ canvas
    var ctx = document.getElementById('revenueChart').getContext('2d');

    // Khởi tạo biểu đồ
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {

            labels: [
                    <?php foreach ($data_nam as $thang) {
                        echo '["Tháng ' . $thang['thang'] . '"],';
                    } ?>
                ],
            datasets: [{
                label: 'Doanh thu',
                data: revenueData.year, // Sử dụng dữ liệu ngày mặc định
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        }
    });

    // Lắng nghe sự kiện khi giá trị của phần chọn lọc thay đổi
    $("#timeRange").on("change", function () {
        var selectedValue = $(this).val();

        // Dựa trên giá trị chọn, cập nhật dữ liệu biểu đồ
        switch (selectedValue) {
            case 'day':
                myChart.data.labels = [
                    <?php foreach ($data_ngay as $gio) {
                        echo '["' . $gio['gio_phut'] . '"],';
                    } ?>
                    // [""], ['21:58 PM'], ['22:00 PM'],['22:30 PM'],['22:45 PM']
                ];
                myChart.data.datasets[0].data = revenueData.day;
                break;
            case 'week':
                myChart.data.labels = [
                    <?php foreach ($data_tuan as $ngay) {
                        echo '["' . $ngay['thu'] . '"],';
                    } ?>
                    // 0, 1, 2, 3, 4
                ];
                myChart.data.datasets[0].data = revenueData.week;
                break;
            case 'month':
                myChart.data.labels = [
                    <?php foreach ($data_thang as $ngay) {
                        echo '["' . $ngay['ngay'] . '"],';
                    } ?>
                    // 0, 1, 2, 3, 4, 5
                ];
                myChart.data.datasets[0].data = revenueData.month;
                break;
            case 'year':
                myChart.data.labels = [
                    <?php foreach ($data_nam as $thang) {
                        echo '["Tháng ' . $thang['thang'] . '"],';
                    } ?>
                ];

                myChart.data.datasets[0].data = revenueData.year;
                break;
        }

        // Cập nhật biểu đồ
        myChart.update();
    });
</script>


<!-- Các thẻ HTML khác -->