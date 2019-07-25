<!DOCTYPE html>
<html>
<head>
    <title>YouTube Videos</title>
    <style type="text/css">
        .container {
            width:50%;
            margin:0 auto;
        }
        .txt {
            height:30px;
            width:500px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<form method="get" action="videos_list.php" class="container">
    <div><input type="text" name="channel" placeholder="Enter Channel ID" value="" required class="txt"></div>
    <div><button type="submit">Get Videos</button></div>
</form>

</body>
</html>