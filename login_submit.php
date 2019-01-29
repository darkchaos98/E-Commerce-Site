<?php
require_once ('session_connect.php');
if ($_SESSION['ID'] == NULL) {
    $id = NULL;
    if (isset( $_POST['submit'] )) {
        $email = $_POST['e-mail'];
        $password = $_POST['password'];
        $query1 = "SELECT 'name', 'email' ,'password' FROM 'users' WHERE 'email' == '$email' AND 'password' == '$password'";
        $result = mysqli_query ( $conn, $query1 );
        if (!(mysqli_query ( $conn, $query1 ))) {
            die( "Database Query Failed " . mysqli_error ( $conn ) );
        } else {
            if (mysqli_num_rows ($result)>0) {
                $id = $result['name'];
            }
            else {
                echo "<script type='text/javascript'>alert(\"User Not Found\")</script>";
            }
        }
        $_SESSION['ID'] = $id;
        header ( 'Location: products.php' );
        exit();
    }
}
?>