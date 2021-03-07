<?php include './inc/header.php' ?>
<!-- see and change username, password   -->
<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <div class="btn-group-vertical">
                <!-- <a type="button" href="" class="btn btn-primary">Information:</a> -->
                <!-- <a type="button" href="" class="btn btn-primary">Samsung</a>
                <a type="button" href="" class="btn btn-primary">Sony</a> -->
            </div>
        </div>
        <div class="col-lg-8">
            <div class="rounded-lg border">
                <?php
                require_once('./config/_conn.php');
                if (!$conn) {
                    die("Connection failed: ");
                }
                $username = $_SESSION['username'];
                $mysql = "SELECT * FROM users WHERE user_name = '$username'";
                $results = mysqli_query($conn, $mysql);
                if (mysqli_num_rows($results) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($results)) {

                        echo '
                    <div class="card">
                        <div class="card-body" style="color:black;">
                        <h4 class="card-title text-center"> Username: ' . $row['user_name'] . '</h4>
                            <p class="card-text text-center"> Password: ********* </p>
                            </br>
                        <div class="btn-group"><a class="btn btn-outline-info" href="proE?id=' . $row["user_id"] . '?>"role="button">Edit</a>
            </div>
        </div>
        ';
        }
        } else {
        echo '0 results';
        } ?>


    </div>
    <!-- ^^^ these two are for the body of the card -->
</div>

</div>


</div>
</div>






<?php include './inc/footer.php' ?>
