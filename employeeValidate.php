<?php

//include config.php to connect to the database
include("config.php");

//start session
session_start();
{
    // Define $myusername and $mypassword
    $magaca = $_POST['magaca'];
    $furaha = $_POST['furaha'];

    // To protect MySQL injection
    $magaca = mysqli_real_escape_string($mysqli, $magaca);
    $furaha = mysqli_real_escape_string($mysqli, $furaha);

    $results = mysqli_query($mysqli, "select * from employee where Username='$magaca' and Password = '$furaha'");
    //$count = mysqli_num_rows($fetch);

    //$results = $mysqli->query("SELECT * FROM payment ORDER BY order_ID DESC LIMIT 1");
    if ($results) {
        //fetch results set as object and output HTML
        if ($obj = $results->fetch_object()) {
            $last_id = $obj->order_ID;
            $_SESSION['login_username'] = $magaca;
            $_SESSION['user_id'] = $obj->Employee_ID;
            $_SESSION['role'] = $obj->role;
            $_SESSION['name'] = $obj->Employee_Name;
            header("location: Admin/index.php");
        } else {
            header('Location: Sign In.php');
        }
    } else {
        header('Location: Sign In.php');
    }
}
?>
