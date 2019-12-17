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
            <div id="logo"><img src="img/logo.png"/></div>
            <div id="navBar">Navbar</div>
        </div>

        <div class="serieContainer">
        <?php
        $json = file_get_contents('JSON/series.json');
        $json_data = json_decode($json,true);
        
        for($i = 0; $i < count($json_data); $i++){ 
            if($json_data[$i]["favori"] == "true"){ ?>
                <div class="serieBloc" style="background-image: url('img/<?=$json_data[$i]["image"].'.jpg'?>')">
                <?php 
                echo '<div class="serieTitre"><a href="serie.php?s='.$i.'"><h3>'.$json_data[$i]["titre"].'</h3></a></div>';
                echo '</div>';
            }
            else {
                // Pas favori, donc rien !
            }
        } ?>
        </div>
    </body>
</html>