<?php 
include('../../connexion/connexion.php');
if(isset($_POST['valider'])){
    $id=$_GET['id'];
    $titre=htmlspecialchars($_POST['titre']);
    $auteur=htmlspecialchars($_POST['auteur']);
  
 
    $ville_ed=htmlspecialchars($_POST['ville_ed']);
    $maison_ed=htmlspecialchars($_POST['maison_ed']);
    $categorie=htmlspecialchars($_POST['categorie']);
    $document=$_FILES['document']['name'];
    $couverture=$_FILES['couverture']['name'];

   
  
        $req=$connexion->prepare("UPDATE ouvrage set titre=?,auteur=?,ville_ed=?,maison_ed=?,categorie=?,document=?,couverture=? where id=?");
        $req->execute(array($titre,$auteur,$ville_ed,$maison_ed,$categorie,$document,$couverture,$id));
    
        if($req){
            $upload="../../assets/document/".$document;
            move_uploaded_file($_FILES['document']['tmp_name'],$upload);
        
            
            $upload="../../assets/img/".$couverture;
            move_uploaded_file($_FILES['couverture']['tmp_name'],$upload);
            $_SESSION['notif']="modification reussie";
            header("location:../../ouvrage.php");
        }
    

}
?>