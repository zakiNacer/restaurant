<?php
session_start ();

require_once "modeles/monPdo.php" ;
require_once "modeles/Produit.class.php" ;
require_once "modeles/Admin.class.php" ;
require_once "modeles/Client.class.php" ;
require_once "modeles/Commande.class.php" ;
require_once "modeles/Quantite.class.php" ;
 $uc= htmlspecialchars($_GET["uc"]) ;
switch ($uc)
{

    case "API";
        include ("controleurs/controleurResto.php");
        break;    


}
?>