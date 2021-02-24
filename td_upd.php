<?php include './inc/header.php' ?>
<?php
// Include config file
require_once "./config/_conn.php";

// Define variables and initialize with empty values
$todoName = $todoText =  "";
$todoName_err = $todoText_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate todoName
    $input_td_name = trim($_POST["name"]);
    if (empty($input_td_name)) {
        $todoName_err = "Please enter a name.";
    } else {
        $todoName = $input_td_name;
    }
    // Validate todoText
    $input_td_text = trim($_POST["todo"]);
    if (empty($input_td_text)) {
        $todoText_err = "Please enter a Type.";
    } else {
        $todoText = $input_td_text;
    }

    // Check input errors before inserting in database
    if (empty($todoName_err) && empty($todoText_err)) {
        // Prepare an update statement
        $sql = "UPDATE todo SET td_name=?, td_text=? WHERE td_id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_td_name, $param_td_text, $param_id);

            // Set parameters
            $param_td_name = $todoName;
            $param_td_text = $todoText;

            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header("location: profile");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM todo WHERE td_id = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $todoName = $row["td_name"];
                    $todoText = $row['td_text'];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    // header("location: config/errors/error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($conn);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("profile");
        exit();
    }
}
?>




<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="post" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>">

                <h1>Add to Todo List</h1>
                <form method="post" action="">
                    <div class="form-group <?php echo (!empty($todoName_err)) ? 'has-error' : ''; ?>">
                        <label for="todo">Name:</label>
                        <input type="text" class="form-control" value="<?php echo $todoName; ?>" name="name" id="name">
                        <span class="help-block"><?php echo $todoName_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($todoText_err)) ? 'has-error' : ''; ?>">
                        <label for="todo">Todo:</label>
                        <textarea class="form-control" rows="5" name="todo" value=""
                            id="todo"><?php echo $todoText; ?></textarea>
                        <span class="help-block"><?php echo $todoText_err; ?></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <a href="index.php" class="btn btn-info" role="button">Cancal</a>
                    <button type="submit" value="submit" class="btn btn-danger">Submit</button>

                </form>
        </div>
        <div class="col-sm-3"></div>
    </div>

</div>

<?php include './inc/footer.php' ?>
