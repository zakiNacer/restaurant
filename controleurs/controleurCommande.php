<?php
if(isset($_GET["facture"])){
$facture=$_GET["facture"] ;
switch($facture)
{



    case "client" :
        include("vues/formClient.php");
        break;
        
        case "formCommande" : 
            include "vues/formClient.php" ;
            break ;
        

            case "newCommande" :
         
                $client= new client() ;
    
                $client->setMail($_SESSION["clientMail"]) ;
    
                $client=client::trouverUnClient ($client) ;
                
            
                echo $client->getidCli();
    
    
                $commande= new commande() ;
                $commande->setIdCli($client->getIdCli()) ;
                $commande->setDate($date = date("d.m.y H:i:s")) ;

                commande::ajouterCommande($commande);

                $commande2=commande::trouverUneCommande ($client->getIdCli()) ;
                
                
                // $_SESSION= $client->getidCli();
                $_SESSION["commandeId"] = ($commande2->getIdCommande()) ;

                //  echo $commande2;
                    var_dump ($commande2) ;
                    // echo $_SESSION["commandeId"] ;
                // $commande->setIdCommande($_POST["idCommande"]) ;

                // $_SESSION["commandeId"] = ($_POST["idCommande"]) ;
                
                header("Location: index.php?uc=quantite&quantite=laQuantite");

                break ;
    
 

                
    










    }
} 


// $today = date("m/d/y");   
// echo $today ;


// case "lesQuantite" :            
//     $commande= new commande() ;
//     $lesIdProd = $_SESSION ['lesIdProd']  ;
//     $lesQuantites = $_SESSION ['lesQuantites']  ;
//     $date = date("m.d.y");  


    
//     commande::ajouterCommande($commande);
//     include ("vues/listeProduitsAdmin.php") ;
//     // header ("Location: vues/listeProduitsAdmin.php");
//     break ;


//     case "infoCommande" :            
//         $commande= new commande() ;



//         $date = date("m.d.y");  
    
    
        
//         commande::ajouterCommande($commande);
//         include ("vues/listeProduitsAdmin.php") ;
//         // header ("Location: vues/listeProduitsAdmin.php");
//         break ;
    


