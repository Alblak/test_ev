<?php include("connexion/connexion.php");
include("models/select/select-ouvrage.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ouvrage</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font/fonts/bootstrap-icons.css">
</head>

<body>




  <!-- ======= Sidebar ======= -->


<main id="main" class="main">
        <div class="row">
             <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4 p-3">
                    <a class="btn btn-dark col-12" href="categorie.php">categorie</a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4 p-3">
                    <a class="btn btn-dark col-12" href="ouvrage.php">Ouvrage</a>
            </div>
            <div class="col-12 bg-dark p-3 m-3 text-white">
                <h4>Ouvrage</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="" method="get" class="row">

                     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 p-3">
                        <input required type="text" autocomplete="off" name="search" placeholder="rechercher un livre " class="form-control">
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-3">
                        <?php if(isset($_GET['search'])){?>
                            <a href="ouvrage.php" class="btn btn-dark w-100">Annuler</a>
                        <?php } else { ?>
                             <input type="submit" name="valider" class="btn btn-primary w-100" value="recherche">
                        <?php } ?>          
                    </div>

                    </form>

                </div>
            </div>
          
               
                 
              
        <div class="col-12">
        
            <?php if(isset($_SESSION['notif']) && !empty($_SESSION['notif'])){ 
                    ?> <div class="alert-primary alert text-center"><?php echo $_SESSION['notif'];?> </div><?php 
                } 
                unset($_SESSION['notif']);
            ?>
         
          
                <div class="col-xl-12 ">
                    <form action="<?=$action?>" method="POST" class="shadow p-3" enctype="multipart/form-data">
                        <div class="row">
                          
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Titre<span class="text-danger"></span></label>
                                <input required type="text" autocomplete="off" name="titre" class="form-control" <?php if(isset($_GET['id'])){ ?> value="<?=$mod['titre']?>" <?php } ?>>
                                  
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Auteur<span class="text-danger"></span></label>
                                <input required type="text" autocomplete="off" name="auteur" class="form-control" <?php if(isset($_GET['id'])){ ?> value="<?=$mod['auteur']?>" <?php } ?>>
                                  
                            </div>
                          
                            <div class="col-xl-4 col-lg-5 col-md-4  col-sm-6 p-3">
                                <label for="">Maison d'edition<span class="text-danger"></span></label>
                                <input required type="text" autocomplete="off" name="maison_ed" class="form-control" <?php if(isset($_GET['id'])){ ?> value="<?=$mod['maison_ed']?>" <?php } ?>>
                                  
                            </div>
                            <div class="col-xl-4 col-lg-5 col-md-4  col-sm-6 p-3">
                                <label for="">Ville d'edition<span class="text-danger"></span></label>
                                <input required type="text" autocomplete="off" name="ville_ed" class="form-control" <?php if(isset($_GET['id'])){ ?> value="<?=$mod['ville_ed']?>" <?php } ?>>
                                  
                            </div>
                            
                        
                            <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4 p-3">
                                <label for="">categorie</span></label>
                                <select name="categorie" id="categorie" class="form-select">
                                    <?php 
                                    while($categorie=$SelCat->fetch()){
                                    if(isset($id)){ ?>
                                    <option <?php if($categorie['id']==$mod['categorie']){  ?> Selected <?php  } ?>value="<?=$categorie['id']?>"><?=$categorie['designation']?></option>
                                    <?php }else{ ?>
                                    <option value="<?=$categorie['id']?>"><?=$categorie['designation']?></option>
                                    <?php } } ?>

                                </select>
                                            
                          </div>
                        
                         
                          <div class="col-xl-6 col-lg-5 col-md-6  col-sm-6 p-3">
                                <label for="">fichier<span class="text-danger"></span></label>
                                <input required type="file" autocomplete="off" name="document" accept=".pdf,.docx,.pptx" class="form-control" <?php if(isset($_GET['id'])){ ?> value="<?=$mod['document']?>" <?php } ?>>
                              
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-6  col-sm-6 p-3">
                                <label for="">photo de  couverture<span class="text-danger"></span></label>
                                <input required type="file" autocomplete="off" accept=".jpg,.jpeg,.png" name="couverture" class="form-control" <?php if(isset($_GET['id'])){ ?> value="<?=$mod['couverture']?>" <?php } ?>
                                    >
                            </div>
                        
                            <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                                <input type="submit" name="valider" class="btn btn-primary w-100" value="<?=$bouton?>">
                            </div>
                            <?php 
                                
                            ?>

                        </div>
                    </form>
                </div>
            
                <div class="col-xl-12 table-responsive px-3 mt-3">
                  
                    <table class="table table-sm text-center shadow">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Couverture</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Categorie</th>
                                
                                <th>Maison/ville d'edition</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $numero=0;
                        while($data=$SelData->fetch()){  
                            $numero++;

                            ?>
                        
                            <tr>
                                <th scope="row"><?=$numero?></th>
                                <th scope="row"><a href="assets/img/<?=$data['couverture']?>"><img src="assets/img/<?=$data['couverture']?>" alt="" width=40></a></th>
                                <td><?=$data['titre']?></td>
                                <td><?=$data['auteur']?></td>
                                <td><?=$data['cat']?></td>
                              
                                <td><?=$data['maison_ed']." / ".$data['ville_ed']?></td>
                                <td><a href='ouvrage.php?id=<?=$data['id']?>' class="btn btn-primary btn-sm ">update</a>
                                    <a onclick=" return confirm('Voulez-vous vraiment supprimer cet ouvrage ?')"
                                        href='models/del/del-ouvrage.php?iddel=<?=$data['id']?>'
                                        class="btn btn-danger btn-sm ">del</i></a>
                                </td>
                            
                                
                            </tr>
                    <?php }  ?>
                        </tbody>
                    </table>
                    <?php 
                                    
                                    for($i=1;$i<=$nbre_page;$i++)
                                    {
                                        $active=($i==$page)?'class="btn btn-danger"':'';
                                        if(isset($_GET['search']))
                                        {
                                            $rec=$_GET['search'];
                                            $url="?search=".$_GET['search']."&page=$i";
                                        }
                                        else
                                        {
                                            $url="?page=$i";
                                        }
                                    
                                        echo '<a class="btn btn-dark " href="'.$url.'">'.$i.'</a>';
                                    }
                              
                                ?>
                    <?php if(isset($_GET['search']) && $numero==0) {?>
                        <p><?=$message?></p>
                    <?php } ?>
                </div>
         </div>
        </div>
    </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/font/fonts/bootstrap-icons.json"></script>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>