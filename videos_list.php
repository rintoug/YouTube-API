<?php
require_once "settings.php";

$channelID = $_GET['channel'];
$nextPage  = isset($_GET['nextPage'])?$_GET['nextPage']:"";
$apiUrl = "https://www.googleapis.com/youtube/v3/search?channelId=$channelID&order=date&part=snippet&type=video&maxResults=50&key=". DEVELOPER_KEY;
if($nextPage) {
    $apiUrl .="&pageToken=$nextPage"; //Appending the page token with current api url
}

$videos = getAPICall($apiUrl);


$nextPageToken = $videos->nextPageToken;
$prevPageToken = isset($videos->prevPageToken)?$videos->prevPageToken:"";

$totalItems = count($videos->items);

?>
<!DOCTYPE html>
<html>
<head>
    <title>YouTube Videos</title>
</head>
<body>

<a href="form.php"><h3>Search Another</h3></a>
<br>

<?php foreach ($videos->items as $video):?>

    <div><img src="<?php print $video->snippet->thumbnails->medium->url?>" </div>
    <h4><a href="https://www.youtube.com/watch?v=<?php print $video->id->videoId?>"> <?php print $video->snippet->title?></a></h4>
<?php endforeach;?>

<a href="videos_list.php?channel=<?php echo $channelID?>&nextPage=<?php echo $prevPageToken?>">Prev Page</a> &nbsp;
<a href="videos_list.php?channel=<?php echo $channelID?>&nextPage=<?php echo $nextPageToken?>">Next Page</a>

</body>
</html>