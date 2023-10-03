<?php 
require('config.php'); 
$keyword = $_GET['keyword'];
$keyword = str_replace(' ', '%20', $keyword);
?>

<?php
require("one.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card"></div>
    <script src="/backend/trending.js"></script>
    
    <?php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://webdis-yfx7.onrender.com/search?keyw=$keyword");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    $response = curl_exec($ch);
    $results = json_decode($response, true);
  
    foreach((array) $results as $key => $search) { ?>
        <div>
            <h1><?=$search['animeId']?></h1>
            <h3><?=$search['status']?></h3>
            <img src="<?= $search["animeImg"] ?>" alt="">
        </div>
    <?php } 
    curl_close($ch);
    ?>
</body>
</html>
