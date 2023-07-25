<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\uti_modifier.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>

<div class="header">
    <h1>Modification d'un stagaire</h1>
</div>
<div class="nav-bar">
    <div class="links">
        <span>
        <a class="menu_item" href="suppression.php">Supprimer</a><a class="menu_item" href="index.php">Ajouter</a>
        <a class="menu_item" href="recherche.php">Rechercher</a></span>
    </div>
</div>
    <div class="dell">
        <form class="container" method="post" action="moder.php">
            
            <div class="first">
                <label for="choix">Choisissez le stagaire que vous souhaitez modifier</label>
                <select name="choix" id="choix" required>
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
            </div>
            <div class="new">
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
                <input type="text" name="prenom" id="prenom" placeholder="Prenom" required>
                <input type="number" name="moyenne" id="moyenne" placeholder="Moyenne" required>
                <div class="sub"><button type="submit" name="add" id="add">Modifier</button></div>
            </div>
            

        </form>
    </div>
</div>
</body>
</html>