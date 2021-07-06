<?php 
require_once('header.php');
require_once('config.php');
require_once('init.php');
?>

<?php


if(!empty($_POST['supprimer'])){
    $a = $_POST['supprimer'];
    $recup = $pdo->query("SELECT * FROM employes WHERE id_employes LIKE '%$a%' ");
    $r = $recup->fetchAll(PDO::FETCH_ASSOC);
    foreach($r as $f){
        if($a == $f['id_employes']){
            $supp = $pdo->query("DELETE FROM employes WHERE id_employes = '$f[id_employes]' ");
            echo "<script>if (confirm(\"Êtes vous sûre de vouloir supprimer l'employé·e " . $f['nom'] . " " . $f['prenom'] . "?\"))
            { return " . $supp . ";}else{return FALSE}</script>";
        }
    }
}
// if(isset($_GET['action']) && $_GET['action'] == 'suppression'){
    
//     header('Location: gestion_vehicule.php');
// }
?>
<form action="post">
ID employé·e a supprimer: <input type="number" min="0" name="supprimer">
<input type="SUBMIT" value="Supprimer">
</form>

<?php require_once('footer.php');?>