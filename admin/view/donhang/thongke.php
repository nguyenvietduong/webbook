<div class="bieudo">
  <div class="row2 font_title">
    <h2 style="font-size: 20px; "> THỐNG KÊ ĐƠN HÀNG </h2>
  </div>
  <div class="row2orm_bieudothongke">
    <?php
    if (isset($ds_thongke_dh) && is_array($ds_thongke_dh) || isset($thongke_dh_thang) && is_array($thongke_dh_thang)) {?>
      <div id="myChart" style="width:100%;color: white;height:500px; align-items: center">
      <script>
          google.charts.load('current', {packages: ['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Tháng');
              data.addColumn('number', 'SỐ LƯỢNG BÁN');

              data.addRows([
                  <?php
                      foreach ($ds_thongke_dh as $thongke) {
                          extract($thongke);
                          echo "['Tháng $month_of_year', $so_luong_ban],";
                      }
                  ?>
              ]);

              var options = {
                  title: 'BIỂU ĐỒ THỂ HIỆN SỐ LƯỢNG ĐƠN HÀNG ĐÃ BÁN THEO THÁNG',
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
    <?php } 
    else if(isset($thongke_dh_ngay) && is_array($thongke_dh_ngay)){?>
      <div id="myChart" style="width:100%;color: white;height:500px; align-items: center">
        <script>
            google.charts.load('current', {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Ngày');
                data.addColumn('number', 'SỐ LƯỢNG BÁN');

                data.addRows([
                    <?php
                        foreach ($thongke_dh_ngay as $thongke) {
                            extract($thongke);
                            echo "['Ngày $day_of_month', $so_luong_ban],";
                        }
                    ?>
                ]);

                var options = {
                    title: 'BIỂU ĐỒ THỂ HIỆN SỐ LƯỢNG ĐƠN HÀNG ĐÃ BÁN THEO NGÀY',
                    backgroundColor: 'darkgrey',  // Màu nền
                    titleTextStyle: {
                        color: 'red'  // Màu chữ của tiêu đề
                    },
                    legendTextStyle: {
                        color: 'red'  // Màu chữ của chú giải
                    },
                    pieSliceTextStyle: {
                        color: 'red',  // Màu chữ của từng phần trong biểu đồ tròn
                        backgroundColor: 'red'
                    }
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>
      </div>
    <?php }
    else if(isset($thongke_dh_tuan) && is_array($thongke_dh_tuan)){?>
      <div id="myChart" style="width:100%;color: white;height:500px; align-items: center">
            <script>
                google.charts.load('current', {packages: ['corechart']});
                google.charts.setOnLoadCallback(drawChart);
    
                function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Tuần');
                    data.addColumn('number', 'SỐ LƯỢNG BÁN');
    
                    data.addRows([
                        <?php
                            foreach ($thongke_dh_tuan as $thongke) {
                                extract($thongke);
                                echo "['Tuần $week_of_year', $so_luong_ban],";
                            }
                        ?>
                    ]);
    
                    var options = {
                        title: 'BIỂU ĐỒ THỂ HIỆN SỐ LƯỢNG ĐƠN HÀNG ĐÃ BÁN THEO TUẦN',
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
    <?php }?>
  </div>



    <div class="type_thongke_donhang">
        <div class="type_list">
          <a class="type" href="index.php?act=thongke_dh&type=day">Theo ngày</a>
        </div>

        <div class="type_list">
          <a class="type" href="index.php?act=thongke_dh&type=week">Theo tuần</a>
        </div>

        <div class="type_list">
          <a class="type" href="index.php?act=thongke_dh&type=month">Theo tháng</a>
        </div>
    </div>
</div>


