<?php
require_once 'config.php';
if(isset($_GET['delete']))
{
    $query = 'DELETE FROM licitatia.client WHERE client.codc = '.$_GET['delete'];
    echo $query;
    $result = mysql_query($query);
}else if(isset($_GET['stergere'])){
    $query1 = 'DELETE FROM licitatia.licitatie WHERE licitatie.codl = '.$_GET['stergere'];
    echo $query1;
    $result = mysql_query($query1);
}
 else if(isset($_GET['stergere1'])){
    $query1 = 'DELETE FROM licitatia.produs WHERE produs.codm = '.$_GET['stergere1'];
    echo $query1;
    $result = mysql_query($query1);
}   
        
        ?>