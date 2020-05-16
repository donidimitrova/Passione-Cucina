<?php
$con = pg_connect("host=localhost port=5434 dbname=login user=postgres password=12345") or
die('Could not connect:' . pg_last_error());
?>