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
              data.addColumn('string', 'Name');
              data.addColumn('number', 'SỐ LƯỢNG MUA');

              data.addRows([
                  <?php
                      foreach ($thongke_kh_vip as $thongke) {
                          extract($thongke);
                          echo "['Name : $username', $total_purchased],";
                      }
                  ?>
              ]);

              var options = {
                  title: 'BIỂU ĐỒ THỂ HIỆN 5 KHÁCH HÀNG VIP MUA NHIỀU NHẤT',
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


