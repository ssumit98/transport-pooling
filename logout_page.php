<?php
session_start();

session_unset();
session_destroy();
header('refresh: 0.3; url=index.php');

?>