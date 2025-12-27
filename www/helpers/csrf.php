<?php

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_check()
{
    if (
        empty($_POST['_csrf']) ||
        $_POST['_csrf'] !== ($_SESSION['csrf'] ?? '')
    ) {
        die('CSRF inválido');
    }
}

