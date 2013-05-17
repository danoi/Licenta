<?php
session_start();
$marca=$_POST['marca'];
$tip=$_POST['tip'];
$combustibil=$_POST['combustibil'];
$an=$_POST['an'];
$tipt=$_POST['tipt'];
$descriere=$_POST['descriere'];
$pretmin=$_POST['min'];
$pretmax=$_POST['max'];


if($marca&&$tip&&$combustibil&&$an&&$descriere){
    $connect=mysql_connect("localhost","root","root") or die ("couldnt connect with database");
     mysql_select_db("licitatia") or die ("couldnt find database");
    // $query="Select codc from client where nume=$nume and prenme=$prenume";
    // $rez=mysql_query($query);
     //$codc=mysql_result($rez);

    if(empty($marca)){
        echo("You have to fill an marca!");
        
    }else{if(empty($tip)){
        echo("You have to fill a tip!");
    }else{if(empty($combustibil)){
        echo("You have to fill a combustibil!");
    }else{if(empty($an)){
        echo("You have to fill a an!");
    }else{if(empty($descriere)){
         echo("You have to fill a descriere!");
    }

            else{
               
                 $insert=" INSERT INTO produs (marca,tip_masina,tip_combustibil,an_inreg,tip_transmisie,descriere,pret_min,pret_max)  VALUES ('$marca' , '$tip', '$combustibil', '$an', '$descriere','$pretmin','$pretmax') ";
                 if(!mysql_query($insert)){
                    echo("fail");
                    
                 }else{
                echo "Inserted!";}
               
                    
                    
                }
            }
        }
    }
}
}

    


?>