<?php
$dirname = "scripts/instagram/feed/";
$images = glob($dirname."*.jpg");

echo '<ul id="social-feed">';
foreach($images as $image) {
    echo '<li class="social-feed-images"><img style="width: 250px;height: auto;" src="'.$image.'" /></li>';
}
echo '</ul>';