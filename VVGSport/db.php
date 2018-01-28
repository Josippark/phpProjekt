<?php

define("USERNAME","root");
define("PASSWORD","");
define("SERVER","localhost");
define("DB_NAME","vvg");

$db = mysqli_connect(SERVER,USERNAME,PASSWORD,DB_NAME) or die("Something went wrong, please try again later!");

?>