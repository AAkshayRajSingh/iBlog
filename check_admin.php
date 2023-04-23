<?php
session_start();
require('db.php');

if (!isset($_SESSION['admin_Id'])) {
    header("Location: admin.php");
}
?>
