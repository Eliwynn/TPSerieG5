<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TP Series</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/0ae3795648.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="headerContainer">
            <div id="logo"><a href="index.php"><img src="img/logo.png"/></a></div>
            <div id="navBar">
                <a href="#">Liste des séries</a> 
                <a href="favoris.php">Mes Favoris</a>
            </div>
            <div id="burgerNav">
                <i class="fas fa-bars"></i>
            </div>
        </div>

        <div class="serieContainer">
        <?php
        $json = file_get_contents('JSON/series.json');
        $json_data = json_decode($json,true);
        
        for($i = 0; $i < count($json_data); $i++){ ?>
            <div class="serieBloc" style="background-image: url('img/<?=$json_data[$i]["image"].'.jpg'?>')">
                <?php 
                echo '<div class="serieTitre"><a href="serie.php?s='.$i.'"><h3>'.$json_data[$i]["titre"].'</h3></a></div>';
                echo '</div>';
        } ?>
        </div>
    </body>
</html>