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
<div id="timeDate"></div>
<?php
require_once('./config/_conn.php');
if (isset($_POST['submit']) & !empty($_POST['submit'])) {
    $blogTitle = mysqli_real_escape_string($conn, $_POST['title']);
    $blogText = mysqli_real_escape_string($conn, $_POST['blog']);
    $blogType = mysqli_real_escape_string($conn, $_POST['type']);
    $sql = "INSERT INTO blog (bl_title,bl_type,bl_cnt,bl_userName) VALUES ('$blogTitle','$blogType','$blogText','$_SESSION[username]')";
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
        <div class="container col-md-8">
            <h3 class="text-info">Blog something</h3>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- <label for="title">Title</label> -->
                    <input type="text" class="form-control" placeholder="Title" name="title" id="title">
                </div>
                <select name="type" id="type" class="custom-select mb-3">
                    <option selected value="NotePad">NotePad</option>
                    <option value="Ideas">Ideas</option>
                    <option value="Important">Important</option>
                    <option value="Other">Other</option>
                </select>
                <div class="form-group">
                    <!-- <label for="blog">Post:</label> -->
                    <textarea class="form-control" rows="5" placeholder="Content" name="blog" id="blog"></textarea>
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
        <div class="col-sm-4">
            <h3 class="text-info">NotePad:</h3>
            <?php
            require_once('./config/_conn.php');
            if (!$conn) {
                die("Connection failed: ");
            }
            $mysql = "SELECT * FROM blog WHERE bl_type = 'NotePad'";
            $results = mysqli_query($conn, $mysql);
            if (mysqli_num_rows($results) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($results)) {

                    echo '
            <div class="card">
            <div class="card-body" style="color:black;">
                <h4 class="card-title">' . $row['bl_title'] . '</h4>
                <p class="card-text"><p class="text-center"> ' . $row['bl_cnt'] . ' </ p></p>
                <p class="card-text text-center"><small> ' . $row['bl_userName'] . ' ' . $row['bl_created'] . '</small></p>
            </div>
        </div>
            </br>';
                }
            } else {
                echo "0 results";
            }

            ?>


        </div>
    </div>
</div>
</br>
<div class="container">
    <div class="row">
        <div class="container col-sm-8">
            <h3 class="text-info">Important:</h3>
            <?php
            require_once('./config/_conn.php');
            if (!$conn) {
                die("Connection failed: ");
            }
            $mysql = "SELECT * FROM blog WHERE bl_type = 'Important'";
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
            </br>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>

</div>

<div class="container">

    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-info">Ideas:</h3>
            <?php
            require_once('./config/_conn.php');
            if (!$conn) {
                die("Connection failed: ");
            }
            $mysql = "SELECT * FROM blog WHERE bl_type = 'Ideas'";
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
            </br>';
                }
            } else {
                echo "0 results";
            }

            ?>


        </div>
        <div class="col-sm-6">
            <h3 class="text-info">Other:</h3>
            <?php
            require_once('./config/_conn.php');
            if (!$conn) {
                die("Connection failed: ");
            }
            $mysql = "SELECT * FROM blog WHERE bl_type = 'Other'";
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
            </br>';
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
