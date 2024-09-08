<?php
$file = 'relay_data.txt';

if (file_exists($file)) {
    $relay = file_get_contents($file);
    echo $relay;
} else {
    echo "No data found.";
}
?>
