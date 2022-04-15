<?php

class Produit implements JsonSerializable{
    private $idProd;
    private $nom;
    private $prixProd;
    private $photo ;
    private $categorie ;
    private $ingredient ;

    function getIdProd() {
        return $this->idProd;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrixProd() {
        return $this->prixProd;
    }

    function getPhoto() {
        return $this->photo;
    }
    
    function getCategorie() {
        return $this->categorie;
    }
    function getIngredient() {
        return $this->ingredient;
    }


	 function setIdProd($idProd) {
        $this->idProd = $idProd;
    }
	
    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrixProd($prixProd) {
        $this->prixProd = $prixProd;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    function setIngredient($ingredient) {
        $this->ingredient = $ingredient;
    }


    public static function affichertous(){
        $req=MonPdo::getInstance()->prepare("select * from produit ORDER BY idProd") ;
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'produit') ;
        $req->execute();
        $lesResulats=$req->fetchAll();
        return $lesResulats ;
        
    }
    
    public static function afficheParCategorie($idCateg){
        $req=MonPdo::getInstance()->prepare("select * from produit where categorie =:idCateg") ;
        $req->bindParam(":idCateg",$idCateg);
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'produit') ;
        $req->execute();
        $lesResulats=$req->fetchAll();
    
        return $lesResulats ;
        
    }

    // public static function second(){
    //     $req=MonPdo::getInstance()->prepare("select * from produit where categorie =2") ;
    //     $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'produit') ;
    //     $req->execute();
    //     $lesResulats=$req->fetchAll();
    //     return $lesResulats ;
        
    // }
    // public static function troisieme(){
    //     $req=MonPdo::getInstance()->prepare("select * from produit where categorie =3") ;
    //     $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'produit') ;
    //     $req->execute();
    //     $lesResulats=$req->fetchAll();
    //     return $lesResulats ;
        
    // }






	public static function securiser($donnees)
	{
		$donnees=trim($donnees) ;
		$donnees=stripslashes($donnees);
		$donnees=htmlspecialchars($donnees) ;
		return $donnees ;
	}	
	
	public static function ajouter(produit $produit)
    {
        
        $req=MonPdo::getInstance()->prepare("insert into produit(nom, prixProd, photo, categorie, ingredient)
                                             values(:nom, :prixProd, :photo, :categorie, :ingredient)") ;
        $nom=$produit->getNom() ;
        $req->bindParam('nom', $nom);
        $prixProd=$produit->getPrixProd() ;
        $req->bindParam('prixProd', $prixProd);
        $photo=$produit->getPhoto() ;
        $req->bindParam('photo', $photo);
        $categorie=$produit->getCategorie() ;
        $req->bindParam('categorie', $categorie);
        $ingredient=$produit->getIngredient() ;
        $req->bindParam('ingredient', $ingredient);

        $nb=$req->execute();

        $_SESSION['alert']="le produit a été ajouté !" ;
        return $_SESSION['alert'] ;
    }

	 public static function trouverUnProduit($idProd)
    {
    $req=MonPdo::getInstance()->prepare("select * from produit where idProd=:idProd") ;
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'produit') ;
    $req->bindParam ('idProd',$idProd);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat ;

	}

    public static function rechercher($nom)
    {
    $req=MonPdo::getInstance()->prepare("select * from produit where upper(nom) like :nom") ;
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'produit') ;
    $req->execute(array(':nom'=>'%'.$nom.'%'));
    $lesResulats=$req->fetchAll();
    return $lesResulats ;
}

	
	public static function modifier(produit $produit)
    {
        $req=MonPdo::getInstance()->prepare("update produit set nom=:nom, prixProd=:prixProd, photo=:photo, categorie=:categorie, ingredient=:ingredient where idProd=:idProd") ;
        $idProd=$produit->getIdProd() ;
		$req->bindParam('idProd',$idProd) ;
		$nom=$produit->getNom() ;
        $req->bindParam('nom', $nom);
        $prixProd=$produit->getPrixProd() ;
        $req->bindParam('prixProd', $prixProd);
        $photo=$produit->getPhoto() ;
        $req->bindParam('photo', $photo);
        $categorie=$produit->getCategorie() ;
        $req->bindParam('categorie', $categorie);
        $ingredient=$produit->getIngredient() ;
        $req->bindParam('ingredient', $ingredient);

        $nb=$req->execute();
		
		$_SESSION['alert']="le produit a été modifié !" ;
        return $_SESSION['alert'] ;
    }

	public static function supprimer(produit $produit)
    {
        $req=MonPdo::getInstance()->prepare("delete from produit where idProd=:idProd") ;
        $idProd=$produit->getIdProd() ;
		$req->bindParam('idProd',$idProd) ;
		$nb=$req->execute();
		$_SESSION['alert']="le produit a été supprimé !" ;
        return $_SESSION['alert'] ;
    }
	
	public static function ajoutPanier($idProd){
	
		if(!isset($_SESSION['panier']))
		{
		$_SESSION['panier'] =array(); // création de la variable de session panier s'il est vide
		}
		if(isset($_SESSION['panier'][$idProd]))
		{
		$_SESSION['panier'][$idProd]++ ; //si le produit est déjà dans le panier, j'ajoute 1 à la qté

		}
		else
		{
		$_SESSION['panier'][$idProd]=1 ; // je mets le produit dans le panier avec une qté 1
		}
		$_SESSION['alert']="le produit a été ajouté au panier !" ;
		return $_SESSION['alert'] ;
		
		}
		public static function ajoutSuppPanier($idProd){
			$_SESSION['panier'][$idProd]++ ;
		}
		
		public static function retraitPanier($idProd){   
			$nb=$_SESSION['panier'][$idProd] ;

			if($nb==1)
			{
			unset($_SESSION['panier'][$idProd]) ;
			}
			else
			{
			$_SESSION['panier'][$idProd]-=1 ;
			}
		}
		public static function viderPanier(){
			unset($_SESSION['panier']);
		}
		
        public static function nbPanier()
        {		
            $nb= count($_SESSION["panier"]) ;
            return $nb ;
        }
        public function jsonSerialize()
        {
            $vars=get_object_vars($this);
            return $vars;
        }
        
 }


