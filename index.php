<?php
/***********************************************************************
  PHP Photo Gallery
  --------------------
  Generates a photo gallery from a folder of images. Detects if it's
  being used in CLI or browser, and either outputs a log, or the gallery
  itself, generating thumbnails as it goes. 
 ***********************************************************************/

// small function to generate thumbnails
function make_thumb( $src, $dest, $desired_width ) {

    /* read the source image */
    $source_image = imagecreatefromjpeg( $src );
    $width = imagesx( $source_image );
    $height = imagesy( $source_image );
    
    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor( $height * ( $desired_width / $width ) );
    
    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor( $desired_width, $desired_height );
    
    /* copy source image at a resized size */
    imagecopyresampled( $virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height );
    
    /* create the physical thumbnail image to its destination */
    imagejpeg( $virtual_image, $dest, 60 );

}


// a function to check if we're running CLI or in browser.
function is_cli() {
    return defined( 'STDIN' );
}


// if we're in a browser, output some header HTML and basic styles.
if ( !is_cli() ) {
?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
    <script>
        $(document).ready(function () {
            $('a').magnificPopup({
                type: 'image'
            });
        });
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
}


// scan the current directory to get a list of files.
$photos = scandir( '.' );


// begin logging if in cli
if ( is_cli() ) print "Generating thumbnails...\n";


// if there are photos in the same directory as this script
if ( !empty( $photos ) ) {

    // loop through the photos array
    foreach ( $photos as $photo ) {

        // get the extension
        $path = './' . $photo;
        $ext = pathinfo( $path, PATHINFO_EXTENSION );

            // only output tiles for image files.
            if ( in_array( strtolower($ext), array( 'jpg', 'jpeg' ) ) && substr( $photo, 0, 1 ) != '_' ) { 

            // set the destination for the thumbnail file
            $thumb = './_' . $photo;

            // only generate a thumbnail if one doesn't already exist, logging if in cli
            if ( !file_exists( $thumb ) ) {
                make_thumb( $path, $thumb, 500 );
                if ( is_cli() ) print "Thumbnail created: " . str_replace( './', '', $thumb ) . "\n";
            } else {
                if ( is_cli() ) print "Thumbnail exists: " . str_replace( './', '', $thumb ) . "\n";
            }

            // if we're in a browser, output the code for the photo tile, with the thumbnail as a background.
            if ( !is_cli() ) {
                ?><a href="<?php print $photo ?>" class="photo"
                                    style="background-image: url(_<?php print $photo ?>);"></a><?php
            }
        }
    }
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