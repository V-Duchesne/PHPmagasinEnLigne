<?php
session_start();
require "../../src/fonctions/dbFonction.php";
session_destroy();
header("location: ../../index.php");
exit();
