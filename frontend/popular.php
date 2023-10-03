<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view_more_updated</title>
    <link rel="stylesheet" href="s">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="body">
    <div class="heading">
       
            
        
        <span class="title first-1"><img src="/asset/logov1.png" alt="logov1" width="80px"></span>
        
        <!-- <p class="desc">this is a websites</p> -->
        <label for="" class="search"></label>
        <input type="search" id="srch" class="s1" placeholder="ENTER ANIME TITLE">
        <span class="filter"><i class="fa-solid fa-filter"></i></span>b
        <button type="button" class="s2" id="searchBtn"><span class="glass"><i class="fa-solid fa-magnifying-glass"></i></span></button>
    </div>
    <span class="nav_bars">
        <nav class="top">
            <ul class="ntop">
                <li></li>
                <li class="home"><a href="/frontend/index.html"><i class="fa-solid fa-house"></i><b> Home</b></a></li>
                <li class="movie"><a href="/frontend/movie.html"><i class="fa-solid fa-film"></i><b> Movie</b></a></li>
                <li class="popular"><a href="/frontend/popular.html"><i class="fa-solid fa-fire"></i><b> Popular</b></a></li>
                <li class="tv_series"><a href="/frontend/tv_series.html"><i class="fa-solid fa-tv"></i><b> Tv Series</b></a></li>


                <li class="about"><a href="/frontend/about.html"><i class="fa-solid fa-info"></i><b> About</b></a></li>
                
            </ul>
            
        </nav>
        
    </span>
    <div class="gif_updated">
        <iframe src="https://giphy.com/embed/lv2Pwd5dgZ76U" frameborder="0" width="100px" class="gif_u"></iframe> 
        <span class="n"><hr class="gif_line_u"> <h1 class="share_u"><br>Share NANA <br> To Your Friends</h1></span> 
        <div class="social_links">
            <span class="facebook"><i class="fa-brands fa-facebook"></i></span>
            <span class="whatsapp"><i class="fa-brands fa-whatsapp"></i></span>
            <span class="telegram"><i class="fa-brands fa-telegram"></i></span>
            <!-- <span class="line"><i class="fa-brands fa-telegram"></i></span> -->
        </div>
    </div>
    <div class="hy">
        <span class="r">Popular</span>
        <div class="card_m5">
        <div class="search-results" id="searchResults"></div>
    </div>
        <div class="main_card">
            <!-- dynamical card -->
        </div>
    </div>
    <div class="footer">
        <span class="logo"><img src="/asset/logov1.png" alt="logov1" width="80px"> <hr class="line"></span>
        
    </div>
    <script src="/backend/popular.js"></script>
</body>
</html>