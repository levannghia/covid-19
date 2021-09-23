<?php
 $url = 'https://api.apify.com/v2/key-value-stores/ZsOpZgeg7dFS1rgfM/records/LATEST?fbclid=IwAR3GxckpaoFIrCb3nsrV2gvmTQ2olRXS7ivwVySuLvMk_XHeFRHuXY8-ryw';
 $api =  file_get_contents($url);
 $data = json_decode($api, true);
 //var_dump ($data['detail']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="csrf-token" content=""> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="./public/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <!-- <link rel="stylesheet" href="./public/css/style.css"> -->
    <title>Covid-19</title>
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Home</a>
    <form class="d-flex" action="news.php" method="get">
      <input class="form-control me-2" name="q" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="abc mt-3 mb-3" style="display: flex;">
<button type="button" class="btn btn-warning">Cả nước: <?php echo $data['infected']?></button>
<button type="button" class="btn btn-primary">Hồi phục: <?php echo $data['recovered']?></button>
<button type="button" class="btn btn-danger">Đã hy sinh: <?php echo $data['deceased']?></button>
</div>
        <select class="form-select mt-3 thanhpho" aria-label="Default select example" name="thanhpho">
            <option value="" selected>__Mời Bạn Chọn Tỉnh__</option>
            <?php
                $i = -1;
           
                foreach($data['detail'] as $value){
                    $i++;
                    echo '<option value="'.$i.'">'.$value['name'].'</option>';
                }
            ?>
        </select>

        <div class="badge bg-primary text-wrap text-uppercase mt-3" style="width: 200px; inline-size: -webkit-fill-available;">
            <p class="Tinh" style="font-size:20px; margin-top: 13px"><?php echo $data['detail'][29]['name']?></p>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="alert alert-primary d-flex align-items-center mt-3" role="alert">
  
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
  Tổng:&nbsp;
  <div class="Tong">
  <?php echo $data['detail'][29]['cases']?>
  </div>
</div>
<div class="alert alert-warning d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  Hôm nay:&nbsp;
  <div class="HomNay">
  <?php echo $data['detail'][29]['casesToday']?>
  </div>
</div>
<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  Số ca tử vong:&nbsp;
  <div class="Chet">
  <?php echo $data['detail'][29]['death']?>
  </div>
</div>
<div class="container">
    <canvas id="myChart"></canvas>
</div>
</div>
<script>
  // let myChart = document.getElementById('myChart').getContext('2d');
  //   // Global Options
  //   Chart.defaults.global.defaultFontFamily = 'Lato';
  //   Chart.defaults.global.defaultFontSize = 18;
  //   Chart.defaults.global.defaultFontColor = '#777';

  //   let massPopChart = new Chart(myChart, {
  //     type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  //     data:{
  //       labels:['Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
  //       datasets:[{
  //         label:'Population',
  //         data:[
  //           617594,
  //           181045,
  //           153060,
  //           106519,
  //           105162,
  //           95072
  //         ],
  //         //backgroundColor:'green',
  //         backgroundColor:[
  //           'rgba(255, 99, 132, 0.6)',
  //           'rgba(54, 162, 235, 0.6)',
  //           'rgba(255, 206, 86, 0.6)',
  //           'rgba(75, 192, 192, 0.6)',
  //           'rgba(153, 102, 255, 0.6)',
  //           'rgba(255, 159, 64, 0.6)',
  //           'rgba(255, 99, 132, 0.6)'
  //         ],
  //         borderWidth:1,
  //         borderColor:'#777',
  //         hoverBorderWidth:3,
  //         hoverBorderColor:'#000'
  //       }]
  //     },
  //     options:{
  //       title:{
  //         display:true,
  //         text:'Largest Cities In Massachusetts',
  //         fontSize:25
  //       },
  //       legend:{
  //         display:true,
  //         position:'right',
  //         labels:{
  //           fontColor:'#000'
  //         }
  //       },
  //       layout:{
  //         padding:{
  //           left:50,
  //           right:0,
  //           bottom:0,
  //           top:0
  //         }
  //       },
  //       tooltips:{
  //         enabled:true
  //       }
  //     }
  //   });
$(document).ready(function() {
    $(".thanhpho").change(function() {
        // var _token = $('meta[name="csrf-token"]').attr('content');
        let thanhpho = $(this).val();
        console.log(thanhpho);
        $.ajax({
            url: "/covid-19/search.php",
            type: "POST",
            data: {
                // _token: _token,
                thanhpho: thanhpho,
            },
            success: function(data) {
                console.log(data);
                let dataResut = JSON.parse(data);
                $(".Tong").html(dataResut.cases);
                $(".Tinh").html(dataResut.name);
                $(".Chet").html(dataResut.death);
                $(".HomNay").html(dataResut.casesToday);
            }
        });
    });
});
</script>
</body>
</html>