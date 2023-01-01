<?php
session_start();

session_unset();

session_destroy();


header('location:index.php?page=1'); //redirection vers page principal




?>