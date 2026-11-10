<?php
// special_thanks.php
$file = 'special_thanks.txt';
if (file_exists($file)) {
    echo '<div id="specialThanks" class="special-thanks">' . file_get_contents($file) . '</div>';
} else {
    echo '<div id="specialThanks" class="special-thanks"><p>Special thanks content could not be loaded.</p></div>';
}
?>
