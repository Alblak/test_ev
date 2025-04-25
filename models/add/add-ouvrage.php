<?php 
include('../../connexion/connexion.php');
if(isset($_POST['valider'])){
    $titre=htmlspecialchars($_POST['titre']);
    $auteur=htmlspecialchars($_POST['auteur']);
  

    $ville_ed=htmlspecialchars($_POST['ville_ed']);
    $maison_ed=htmlspecialchars($_POST['maison_ed']);
    $categorie=htmlspecialchars($_POST['categorie']);
    $document=$_FILES['document']['name'];
    $couverture=$_FILES['couverture']['name'];

   
    $sel=$connexion->prepare("SELECT * from ouvrage where titre=? AND auteur=? AND ville_ed=? AND maison_ed=? AND categorie=?");
    $sel->execute(array($titre,$auteur,$ville_ed,$maison_ed,$categorie));
    if($existe=$sel->fetch())
    {
        $_SESSION['notif']="l'ouvrage existe deja";
        header("location:../../ouvrage.php");
    }
    else
    {
        $req=$connexion->prepare("INSERT INTO ouvrage (titre,auteur,ville_ed,maison_ed,categorie,document,couverture) values  (?,?,?,?,?,?,?)");
        $req->execute(array($titre,$auteur,$ville_ed,$maison_ed,$categorie,$document,$couverture));
    
        if($req){
            $upload="../../assets/document/".$document;
            move_uploaded_file($_FILES['document']['tmp_name'],$upload);
        
            
            $upload="../../assets/img/".$couverture;
            move_uploaded_file($_FILES['couverture']['tmp_name'],$upload);
            $_SESSION['notif']="Enregistrement reussie";
            header("location:../../ouvrage.php");
        }
    }

}
?>