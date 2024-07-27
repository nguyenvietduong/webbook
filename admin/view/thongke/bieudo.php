<div class="bieudo">
  <div class="row2 font_title">
    <h2 style="font-size: 20px; "> THỐNG KÊ SỐ SẢN PHẨM THEO DANH MỤC </h2>
  </div>
  <div class="row2orm_bieudothongke">
    <div id="myChart" style="width:100%;color: white;height:500px; align-items: center">
    </div>
    <script>
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        const data = google.visualization.arrayToDataTable([
          ['DANH MỤC', 'SỐ LƯỢNG'],
          <?php
            foreach ($ds_thongke as $thongke) {
              extract($thongke);
              echo "['$category_name', $soluong],";
            }
          ?>
        ]);

        // Set Options
        const options = {
          title: 'BIỂU ĐỒ SỐ LƯỢNG SẢN PHẨM TRONG DANH MỤC',
          is3D: true,
          backgroundColor: 'darkgrey',  // Màu nền
          titleTextStyle: {
              color: 'white'  // Màu chữ của tiêu đề
          },
          legendTextStyle: {
              color: 'white'  // Màu chữ của chú giải
          },
          pieSliceTextStyle: {
              backgroundColor: 'white',
              color: 'white'  // Màu chữ của từng phần trong biểu đồ tròn
          }
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);

      }
    </script>

  </div>
</div>