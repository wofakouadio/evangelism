<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "ems_db");

$conn_str = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$conn_str) {

    die("<div class='alert alert-warning'>Unable to connect to database. Contact Administrator</div>");
}
