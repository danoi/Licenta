<?php
require_once 'config.php';
if(isset($_GET['stergere']))
{
    $query = 'DELETE FROM licitatia.licitatie WHERE licitatie.codl = '.$_GET['stergere'];
    echo $query;
    $result = mysql_query($query);
}
        
        ?>