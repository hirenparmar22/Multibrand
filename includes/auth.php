
<?php


function initAuth() {
    if (!isset($_SESSION)) {
        session_start();
    }
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return ($_SESSION['role'] ?? '') === 'admin';
}

function isVendor() {
    return ($_SESSION['role'] ?? '') === 'vendor';
}

function escape($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

