<?php
session_start();
if(!isset($_SESSION["nom"]) || !isset($_SESSION["pwd"]) || $_SESSION["nom"]!='user' || $_SESSION["nom"]!='user'){
    header("location:../menu.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\uti_index_style.css?v=<?php echo time(); ?>">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
</head>
<body> 

<!-- <div class="disco">
        <img src="../image/dis$.png" alt="not found">
    </div> -->


<div class="header">
    <h1>Gestion des stagaires</h1>
</div>
<div class="nav-bar">
    <div class="links">
        <span>
        <a class="menu_item" href="suppression.php">Supprimer</a><a class="menu_item" href="modification.php">Modifier</a>
        <a class="menu_item" href="recherche.php">Rechercher</a></span>
    </div>
</div>

        <form class="inputs" method="post">
            <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php if(isset($_POST["but-1"]) || isset($_POST["but-2"]) || isset($_POST["but-3"]) || isset($_POST["but-4"])){echo $_SESSION["n2"];}?>" required>
            <input type="text" name="prenom" id="prenom" placeholder="Prenom" value="<?php if(isset($_POST["but-1"]) || isset($_POST["but-2"]) || isset($_POST["but-3"]) || isset($_POST["but-4"])){ echo $_SESSION["n3"];}?>" required>
            <input type="number" name="num" id="num" placeholder="numero" value="<?php if(isset($_POST["but-1"]) || isset($_POST["but-2"]) || isset($_POST["but-3"]) || isset($_POST["but-4"])){echo intval($_SESSION["n1"]);}?>" required>
            <input type="number" name="moyenne" id="moyenne" placeholder="Moyenne" value="<?php if(isset($_POST["but-1"]) || isset($_POST["but-2"]) || isset($_POST["but-3"]) || isset($_POST["but-4"])){ echo intval($_SESSION["n4"]);} ?>" required>
            <div class="sub"><button type="submit" name="add" id="add">Ajouter</button></div>  
        </form>
    <div class="log">
        <?php 
            if(isset($_POST["add"])){
                $num = $_POST["num"];
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $moyenne = $_POST["moyenne"];
                $file = fopen("notes.txt", "a");
                fwrite($file, "\n".$num."_".$nom."_".$prenom."_".$moyenne);
                fclose($file);
                echo $nom." ".$prenom." est ajouter";
            }
        ?>
    </div>
    <form action="#" method="post" class="navigation">
        <button name="but-1">⏮</button>
        <button name="but-2">◀</button>
        <button name="but-3">▶</button>
        <button name="but-4">⏭</button>
    </form>



</body>
</html>

<?php 


// count the lines in the file
$linecount = 0;
$file = fopen("notes.txt", "r");
while(!feof($file)){
    $line = fgets($file);
    $linecount++;
}
fclose($file);
$linecount -= 1;

if(isset($_POST["but-1"])) {
    $_SESSION["position"] = 0;
} else if(isset($_POST["but-2"])) {
    if($_SESSION["position"] > 1) {
        $_SESSION["position"] -= 1;
    }
} else if(isset($_POST["but-3"])) {
    if($_SESSION["position"] < $linecount) {
        $_SESSION["position"] += 1;
    }
} else if(isset($_POST["but-4"])) {
    $_SESSION["position"] = $linecount;
}

$lines = file("notes.txt");


$array = ["ifj", "oifn"];
$array[1];

$line = $lines[$_SESSION["position"]];
$data = explode("_", $line);
$_SESSION["n1"] = $data[0];
$_SESSION["n2"] = $data[1];
$_SESSION["n3"] = $data[2];
$_SESSION["n4"] = $data[3];


?>