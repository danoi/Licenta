<?php
require_once('config.php');
$_SESSION['nume'] = $_POST['nume'];
$_SESSION['prenume'] = $_POST['prenume'];
$_SESSION['adresa'] = $_POST['adresa'];
$_SESSION['data_nasterii'] = $_POST['data_nasterii'];
$_SESSION['telefon'] = $_POST['telefon'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['user'] = $_POST['user'];
$_SESSION['parola'] = $_POST['parola'];


$cerereSQL = "INSERT INTO `client` (`nume`, `prenume`, `data_nasterii`, `adresa`,
`telefon`,`email`,`user`,`parola`)
VALUES ('".$_SESSION['nume']."', '".$_SESSION['prenume']."',
'".$_SESSION['data_nasterii']."', '".$_SESSION['adresa']."', '".$_SESSION['telefon']."','".$_SESSION['email']."',
'".$_SESSION['user']."','".$_SESSION['parola']."');";
mysql_query($cerereSQL);


echo 'Nume: '.$_SESSION['nume'].'<br>
Prenume: '.$_SESSION['prenume'].'<br>
data_nasterii: '.$_SESSION['data_nasterii'].'<br>
adresa: '.$_SESSION['adresa'].'<br>
telefon: '.$_SESSION['telefon'].'<br>
Email: '.$_SESSION['email'].'<br>
user: '.$_SESSION['user'].'<br>
parola: '.$_SESSION['parola'].'<br><br>
Daca datele sunt corecte, apasati <a href="prelucrare.php">aici</a> pentru a le valida
<br> si a le introduce in baza de date.';
?>