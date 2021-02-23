<?php include './inc/header.php' ?>
<?php
if (isset($_SESSION['username'])) {
    header("location: profile");
}
require_once('./config/_conn.php'); // connection to the database
if (isset($_POST) & !empty($_POST)) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $sql = "select * from users where user_name='$username' and user_password='$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['username'] = $username;
        header("location: profile");
    } else {
        echo "<script>
    alert('Invalid Username or Password');
</script> ";
    }
}
if (isset($_SESSION['username'])) {
    echo "<script>
    alert('User is Already signed in');
</script> ";
}
?>

<!-- content -->
<div class="container">

    <form class="form" role="form" autocomplete="off" id="formLogin" method="POST">
        <div class="form-group">
            <label for="text">User Name:</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="password">
        </div>
        <!-- <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
            </label>
        </div> -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>







<?php include './inc/footer.php' ?>
