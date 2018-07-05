<?php

//include config.php to connect to the database
include("config.php");

//start session
session_start(); {
    // Define $myusername and $mypassword
    $magaca = $_POST['magaca'];
    $furaha = $_POST['furaha'];

    // To protect MySQL injection
    $magaca = mysqli_real_escape_string($mysqli, $magaca);
    $furaha = mysqli_real_escape_string($mysqli, $furaha);

    //$fetch = mysqli_query($mysqli, "select Cust_Id from customer where Email='$magaca' and Password= '$furaha'");
    //$count = mysqli_num_rows($fetch);
    
    $results = mysqli_query($mysqli, "select * from customer where (Email or UserName='$magaca') and Password = '$furaha' order by Cust_Id desc limit 1 ");
    //$count = mysqli_num_rows($fetch);

    //$results = $mysqli->query("SELECT * FROM payment ORDER BY order_ID DESC LIMIT 1");
    if ($results) {
        //fetch results set as object and output HTML
        if ($obj = $results->fetch_object()) {
            //$last_id = $obj->order_ID;
            $_SESSION['login_username'] = $magaca;
            $check=$_SESSION['login_username'];
            $_SESSION['customer_id'] = $obj->Cust_Id;
            $_SESSION['FullName'] = $obj->FullName;
            $_SESSION['Phone'] = $obj->Phone;
            $_SESSION['Email'] = $obj->Email;
            $_SESSION['Password'] = $obj->Password;
            $_SESSION['Country'] = $obj->Country;
            $_SESSION['City'] = $obj->City;
            $_SESSION['Adress'] = $obj->Adress;
            $_SESSION['PostalCode'] = $obj->PostalCode;
           
            
            header("location: index.php");
        } else {
            header('Location: Sign In.php');
        }
    } else {
        header('Location: Sign In.php');
    }
    /**
    if ($count != "") {
        $_SESSION['login_username'] = $magaca;
        $check=$_SESSION['login_username'];

        header("location: index.php");
    } else {
        header('Location: Sign In.php');
    }
     * 
     */
}
?>
