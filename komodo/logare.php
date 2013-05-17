
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="inregistrarestyle.css"/>
    <!-- slider css and script -->
          <link rel="stylesheet" href="css/orbit-1.2.3.css">
          <link rel="stylesheet" href="css/demo-style.css">
          
        <!-- Attach necessary JS -->
       
        <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.orbit-1.2.3.min.js"></script> 
        
            <!--[if IE]>
                 <style type="text/css">
                     .timer { display: none !important; }
                     div.caption { background:transparent; filterrogidXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
                </style>
            <![endif]-->
        
        <!-- Run the plugin -->
        <script type="text/javascript">
            $(window).load(function() {
                $('#featured').orbit();
            });
        </script>
    <!-- end slider css and script -->
    <title><danoibla></title>
</head>
<body>
 <div id="container">
       <div id="header">
         <div id="user" style="float:left;margin-left:800px; "> <h4 style="margin-top:67px; color:#003366;"><a class="active"  href="cont.php"><img src="images/omulet.png"/> Login</a>
       </h4></div>    </div>
             <div id="menu1">
    <ul >
        <li><a class="active" href="logare.php">Acasa</a></li>
        <li><a class="active" href="ajutor.html">Ajutor</a></li>
	 
        
    </ul>
             </div>
     <div id="featured" style="float: left;"> 
            <img src="images/img5.jpg"/>
            <img src="images/img6.jpg"/>
            <img src="images/img7.jpg"/>
                    
        </div>
    
    
     <div id="content">

 <div id="marci" style="float:left; width:257px;margin-top:20px; height:auto; ">
    <h5 style="color: gray;margin-left:60px;">Marci</h5>
       <?php
require_once 'config.php';
	$query1="Select  produs.codm,produs.marca from licitatia.licitatie,licitatia.produs where produs.codm=licitatie.codm ";
		$rez=mysql_query($query1);
	while($row=mysql_fetch_array($rez))
	{
        
       echo'  
       <ul> <li style="list-style-type: none;background-color:white; border-radius:3px;float:left;padding:5px; background-color:#99CCCC; margin-left:5px;margin-bottom:5px;">
       <a style=" text-decoration: none; display:block;color: #003366; hover-color:white;" href="detalii_masina.php?id='.$row['codm'].'">'.$row['marca'].'</a></li></ul>
       ';}
    ?>
    
    </div>
<div id="text">
            <h2 style="margin-left:70px; color:gray;">Important!</h2>
            <p style="margin-left:70px;"> Licitatii Online.Net va prezinta un site online de calitate ce cuprinde Licitatii Online corespunzatoare standardelor de calitate ale caselor de licitatii online consacrate.<br>
 
Pentru a putea participa la licitatii trebuie sa va creati un cont .<br>
    In acest sistem online de licitatii, dupa logare, puteti vizualiza stadiul licitatiilor produselor personale sau a celor pe care doriti sa le castigati, istoricul de licitatii online in timp cat si situatia licitatiilor curente.<br>
Dumneavoastra puteti efectua licitatii online, numai daca sunteti logat.<br>Pentru licitatie prompta si corecta va rugam sa completati cu mare atentie formularul de creare a contului, altfel contul dumneavoastra de Licitatii Online este
posibil sa fie ignorat,la fel si rodusele pe care le introduceti.<br>
    In momentul in care licitati este bine sa fiti foarte hotarat.
    Fiecare licitatie are sau nu sanse de reusita, in functie de ce servicii oferiti si cat de complexe sunt.<br> 
   In cazul in care constatati ca licitatia este necorespunzatoare va rugam sa ne apelati pe loc la rubrica de contact spre a ne semnala neregula.</p>
        </div>
        
        <div class="clear"></div>
        <div id="album">
                <h2 style="margin-left:70px;color:gray;">Pentru cine este? </h2>
                <p>Acest site este dedicat bla bla</p>
                <img src="C:\Users\Aida\Desktop\img1.jpeg" alt=""/>
        </div>
               <div id="main">
                
                <ul class="doua_coloane">
					<li>
						<h3 class="uppercase" style="color:gray;">Servicii</h3>
						
						
						<p>Dorim sa oferim cele mai eficiente si calitative proiecte, la timp, angajand si sustinand echipe flexibile si motivate. Am pornit cu pasi siguri si hotarati si vom continua la fel.</p>
						<a href=" " style="color:orange;">Citeste mai mult...</a>
					</li>
					<li>
						<h3 class="uppercase" style="color:gray;">Ajutor</h3>
						<p>Gama variata de servicii pe care  vi le oferim este una in pas cu schimbarile societatii astfel incat sa va satisfacem exigentele in materie de calitate si design.
</p>
					<a href="ajutor.html "style="color:orange;">Citeste mai mult...</a>
					</li>
                </ul>
                <div class="clear"></div>

            </div>
    </div>

 <div class="clear"></div>
 <div id="footer">
        
            <p style="text-align: center;">Copyright@liciteazasipleaca.ro
        </div>
        <div class="clear"></div>
  </div>

</body>
</html>