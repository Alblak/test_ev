<?php include("connexion/connexion.php");
include("models/select/select-categorie.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>categorie</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font/fonts/bootstrap-icons.css">
</head>

<body>

<div class="row">

</div>

<main id="main" class="main">
    
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4 p-3">
                    <a class="btn btn-dark col-12" href="categorie.php">categorie</a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4 p-3">
                    <a class="btn btn-dark col-12" href="ouvrage.php">Ouvrage</a>
            </div>
            <div class="col-12 bg-dark p-3 m-3 text-white">
                <h4>categories</h4>
            </div>
        <div class="col-4">
        
            <?php if(isset($_SESSION['notif']) && !empty($_SESSION['notif'])){ 
                    ?> <div class="alert-info alert text-center"><?php echo $_SESSION['notif'];?> </div><?php 
                } 
                unset($_SESSION['notif']);
            ?>
         
          
                <div class="col-12 ">
                    <form action="<?=$action?>" method="POST" class="shadow p-3">
                        <div class="row">
                            <div class="col-xl-12 col-lg-5 col-md-12  col-sm-6 p-3">
                                <label for="">Designation<span class="text-danger"></span></label>
                                <input required type="text" autocomplete="off" name="designation" class="form-control" <?php if(isset($_GET['idcat'])){ ?> value="<?=$mod['designation']?>"<?php } ?> placeholder=""
                                    >
                            </div>
                        
                        
                            </div>
                        
                            <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                                <input type="submit" name="valider" class="btn btn-dark w-100" value="<?=$bouton?>">
                            </div>
                            <?php 
                                
                            ?>

                        </div>
                    </form>
        </div>
        <div class="col-6">
                <div class="col-xl- table-responsive px-3 mt-3">
                            <table class="table datatable table-sm text-center shadow">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom</th>
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
                                        <td><?=$data['designation']?></td>
                                    
                                        <td><a href='categorie.php?idcat=<?=$data['id']?>' class="btn btn-info btn-sm ">update</a>
                                            <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                                                href='models/del/del-categorie.php?iddel=<?=$data['id']?>'
                                                class="btn btn-danger btn-sm ">del</a>
                                        </td>
                                    </tr>
                            <?php }  ?>
                                </tbody>
                            </table>
                        </div>
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