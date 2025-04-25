<?php include("connexion/connexion.php");

$element_page=1;
$page=isset($_GET['page'])? intval($_GET['page']):1;
if($page<1)
{
    $page=1;
}
$deja=($page-1)*$element_page;
$sel=$connexion->prepare("SELECT COUNT(id) as total_element from ouvrage");
$sel->execute();

$count=$sel->fetch();
$total=$count['total_element'];

$nbre_page=ceil($total/$element_page);


if($page>$nbre_page)
{
    $page=$nbre_page;
}

$SelData=$connexion->prepare("SELECT ouvrage.*,categorie.designation as cat  from ouvrage,categorie WHERE ouvrage.categorie=categorie.id limit $deja,$element_page");
$SelData->execute();
$nobre=$SelData->rowCount();
echo " nbre= $nobre";





while($data=$SelData->fetch())
{
   echo $data['titre'];
}
if($page>1)
{
    echo '<a herf="?page='.($page-1).'">precedent</a>';
}
for($i=1;$i<=$nbre_page;$i++)
{
    $active=($i==$page)?'class="active"':'';
   
     echo '<a href="?page='.$i.'">'.$i.'</a>';
}
if($page<1)
{
    echo '<a herf="?page='.($page+1).'">suivant</a>';
}

