<?php
    if (isset($_GET['idcat'])){
        $id=$_GET['idcat'];
        $ModData=$connexion->prepare("SELECT * from categorie WHERE id=?");
        $ModData->execute([$id]);
        $mod=$ModData->fetch();

        $action="models/up/up-categorie.php?id=".$id;
        $bouton="Modifier";
      
    }
    else{
        $action="models/add/add-categorie.php";
        $bouton="Enregistrer";
    }

    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search=$_GET['search'];
        $SelData=$connexion->prepare("SELECT * from categorie where designation like ?");
        $SelData->execute(["%".$search."%"]);
    }
    else{
        $SelData=$connexion->prepare("SELECT * from categorie order by designation  ");
        $SelData->execute();
    }


