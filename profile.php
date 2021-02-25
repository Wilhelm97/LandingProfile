<?php include './inc/header.php' ?>
<div id="timeDate"></div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-info">Add to Todo</h3>
            <form method="post" action="td_dir.php">
                <div class="form-group">
                    <label for="todo">Name:</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="todo">Todo:</label>
                    <textarea class="form-control" rows="2" name="todo" id="todo"></textarea>
                </div>
                <button type="submit" name="submit" id="focusSubmit" value="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
        <div style="overflow:auto; height:600px;" class="col-md-8">
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
                      <div class='btn-group'><a class='btn btn-primary' href='td_upd.php?id=" . $row["td_id"] . "?>'
                    role='button'>EDIT</a>
                    <a class='btn btn-danger' href='td_del.php?id=" . $row["td_id"] . "?>' role='button'>Delete</a>
        </div>
        </td>

        </tr>

        ";
        }
        } else {
        // echo "0 results";
        }
        $conn->close();
        ?>

        </tbody>
        </table>
    </div>

</div>
</div>

<div class="container">
    <h2 style="text-align: center;">News</h2>
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
    <h2 style="text-align: center;">Weather</h2>
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
