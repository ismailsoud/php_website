<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/menu_style.css"> -->
    <link rel="stylesheet" type="text/css" href="css/menu_style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background_image"></div>
    <div class="container">
        <form method="post" >
            <div class="first">
                <input type="text" name="nom" id="nom" class="inputs" required placeholder="admin OR user">
                <input type="password" name="pwd" id="pwd" class="inputs" required placeholder="Password">
            </div>
            <div class="secound">
                <input type="submit" value="Login" class="butt">
                <input type="reset" value="reset" class="butt">
            </div>
        </form>
    </div>
    
</body>
</html>


<?php 
session_start();
$_SESSION["position"] = 0;
if(isset($_POST["nom"]) || isset($_POST["pwd"])){
    $_SESSION["nom"] = $_POST["nom"];
    $_SESSION["pwd"] = $_POST["pwd"];
    $name = $_POST["nom"];
    $pas = $_POST["pwd"];
    if ($_POST["nom"]=="user" || $_POST["pwd"]=="user"){
        header("location:utilisateur\index.php");
    }else if($_POST["nom"]=="admin" || $_POST["pwd"]=="admin"){
        header("location:admin\index.php");
    }
} 
?>