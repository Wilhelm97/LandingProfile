<?php include './inc/header.php' ?>
<!-- check if there is a active session if there is an active session redirect to Home(index) -->
<?php
require_once('./config/_conn.php');
if (isset($_POST) & !empty($_POST)) {
    if ($_POST['password'] == $_POST['confpass']) {
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5($_POST['password']);
        $usertype = 'user';
        $sql = "INSERT INTO users (user_name, user_password)
    VALUES ('$username','$password')";
        if ($conn->query($sql) === true) {
            header("location: signin");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script> alert('The passwords dont match'); </script>";
    }
}
?>

<div class="container">
    <!-- body content -->
    <div class="row">
        <div class="col-sm-12">
            <h2 class="text-center">Signup</h2>
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="card">
                        <div class="card-body">
                            <form class="form" role="form" action="signup.php" method="POST" autocomplete="off">
                                <div class="form-group">
                                    <label for="username">User Name:</label>
                                    <input type="text" class="form-control" id="name" name="username"
                                        placeholder="john">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="password"
                                            title="At least 6 characters with letters and numbers">
                                    </div>
                                    <div class="form-group">
                                        <label for="rePassword">Verify Password:</label>
                                        <input type="password" class="form-control" id="focusSubmit" name="confpass"
                                            placeholder="password (again)">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="focusSubmit"
                                            class="btn btn-success btn-md float-right">Signup</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
    <!--/container-->

</div>


<div class="container">
    <h2 style="text-align:center;">Features</h2>
    </br>
    <div class="row">
        <div class="col-4">
            <h3>You favorite News</h3>
        </div>
        <div class="col-4">
            <h3>See your commute with google maps</h3>
        </div>
        <div class="col-4">
            <h3>Get updated on your youtubers uploads</h3>
        </div>
    </div>
</div>



<?php include './inc/footer.php' ?>
