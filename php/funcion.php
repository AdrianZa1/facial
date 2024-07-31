<?php
function startSessionIfNeeded() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function checkRole($allowed_roles) {
    startSessionIfNeeded();
    if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowed_roles)) {
        echo("No tienes permiso para realizar esta acción.");
        exit();
    }
}

function checkRole2($allowed_roles) {
    startSessionIfNeeded();
    if (!isset($_SESSION['rol_adicional']) || !in_array($_SESSION['rol_adicional'], $allowed_roles)) {
        echo("No tienes permiso para realizar esta acción.");
        exit();
    }
}

function checkRoles($allowed_roles) {
    startSessionIfNeeded();
    $user_role = isset($_SESSION['role']) ? $_SESSION['role'] : null;
    $additional_role = isset($_SESSION['rol_adicional']) ? $_SESSION['rol_adicional'] : null;

    if (!in_array($user_role, $allowed_roles) && !in_array($additional_role, $allowed_roles)) {
        echo("No tienes permiso para realizar esta acción.");
        exit();
    }
}
?>
