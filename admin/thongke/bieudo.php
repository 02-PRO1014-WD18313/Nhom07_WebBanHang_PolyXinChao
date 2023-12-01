
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="./css/css.css">
  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <style>

  </style>
</head>
<body>
<div class="boxcenter">
  <div class="row2">
    <div class="row2 font_title">
      <h1 style="font-weight: 900; text-align: center;">Biểu đồ tròn và biểu đồ cột</h1>
    </div>
    <hr>
    <div class="row2 form_content ">
      <div
              id="myChart" style="width:100%; width:100%; height:400px; align-items: center">
      </div>

      <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

// Set Data
          const data = google.visualization.arrayToDataTable([
            ['Contry', 'Mhl'],
            <?php
            $tongdm=count($listthongke);
            $i=1;
                foreach ($listthongke as $thongke) {
                    extract($thongke);
                    if ($i==$tongdm) $dauphay=""; else $dauphay="," ;
                    echo "['".$thongke['tendm']."',".$thongke['countsp']."]".$dauphay;
                    $i+=1;
                }
            ?>
            
           
          ]);

// Set Options
          const options = {
            title:'THỐNG KÊ SẢN PHẨM THEO DANH MỤC',
            is3D:true
          };

// Draw
          const chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);

        }
      </script>

    </div>
  </div>

  <!-- END HEADER -->


</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu Đồ Cột Thống Kê</title>
    <!-- Bao gồm thư viện Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Địa điểm hiển thị biểu đồ -->
    <div style="width: 80%; margin: auto;">
        <canvas id="barChart"></canvas>
    </div>

    <script>
        // Dữ liệu mẫu cho biểu đồ cột
        
        var barData = {
            
            labels: ['Giỏ hàng', 'Lượt bán', 'Dữ liệu 3', 'Dữ liệu 4', 'Dữ liệu 5','Dữ liệu 5'],
            datasets: [{
                label: 'Số liệu Thống Kê',
                data: [10, 20, 60, 40, 50,30],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(75, 382, 192, 0.2)',
                    'rgba(75, 872, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 255, 255, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        };
       

        // Lấy thẻ canvas và vẽ biểu đồ cột
        var barCtx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(barCtx, {
            type: 'bar',
            data: barData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
