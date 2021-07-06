<?php require_once('header.php');?>
<?php
require_once('config.php');
require_once('init.php');

if(!empty($_POST['recherche']))
{
    $recup = $pdo->query("SELECT * FROM employes WHERE prenom LIKE '%$_POST[recherche]%' OR nom LIKE '%$_POST[recherche]%' ");
}
else{
    $recup = $pdo->query("SELECT * FROM employes");
}
$content .= "<h1>Affichage de·s " . $recup->rowCount() . " employé·e·s</h1>";
$content .= "<table class=\"table table-bordered\"><thead class=\"thead-dark\">";
for($i=0; $i <$recup->columnCount(); $i++){
    $colonne = $recup->getColumnMeta($i);
    $content .= "<th scope=\"col\">" . $colonne['name'] . "</th>";
}
$r = $recup->fetchAll(PDO::FETCH_ASSOC);
$content .= "</thead>";
$content .= "<tbody>";
foreach($r as $employes){
    $content .= "<tr><td scope=\"col\">" . $employes['id_employes'] . "</td>";
    $content .= "<td scope=\"col\">" . $employes['prenom'] . "</td>";
    $content .= "<td scope=\"col\">" . $employes['nom'] . "</td>";
    $content .= "<td scope=\"col\">" . $employes['sexe'] . "</td>";
    $content .= "<td scope=\"col\">" . $employes['service'] . "</td>";
    $content .= "<td scope=\"col\">" . $employes['date_embauche'] . "</td>";
    $content .= "<td scope=\"col\">" . $employes['salaire'] . "</td></tr>";
}

$content .= "</tbody></table>";

// ___________________________________________________________



?>

<body>
   <div> <?= $content ?></div>
    <br>
    <form method="POST" action=""> 
     Rechercher un·e employé·e : <input type="text" name="recherche">
     <input type="SUBMIT" value="Search!"> 
     </form>
     <br>
     <div> <?= $content2 ?></div>
</body>

<?php require_once('footer.php');?>