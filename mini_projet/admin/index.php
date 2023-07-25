<?php 
session_start();
if(!isset($_SESSION["nom"]) || !isset($_SESSION["pwd"]) || $_SESSION["nom"]!='admin' || $_SESSION["nom"]!='admin'){
    header("location:../menu.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/admin_index.css?v=<?php echo time(); ?>"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>

<div class="header">
    <h1>Gestion des utilisateur</h1>
</div>

<form class="container" method="post">
    <input type="text" name="utili" id="utili" placeholder="utili">
    <input type="password" name="pwd" id="pwd" placeholder="Mot de pass">
    <input type="submit" name="add" value="ajouter">
</form>

</body>
</html>


<?php 

if(isset($_POST['add'])){
    $nom = $_POST["utili"];
    $pass = $_POST["pwd"];
    $file = fopen("notes.txt", "a");
    fwrite($file, "\n".$nom."_".$pass);
    fclose($file);
    echo $nom." ".$pass." est ajouter";
}
?>