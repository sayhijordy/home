<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="sayhijordy">
    <meta name="author" content="sayhijordy">
    <meta name="generator" content="sayhijordy v0.1">
    <title>sayhijordy</title>
    <link rel="icon" href="/images/avatar.jpg" type="image/x-icon" />
    <link rel="canonical" href="https://sayhijordy.com">

    <!-- Font Awesome core CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Gallery core CSS -->
    <link rel="/css/feed.css">
    <link href="/css/feed.css" rel="stylesheet">
    <script src="/js/feed.js"></script>

    <!-- Custom CSS Stylesheet -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TLBJ0DWNYQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-TLBJ0DWNYQ');
    </script>
</head>

<body>

    <section class="animated-background">
        <div id="stars1"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>

        <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
            <div class="coin">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="main-title">sayhijordy presents lostnfound</span>
                </a>
            </div>
        </header>
    </section>



    <div class="col-lg-12 mx-auto p-3 py-md-5">
        <main>
            <div class="container-fluid">
                <div class="media-container">
                    <div class="row">
                        <div class="col-md-4">
                            <ul id="social-list">
                                <li class="social-link"><a class="link" href="https://www.instagram.com/sayhijordy"
                                        target="_blank"> <i class="fab fa-instagram">&nbsp;</i>Instagram </a></li>
                                <li class="social-link"><a class="link" href="https://twitter.com/sayhijordy"
                                        target="_blank"> <i class="fab fa-twitter">&nbsp;</i>Twitter </a></li>
                                <li class="social-link"><a class="link" href="https://twitch.tv/sayhijordy"
                                        target="_blank">
                                        <i class="fab fa-twitch">&nbsp;</i>Twitch </a></li>
                                <li class="social-link"><a class="link" href="https://vk.com/sayhijordy"
                                        target="_blank"> <i class="fab fa-vk">&nbsp;</i>vk </a></li>
                                <li class="social-link"><a class="link" href="https://facebook.com/sayhijordy"
                                        target="_blank"> <i class="fab fa-facebook">&nbsp;</i>Facebook </a></li>
                                <li class="social-link"><a class="link" href="https://soundcloud.com/sayhijordy"
                                        target="_blank"> <i class="fab fa-soundcloud">&nbsp;</i>Soundcloud </a></li>
                                <li class="social-link"><a class="link"
                                        href="https://open.spotify.com/artist/08ZHl9fzcWwjrPzd2pZjl8?si=OmIamBQTRtihVqj_QD00aQ"
                                        target="_blank"> <i class="fab fa-spotify">&nbsp;</i>Spotify </a></li>
                                <li class="social-link"><a class="link" href="#popup"> <i
                                            class="fab fa-youtube">&nbsp;</i>Bottom of the Bottle MV </a></li>
                            </ul>
                        </div>

                        <div class="col-md-8">
                            <div class="gallery">
                                <?php
                                    $feed_dir = file_get_contents(__DIR__ . "/scripts/instagram/feed/sayhijordy.json");
                                    $json = json_decode($feed_dir, true);
                                    
                                    // (B) GET LIST OF IMAGE FILES FROM GALLERY FOLDER
                                    $dir = __DIR__ . DIRECTORY_SEPARATOR . "scripts/instagram/feed" . DIRECTORY_SEPARATOR;
                                    $images = glob($dir . "*.{jpg,jpeg,gif,png,bmp,webp}", GLOB_BRACE);

                                    // (C) OUTPUT IMAGES
                                    foreach($json['GraphImages'] as $obj){
                                        $feed_caption = $obj['edge_media_to_caption']['edges']['0']['node']['text'];
                                        
                                        foreach (array_reverse($images) as $i) {
                                            printf("<div id='container' style='position: relative;'><img src='scripts/instagram/feed/%s'/><span style='font-size: 20px; color: #FFF; position: absolute; top: 100px; left: 20px;'>" . $feed_caption . "</span></div>", basename($i));
                                        }
                                        break;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
        </main>

        <footer class="pt-5 my-5">
            created by sayhijordy &middot; &copy; 2021
        </footer>
        
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>