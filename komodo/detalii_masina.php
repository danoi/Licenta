<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="licitatiistyle.css"/>
     <link type="text/css" rel="stylesheet" href="activestyle.css"/>
     <script type="text/javascript" src="js/countdown.js" defer="defer"></script> 
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
    <title>danoibla</title>
</head>
<body>
 <div id="container">
    <div id="header">
    <ul id="menu">
     
       <li><a class="active" href="logare.php">Acasa</a></li>
        <li><a class="active" href="inregprod.php">Vinde</a></li>
        <li><a class="active" href="search.php">Licitatii</a></li>
        <li><a class="active" href="activitati.php">Activitati</a></li>
        <li><a class="active" href="ajutor.html">Ajutor</a></li>
	
    </ul>
     <div id="featured" style="float: left;"> 
            <img src="images/img5.jpg"/>
            <img src="images/img6.jpg"/>
            <img src="images/img7.jpg"/>
                    
        </div>
    </div>

 <div id="content">
    
    <?php
	      include "config.php";//database connection
	      $order = "SELECT produs.marca,produs.tip_masina,produs.tip_combustibil
              ,produs.an_inreg, produs.tip_transmisie,produs.descriere,produs.pret_min,
              produs.pret_max,licitatie.data_term,licitatie.data_inc FROM licitatia.produs,licitatia.licitatie
	where produs.codm='".$_GET['id']."' and produs.codm=licitatie.codm";
	      $result = mysql_query($order);
	      $row = mysql_fetch_array($result);
               echo'
               <div id="detalii_continut">
               <a href="search.php">Inapoi la cautari</a>
               <div id="titlu">
            
               <h3>'.$row['marca'].', '.$row['tip_masina'].'</h3>
               <h4>Licitatia se va sfarsi in:'.$row['data_term'].' ,Timp ramas:<span id="countdown1">'.$row['data_term'].' 00:00:00 GMT+00:00</span></h4>
               </div>
               <div id="tabel">
               <table>
               <tr>
               <td>Tip Transmisie:</td>
               <td>'.$row['tip_transmisie'].'</td>
               </tr>
                <tr>
               <td>Anul inregistrarii:</td>
               <td>'.$row['an_inreg'].'</td>
               </tr>
               <tr>
               <td>Tip Combustibil:</td>
               <td>'.$row['tip_combustibil'].'</td>
               </tr>
               <tr>
               <td>Pret Minim:</td>
               <td>'.$row['pret_min'].'</td>
               </tr>
               <tr>
               <td>Pret pentru cumparare directa:</td>
               <td>'.$row['pret_max'].'</td>
               </tr>
               </table>
               </div>
               <div id="descriere">
               <h4>Descrierea Proprietarului</h4>
               <p>'.$row['descriere'].'</p>
               
               </div>
                  </div>';
    
    
    
    
    
    
    ?>
    </div>
   <div class="clear"></div>
   
 <div id="footer" style="float:left;">
        
            <p style="text-align: center;">Copyright@liciteazasipleaca.ro</p>
        </div>
        <div class="clear"></div>
  </div>
</body>
</html>