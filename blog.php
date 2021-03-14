<?php include './inc/header.php' ?>
<?php
if (!isset($_SESSION['username'])) {
    header("location:./signin.php");
}
?>
<?php
require_once('./config/_conn.php');
if (!isset($_SESSION['username'])) {
} else {
    $check = "SELECT * FROM users where user_name = '$_SESSION[username]' ";
    $result = $conn->query($check);

    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            echo "
                        <h1 style='text-align:center;' >" . "Welcome: &nbsp;" . $row["user_name"] . "</h1>
                    ";
        }
    } else {
        echo "0 results";
    }
}

?>
<?php
require "./config/_conn.php";
if (isset($_FILES['file'])) {
    print_r($_FILES);
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
}
?>
<?php
require_once('./config/_conn.php');
if (isset($_POST['submit']) & !empty($_POST['submit'])) {
    $blogTitle = mysqli_real_escape_string($conn, $_POST['title']);
    $blogText = mysqli_real_escape_string($conn, $_POST['blog']);
    $sql = "INSERT INTO blog (blog_title,blog_post,blog_userName) VALUES ('$blogTitle','$blogText','$_SESSION[username]')";
    if ($conn->query($sql) === true) {
        echo ' <div class="container">
        <div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Added to blog list</strong>
        </div>
        </div>
        ';
        // header("Refresh:5");
    } else {
        echo '<div class="alert alert-danger">
        <strong>' . $sql . '</strong>' . $conn->error .
            '</div>';
    }
}

?>

<div class="container">

    <div class="row">



        <!-- <div class="col-md-3">

        </div> -->
        </br>
        <div class="container col-sm-8">
            <?php
            require_once('./config/_conn.php');
            if (!$conn) {
                die("Connection failed: ");
            }
            $mysql = "SELECT * FROM blog";
            $results = mysqli_query($conn, $mysql);
            if (mysqli_num_rows($results) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($results)) {

                    echo '
            <div class="card">
            <div class="card-body" style="color:black;">
                <h4 class="card-title">' . $row['bl_title'] . '</h4>
                <p class="card-text text-center"><p> ' . $row['bl_cnt'] . ' </ p></p>
                <p class="card-text text-center"><small> ' . $row['bl_userName'] . ' ' . $row['bl_created'] . '</small></p>
            </div>
        </div>
            </br>
';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>


        </div>
    </div>
</div>





<?php include './inc/footer.php' ?>
