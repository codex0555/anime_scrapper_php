<?php

    $strinG= $_POST["submit"];
    $strinG= str_replace("","%20", $strinG);
    $ch= curl_init();
    curl_setopt($ch,CURLOPT_URL, "https://animezia1.onrender.com/search?keyw=$strinG&page=1");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    $return=curl_exec($ch);
    $json1 = json_decode($return, true);
        
        foreach ((array)$json1 as $resentUpdated) {
            ?>
            <div class="card">
                <div class="column1">
                    <span class="ep_no"><?php $str = $resentUpdated['name'];
                                                  $last_word_start = strrpos ( $str , " ") + 1;
                                                  $last_word_end = strlen($str) - 1;
                                                  $last_word = substr($str, $last_word_start, $last_word_end);
                                                  if ($last_word == "(Dub)"){echo "dub";} else {echo "sub";}
                                                ?></span>
                    <span class="sub_dub"></span>
                    <a href="watch/<?=$search['anime_id']?>">
                        <img src="https://ik.imagekit.io/d4z0vaap1/tr:f-webp/<?=$resentUpdated['img_url']?>" width="150px" height="200px" class="a1" alt="Anime Image">
                    </a>
                    <h1 class="t1"><?php echo $resentUpdated['status']?></h1>
                </div>
            </div>
            <?php
        }
        curl_close($ch);

        ?>
    </div>
    
