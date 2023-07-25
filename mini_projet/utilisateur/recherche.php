<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\uti_recherche.css?v=<?php echo time(); ?>">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>

<div class="header">
    <h1>Gestion des stagaires</h1>
</div>
<div class="nav-bar">
    <div class="links">
        <span>
        <a class="menu_item" href="suppression.php">Supprimer</a><a class="menu_item" href="modification.php">Modifier</a>
        <a class="menu_item" href="index.php">Ajouter</a></span>
    </div>
</div>


    <form method="post">
        <label for="nom">Name :</label>
        <input type="text" name="name" id="name" placeholder="Nom de stagaire" required>
        <label for="nom">Prenom :</label>
        <input type="text" name="pre" id="pre" placeholder="Prenom de stagaire" required><br>
        <input type="submit" value="Rechercher" name="rechercher" id="rechercher">
    </form>


    <div class="resultat">
        <h1>
    <?php
        
        if(isset($_POST["rechercher"])){
            $nom = $_POST["name"];
            $pre = $_POST["pre"];
            $fullname = $nom."_".$pre;
            // function to find the line li fih dak choix
            function findLine($filename, $search_string)
            {
                $file = fopen($filename, 'r');
                $line_number = 0;
                while(!feof($file))
                {
                    $line = fgets($file);
                    if(strpos($line, $search_string) !== FALSE)
                    {
                        return $line_number;
                        break;
                    }
                    $line_number++;
                }
                fclose($file);
                $res = "Ce stagaire n'exist pas!!";
                return $res; 
            }

            $lines = file("notes.txt");
            if (is_numeric(findLine("notes.txt", $fullname))){
                echo $lines[findLine("notes.txt", $fullname)];
            }else{
                echo $nom." ".$pre." n'exist pas";
            }
        }
    ?>
        </h1>
    </div>
</body>
</html>