<?php
session_start();
session_destroy();

unset($_COOKIE['sistema']);

header('location:index.php');
?>