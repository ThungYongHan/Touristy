<?php
$mysqli = new mysqli("localhost", "root", "", "penang");
// return an error code from the last connection error, if there is any
if ($mysqli -> connect_errno) {
    // display error code
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
