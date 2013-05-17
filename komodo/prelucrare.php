<?php
require_once('config.php');
if(($_SESSION['nume'] == "") || ($_SESSION['prenume'] == "") || ($_SESSION['data_nasterii'] ==
"") || ($_SESSION['adresa'] == "")|| ($_SESSION['telefon'] == "")|| ($_SESSION['email'] == "")
   || ($_SESSION['user'] == "")|| ($_SESSION['parola'] == "") )
{
echo 'Nu ai introdus date in formular sau cele introduse nu sunt corecte. <br>
Apasa <a href="inregistrare.php">aici</a> pentru a te intoarce la pagina anterioara.';
} else {
    
    echo $_SESSION['nume'];
echo 'Va multumim. <br>
Datele au fost introduse cu succes in baza de date. <br>
Pentru vizualizare apasati <a href="vizualizare.php">aici</a>.';
$cerereSQL = "INSERT INTO `client` (`nume`, `prenume`, `data_nasterii`, `adresa`,
`telefon`,`email`,`user`,`parola`)
VALUES ('".$_SESSION['nume']."', '".$_SESSION['prenume']."',
'".$_SESSION['data_nasterii']."', '".$_SESSION['adresa']."', '".$_SESSION['telefon']."','".$_SESSION['email']."',
'".$_SESSION['user']."','".$_SESSION['parola']."');";

$qry = "INSERT into client(nume) VALUES ('".$_SESSION['nume']."');";
mysql_query($qry);

mysql_query($cerereSQL);
$_SESSION['nume'] = '';
$_SESSION['prenume'] = '';
$_SESSION['data_nasterii'] = '';
$_SESSION['adresa'] = '';
$_SESSION['telefon'] = '';
$_SESSION['email'] = '';
$_SESSION['user'] = '';
$_SESSION['parola'] = '';

}
?>