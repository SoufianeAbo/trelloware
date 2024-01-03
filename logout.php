<?php
require_once './Model/User.php';
session_start();

User::logout();
?>