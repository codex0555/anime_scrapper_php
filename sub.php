
<div class="hy">
    <span class="r">Action Animes</span>
    <a class="more" href="action">View More <i class="fa-solid fa-greater-than"></i></a>
    
</div>
<br>
<!-- This Section Need To Be Fixed! -->
<div class="card-container">
        <?php
        $api = "https://webdis-zgj8.onrender.com";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$api/genre/action");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        $json1 = json_decode($response, true);
        
        foreach ((array)$json1 as $resentUpdated) {
            ?>
            <div class="card">
                <div class="column1">
                    <span class="sub_dub"><?php echo $resentUpdated["releasedDate"] ?></span>
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
    
