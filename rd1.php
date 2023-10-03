

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Scrapping Api</title>
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
       <form action="index.php" class="form1">
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
</body>
</html>
<style>
    .adjust{
    margin-top: -10rem;
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
</style>