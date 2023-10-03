<?php
$keyword=$_GET["enter1"];
$keyword = str_replace(' ', '%20', $keyword);
?>


<div class="all_cards">
<!-- <span class="search_tag">Search Results</span> -->
<div class="container_1">
<?php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://webdis-zgj8.onrender.com/search?keyw=$keyword");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    $response = curl_exec($ch);
    $results = json_decode($response, true);
  
    foreach((array) $results as $key => $search) { ?>
   
       <div class="card1">
                <div class="column1">
                    <span class="ep_no">
                    <?php
$inputString = $search['status'];

// Use regular expression to extract the integer part
if (preg_match('/\d+/', $inputString, $matches)) {
    $intPart = $matches[0];
    echo $intPart;
} else {
    echo "404";
}
?>

                </span>
                    <span class="hd">HD</span>
                    <span class="sub_dub"><?php $str = $search['animeTitle'];
                                                  $last_word_start = strrpos ( $str , " ") + 1;
                                                  $last_word_end = strlen($str) - 1;
                                                  $last_word = substr($str, $last_word_start, $last_word_end);
                                                  if ($last_word == "(Dub)"){echo "DUB";} else {echo "SUB";}
                                                ?></span>
                    <a href="watch/<?= $search["animeId"] ?>-episode-1">
                        <img data-src="<?= $search["animeImg"]; ?>" src="https://cdn130.picsart.com/291224346033201.jpg" width="150px" height="200px" class="a1" alt="Anime Image" loading="lazy">
                    </a>
                    <h1 class="t1"><?= $search["animeTitle"] ?></h1>
                </div>
            </div>
            
    <?php } 
    curl_close($ch);
    ?>
    </div>
    </div>
    <script>
    const searchButton = document.querySelector(".s2");
    
    searchButton.addEventListener("click", function() {
        alert("Working"); // Display an alert to verify that the button click event is triggered
        
        const searchText = document.querySelector(".search_tag");
        searchText.style.display = "block";
    });
</script>


<style>
    .container_1 {
        display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    gap: 0px; /* Adjust as needed for spacing between cards */
    max-width: 100%; /* Adjust the maximum container width */
    margin: 0 10px; /* Center the container */
    margin-left: 45px;
    margin-top: 40px;
    margin-bottom: 5px;
    }

    .card1 {
        flex: 0 0 calc(1.5% - 5px); /* Display eight cards per row; adjust gap as needed */
    box-sizing: border-box;
    padding: -14px; /* Card padding */
    text-align: center; /* Center card content */
    border-radius: 5px; /* Rounded corners for cards */
    }

    .search_tag{
        display: block;
        color: white;
        position: absolute;
        font-family: "Poppins", sans-serif;
        margin-top: -4rem;
        margin-left: 4rem;
        color: red;
        font-weight: 400;
        font-size: 24px;
       
    }

    .all_cards{
        margin-top: 5rem;
        position: relative;
    }

    @media (max-width: 425px) {
    /* Add styles for smaller screens here */
    .body{
        width: 100vw;
    }

    .container_1 {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 0px; /* Adjust as needed for spacing between cards */
        max-width: 100%; /* Adjust the maximum container width */
        margin: 0 10px; /* Center the container */
        margin-left: 24px;
        margin-right: -4rem;
    }

    .card1 {
        flex: 0 0 calc(20% - 50px); /* Display eight cards per row; adjust gap as needed */
        box-sizing: border-box;
        padding: -141px; /* Card padding */
        text-align: center; /* Center card content */
        border-radius: 5px; /* Rounded corners for cards */
        
    }

    .column1 img{
        width: 11rem;
        height: 12rem;
    }

    .heading{
        width: 100vw;
        height: 4rem;
    }

    .all_cards{
        margin-top: 60px;
        position: relative;
    }

    .search_tag{
        display: block;
        color: white;
        position: absolute;
        font-family: "Poppins", sans-serif;
        margin-top: -3.1rem;
        margin-left: 1.5rem;
        color: red;
        font-weight: 400;
        font-size: 19px;
    }
}

@media (max-width: 375px) {
    /* Add styles for smaller screens here */
   

    .container_1 {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 0px; /* Adjust as needed for spacing between cards */
        max-width: 100%; /* Adjust the maximum container width */
        margin: 0 10px; /* Center the container */
        margin-left: 1px;
        margin-right: 0rem;
        position: relative;
    }

    .card1 {
        flex: 0 0 calc(20% - 50px); /* Display eight cards per row; adjust gap as needed */
        box-sizing: border-box;
        padding: -140px; /* Card padding */
        text-align: center; /* Center card content */
        border-radius: 5px; /* Rounded corners for cards */
    }

    .column1 a img{
        width: 10.5rem;
        height: 12rem;
    }

}

@media (max-width: 320px) {
    /* Add styles for smaller screens here */
    .container_1 {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 10px; /* Adjust as needed for spacing between cards */
        max-width: 100%; /* Adjust the maximum container width */
        margin: 0 -5px; /* Center the container and add a small negative margin to counteract the gap */
        margin-left: 0.7rem;
    }

    .card1 {
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
   
    .container_1{
        margin-left: 0.5rem;
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