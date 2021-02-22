<?php
// creating the connection to the db server
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn) {
    die("Database Connection Failed" . mysqli_error($conn));
}
//selecting the database
$select_db = mysqli_select_db($conn, 'landpage');
if (!$conn) {
    die("Database Selection Failed" . mysqli_error($conn));
}
