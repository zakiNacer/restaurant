<?php

class Commande{
    private $idCommande;
    private $idCli;
    private $date;

    function getIdCommande() {
        return $this->idCommande;
    }

    function getIdCli() {
        return $this->idCli;
    }

    function getDate() {
        return $this->date;
    }


	 function setIdCommande($idCommande) {
        $this->idCommande = $idCommande;
    }
	
    function setIdCli($idCli) {
        $this->idCli = $idCli;
    }

    function setDate($date) {
        $this->date = $date;
    }


    public static function ajouterCommande(commande $commande)
    {
        
        $req=MonPdo::getInstance()->prepare("insert into commande(idCli, date) values(:idCli, :date)") ;
        // $idCommande=$commande->getIdCommande() ;
        // $req->bindParam('idCommande', $idCommande);
        $idCli=$commande->getIdCli() ;
        $req->bindParam('idCli', $idCli);
        $date=$commande->getDate() ;
        $req->bindParam('date', $date);

        $nb=$req->execute();

        $_SESSION['alert']="la commande a été ajouté !" ;
        return $_SESSION['alert'] ;
    }


    public static function trouverUneCommande($idCli)
    {
    $req=MonPdo::getInstance()->prepare("select * from commande where idCli=:idCli") ;
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'commande') ;
    // $id=$idCommande->getIdCommande() ;
    $req->execute(array(':idCli'=>$idCli)) ;
    // $req->bindParam ('idCli',$id);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat ;

	}




}