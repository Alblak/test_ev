<?php
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $ModData=$connexion->prepare("SELECT * from ouvrage WHERE id=?");
        $ModData->execute([$id]);
        $mod=$ModData->fetch();

        $action="models/up/up-ouvrage.php?id=".$id;
        $bouton="Modifier";
      
    }
    else{
        $action="models/add/add-ouvrage.php";
        $bouton="Enregistrer";
    }



    $element_page=1;
    $page=isset($_GET['page'])? intval($_GET['page']):1;
    if($page<1)
    {
        $page=1;
    }
    $deja=($page-1)*$element_page;
 
    
    

    if(isset($_GET['search']) && !empty($_GET['search'])){
        $recherche=$_GET['search'];
    
        $sel=$connexion->prepare("SELECT COUNT(ouvrage.id) as total_element  From ouvrage,categorie where  ouvrage.auteur  LIKE ? OR ouvrage.titre  LIKE ? and ouvrage.categorie=categorie.id " );
        $sel->execute(["%".$recherche."%","%".$recherche."%"]); 
        
        $count=$sel->fetch();
        $total=$count['total_element'];


       
        $SelData=$connexion->prepare("SELECT ouvrage.*,categorie.designation  as cat  From ouvrage,categorie where  ouvrage.auteur  LIKE ? OR ouvrage.titre  LIKE ? and ouvrage.categorie=categorie.id  limit $deja,$element_page" );
        $SelData->execute(["%".$recherche."%","%".$recherche."%"]); 
        $numero=0;
        $message="Aucun element correspond  a votre recherche";

        
    
    }
    else{

        $sel=$connexion->prepare("SELECT COUNT(id) as total_element from ouvrage");
        $sel->execute();
        
        $count=$sel->fetch();
        $total=$count['total_element'];
        
   

        $SelData=$connexion->prepare("SELECT ouvrage.*,categorie.designation as cat  from ouvrage,categorie WHERE ouvrage.categorie=categorie.id limit $deja,$element_page");
        $SelData->execute();
        $numero=0;
    }

    $nbre_page=ceil($total/$element_page);
    
    
    if($page>$nbre_page)
    {
        $page=$nbre_page;
    }

    $SelCat=$connexion->prepare("SELECT * from categorie");
    $SelCat->execute();
    


    


