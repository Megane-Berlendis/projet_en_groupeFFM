<?php require_once('header.php');?>

<?php
if(isset($_GET['action']) && $_GET['action'] == 'suppression'){
    $pdo->query("DELETE FROM vehicule WHERE id_vehicule = '$_GET[id_vehicule]'");
    header('Location: gestion_vehicule.php');
}
?>
<form action=""></form>

<?php require_once('footer.php');?>