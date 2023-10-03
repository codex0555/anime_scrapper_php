<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>

<?php
    // Check if there is more data to load
    $nextPage = $page + 1;
    $nextApi = "https://webdis-zgj8.onrender.com/genre/kids?type=2&page=$nextPage";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $nextApi);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    $nextApiResponse = curl_exec($ch);
    $nextJson = json_decode($nextApiResponse, true);
    curl_close($ch);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Genre : Kids</title>
    <?php
    require("meta.php");
    ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@200&display=swap" rel="stylesheet">
</head>
<body class="body">
<div class="heading">
       
            
        
       <span class="title first-1"><img src="logov1.png" alt="logov1" width="80px"></span>
       
       <!-- <p class="desc">this is a websites</p> -->
       <form action="rd1.php" class="form1">
       <label for="" class="search"></label>
       <input type="search" name="enter1" id="srch" class="s1" placeholder="ENTER ANIME...">
       <!-- <span class="filter"><i class="fa-solid fa-filter"></i></span> -->
       <!-- <button type="submit" class="s2" id="searchBtn"><span class="glass"><i class="fa-solid fa-magnifying-glass"></i></span></button> -->
       </form>
   </div>

    <?php
    require("navbar.php");
    ?>

    <?php
    require("search1.php");
    ?>
   

    <!-- I Will Fix This Sliding Trending Section Later -->
    
    
<div class="card_m5">
    <div class="search-results" id="searchResults"></div>
</div>
   
<div class="adjust">
<div class="hy">
    <span class="r">Genre : Kids</span>
    
    <?php  if (!empty($nextJson)) {
        // Display the "View More" button if there is more data
        echo '<a href="?page=' . $nextPage . '" class="more">View More <i class="fa-solid fa-greater-than"></i></a>';
    }
    ?>
</div>
<br>
<div class="card-container">
        <?php
        $api = "https://webdis-zgj8.onrender.com";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$api/genre/kids?type=2&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        $json1 = json_decode($response, true);
        
        foreach ((array)$json1 as $resentUpdated) {
            ?>
            
            <div class="card">
                <div class="column1">
                    <span class="hd">HD</span>
                    <a href="watch/<?= $resentUpdated["animeId"] ?>-episode-1">
                        <img data-src="<?= $resentUpdated["animeImg"]; ?>" src="https://cdn130.picsart.com/291224346033201.jpg" width="150px" height="200px" class="a1" alt="Anime Image" loading="lazy">
                    </a>
                    <h1 class="t1"><?= $resentUpdated["animeTitle"] ?></h1>
                </div>
            </div>
            <?php
        }
        curl_close($ch);
        ?>
    </div>
</div>
        



     
    
    
    
    
    <?php
    require("footer.php");
    ?>
    
    <script>
        // Function to apply lazy loading to all images with data-src attribute
        function lazyLoadImages() {
            const imagesToLazyLoad = document.querySelectorAll("img[data-src]");
            
            const lazyImg = (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.getAttribute("data-src");
                        observer.unobserve(img); // Stop observing once loaded
                    }
                });
            };
            
            const imgObserver = new IntersectionObserver(lazyImg, {
                root: null,
                threshold: 0,
            });
            
            imagesToLazyLoad.forEach((img) => {
                imgObserver.observe(img);
            });
        }

        // Call the lazy loading function once the DOM is ready
        document.addEventListener("DOMContentLoaded", lazyLoadImages);
    </script>
</body>
</html>
<style>
     .adjust{
    margin-top: -10rem;
}

@media (max-width: 320px) {
    /* Add styles for smaller screens here */
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 10px; /* Adjust as needed for spacing between cards */
        max-width: 100%; /* Adjust the maximum container width */
        margin: 0 -5px; /* Center the container and add a small negative margin to counteract the gap */
        margin-left: 0.7rem;
    }

    .card {
        flex: 0 0 calc(12.5% - 10px); /* Display eight cards per row; adjust gap as needed */
        box-sizing: border-box;
        padding: -10px; /* Add card padding */
        text-align: center; /* Center card content */
        border-radius: 5px; /* Rounded corners for cards */
        width: 9rem; /* Set the width of each card */
        height: 12rem; /* Set the height of each card */
    }

    .column1 a img {
        width: 9rem; /* Set the width of each card */
        height: 10rem; /* Set the height of each card */
        object-fit: cover; /* Maintain aspect ratio and cover the entire card */
    }

    .t1{
        margin-top: -0.5rem;
        font-size: 14px;
        margin-left: -0.6rem;
        width: 7.9rem;
        
    }

    .hd{
        margin-left: 0.3rem;
    }

    .sub_dub{
        margin-top: 8.5rem;
        margin-left: 6rem;
    }

    .ep_no{
        margin-top: 8.5rem;
        margin-left: 0.5rem;
    }
}

@media (max-width: 390px) {
    /* Add styles for smaller screens here */
    .bg{
        height: 4rem;
    }

    .gif iframe{
        margin-left: 4.5rem;
    }

    .social_links{
        display: none;
    }

    .s1{
        width: 6rem;
    }

    .form1{
        margin-right: 0.5rem;
    }

    .card-container{
        margin-left: 0.5rem;
    }

    /* .adjust{
        margin-top: -2rem;
    } */

    .heading{
        width: 100vw;
        position: relative;
    }


}

@media (max-width: 414px) {
    /* Add styles for smaller screens here */
    .card-container{
      margin-left: 1.2rem;
    }

    .form1{
        margin-right: 1rem;
    }

    .s1{
        width: 9rem;
    }

    .bg{
        height: 4rem;
    }

    .gif iframe{
        margin-left: 4.6rem;
    }

    .gif h1{
        margin-top: -0.5rem;
    }
}
</style>