

<?php
    require("config.php");
    //$api="https://animezia.onrender.com";
    $parts= parse_url($_SERVER["REQUEST_URI"]);
    $page_url= explode("/",$parts["path"]);
    $url= $page_url[count($page_url)-1];
    $ch= curl_init();
    curl_setopt($ch, CURLOPT_URL, "$api/getEpisode/$url");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    $response= curl_exec($ch);
    $getEpisode= json_decode($response, true);
    curl_close($ch);
    $anime = $getEpisode['anime_info'];
$download = str_replace("Gogoanime", "Animezia", $getEpisode['ep_download']);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$api/getAnime/$anime");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
$respon = curl_exec($ch);
$getAnime = json_decode($respon, true);
//$getAnime = file_get_contents("$api/getAnime/$anime");
//$getAnime = json_decode($getAnime, true);
curl_close($ch);

$episodelist = $getAnime['episode_id'];
?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Watch <?= $getEpisode["animeNameWithEP"] ?> On Nana</title>
    <?php
    require("meta.php");
    ?>
    <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet">
    <script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@200;400;800&display=swap" rel="stylesheet">
</head>
<body class="body">
    <style>
        *{
    padding: 0px;
    margin: 0px;
}

.body{
    background-color: rgb(0, 0, 0);
}

.heading{
    padding-left: 40px;
    padding-top: 10px;
    text-align: center;
    background-color:rgb(13, 14, 13);
    display: flex;
    justify-content: space-between;
}

.title{
    font-family: 'Poppins', sans-serif;
    
    padding-right: 40px;
    color: aliceblue;
    margin-left: 85px;
    margin-top: 9px;
    
}
.desc{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    text-align: center;
    padding-right: 40px;

}
.srch{
    text-align: center;
    padding-top: 0px;
    padding-left: 0px;
    size: 0px;
}
.s1{
    width: 460px;
    padding: 14px;
    border-radius: 20px;
    margin: 0px;
    border: 0px;
    box-shadow: 0px 4px 9px rgb(120deg,white,black);
    background-color: black;
    transition: 0.4s;
    margin-right: 450px;
    text-align: left;
    justify-content: space-evenly;
    display: flex;
    margin-bottom: 15px ;
    margin-left: 0px;
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 14px;
    outline: none;
    height: 40px;
    margin-top: 10px;


    
}

.s1:focus{
    border: 1px solid rgb(231, 227, 3);
}

/* .s1:hover{
    color: black;
    transform: scale(1.09);
    background-color: rgb(227, 230, 50);
} */
.s2{
    width: 29px ;
    padding: 2px;
    height: 32px;
    border-radius: 8px;
    margin: 0px;
    border: 0px;
    background-color: black;
    cursor: pointer;
    margin-right: 40px;
    position: absolute;
    margin-left: 824px;
    margin-top: 12px;
    text-align: center;
   
    
}
.s2 i{
    margin-right: 40px;
    margin-top: -10px;
    font-weight: 800;
}

.glass i{
    margin-bottom: 80px;
    color: white;
    margin-top: -5px;
    position: absolute;
    margin-left: -5px;
    text-align: center;
    font-weight: 800;
    font-size: 16px;
}

.card{
    margin-left: 35px;
    margin-top: 5px;
    size: 30px;
    display: flex;
    justify-content: space-between;
    margin-right: 35px;
    grid-gap: 10px;
    
}
.t1{
    font-size: 16px;
    justify-content: center;
    padding-left: auto;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    color: white;
    margin-bottom: 30px;
    
    overflow: hidden;
    width: 171px;
    padding: 14px;
    height: 20px;
    text-overflow: ellipsis;
    white-space: nowrap;
    
    
}
.a1{
    border-radius: 10px;
    object-fit: cover;
    transition: 0.3s;
    
}



.a5{
    border-radius: 10px;
    object-fit: cover;
    transition: 0.3s;
}

.a5:hover{
    transform: scale(1.09);
}

.ep_no{
    display: flex;
    position: absolute;
    padding: 1px 8px;
    background-color: white;
    margin-top: 260px;
    margin-left: 80px;
    border-radius: 4px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    text-align: center;
    box-shadow: 1px 2px 5px rgb(73, 72, 72);
    width: 30px;
    height: 21px;
    font-size: 14px;
    text-align: ;
    
    
}
.t1:hover{
    color: 
    rgb(231, 227, 3);
}

.ntop{
    display:flex ;
    list-style: none;
    /* justify-content: space-between; */
    text-align: right;
    
    
    background-color: rgb(16, 16, 17);
    margin-top: 1px;
    padding: 10px;
    font-family: 'Poppins', sans-serif;
    /* font-weight: 500px; */
    
}

a:link{
    text-decoration: none;
    
}

 a{
    color: white;
}
.home{
    /* margin-left: 20px;
    background-color: rgb(255, 255, 255);
    width: 105px;
    padding: 10px;
    border-radius: 5px;
    margin-left: 280px; */
    text-align: center;
    transition: 0.4s;
    cursor: pointer;
    margin-left: 30px;
    color: wheat;
}
.about{
    /* margin-right: 310px;
    width: 105px;
    padding: 10px;
    border-radius: 5px;
    background-color: rgb(255, 255, 255); */
    text-align: center;
    transition: 0.4s;
    cursor: pointer;
    color: white;
    margin-left: 30px;
}

.movie{
    /* width: 105px;
    padding: 10px;
    border-radius: 5px;
    background-color: rgb(255, 255, 255); */
    text-align: center;
    transition: 0.4s;
    cursor: pointer;
    margin-left: 30px;
    color: white;
}

.popular{
    /* width: 105px;
    padding: 10px;
    border-radius: 5px;
    background-color: rgb(255, 255, 255); */
    
    text-align: center;
    transition: 0.4s;
   cursor: pointer;
   margin-left: 30px;
   color: aliceblue;
}

.tv_series{
    /* width: 105px; */
    /* padding: 10px; */
    /* border-radius: 5px; */
    /* background-color: rgb(255, 255, 255); */
    
    text-align: center;
    transition: 0.4s;
    cursor: pointer;
    margin-left: 30px;
}
.home:hover{
    transform: scale(1.09);
    color: rgb(107, 214, 228);
}
.popular:hover{
    transform: scale(1.09);
    color: rgb(221, 76, 76);
}

.movie:hover{
    transform: scale(1.09);
    color: rgb(70, 235, 64);
}

.tv_series:hover{
    transform: scale(1.09);
    color: rgb(146, 74, 214);
    
}

.about:hover{
    transform: scale(1.09);
    color: rgb(243, 240, 61);
    
}


.heading .title{
    position: relative;
    color: yellow;
    font-size: 35px;
    font-weight: 300;
}

.footer{
    text-align: center;
    margin-top: 200px;
    width: 1325px;
    height: 80px;
    background-color: black;
    padding: 20px;
    position: relative;

}
.logo{
    
    margin-top: 500px;
    
}

/* .line{
    width: 10px;
    margin-left: 620px;
} */

a:hover{
    transform:scale(1.09);
    color: rgb(224, 228, 16);
}

.sub_dub{
    width: 30px;
    padding: 1px 8px;
    background-color: rgb(231, 227, 3);
    text-align: center;
    
    margin-bottom:600px;
    margin-left: 135px;
    border-radius: 5px;
    position:absolute;
    margin-top: 260px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 14px;
    box-shadow: 1px 2px 5px rgb(73, 72, 72);
    transition: 0.4s;


}

.sub_dub:hover{
    transform: scale(1.09);

}

.trending{
    margin-left: 40px;
    margin-top: 10px;
    object-fit: cover;
}

.th{
    padding: 40px;
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
    font-size: 25px;
    color: white;
    margin-bottom: 20px;
    
}

.arrow{
    text-align: right;
    margin-right: 40px;
    margin-top: 20px;
    display: flex;
    padding-left: 1200px;
    justify-content: space-evenly;
    cursor: pointer;

}
.arrow_right{
    padding: 18px;
    background-color: aliceblue;
}

.arrow_left{
    padding: 18px;
    background-color: rgb(231, 227, 3);
}



.r{
    padding: 35px;
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 25px;
    color: rgb(231, 227, 3);
    margin-bottom: ;
    font-weight: 600;
    margin-left: 40px;
}

.r1{
    padding: 35px;
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 25px;
    color: rgb(231, 227, 3);
    margin-bottom: ;
    font-weight: 600;
    margin-left: 40px;
}

.filter{
    background-color: transparent;
    padding:  18px;
    margin-right: 80px;
    margin-bottom: 14px;
    
    color: black;
    text-align: center;
    transition: 0.4s;
    background-color: white;
    
}

.filter:hover{
    transform: scale(1.09);
    background-color: rgb(227, 230, 50);
    color: white;
}

.gif{
    display: flex;
    
}

.gif_g{
   margin-left: 140px;
   
}

.gif_line{
   margin-right: 0px;
   position: ;
   margin-left: 0px;
   font-size: 10px;
   
}

.m hr{
    height: 65px;
    margin-left: -40px;
    margin-top: 6px;
}

.gif iframe{
    margin-top: -40px;
    margin-left: 170px;
}

.share{
    font-family: 'Poppins', sans-serif;
    color: rgb(255, 255, 255);
    margin-left: 20px;
    font-size: 19px;
    margin-top: -4px;
}

.bg{
    width: auto;
    background-color: rgb(26, 27, 27);
    margin-bottom: 40px;
    height: 12vh;
    margin-top: -9rem;
    position: relative;
}

.m{
    display: flex;
    margin-right: 20px;
    position: absolute;
    margin-left: 280px;

}

.social_links{
    display: flex;
    justify-content: space-around;
    position: absolute;
    margin-left: 800px;
    margin-top: 15px;
    cursor: pointer;


  
}

.facebook{
    padding: 12px;
    width: 80px;
    height: 20px;
    background-color: aliceblue;
    text-align: center;
    font-size: 20px;
    border-radius: 14px;
    margin-right: 20px;
    background-color: #1877F2;
    color: white;
}

.whatsapp{
    padding: 12px;
    width: 80px;
    height: 20px;
    background-color: aliceblue;
    text-align: center;
    font-size: 20px;
    border-radius: 14px;
    margin-right: 18px;
    background-color: rgb(28, 206, 28);
    color: white;
}

.telegram{
    padding: 12px;
    width: 80px;
    height: 20px;
    background-color: aliceblue;
    text-align: center;
    font-size: 20px;
    border-radius: 14px;
    margin-right: 12px;
    background-color: rgb(31, 125, 212);
    color: white;
}

.line{
    padding: 12px;
    width: 80px;
    background-color: aliceblue;
    text-align: center;
    font-size: 20px;
    border-radius: 14px;
    margin-right: 800px;
}
.column1{
    margin-left: 0px;
    justify-content: space-around;
}

.column2{
    margin-left: ;
    justify-content: space-around;
}

.column3{
    margin-left: ;
    justify-content: space-around;
}

.column4{
    margin-left: ;
    justify-content: space-around;
}

.column5{
    margin-right: 40px;
    justify-content: space-around;
}

.hy{
    display: flex;
    justify-content: space-between;
    margin-top: -30px;
}

.more{
    color: white;
    margin-top: 40px;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    border: none;
    margin-right: 40px;
    cursor: pointer;
}

.more:hover{
    color: rgb(227, 230, 50);
}

.gif_updated{
    margin-bottom: 0px;
    display: flex;
    background-color: rgb(26, 27, 27);
}

.n{
    display: flex;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
}

.gif_line_u{
    height: 102px;
    margin-top: 25px;
}

.share_u{
    margin-left: 10px;
    margin-top: 35px;
    color: white;
    font-size: 25px;
    font-weight: 400;
}

.card_updated{
    display: grid;
}

.cup1{
    margin-left: 40px;
    box-shadow: 0px 2px 4px black;
}

.anime_up{
    color: white;
    font-family: 'Poppins', sans-serif;
    text-overflow: ellipsis;
    overflow: hidden;
    width: 171px;
    padding: 14px;
    height: 20px;
    background-color: transparent;
    white-space: nowrap;
    cursor: pointer;
    margin-left: 30px;
}

.anime_up:hover{
    color: rgb(227, 230, 50);
}

.card_updated2{
    display: flex;
    position: absolute;
    margin-left: 240px;
    top: 356px;
}

.card_ru5{
    display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly; /* Or any other value that suits your design */
  gap: 5px; /* Adjust the gap as needed */
  margin-right: 40px;

}

.card_m5{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly; /* Or any other value that suits your design */
    gap: 5px; /* Adjust the gap as needed */
    margin-right: 25px;
  

}

.cup_ru5{
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
    margin-left: -40px;
}
.main_card{
    margin-left: 50px;
}
@media (max-width:800px){
    
}

.about_me{
    text-align: center;
    padding: 40px;
    width: 600px;
    background-color: rgb(71, 71, 71);
    margin-top: 40px;
    margin-left: 300px;
    border-radius: 10px;
    box-shadow: 0px 4px 5px black;
    
}

.profile{
    margin-bottom: 0px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    font-size: 40px;
}

.name{
    font-family: 'Poppins', sans-serif;
    font-size: 25px;
    margin-top: 10px;
    color: rgb(227, 230, 50);
}

.info{
    font-family: 'Poppins', sans-serif;
    margin-top: 10px;
    color: white;
    text-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    font-weight: 400;

}

.rh{
    text-align: center;
    margin-right: 45px;
    margin-top: 20px;
    
    
}

.btn_rh{
    padding: 0px;
    width: 300px;
    height: 50px;
    background-color: rgb(177, 173, 173);
    text-align: center;
    margin-top: 0px;
    border: 0px;
    box-shadow: 0px 4px 5px black;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 16px;
    transition: 0.4s;
    border-radius: 10px;
    cursor: pointer;
    

}

.btn_rh:hover{
    background-color: rgb(227, 230, 50);
    transform: scale(1.09);
}

.blur{
    display: block;
    width: 400px;
   
    position: absolute;
}

.anime_bg{
    padding: 10px;
    width: 1350px;
    height: 318px;
    filter: blur(6px);
}

.clr{
    background-color: black;
    width: 1350px;
    height: 340px;
    

}


.info_card{
    position: absolute;
    margin-left: 80px;
    margin-bottom: 40px;
    margin-top: 180px;
    padding: 2px;
    background-color: black;
    width: 200px;
    height: 480px;
    margin-bottom: ;
}


.img_info{
    display: absolute;
}

.anime_name{
    color: white;
    padding: 5px;
    background-color: transparent;
    width: 190px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-family: 'Poppins', sans-serif;
    font-weight: 200;
    margin-left: 8px;

}

.line_info{
    opacity: 10%;
    size: 10px;
    height: 0.1%;
  
}

.button_more{
    color: white;
}

.f_info{
    position: absolute;
    margin-top: 600px;
}

.main_title{
    color: white;
    font-family: 'Poppins', sans-serif;
    position: absolute;
    text-align: center;
    margin-left: 300px;
    margin-top: 25px;
    font-weight: 500;
    font-size: 30px;
}

.desc_info{
    color: white;
    font-family: 'Poppins', sans-serif;
    position: absolute;
    text-align: center;
    margin-left: 300px;
    margin-top: 75px;
    font-weight: 200;
    font-size: 16px;
}

.watch_btn{
    padding: 10px;
    width: 100px;
    background-color: white;
    text-align: center;
    position: absolute;
    margin-bottom: 40px;
    margin-left: 300px;
    margin-top: 280px;
    border: 0;
    font-family:  'Poppins', sans-serif;
    font-weight: 800;
    color: black;
    border-radius: 4px;
    box-shadow: 0px 4px 5px black;
    cursor: pointer;
}

.watch_btn:hover{
    background-color: rgb(227, 230, 50);
}

.more_btn{
    padding: 10px;
    width: 120px;
    margin-bottom: 40px;
    margin-left: 640px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    background-color: white;
    border: 0;
    border-radius: 10px;
    box-shadow: 0px 4px 5px black;
    font-size: 14px;

    
    
}

.more_btn:hover{
    background-color: rgb(227, 230, 50);
}

.video-js{
    justify-content: center;
    margin-left: 300px;
    width: 800px;
    height: 400px;
   
    
    
}

.develop{
    color: white;
   margin-left: 320px;
   text-align: left;
   position: absolute;
   font-family: 'Poppins', sans-serif;
   font-size: 12px;
}

.develop a{
    text-decoration: none;
    font-style: none;
}

.anime-item{
     /* display: flex;  */
    flex-wrap: wrap;
    justify-content: space-evenly;/*  Or any other value that suits your design */
    gap: 5px; /* Adjust the gap as needed */
    margin-right: 2px;
    margin-top: 60px;
}

.search-results{
    margin-top: 20px;
    margin-left: -140px;
    display: flex;
    justify-content: space-around;
    margin-right: -400px;
    grid-row: 0px;
    align-content: center;
}

#p_not_found{
    color: aliceblue;
    background-color: aliceblue;
}


.nav_bars{
    
}
.link a{
    text-decoration: none;
}

.fa-solid fa-info{
    text-align: center;
}

.video_player{
    background-color: ;
    max-width: 100%;
    margin-left: 0rem;
    /* background-image: url("https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9002a403-3762-43c7-b5e1-ec77847b399a/de3s9hg-17d4e0d0-df0a-492c-81fe-6d1f70fea0d6.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzkwMDJhNDAzLTM3NjItNDNjNy1iNWUxLWVjNzc4NDdiMzk5YVwvZGUzczloZy0xN2Q0ZTBkMC1kZjBhLTQ5MmMtODFmZS02ZDFmNzBmZWEwZDYuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.5CbHZSX_4OBShvXHjmOlHTz-5vSEP31Ejl0wdx4r_BA"); */
   
    
}

.video_player iframe{
    align-items: center;
    margin-left: 18rem;
    margin-top: 2rem;
    width: 60rem;
    height: 45rem;
    position: relative;
    margin-bottom: 0rem;
}

.ep_changer{
    position: absolute;
    margin-left: 68rem;
    /* font-family: 'Source Sans 3', sans-serif; */
    font-weight: 600;
    margin-top: 0.5rem;
    font-size: 80px;
    word-spacing: -6rem;
}

.ep_changer i{
    font-size: 20px;
}

.ep_changer button{
    background-color: transparent;
    color: white;
    border: none;
    border-radius: 20px;
    width: 4rem;
    cursor: pointer;
    height: 1rem;
   
}

.ep_changer button:active{
    background-color: #121212;
    color: rgb(231, 227, 3);
}

.ep_changer button:hover{
    color: rgb(231, 227, 3);
}

.no_of_ep{
    font-family: 'Source Sans 3', sans-serif;
    width: 15rem;
    height: 38rem;
    background-color:#121212;
    
    
   
    overflow: hidden;
    position: absolute;
    margin-left: 2rem;
    font-family: 'Source Sans 3', sans-serif;
    word-wrap: ;
    font-weight: 100;
    text-transform: capitalize;
    margin-top: 5rem;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size: 12px;
    color: white;


    
}

.order_ep{
    background-color:transparent;
    width: 11rem;
    padding: 11px;
    text-align: left;
    display: flex;
    justify-content: space-between;

    
    
}

.order_ep ul{
    position: relative;
    background: rgba(0, 0, 0, 0.822);
    color: white;
    

}

.order_ep ul li{
    list-style: none;
    padding: 2px;
    width: 12.98rem;
    height: 110%;
    background: rgba(0, 0, 0, 0.651);
    transition: transform 0.5s;
    /* border: 1px solid white; */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    padding: 4px;
    font-weight: 400;
}

.order_ep ul li:hover{
    transform: scale(1.06);
    z-index: 110;
    background: rgb(231, 227, 3);
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
    color: black;
    font-weight: 800;
    text-align: center;
}

.color_change{
    background-color: yellow;
}
.scroll {
    margin-top: 0.9rem;
    position: ;
    margin-left: 4.4rem;
    gap: 4px;
    
}

.scroll button{
    width: 4rem;
    background-color: #121212;
    border: none;
    width: 5rem;
    height: 1.5rem;

    cursor: pointer;
    font-size: 15px;
    border-radius: 4px;
    color: white;
}


.scroll button:active{
    background-color: rgb(231, 227, 3);
    color: black;
}

.scroll button:hover{
    background-color: rgb(231, 227, 3);
    color: black;
}

.server{
    padding: 0 1rem;
    width: 15rem;
    height: 2rem;
    background-color:#121212;
    margin-left: 20rem;
    display: flex;
    font-family: 'Source Sans 3', sans-serif;
    justify-content: space-between;
    text-align: center;
    align-items: center;
    margin-top: -1.5rem;
    border-radius: 5px;
   

}

.server button{
    background-color: rgb(231, 227, 3);
    border: none;
    width: 4rem;
    height: 1.5rem;
    border-radius: 4px;
    cursor: pointer;
    
}

.server button a{
    color: black;
    font-size: 14px;
    font-weight: 600;
}

.server button:active{
    background-color: rgb(180, 177, 4);
}

.server h3{
    color: white;
    font-size: 14px;
}

.all_compo{
    background-color:  ;
    margin-left: 2rem;
    width: 80rem;
    margin-top: -4rem;
    border-radius: 4px;
}

.my_watching{
    width: 48rem;
    background-color: #121212;
    font-family: 'Source Sans 3', sans-serif;
    font-weight: 400;
    font-size: 12px;
    padding: 1rem;
    line-height: 1.5rem;
    border-radius: 1rem;
    color: white;
    letter-spacing: ;
    text-align: left;
    text-transform: capitalize;
    margin-left: 19rem;
    margin-bottom: 4rem;
    margin-top: 1rem;
    position: relative;

}

.my_watching hr{
    opacity: 10%;
    /* height: 0.1px; */
}

.my_watching h3{
    font-weight: 400;
}

.player_img{
    margin-right: 1rem;
}

.paragraph{
    position: absolute;
    margin-left: 1rem;
    margin-bottom: 1rem;
    display: flex;
    justify-content: space-between;
    margin-left: 10rem;
    margin-top: 0.2rem;
    width: 38rem;
    height: 12.2rem;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: ;

    
}

.another_name{
    width: 9rem;
    height: 2rem;
    background-color: transparent;
    overflow: hidden;
    
    text-overflow: ellipsis;
    white-space: nowrap;
}

.hd{
    /* display: flex; */
    position: relative;
    padding: 1px 6px;
    background-color: rgb(237, 132, 33);
    margin-top: 8px;
    margin-left: 10px;
    margin-right: 9px;
    border-radius: 4px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    text-align: center;
    /* box-shadow: 1px 2px 5px rgb(73, 72, 72); */
    width: 16px;
    height: 15px;
    font-size: 11px;
    text-align: ;
}

.hd1{
    /* display: flex; */
    position: relative;
    padding: 1px 6px;
    background-color: #FF0000;
    margin-top: 8px;
    margin-left: 10px;
    margin-right: 9px;
    border-radius: 4px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    text-align: center;
    /* box-shadow: 1px 2px 5px rgb(73, 72, 72); */
    width: 16px;
    height: 15px;
    font-size: 11px;
    text-align: ;
}

.hd2{
    /* display: flex; */
    position: relative;
    padding: 1px 6px;
    background-color: #800080;
    margin-top: 8px;
    margin-left: 10px;
    margin-right: 9px;
    border-radius: 4px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    text-align: center;
    /* box-shadow: 1px 2px 5px rgb(73, 72, 72); */
    width: 16px;
    height: 15px;
    font-size: 11px;
    text-align: ;
}

.hd3{
    /* display: flex; */
    position: relative;
    padding: 1px 6px;
    background-color: #40E0D0;
    margin-top: 8px;
    margin-left: 10px;
    margin-right: 9px;
    border-radius: 4px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    text-align: center;
    /* box-shadow: 1px 2px 5px rgb(73, 72, 72); */
    width: 16px;
    height: 15px;
    font-size: 11px;
    text-align: ;
}

.form1{
    margin-right: -600px;
    width: 100vw;
}

/* Media query for screens smaller than 768px (typical smartphone width) */
@media (max-width: 768px) {
    /* Add styles for smaller screens here */
    .all_compo{
        width: 100vw;
        height: 100vh;
    }

    .heading{
        width: 100vw;
    }
}

/* Add this media query to adjust card layout for smaller screens */
@media (max-width: 425px) {
    .heading{
        width: 24rem;
    }

    .bg{
        width: 26.6rem;
        margin-top: -8.5rem;
    }

    .gif iframe{
        width: 3rem;
        margin-left: 1rem;
        margin-top: -2.9rem;
    }

    .m hr{
        height: 3rem;
        margin-left: -13.5rem;
    }

    .m h1{
        font-size: 14px;
        margin-bottom: -0.5rem;
    }

    /* .video_player{
        width: 5rem;

    } */

    .video_player iframe{
        margin-left: -2rem;
        width: 26rem;
        height: 14rem;
        
        position: relative;
    }

    .no_of_ep{
       margin-top:40.8rem;
       margin-left: -1.5rem;
       width: 25.5rem;
       height: 15.4rem;
       border-radius: 4px;
    }

    .no_of_ep ul li{
        width: 23.6rem;
    }

    .scroll{
       margin-top: 64rem;
       position: absolute;
       margin-left: 6.5rem;
       margin-bottom: 12rem;
    }

    .server{
        margin-left: -0.5rem;
        margin-top: 1rem;
        margin-left: -1.1rem;
        /* width: 100vw;
        padding: -10px; */
    }

    .my_watching{
        margin-left: -1.5rem;
        width: 23.5rem;
        border-radius: 4px;
    }

    .paragraph{
        width: 17rem;
        height: 9rem;
       
        margin-left: 6.5rem;
        
    }

    .form1{
        margin-left: 12rem;
        float: ;
        position: absolute;
        width: 0rem;
        margin-top: 0.5rem;
    }

    .s1{
        width: 9rem;
        height: 1rem;
    }

    .my_watching img{
        width: 6rem;
        height: 8rem;
    }

    .another_name{
        width: 6rem;
        
    }
    
    .heading img{
        width: 4rem;
        margin-left: -3.4rem;
    }

    .social_links{
        margin-left: 19rem;
        width: 1.5rem;
    }

    .facebook{
        width: 2.5rem;
        height: 0.7rem;
        font-size: 14px;
        border-radius: 4px;
        text-align: center;
    }

    .whatsapp{
        width: 2.5rem;
        height: 0.7rem;
        font-size: 14px;
        border-radius: 4px;
        text-align: center;
    }

    .telegram{
        width: 2.5rem;
        height: 0.7rem;
        font-size: 14px;
        border-radius: 4px;
        text-align: center;
    }

    .ep_changer{
        margin-left: 16rem;
        margin-top: 1rem;
    }

    .body{
        overflow-x: hidden;
    }


}

@media (max-width: 375px) {
    /* Add styles for smaller screens here */
    .social_links{
        margin-left: 17rem;
        height: 1rem;
        margin-top: 0.6rem;
    }

    .form1{
        margin-left: 9.5rem;
        margin-top: 0.7rem;
    }

    .bg{
        margin-top: -9.5rem;
        position: absolute;
    }

    .video_player iframe{
        width: 23rem;
        margin-top: -1.9rem;
    }

    .my_watching{
        width: 20.5rem;

        
        border-radius: 4px;
        margin-top:1px;
    }

    .paragraph{
        width: 14rem;
        
    }

    .p_watching{
        width: 20.5rem;
        
    }

    .hd ,.hd1, .hd2, .hd3{
        margin-left: 1px;
        margin-right: 1px;
        margin-top: 1px;
    }

    .server{
        border-radius: 4px;
        margin-left: -1.5rem;
    }

    #button_left{
        margin-left: -2rem;
    }

    #button_right{
        margin-right: 8rem;
    }

    .no_of_ep{
        margin-top: 34.4rem;
        height: 14.9rem;
        width: 22.5rem;
        margin-left: -1.5rem;
        border-radius: 4px;
    }

    .no_of_ep ul li{
        width: 20.5rem;
    }

    .order_ep{
        /* height: 4rem; */
    }

    .scroll{
        margin-top: 40rem;
        margin-left: 5rem;
        /* margin-bottom: 14rem; */
    }

}

@media (max-width: 320px) {
    /* Add styles for smaller screens here */
    .form1{
        margin-left: 7rem;
    }

    .server{
        margin-left: -1.5rem;
        width: 12.5rem;
    }

    .ep_changer{

    }

    /* #button_rl{
        margin-right: 14rem;
        position: absolute;
    }

    #button_left{
        margin-left: -6rem;
    }

    #button_right{
        margin-right: 8rem;
        position: absolute;
    } */

    .my_watching{
        width: 17rem;
        
    }

    .my_watching img{
        width: 5rem;
        height: 6rem;
    }

    .paragraph{
        width: 12rem;
        height: 7.9rem;
        
        margin-left: 5.5rem;
        margin-top: -0.1rem;
    }

    .another_name{
        width: 5rem;
        
    }

    .video_player iframe{
        width: 20rem;
        height: 14rem;
         
    }

    .p_watching{
        width: 18rem;
       
    }

    .hd, .hd1, .hd2, .hd3{
        margin-left: -1px;
        margin-right: -1px;
    }

    .no_of_ep{
        width: 19rem;
        margin-top: 34rem;
    }

    .no_of_ep ul li{
        width: 17rem;
    }

    .scroll{
        margin-left: 3rem;
    }

    .social_links{
        display: none;
    }
}

@media (max-width: 390px) {
    /* Add styles for smaller screens here */
    .bg{
        height: 4rem;
    }

    .heading{
        position: relative;
    }

    .video_player iframe{
        width: 24rem;
    }

    .server{
        margin-left: -1.4rem;
    }

    .my_watching{
        width: 21.3rem;
        position: relative;
    }

    .paragraph{
        width: 15rem;
       
    }

    .no_of_ep{
        width: 23.3rem;
        margin-top: 43rem;
        
    }

    .no_of_ep ul li{
        width: 21.5rem;
    }

    .scroll {
        margin-top: 44rem;
        margin-left: 5.3rem;
        
    }

    .scroll button{
        margin-bottom: 4rem;
    }
}

@media (max-width: 414px) {
    /* Add styles for smaller screens here */
    .video_player iframe{
        margin-left: -1.9rem;
    }

    .my_watching{
        width: 22.9rem;
    }

    .no_of_ep{
        width: 24.9rem;
    }

    .no_of_ep ul li{
        width: 23.2rem;
    }

    .scroll{
        margin-top: 41rem;
        margin-left: 6rem;
    }

    .scroll button{
        margin-bottom: 14rem;
    }

    .bg{
        height: 4rem;
    }
}


.heading img{
    display: none;
}


    

    </style>
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
    <div class="all_compo">
    <div class="no_of_ep">
    <?php 
                                                    foreach ($episodelist as $episodelist) {  ?>
                                                    <a title="Episode <?=$episodelist['episodeNum']?>"
                                                        class="ssl-item ep-item <?php if ($getEpisode['ep_num'] === $episodelist['episodeNum']) {echo 'active';}?>"
                                                        href="watch/<?=$episodelist['episodeId']?>">
                                                        <div class="order_ep" title="">
                                                            <ul>
                                                                <li><span><?=$episodelist['episodeNum']?>-> </span><?= $episodelist["episodeId"] ?></li>
                                                            </ul>
                                                        </div>
                                                        
                                                      
                                                    </a>
                                                    <?php } ?>
                                                    
                                                   
                                                    </div>
                                                       
   <div class="video_player">
    <img src="<?= $resentUpdated["animeImg"]; ?>" alt="">
    <iframe name="iframe-to-load" id="iframeid" src="https://the.animezia.com/player/v1.php?id=<?= $url ?>" frameborder="0" scrolling="no"   allow="accelerometer;autoplay;encrypted-media;gyroscope;picture-in-picture" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
        </div>
        <div class="ep_changer" id="button_rl">
                                        <?php if($getEpisode['prevEpText'] == "") {
                                            echo "";
                                        } else { ?>
                                        <a href="watch<?=$getEpisode['prevEpLink']?>">
                                            <button class="btn btn-secondary" type="button" style="float:left;height: 32px;font-size: 14px;font-weight: normal;display: block;"><i class="fa-regular fa-circle-left" id="button_left"></i></button>
                                        </a>&nbsp; 
                                        <?php } ?>
                                        <?php if($getEpisode['nextEpText'] == "") {
                                            echo "";
                                        } else { ?>
                                        <a href="watch<?=$getEpisode['nextEpLink']?>">
                                            <button class="btn btn-secondary" type="button" style="float:right;height: 32px;font-size: 14px;font-weight: normal;display: block;"><i class="fa-regular fa-circle-right" id="button_right"></i></button>
                                        </a>
                                        <?php } ?>
                                            
                                            <div class="pc-item pc-download" style="display:none;">
                                                <a class="btn btn-sm pc-download"><i class="fas fa-download mr-2"></i>Download</a>
												<a onclick='reload()' class="btn btn-sm pc-download"><i class="fas fa-refresh mr-2"></i>Refresh</a>
                                            </div>
                                        </div>
                                        <div class="scroll">
                                                    <button onclick="scrollUp()" class="btn_scroll1"><i class="fa-solid fa-angle-up"></i></button>
<button onclick="scrollDown()"><i class="fa-solid fa-angle-down" class="btn_scroll2"></i></button>
</div>


<div class="server">
    <h3>Server  <i class="fa-solid fa-server"></i>:</h3>
    <button><a href="https://the.animezia.com/player/v1.php?id=<?=$url?>" target="iframe-to-load">Server1</a></button>
    <button><a href="https://the.animezia.com/player/v2.php?id=<?=$url?>" target="iframe-to-load">Zoro</a></button>
</div>
<div class="my_watching">
<p class="paragraph"><?=$getAnime['synopsis'];?></p>
    <img data-src="<?=$getAnime['imageUrl']?>" class="player_img" src="https://cdn130.picsart.com/291224346033201.jpg" width="140" height="180" alt="" loading="lazy">
    <h3 class="another_name"><?=$getAnime['othername']?></h3> <hr>
    <p class="p_watching"><span class="hd3"><?= $getAnime['type'] ?></span> |<span class="hd">HD</span>| <span class="hd2"><?=$getAnime['status']?></span> | <span class="hd1"><?=$getAnime['released']?></span></p>
    <h3 class="myanime">I Am Watching: <?= $str = $getAnime["name"] ?></h3>
    <h3 class="mylang">My Language: <?= 
                                                  $last_word_start = strrpos ( $str , " ") + 1;
                                                  $last_word_end = strlen($str) - 1;
                                                  $last_word = substr($str, $last_word_start, $last_word_end);
                                                  if ($last_word == "(Dub)"){echo "DUB";} else {echo "SUB";} ?></h3>
    <h3 class="running">My Running EP: <?=$getEpisode['ep_num']?></h3>
</div>
</div>
    <script src="player.js"></script>
    <script>
    function scrollUp() {
        const container = document.querySelector('.no_of_ep');
        container.scrollTop -= 50; // Adjust the scroll distance as needed
    }

    function scrollDown() {
        const container = document.querySelector('.no_of_ep');
        container.scrollTop += 50; // Adjust the scroll distance as needed
    }
</script>
<!-- <script>
    const color= document.querySelectorAll(".order_ep");
    color.addEventListener("click",function(){
        color.classList.add("color_change");
    })
</script> -->
<script>
    // Select the img element with the class "player_img"
    const imgAnime = document.querySelector(".player_img");

    const lazyImg = (entries) => {
        const [entry] = entries;
        console.log(entry);
        if (!entry.isIntersecting) return;
        // Update the src attribute to the data-src value
        imgAnime.src = imgAnime.getAttribute("data-src");
    };

    const imgObserver = new IntersectionObserver(lazyImg, {
        root: null,
        threshold: 0,
    });

    // Observe the selected img element
    imgObserver.observe(imgAnime);
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


