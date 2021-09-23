<?php
if(isset($_GET['q']) && $_GET['q'] != ""){
    $q = str_replace(" ","-",$_GET['q']);
    $domain = 'https://newsapi.org/v2/everything?q=';
    $apiKey = '&from=2021-09-10&sortBy=publishAt&apiKey=dd8b24d32dfa47e0ba5e6803026e7419';
    $url = $domain.$q.$apiKey;
    $api = file_get_contents($url);
    $data = json_decode($api, true);
}else{
    header("Location: /covid-19/index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="./public/js/jquery-3.4.1.min.js"></script>
    <title>Search - <?php echo $_GET['q']; ?></title>
</head>
<body>

<div class="container">
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a href="/index.php" class="navbar-brand">Home</a>
    <form class="d-flex" action="news.php" method="get">
      <input class="form-control me-2" name="q" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
    <?php
        if(isset($_GET['q']) && $_GET['q'] != ""){
            echo '<p class="fs-2">Kêt quả tìm kiếm: '.$_GET['q'].'</p>';
            foreach ($data['articles'] as $value) {
                echo '<div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="'.$value['urlToImage'].'" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                  <div class="card-body">
                  <h5 class="card-title"><a href="'.$value['url'].'">'.$value['title'].'</a></h5>
                      <p class="card-text">'.$value['description'].'</p>
                      <p class="card-text"><small class="text-muted">'.$value['publishedAt'].'</small></p>
                    </div>
                  </div>
                </div>
              </div>';
            }
        }
    ?>
</div>

</body>
</html>