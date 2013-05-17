<?php
$_SESSION['user'] = $_POST['user'];

$_SESSION['parola'] = $_POST['parola'];
if(($_POST['user'] == '') || ($_POST['parola'] == ''))
{
echo 'Completeaza casutele. <Br> 
      Apasati <a href="autentificare.php">aici</a> pentru a va intoarce la pagina precedenta.';
}
else
{
$cerereSQL = "SELECT * FROM `client` WHERE user='".$_SESSION['user']."' ";
$rezultat = mysql_query($cerereSQL);
if(mysql_num_rows($rezultat) == 1)
{
  while($rand = mysql_fetch_array($rezultat))
  {
    $_SESSION['logat'] = 'Da';
    if($_SESSION['user']=='admin'){
	 echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=admin.php">';
    }else{
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=acasa.php">';
  }}
}
else
{
   
echo 'Date incorecte. <Br> 
      Apasati <a href="cont.php">aici</a> pentru a va intoarce la pagina precedenta.';
}

}
?>