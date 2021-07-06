<?php 
require_once('header.php');
require_once('config.php');
require_once('init.php');
?>

<?php


if(!empty($_POST['supprimer'])){
    $a = $_POST['supprimer'];
    $recup = $pdo->query("SELECT * FROM employes WHERE id_employes = $a ");
    $r = $recup->fetch(PDO::FETCH_ASSOC);
        if($a == $r['id_employes']){
            $pdo->query("DELETE FROM employes WHERE id_employes = '$r[id_employes]' ");
            // echo "<script>if (confirm(\"Êtes vous sûre de vouloir supprimer l'employé·e " . $r['nom'] . " " . $r['prenom'] . " de manière définitive?\"))
            // { console.log('BANANE') ;} else { console.log('POMME') ;}</script>";
            header('location: afficher_employes.php');
        }
        else{
            echo "<div class=\"alert alert-danger\" role=\"alert\">
            L'employée numéro ". $a ." n'existent pas dans notre base de données.
          </div>";
        }
}

?>
<form action="" method='post'>
ID employé·e a supprimer: <input type="number" min="0" name="supprimer">
<input type="SUBMIT" value="Supprimer">
</form>

<?php require_once('footer.php');?>