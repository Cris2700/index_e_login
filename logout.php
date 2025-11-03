<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php");

header("Location: 2FA.html");
exit;
?>
