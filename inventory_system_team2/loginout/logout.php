<?php

# セッションを削除してログイン画面へ

session_start();

$_SESSION = array();

setcookie(session_name(), "", time() - 1);

session_destroy();

header("Location: ./login.php");

