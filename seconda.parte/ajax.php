<?php

$con = pg_connect("host=localhost port=5434 dbname=login user=postgres password=12345") or
die('Could not connect:' . pg_last_error());
$search=$_POST['tags'];
$search=strtolower(preg_replace('/\s+/', '', $search));
if(!$search){
    echo "<body style='background: rgb(180,87,75);
    background: linear-gradient(355deg, rgba(180,87,75,0.7987570028011204) 0%, rgba(225,253,29,0.38139005602240894) 50%, rgba(252,176,69,0.7931547619047619) 100%);'>";
    echo '<h1 align="center" style="color:red"><b> Ops! Nessuna ricetta inserita</b></h1>
    <h3  align="center"><a href="/seconda.parte/iniziale.html"  style="text-decoration:none; color: black;"> Clicca qui per tornare alla pagina iniziale </a></h3>';
    exit;
}
$q1="select link from Ricettario where id='$search' ";
$result=pg_query($con,$q1 );

$Result = pg_fetch_object($result);
if(!$Result){
    echo "<body style=' background: rgb(180,87,75);
    background: linear-gradient(355deg, rgba(180,87,75,0.7987570028011204) 0%, rgba(225,253,29,0.38139005602240894) 50%, rgba(252,176,69,0.7931547619047619) 100%);'>";
    echo '<h1 align="center" style="color:red"><b> Mi dispiace! La ricetta non è presente </b></h1>';
    echo '<h3  align="center"><a href="/seconda.parte/iniziale.html"  style="text-decoration:none; color:black; " > Clicca qui per tornare alla pagina iniziale </a></h3>';
    exit;
}
header("Location:$Result->link");
?>
