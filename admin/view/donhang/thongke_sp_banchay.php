<div class="bieudo">
  <div class="row2 font_title">
    <h2 style="font-size: 20px; "> THỐNG KÊ ĐƠN HÀNG </h2>
  </div>
  <div class="row2orm_bieudothongke">
    <div id="myChart" style="width:100%;color: white;height:500px; align-items: center">
    <script>
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Ngày',);
                data.addColumn('number', 'Sản phẩm bán chạy',);
                data.addColumn({type: 'string', role: 'annotation'}); // Annotation for product name

                data.addRows([
                    <?php
                        foreach ($thongke_sp_banchay as $thongke) {
                            extract($thongke);
                            echo "['Ngày $day_of_week', $sp_banchay, '$name . $name_tap'],";
                        }
                    ?>
                ]);

                var options = {
                    title: 'BIỂU ĐỒ THỂ HIỆN SỐ LƯỢNG SẢN PHẨM ĐƯỢC BÁN CAO NHÁT THEO NGÀY',
                    backgroundColor: 'darkgrey',  // Màu nền
                    titleTextStyle: {
                        color: 'chocolate'  // Màu chữ của tiêu đề
                    },
                    legendTextStyle: {
                        color: 'chocolate'  // Màu chữ của chú giải
                    },
                    pieSliceTextStyle: {
                        color: 'chocolate'  // Màu chữ của từng phần trong biểu đồ tròn
                    }
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>
        </div>
    </div>
</div>


