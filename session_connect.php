<?php
// Start the session
if(session_status () == PHP_SESSION_NONE) {
        session_start ();
        $conn = mysqli_connect ( 'localhost', 'estore', '', 'lifestylestore' );
        if (!$conn) {
            die( "Connection failed: " . mysqli_connect_error () );
        }
        $_SESSION['ID'] = NULL;
    }
$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 300;
if (isset($_SESSION['LAST_ACTIVITY']) &&
    ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = $time;

?>