<?php  // Might not need it but its still good have
require_once('./config/_conn.php');
session_start();
// if (!isset($_SESSION['username'])) {
//     header("location: signin.php");
// }
?>
<?php
require_once('./config/_conn.php');
$username = $_SESSION['username'];
if (isset($_POST['submit']) & !empty($_POST['submit'])) {

    $todoName = mysqli_real_escape_string($conn, $_POST['name']);
    $todoText = mysqli_real_escape_string($conn, $_POST['todo']);
    $sql = "INSERT INTO todo (td_text,td_name,user_name) VALUES ('$todoText','$todoName','$username')";
    if ($conn->query($sql) === true) {
        echo ' <div class="container">
        <div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Added to todo list</strong>
        </div>
        </div>
        ';
        header("location: profile");
    } else {
        echo '<div class="alert alert-danger">
        <strong>' . $sql . '</strong>' . $conn->error .
            '</div>';
    }
}
