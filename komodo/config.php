<?php
session_start();
set_time_limit(0);
error_reporting(E_ALL);


$host="localhost";
$util="root";
$parola="root";
$bd="licitatia";

$con=mysql_connect($host,$util,$parola) or die ("Nu se poate conecta la mysql");
mysql_select_db($bd) or die("Nu se poate conecta la baza de date!");

function addentities($data){
    if(trim($data)!=' '){
        $data=htmlentities($data, ENT_QUOTES);
        return str_replace('\\','&#92;',$data);
    } else return $data;
}
?>