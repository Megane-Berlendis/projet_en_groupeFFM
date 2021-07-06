<?php require_once('header.php');?>
<?php

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$r = $pdo->query('SELECT * FROM employes');
$employes = $r->fetchAll(PDO::FETCH_ASSOC);
$recup = $pdo->query("SELECT * FROM employes");

if($_POST)
{
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $sexe = $_POST["sexe"];
    $service = $_POST["service"];
    $salaire = $_POST["salaire"];

            $pdo->query("INSERT INTO employes (nom, prenom, date_embauche, sexe, service, salaire) 
            VALUES ('$nom', '$prenom', NOW(),'$sexe', '$service', '$salaire')");
   echo "Vous avez été inscrit";
}

?>

<form method="POST">	
    <div>
        <label >Nom</label>
        <input type="text" name="nom" placeholder="Nom">
    
        <label >Prenom</label>
        <input type="text" name="prenom" placeholder="Prenom"></br>
    </div></br>		


    <div>
        <label >Sexe</label>
        <select name="sexe">
            <option selected value="m">Masculin</option>
            <option value="f">Feminin</option>
        </select>
    
        <label >Service</label>
        <select name="service">
            <option selected value="direction">Direction</option>
            <option value="commercial">Commercial</option>
            <option value="production">Production</option>
            <option value="secretariat">Secretariat</option>
            <option value="comptabilite">Comptabilite</option>
            <option value="informatique">Informatique</option>
            <option value="communication">Communication</option>
            <option value="juridique">Juridique</option>
            <option value="assistant">Assistant</option>
        </select>
    </div></br>

    <div>
        <label>Salaire</label>
        <input type="number" name="salaire" placeholder="Salaire">
    </div></br>  

    <div>
        <button type="submit">Valider</button>
    </div>
</form>
<?php require_once('footer.php');?>