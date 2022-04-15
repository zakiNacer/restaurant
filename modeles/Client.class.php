<?php

class Client{
    private $idCli;
    private $nom;
    private $prenom;
    private $adresse ;
    private $tel ;
    private $cp ;
    private $mail ;

 

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getAdresse() {
        return $this->adresse;
    }
    
    function getTel() {
        return $this->tel;
    }
    function getCp() {
        return $this->cp;
    }
    function getMail() {
        return $this->mail;
    }


	 function setIdCli($idCli) {
        $this->idCli = $idCli;
    }
	
    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    public static function ajouterCli(client $client)
    {
        
        $req=MonPdo::getInstance()->prepare("insert into client(nom, prenom, adresse, tel, cp, mail) values(:nom, :prenom, :adresse, :tel, :cp, :mail)") ;
        $nom=$client->getNom() ;
        $req->bindParam('nom', $nom);
        $prenom=$client->getPrenom() ;
        $req->bindParam('prenom', $prenom);
        $adresse=$client->getAdresse() ;
        $req->bindParam('adresse', $adresse);
        $tel=$client->getTel() ;
        $req->bindParam('tel', $tel);
        $cp=$client->getCp() ;
        $req->bindParam('cp', $cp);
        $mail=$client->getMail() ;
        $req->bindParam('mail', $mail);


        $nb=$req->execute();

        $_SESSION['alert']="le client a été ajouté !" ;
        return $_SESSION['alert'] ;
    }


    public static function trouverUnClient($client)
    {
    $req=MonPdo::getInstance()->prepare("select * from client where mail=:mail") ;
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'client') ;
    $mail=$client->getMail() ;
    $req->bindParam ('mail',$mail);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat ;

    }









    /**
     * Get the value of idCli
     */ 
    public function getIdCli()
    {
        return $this->idCli;
    }
}