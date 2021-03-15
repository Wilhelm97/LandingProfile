<?php include './inc/header.php' ?>
<div id="timeDate"></div>
<!-- TODO LIST: -->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-info">Add to Todo</h3>
            <form method="post" action="td_dir.php">
                <div class="form-group">
                    <!-- <label for="todo">Name:</label> -->
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                </div>
                <div class="form-group">
                    <!-- <label for="todo">Todo:</label> -->
                    <textarea class="form-control" rows="2" placeholder="Todo" name="todo" id="todo"></textarea>
                </div>
                <button type="submit" name="submit" id="focusSubmit" value="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
        <div style="overflow:auto; height:500px;" class="col-md-8">
            <h3 class="text-info">Todo</h3>
            <table style="background-color:white; " class='table table-hover'>
                <thead>
                    <tr>
                        <th>Todo Name:</th>
                        <th>Todo Text:</th>
                        <th>Action:</th>
                    </tr>
                </thead>
                </br>
                <tbody style="background-color:white;" id="todo_table">
                    <?php
                    require_once('./config/_conn.php');
                    if (!$conn) {
                        die("Connection failed: ");
                    }
                    $mysql = "SELECT * FROM todo WHERE user_name = '$_SESSION[username]'";
                    $results = mysqli_query($conn, $mysql);
                    if (mysqli_num_rows($results) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($results)) {

                            echo "

                    <tr class='tr_cl'>
                      <td>" . $row["td_name"] . "</td>
                      <td>" . $row["td_text"] . "</td>
                      <td>
                      <div class='btn-group'><a class='btn btn-outline-primary' href='td_upd.php?id=" . $row["td_id"] . "?>'
                    role='button'>EDIT</a>
                    <a class='btn btn-outline-danger' href='td_del.php?id=" . $row["td_id"] . "?>'
                        role='button'>Delete</a>
        </div>
        </td>

        </tr>

        ";
        }
        }
        ?>
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
        </tbody>
        </table>
    </div>

</div>
</br>
</div>
<!-- BLOG -->
<div class="container">
    <!-- <h2 style="text-align: center;" class="text-info">Blog</h2> -->
    <div class="row">
        <div class="col-md-4">
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
                    <textarea class="form-control" rows="3" placeholder="Content" name="blog" id="blog"></textarea>
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
            </form>
        </div>


        <div style="overflow:auto; height:500px;" class="container col-sm-8">
            <h3><a class="text-info" href="./blog">Blog</a></h3>
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
                <p class="card-text text-center" id="dateUp"><small> ' . $row['bl_userName'] . ' ' . $row['bl_created'] . '</small></p>
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

<div class="container">
    <h2 style="text-align: center;">Weather</h2>
    <!-- https://www.accuweather.com/en/ca/ajax/l1t/current-weather/55096?lang=en-us&partner=wdg_operanrw_web -->
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
<div class="container">
    <h2 style="text-align: center;">Youtube Videos</h2>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>

<?php include './inc/footer.php' ?>
