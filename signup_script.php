<?php
if($_SESSION['ID'] == NULL) {
    if (isset( $_POST['submit'] )) {
        $name = $_POST['name'];
        $email = $_POST['e-mail'];
        $password = $_POST['password'];
        $contact = $_POST['contact'];
        $city = $_POST['city'];
        $address = $_POST['address'];

        $query = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES (NULL, '$name', '$email', '$password', '$contact', '$city', '$address')";

        if (!(mysqli_query ( $conn, $query ))) {
            die( "Database Query Failed " . mysqli_error ( $conn ) );
        }
        $affected_rows = mysqli_affected_rows ( $conn );
        if (!($affected_rows == 1)) {
            die( "Query not executed properly" . mysqli_error ( $conn ) );
        }
        $_SESSION['ID'] = $name;
    }
    header ( 'Location: products.php' );
    die();
}
else header ('Location: products.php');
die();
?>
