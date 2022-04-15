<?php
session_start ();
include("vues/header.php") ;
require_once "modeles/monPdo.php" ;
require_once "modeles/Produit.class.php" ;
require_once "modeles/Admin.class.php" ;
require_once "modeles/Client.class.php" ;
require_once "modeles/Commande.class.php" ;
require_once "modeles/Quantite.class.php" ;

if (empty ($_GET["uc"]))
{
    $uc="accueil" ;
}
else
{
    $uc= ($_GET["uc"]) ;
}
switch ($uc)
{
    case "accueil" ;
        include ('vues/accueil.php') ;
        break ;
        
    case "compte";
        include ("controleurs/controleurAccount.php") ;
        break;
    
    case "resto";
        include ("controleurs/controleurResto.php") ;
        break;

    case "admin";
        include ("controleurs/controleurAdmin.php") ;
        break;
           
    case "panier":
        include ("vues/panier.php") ;
        break ;
    
    case "commande";
        include ("controleurs/controleurCommande.php") ;
        break;

    case "client";
        include ("controleurs/controleurClient.php") ;
        break;
       
    case "quantite";
        include ("controleurs/controleurQuantite.php") ;
        break;



}
include("vues/footer.php") ;
