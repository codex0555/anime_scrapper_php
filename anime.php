<?php 
require_once('config.php');

$parts=parse_url($_SERVER['REQUEST_URI']); 
$page_url=explode('/', $parts['path']);
$url = $page_url[count($page_url)-1];
//$url = "naruto";

$getAnime = file_get_contents("$api/getAnime/$url");
$getAnime = json_decode($getAnime, true);
$episodelist = $getAnime['episode_id'];
?>

<button onclick="saveToPlaylist('Anime List', '<?=$getAnime['name']?>', 'https://the.animezia.com/anime/<?=$url?>', 'https://ik.imagekit.io/<?=$imgk?>/tr:w-100,tr:f-webp/<?=$getAnime['imageUrl']?>');checkIfBookmarked('Anime List', '<?=$getAnime['name']?>')" id="save-to-playlist-button" class="btn btn-primary"><i
                                            class="fas fa-bookmark mr-2"></i>Watch later</button>	

<iframe src="https://the.animezia.com/anime/<?=$url?>" frameborder="0"></iframe>