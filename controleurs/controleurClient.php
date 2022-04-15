<?php
if(isset($_GET["client"])){
$client=$_GET["client"] ;
switch($client)
{



    case "client" :
        include("vues/formClient.php");
        break;

    // case "newClient" : 
    //     if(isset($_SESSION["panier"])){
    //         $nb=Produit::nbPanier($_SESSION["panier"]) ;
    //         }
    //         else {
    //             $nb=0 ;
    //         }
    //         $lesProduits=Produit::afficherTous();
               
    //     $client= new client() ;
    //     $client->setNom($_POST["nom"]) ;
    //     $client->setPrenom($_POST["prenom"]) ;
    //     $client->setAdresse($_POST["adresse"]) ;
    //     $client->setTel($_POST["tel"]) ;
    //     $client->setCp($_POST["cp"]) ;
    //     $client->setMail($_POST["mail"]) ;

    //     client::ajouterCli($client);
    //     client::trouverUnClient($_POST["mail"]);

    //         echo "yo" ;
            
    //          var_dump ($client) ;

    //     foreach ($client as $lui){

    //     echo $lui->getIdCli () ;
    // }
        // $firstKey = array_shift(array_keys(client::trouverUnClient($_POST["mail"])));
        // echo $firstKey;

        // var_dump ($leClient) ;

        // var_dump (client::trouverUnClient($_POST["mail"])) ;
        // print_r (client::trouverUnClient($_POST["mail"])) ;

        // include ("vues/clientOk.php") ; 
        // header("Location: index.php?uc=commande&facture=newCommande") ; 

        // header ("Location: vues/listeProduitsAdmin.php");
        // break ;


        case "newClient" : 
            if(isset($_SESSION["panier"])){
                $nb=Produit::nbPanier($_SESSION["panier"]) ;
                }
                else {
                    $nb=0 ;
                }
                $lesProduits=Produit::afficherTous();
                
            $client= new client() ;
            $client->setNom($_POST["nom"]) ;
            $client->setPrenom($_POST["prenom"]) ;
            $client->setAdresse($_POST["adresse"]) ;
            $client->setTel($_POST["tel"]) ;
            $client->setCp($_POST["cp"]) ;
            $client->setMail($_POST["mail"]) ;

            client::ajouterCli($client);

            $_SESSION["clientMail"] = ($_POST["mail"]) ;



            header("Location: index.php?uc=commande&facture=newCommande");
            break ;



    }
}


