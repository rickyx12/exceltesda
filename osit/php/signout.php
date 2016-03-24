<?php
include "session.php";

unset($_SESSION['user']);
session_destroy();
echo "signout";

?>