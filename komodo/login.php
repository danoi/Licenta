<?php	
require_once('config.php');

if(!isset($_GET['actiune'])) $_GET['actiune'] = '';

switch($_GET['actiune'])
{
case '':
echo '<form action="login.php?actiune=validare" method="post">
      Utilizator: <input type="text" name="user" value=""><br>
      Parola: <input type="password" name="parola" value=""><br>
	  <input type="submit" name="Login" value="Login">
	  </form>';
break;

case 'validare':

$_SESSION['user'] = $_POST['user'];

$_SESSION['parola'] = $_POST['parola'];
if(($_POST['user'] == '') || ($_POST['parola'] == ''))
{
echo 'Completeaza casutele. <Br> 
      Apasati <a href="autentificare.php">aici</a> pentru a va intoarce la pagina precedenta.';
}
else
{
$cerereSQL = "SELECT * FROM `client` WHERE user='".addentities($_SESSION['user'])."' ";
$rezultat = mysql_query($cerereSQL);
if(mysql_num_rows($rezultat) == 1)
{
  while($rand = mysql_fetch_array($rezultat))
  {
    $_SESSION['logat'] = 'Da';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=pagina.php">';
  }
}
else
{
   
echo 'Date incorecte. <Br> 
      Apasati <a href="login.php">aici</a> pentru a va intoarce la pagina precedenta.';
}

}
break;
}
?>