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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            thead th, tfoot th {
            font-family: 'Rock Salt', cursive;
            }

            th {
            letter-spacing: 2px;
            }

            td {
            letter-spacing: 1px;
            }

            tbody td {
            text-align: center;
            border: solid black 1px;
            }

            thead th {
            background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
            border: 3px solid black;
            }
    </style>
</head>
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
</html>