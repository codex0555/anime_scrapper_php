<div class="adjust">
<span class="th">Trending</span>
    <br>
<div class="card-container">
        <?php
        $api = "https://webdis-zgj8.onrender.com";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$api/top-airing");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        $json1 = json_decode($response, true);
        
        foreach ((array)$json1 as $resentUpdated) {
            ?>
            <div class="card">
                <div class="column1">
                    <span class="sub_dub5"><?php echo $resentUpdated["genres"][0]; ?></span>
                    <span class="ep_no5"><?php
$inputString = $resentUpdated["latestEp"];

// Use regular expression to extract the number
if (preg_match('/\d+/', $inputString, $matches)) {
    $episodeNumber = $matches[0];
    echo "Ep: " . $episodeNumber;
} else {
    echo "No number found in the string.";
}
?>
</span>
<span class="hd">HD</span>
                    <a href="watch/<?= $resentUpdated["animeId"] ?>-episode-1">
                        <img data-src="<?= $resentUpdated["animeImg"] ?>" src="https://cdn130.picsart.com/291224346033201.jpg" width="150px" height="200px" class="a1" alt="Anime Image" loading="lazy">
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

    <style>
        .sub_dub5{
    width: 49px;
    height: 15px;
    padding: 1px 6px;
    background-color: rgb(231, 227, 3);
    text-align: center;
    
    margin-bottom:600px;
    margin-left: 85px;
    border-radius: 5px;
    position:absolute;
    margin-top: 175px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 11px;
    box-shadow: 1px 2px 5px rgb(73, 72, 72);
    transition: 0.4s;


}

.ep_no5{
    display: flex;
    position: absolute;
    padding: 1px 6px;
    background-color: white;
    margin-top: 175px;
    margin-left: 24px;
    border-radius: 4px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    text-align: center;
    box-shadow: 1px 2px 5px rgb(73, 72, 72);
    width: 45px;
    height: 15px;
    font-size: 11px;
    /* text-align: ; */
    
    
}

.adjust{
    margin-top: -4rem;
}

@media (max-width: 425px) {
    /* Add styles for smaller screens here */
    .sub_dub5{
        margin-top: 10.5rem;
        margin-left: 6.5rem;
        position: absolute;
    }

    .ep_no5{
        margin-top: 10.5rem;
        margin-left: 1rem;
        position: absolute;
    }
}

@media (max-width: 375px) {
    /* Add styles for smaller screens here */
    .adjust{
        margin-top: -5rem;
    }

    .sub_dub5{
        margin-left: 6.2rem;
    }

    .adjust{
        margin-top: -6rem;
    }
}

@media (max-width: 320px) {
    /* Add styles for smaller screens here */
    .ep_no5{
        margin-top: 8.5rem;
        margin-left: 0.3rem;
    }

    .sub_dub5{
        margin-top: 8.5rem;
        margin-left: 5rem;
    }

    .adjust{
        margin-top: -6.5rem;
    }
}

@media (max-width: 390px) {
    /* Add styles for smaller screens here */
    .card-container{
        margin-left: 0.5rem;
    }

    .adjust{
        margin-top: -2rem;
    }

    .form1{
        margin-right: 6rem;
    }

    .s1{
        width: 2rem;
    }
}

@media (max-width: 1024px) {
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 0px; /* Adjust as needed for spacing between cards */
        max-width: 100%; /* Adjust the maximum container width */
        margin: 0 10px; /* Center the container */
        margin-left: 9px;
        margin-right: 0rem;
    }

    .card {
        flex: 0 0 calc(20% - 50px); /* Display eight cards per row; adjust gap as needed */
        box-sizing: border-box;
        padding: -180px; /* Card padding */
        text-align: center; /* Center card content */
        border-radius: 5px; /* Rounded corners for cards */
    }

    .column1 a img{
        width: 10.5rem;
        height: 12rem;
    }

    .th{
        margin-left: -1rem;
    }

    .r{
        margin-left: 0.5rem;
    }

    .more{
        margin-right: 1.2rem;
    }

    .form1{
        margin-right: 4.9rem;
       
    }

    .s1{
        width: 14rem;
    }

    .bg{
        height: 4.9rem;
    }

    .gif iframe{
        margin-left: 3.1rem;
    }

    .gif hr{
        margin-left: -10rem;
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
    