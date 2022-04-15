<?php
if(isset($_GET["quantite"])){
$quantite =$_GET["quantite"] ;
switch($quantite)
{

            case "laQuantite" :
                $lesProduits=Produit::afficherTous();
                    foreach ($_SESSION["panier"] as $key => $value) 
                {
                $quantite= new quantite() ;
                $quantite->setIdCommande($_SESSION["commandeId"]) ;
                $quantite->setIdProd($key) ;
                $quantite->setQte_Commandee($value) ;
                $quantite=quantite::ajouterQuantite ($quantite) ;

            
                // echo $key, $value.'<br>' ;
                }
                // var_dump ($quantite);

                unset ($_SESSION["panier"]) ;
                unset ($_SESSION["commandeId"]) ;
                unset ($_SESSION["clientMail"]) ;



                // echo $quantite->getIdCommande();
                // var_dump ($_SESSION["panier"]);
    

                // include ("vues/clientOk.php") ; 
                // header ("Location: vues/listeProduitsAdmin.php");
                header("Location: index.php");

                break ;
    


    }
} 



