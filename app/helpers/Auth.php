<?php

function requireRole(array $allowedRoles)
{
    if (!isset($_SESSION['admin'])) {
        header("Location: /admin");
        exit();
    }

    if (!in_array($_SESSION['admin']['role'], $allowedRoles)) {
        http_response_code(403);
        die("Access denied");
    }
}
