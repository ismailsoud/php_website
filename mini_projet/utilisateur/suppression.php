<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\uti_suppression.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">
    <h1>Suppression d'un stagaire</h1>
</div>    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<div class="nav-bar">
    <div class="links">
        <span>
        <a class="menu_item" href="index.php">Ajouter</a><a class="menu_item" href="modification.php">Modifier</a>
        <a class="menu_item" href="recherche.php">Rechercher</a></span>
    </div>
</div>

    <div class="dell">
        <form class="first" method="post" action="suppression.php">
            <select name="choix" id="choix">
                <?php
                    $file = fopen('notes.txt','r');
                    while(!feof($file)) {
                        $line = fgets($file);
                        $data = explode("_", $line);
                        $sorted = $data[1]." ".$data[2];
                        echo "<option value='$line' name='opt'>$sorted</option>";
                    }
                    fclose($file);
                ?>
            </select>
        <button type="submit" name="del" id="del">Supprimer</button>
        </form>
    </div>
</div>
</body>
</html>

<?php
if(isset($_POST["choix"])){
$choix = $_POST["choix"];

// copy ga3 stora men ghir li fih smya + 7yed file 9dim ou bdel smya dyal jdid
$lines = file("notes.txt");
$copy = fopen("copy.txt", "w");
foreach($lines as $line){
    if(!strstr($line, $choix)) {
        fwrite($copy, $line);
    }
}
fclose($copy);
unlink("notes.txt");
rename("copy.txt" , "notes.txt");


echo "<p class='resultat'> le stagaire :".$choix." est supprimer </p>";

}

?>