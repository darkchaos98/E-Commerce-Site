<?php
require_once ('session_connect.php');
if($_SESSION['ID']!=NULL) {
    if (isset( $_POST['submit'] )) {
        $oldpassword = $_POST['old-password'];
        $password = $_POST['password'];

        $query = "SELECT 'password' FROM 'users'";
        $query2 = "UPDATE 'users' SET 'password' = '$password' WHERE password='$oldpassword'";
        $result = mysqli_query ( $conn, $query );
        if ($result != $oldpassword) {
            die( "Wrong password" . mysqli_error ( $conn ) );
        } else {
            mysqli_query ( $conn, $query2 );
        }
        header ( 'Location: products.php' );
    }
}
?>