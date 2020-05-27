<?php

$con = pg_connect("host=localhost port=5434 dbname=login user=postgres password=12345") or
die('Could not connect:' . pg_last_error());
$search=$_POST['tags'];
$search=strtolower(preg_replace('/\s+/', '', $search));
if(!$search){
    echo '<h2 align="center" style="color:red"><b> Ops! Nessuna ricetta inserita</b></h2>
    <h4  align="center"><a href="/seconda.parte/iniziale.html"  style="text-decoration:none;background-image:"> Clicca qui per tornare alla pagina iniziale </a></h4>';
    exit;
}
$q1="select link from Ricettario where id='$search' ";
$result=pg_query($con,$q1 );

$Result = pg_fetch_object($result);
if(!$Result){
    echo '<h2 align="center" style="color:red"><b> Mi dispiace! La ricetta non è presente </b></h2>';
    echo '<h4  align="center"><a href="/seconda.parte/iniziale.html"  style="text-decoration:none;"> Clicca qui per tornare alla pagina iniziale </a></h4>';
    exit;
}
header("Location:$Result->link");
?>
