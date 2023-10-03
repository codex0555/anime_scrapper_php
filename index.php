

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Nana</title>
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
   
    
    <?php
    require("trendingxd.php");

    ?>
    <!-- I Will Fix This Sliding Trending Section Later -->
    <!-- <div class="trending">
        <a href="watch.html" ><img src="img/trend1.jpg" width="250px" height="400px" class="a5" alt="one piece"></a>
        <a href="watch.html" ><img src="img/trend2.jpg" width="250px" height="400px" class="a5" alt="one piece"></a>
        <a href="watch.html" ><img src="img/trend3.jpg" width="250px" height="400px" class="a5" alt="one piece"></a>
        <a href="watch.html" ><img src="img/trend4.jpg" width="250px" height="400px" class="a5" alt="one piece"></a>
        <a href="watch.html" ><img src="img/trend5.jpg" width="250px" height="400px" class="a5" alt="one piece"></a>
        
    </div>
    <div class="arrow">
    
    
    <span class="arrow_left"><i class="fa-solid fa-arrow-left"></i></span>
    <br>
    <span class="arrow_right"><i class="fa-solid fa-arrow-right"></i></span>
</div> -->
<div class="bg">
<div class="gif">
    <iframe src="https://giphy.com/embed/lv2Pwd5dgZ76U" frameborder="0" width="70px" class="gif_g"></iframe> 
    <span class="m"><hr class="gif_line"> <h1 class="share"><br>Share NANA <br> To Your Friends</h1></span>
    <div class="social_links">
        <span class="facebook"><i class="fa-brands fa-facebook"></i></span>
        <span class="whatsapp"><i class="fa-brands fa-whatsapp"></i></span>
        <span class="telegram"><i class="fa-brands fa-telegram"></i></span>
        <!-- <span class="line"><i class="fa-brands fa-telegram"></i></span> -->
    </div>
</div>
</div>
     <div class="hy">
    <span class="r">Recently Updated</span>
    <a class="more" href="view_more_updated.php">View More <i class="fa-solid fa-greater-than"></i></a>

</div>
<div class="card_m5">
    <div class="search-results" id="searchResults"></div>
</div>
   
<div class="card-container">
        <?php
        $api = "https://webdis-zgj8.onrender.com";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$api/recent-release?type=");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        $json1 = json_decode($response, true);
        
        foreach ((array)$json1 as $resentUpdated) {
            ?>
            
            <div class="card">
                <div class="column1">
                    <span class="ep_no">Ep <?php echo $resentUpdated['episodeNum'] ?></span>
                    <span class="sub_dub"><?php echo $resentUpdated["subOrDub"] ?></span>
                    <span class="hd">HD</span>
                    <a href="watch/<?= $resentUpdated["episodeId"] ?>">
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



     <?php
     require("sub.php");

?>

<?php
require("romance.php");

?>

        
    
    
    
    
    <?php
    require("footer.php");
    ?>
    <script>
        const url=``;
    </script>

    <!-- <script src="/backend/index.js"></script> -->
    <script src="/backend/popular.js"></script>
    <script>

    </script>
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
    <style>
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
        margin-bottom: 1rem;
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

    .bg{
        margin-top: -1rem;
    }

    .share{
        font-size: 14px;
    }
}

@media (max-width: 390px) {
    /* Add styles for smaller screens here */
    .bg{
        height: 4rem;
    }

    .gif hr{
        margin-left: ;
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
}
    </style>
</body>
</html>