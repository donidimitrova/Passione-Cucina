<?php

$con = pg_connect("host=localhost port=5434 dbname=login user=postgres password=12345") or
die('Could not connect:' . pg_last_error());
$search=$_POST['tags'];
$search=strtolower(preg_replace('/\s+/', '', $search));
if(!$search){
    echo '<b>Nessun risutato </b>';
    echo '<br> <b><a href="/seconda.parte/iniziale.html"> Torna alla pagina iniziale </a></b>';
    exit;
}
$q1="select link from Ricettario where id='$search' ";
$result=pg_query($con,$q1 );

$Result = pg_fetch_object($result);
if(!$Result){
    echo '<b>Nessun risutato </b>';
    echo '<br> <b><a href="/seconda.parte/iniziale.html"> Torna alla pagina iniziale </a></b>';
    exit;
}
header("Location:$Result->link");
?>
