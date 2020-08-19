<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: http://localhost:8080/sitefournos2/rofl.php');
?>