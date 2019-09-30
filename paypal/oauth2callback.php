<?php
session_start();
$token = $_GET['code'];
$_SESSION['google_token'] = $token;

$client->authenticate($token);