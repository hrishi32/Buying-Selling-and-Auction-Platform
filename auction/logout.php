<?php

//session_start();
include "session.php";

session_destroy();

header("Location: home.php");
        exit;

?>