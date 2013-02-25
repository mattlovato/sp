<?php

/**
 * This file only removes token cookie and redirects to homepage (/)
 */

setcookie('TENANT_WORKSPACE', '', time() - 604800, '/'); //invlidate by setting cookie expiration week before

header('Location: /' . ($_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : ''));
?>