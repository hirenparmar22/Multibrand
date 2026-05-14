<?php

include '../config.php';

$_SESSION = [];

if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

header("Location: ../index.php");
exit;