<?php
require_once './Model/User.php';
session_start();

if (isset($_SESSION['id'])) {
    User::checkAuthentication();
} else {
    include './View/login.php';
}
?>