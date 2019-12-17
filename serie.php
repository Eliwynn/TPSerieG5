<?php $json = file_get_contents('JSON/series.json'); $json_data = json_decode($json,true);?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TP Series</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="headerContainer">
            <div id="logo"><a href="index.php"><img src="img/logo.png"/></a></div>
            <div id="navBar">
                <a href="index.php">Liste des séries</a> 
                <a href="favoris.php">Mes Favoris</a>
            </div>
        </div>

        <div class="detailContainer">
            <div class="serieImage"><img src="img/<?=$json_data[$_GET["s"]]["image"]?>.jpg"/></div>
            <div class="detailTexte">
                <div class="serieTitre"><h3><?=$json_data[$_GET["s"]]["titre"]?></h3></div>
                <div class="serieType"><h4><?=$json_data[$_GET["s"]]["type"];?></h4></div>
                <div class="serieResume"><h4><?=$json_data[$_GET["s"]]["resume"];?></h4></div>
            </div>
            <div class="listeEpisodes"><h4>Liste des épisodes</h4><br/>
                <?php foreach($json_data[$_GET["s"]]["listeEpisodes"] as $value){ echo $value["numero"]." - ".$value["titre"].'<br/>';}?>
            </div>
        </div>

        <div class="titreRecom">Vous aimez <?=$json_data[$_GET["s"]]["titre"]?>, vous allez adorer ...</div>

        <div class="serieContainer">
        <?php
        $json = file_get_contents('JSON/series.json');
        $json_data = json_decode($json,true);
        
        for($i = 0; $i < count($json_data); $i++){ 
            if($json_data[$i]["favori"] == "false" && 
            $json_data[$i]["type"] == $json_data[$_GET["s"]]["type"] &&
            $json_data[$i]["titre"] != $json_data[$_GET["s"]]["titre"]){ ?>
                <div class="serieBloc" style="background-image: url('img/<?=$json_data[$i]["image"].'.jpg'?>')">
                <?php 
                echo '<div class="serieTitre"><a href="serie.php?s='.$i.'"><h3>'.$json_data[$i]["titre"].'</h3></a></div>';
                echo '</div>';
            }
        } ?>
        </div>
        
    </body>
</html>