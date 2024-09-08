<?php
$file = 'relay_data.txt';

if (isset($_POST['relay'])) {
    $relay = $_POST['relay'];
    file_put_contents($file, $relay);
    echo "Data saved successfully.";
} else {
    echo "No relay data received.";
}
?>
