<?php
$resto=$_GET["resto"];
switch ($resto)
{
    // case "menu" :
    //     $lesProduits=Produit::afficherTous();
    //     include("vues/menu.php");
    //     break;

    case "menu":
        if(isset($_SESSION["panier"])){
        $nb=Produit::nbPanier($_SESSION["panier"]) ;
        }
        else {
            $nb=0 ;
        }
        $lesProduits=Produit::afficherTous();
       
        include("vues/menu.php"); 
        break;
        
        
	case "ajouter" :
		include "vues/formAjout.php" ;
		break ;
		
		
	case "valideAjout" :
        $produit= new produit() ;
        $produit->setNom($_POST["nom"]) ;
        $produit->setPrixProd($_POST["prixProd"]) ;
        $produit->setPhoto(basename($_FILES["photo"]["name"])) ;
        $nom_image = basename($_FILES["photo"]['name']);
        $chemin_destination = 'img/produit/' . $nom_image;
        move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_destination);
        $produit->setCategorie($_POST["categorie"]) ;
    
        // index de repère "i"
        $i=1;
        // création du tableau "tabIngredient"
        $tabIngredient=array();

        // incrémente dans le tableau "tabIngredient" les 7 ingredients si ils sont coché et non coché 
        // tant que ( l'index "i" incrémente pas les 7 ingrédients )
        // { incrémenter les ingrédients dans le tableau }
        while ($i <= 7) {
            array_push ($tabIngredient, isset( $_POST["ingredient".$i]));
            $i++;
        }
        // creation du tableau "tab"
        $tab = array();
        // pour chaques éléments du tableau "tabIngredient" à pour clé "key" (index) et valeur "value" (ingrédients coché et non coché)
        // { (si la valeur "value" est égal à vrai (ingrédient coché)) 
        // {incremente seulement les ingrédients qui sont cochés dans le tableau "tab"}
        foreach ($tabIngredient as $key => $value) 
        {   
            if ($value==true)
            { 
                $key++;
                array_push($tab,($_POST["ingredient".$key]));
            }
        }

        // passe les éléments du tableau "tab" en string "ingredientConfirm" (chaînes de caractères)
        $ingredientConfirm = implode(",", $tab);

        $produit->setIngredient($ingredientConfirm);
        produit::ajouter($produit);
        
        $lesProduits=produit::afficherTous();
        echo $ingredientConfirm;
        // header ("Location: vues/listeProduitsAdmin.php");

        // include ("vues/listeProduitsAdmin.php") ;
        header ("Location: index.php?uc=admin&choix=connecter");
        break ;




    case "supprimer" :
        $produit=Produit::trouverUnProduit($_GET["supp"]) ;
        Produit::supprimer($produit) ;
        $lesProduits=Produit::afficherTous();
        // include ("vues/listeProduitsAdmin.php") ;
        header ("Location: index.php?uc=resto&resto=menu");

        break;
            
    // case "ajoutPanier" :
    //     Produit::ajoutPanier($_GET["idProd"]) ;
    //     header("location:index.php?uc=resto&resto=menu") ;
    //     break ;
    

	case "modifier":
		$produit=Produit::trouverUnProduit($_GET["modif"]) ;
		include "vues/formModif.php" ;
		break;
		
	case "valideModif":
        $produit= new produit() ;
        $produit->setIdProd($_POST["idProd"]) ;
        $produit->setNom($_POST["nom"]) ;
        $produit->setPrixProd($_POST["prixProd"]) ;
        $produit->setCategorie($_POST["categorie"]) ;
        // $produit->setIngredient($_POST["ingredient"]) ;

        if($_FILES["photo2"]["name"]!=''){
        $produit->setPhoto(basename($_FILES["photo2"]["name"])) ;
        $nom_image = basename($_FILES["photo2"]['name']);
        $chemin_destination = 'images/' . $nom_image;
        move_uploaded_file($_FILES['photo2']['tmp_name'], $chemin_destination);
                }
        
        else
        {
            
            $produit->setPhoto($_POST["photo1"]) ;
        }
                // index de repère "i"
                $i=1;
                // création du tableau "tabIngredient"
                $tabIngredient=array();
        
                // incrémente dans le tableau "tabIngredient" les 7 ingredients si ils sont coché et non coché 
                // tant que ( l'index "i" incrémente pas les 7 ingrédients )
                // { incrémenter les ingrédients dans le tableau }
                while ($i <= 7) {
                    array_push ($tabIngredient, isset( $_POST["ingredient".$i]));
                    $i++;
                }
        
                // creation du tableau "tab"
                $tab = array();
        
                // pour chaques éléments du tableau "tabIngredient" à pour clé "key" (index) et valeur "value" (ingrédients coché et non coché)
                // { (si la valeur "value" est égal à vrai (ingrédient coché)) 
                // {incremente seulement les ingrédients qui sont cochés dans le tableau "tab"}
                foreach ($tabIngredient as $key => $value) 
                {   
        
                    if ($value==true)
                    { 
                        $key++;
                        array_push($tab,($_POST["ingredient".$key]));
                    }
                    
                }
        
                // passe les éléments du tableau "tab" en string "ingredientConfirm" (chaînes de caractères)
                $ingredientConfirm = implode(",", $tab);
        
                $produit->setIngredient($ingredientConfirm);
        $nb=Produit::modifier($produit);
        $_SESSION["autorisation"]="OK" ;
        $lesProduits=Produit::afficherTous();
        // include ("vues/listeProduitsAdmin.php") ;
        header ("Location: index.php?uc=admin&choix=connecter");

        break ;
		


    // case "restaurant" :
    //     $lesProduits=Produit::afficherTous();
    //     include("vues/restaurant.php");
    //     break;
            
            
    case "rechercher":
        $recherche=strtoupper($_POST["r"]) ;
        $recherche=Produit::securiser($recherche) ;
        $lesProduits=Produit::rechercher($recherche) ;

        if(empty($lesProduits))
        {
            include ("vues/pasderesultat.php") ; 
        }
        else 
        {
            include ("vues/menu.php");
        }
    break;



    case "ajoutPanier" :
		Produit::ajoutPanier($_GET["idProd"]) ;
		header("location:index.php?uc=resto&resto=menu") ;
		break ;
		
		case "ajoutSuppPanier" :
		Produit::ajoutSuppPanier($_GET["idProd"]) ;
		header ("location:index.php?uc=panier") ;
		break ;
		
		case "retraitPanier" :
		Produit::retraitPanier($_GET["idProd"]) ;
		header ("location:index.php?uc=panier") ;
		break ;
		
		case "viderPanier" :
		Produit::viderPanier() ;
		include ("vues/panierVide.php") ;
		break ;


    
    	case "unProduit":
		$produit=Produit::trouverUnProduit($_GET["idProd"]) ;
		include "vues/pageProduit.php" ;
		break;
    
     case "produitJSON" :
         $idCateg=htmlentities($_GET['idCateg']);
        $produits = Produit::afficheParCategorie($idCateg); 
        $dataJSON=json_encode($produits) ;
        include "vues/afficheJSON.php";
        break;

    case "nomProduitJSON":
        $nomProduit=htmlspecialchars($_GET['nom']);
        $produits = Produit::rechercher($nomProduit);
        $dataJSON=json_encode($produits);
        include "vues/afficheJSON.php";
}