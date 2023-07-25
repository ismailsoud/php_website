<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index_style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="first"></div>
        <div class="visit"> 
            <span>
            <?php 
                $file = fopen("visits.txt", "r");
                echo fgets($file);
                if (isset($_POST['visit'])){
                    session_start();
                    $file = fopen("visits.txt", "w");
                    $_SESSION['v']++;
                    $visit = $_SESSION['v'];
                    fwrite($file, $visit);
                    header("location:menu.php");
                }
            ?>
            </span>
        </div>
        <div class="pp"><span>total visits</span></div>
        <div class="last"></div>
    </div>
    <form method="post" >
        <input type="submit" name="visit" value="ENTRER" class="enter">
    </form>

</body>
</html>







