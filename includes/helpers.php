<?php
declare(strict_types=1);

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function site_url(string $hash = ''): string
{
    $script = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');

    return $script === 'index.php' ? ($hash !== '' ? $hash : 'index.php') : 'index.php' . $hash;
}
