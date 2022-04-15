<?php

class quantite{
    private $idProd;
    private $idCommande;
    private $qte_Commandee;

    function getIdProd() {
        return $this->idProd;
    }

    function getIdCommande() {
        return $this->idCommande;
    }

    function getQte_Commandee() {
        return $this->qte_Commandee;
    }



	 function setIdProd($idProd) {
        $this->idProd = $idProd;
    }
	
    function setIdCommande($idCommande) {
        $this->idCommande = $idCommande;
    }

    function setQte_Commandee($qte_Commandee) {
        $this->qte_Commandee = $qte_Commandee;
    }


    public static function ajouterQuantite(quantite $quantite)
    {
        
        $req=MonPdo::getInstance()->prepare("insert into quantite(idProd, idCommande, qte_Commandee) values(:idProd, :idCommande, :qte_Commandee)") ;
        $idProd=$quantite->getIdProd() ;
        $req->bindParam('idProd', $idProd);
        $idCommande=$quantite->getIdCommande() ;
        $req->bindParam('idCommande', $idCommande);
        $qte_Commandee=$quantite->getQte_Commandee() ;
        $req->bindParam('qte_Commandee', $qte_Commandee);

        $nb=$req->execute();

        $_SESSION['alert']="la quantité a été ajouté !" ;
        return $_SESSION['alert'] ;
    }


    public static function trouverUneQuantite($idCommande)
    {
    $req=MonPdo::getInstance()->prepare("select * from quantite where idCommande=:idCommande") ;
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'idCommande') ;
    $req->bindParam ('idCommande',$idCommande);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat ;

	}








}