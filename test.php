<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="/css/feed.css">
    <link href="/css/feed.css" rel="stylesheet">
    <script src="/js/feed.js"></script>
    <title>Instagram Feed</title>
</head>
<body>
    <div class="gallery">
        <?php
            // (B) GET LIST OF IMAGE FILES FROM GALLERY FOLDER
            $dir = __DIR__ . DIRECTORY_SEPARATOR . "scripts/instagram/feed" . DIRECTORY_SEPARATOR;
            $images = glob($dir . "*.{jpg,jpeg,gif,png,bmp,webp}", GLOB_BRACE);

            // (C) OUTPUT IMAGES 
            foreach ($images as $i) {
                printf("<img src='scripts/instagram/feed/%s'/>", basename($i));
            }
        ?>
    </div>
</body>
</html>