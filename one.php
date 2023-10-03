<!DOCTYPE html>
<html>
<head>
    <title>Recent Anime Releases</title>
</head>
<body>
    <?php
    // Initialize page number
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    // API endpoint
    $api = "https://webdis-zgj8.onrender.com/recent-release?type=2&page=$page";
    
    // Function to fetch and display anime cards
    function fetchAnimeCards($api) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        $json1 = json_decode($response, true);
        
        foreach ((array)$json1 as $resentUpdated) {
            // Your card HTML here
            echo '<div class="card">';
            echo '<div class="column1">';
            echo '<span class="ep_no">Ep ' . $resentUpdated['episodeNum'] . '</span>';
            echo '<span class="sub_dub">' . $resentUpdated["subOrDub"] . '</span>';
            echo '<span class="hd">HD</span>';
            echo '<a href="watch/' . $resentUpdated["episodeId"] . '">';
            echo '<img data-src="' . $resentUpdated["animeImg"] . '" src="https://cdn130.picsart.com/291224346033201.jpg" width="150px" height="200px" class="a1" alt="Anime Image" loading="lazy">';
            echo '</a>';
            echo '<h1 class="t1">' . $resentUpdated["animeTitle"] . '</h1>';
            echo '</div>';
            echo '</div>';
        }
        
        curl_close($ch);
    }

    // Display anime cards
    fetchAnimeCards($api);
    ?>

    <!-- "View More" button -->
    <?php
    // Check if there is more data to load
    $nextPage = $page + 1;
    $nextApi = "https://webdis-zgj8.onrender.com/recent-release?type=2&page=$nextPage";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $nextApi);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    $nextApiResponse = curl_exec($ch);
    $nextJson = json_decode($nextApiResponse, true);
    curl_close($ch);

    if (!empty($nextJson)) {
        // Display the "View More" button if there is more data
        echo '<a href="?page=' . $nextPage . '" class="more">View More <i class="fa-solid fa-greater-than"></i></a>';
    }
    ?>
</body>
</html>
