<?php
require_once 'config.php';
if(isset($_GET['introducere']))
{   echo'
<form method="get" action="">
Nume Licitatie:<input type="text" name="numel">
Data de inceput:<input type="text" name="data1">
Data de terminare:<inut type="text" name="data2">
<input type="submit" value="introducere">
</form>
';
  
if(isset($_GET['submit'])){
    $query = "Insert into licitatia.licitatie (codm,nume_licitatie,data_inc,data_term)
    values ('".$_GET['introducere']."','".$_GET['numel']."','".$_GET['data1']."','".$_GET['data2']."');";
   
    echo $query;
    $result = mysql_query($query);
}}
        
        ?>