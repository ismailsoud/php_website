<?php
if(!isset($_POST["choix"])){
    header('location:index.php');
}else{


$choix = $_POST["choix"];

// copy ga3 stora men ghir li fih smya + 7yed file 9dim ou bdel smya dyal jdid
$lines = file("notes.txt");
$copy = fopen("copy.txt", "w");
foreach($lines as $line){
    if(!strstr($line, $choix)){
        fwrite($copy, $line);
    }else{
        $data = explode("_", $line);
        $num = $data[0];
    }
}
fclose($copy);
unlink("notes.txt");
rename("copy.txt" , "notes.txt");
    





// Ajouter
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$moyenne = $_POST["moyenne"];
$file = fopen("notes.txt", "a");
fwrite($file, "\n".$num."_".$nom."_".$prenom."_".$moyenne);
fclose($file);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <p>
            <?php echo $nom." ".$prenom." a été modifier";?>
        </p>
    </div>
    <a href="index.php">Home</a>
</body>
</html>