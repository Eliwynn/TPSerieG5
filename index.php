<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TP Series</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="headerContainer">
            <div id="logo">Logo</div>
            <div id="navBar">Navbar</div>
        </div>

        <div class="serieContainer">
        <?php
        $json = file_get_contents('JSON/series.json');
        $json_data = json_decode($json,true);
        
        for($i = 0; $i < count($json_data); $i++){
            echo '<div class="serieBloc">';
                echo '<div class="serieTitre"><h3>'.$json_data[$i]["titre"].'</h3></div>
                    <div class="accordionContainer" id="accordion'.$i.'">
                    <div class="serieType"><h4>Type de la série</h4>'.$json_data[$i]["type"].'</div>
                    <div class="serieResume"><h4>Résumé</h4>'.$json_data[$i]["resume"].'</div>
                    <div class="listeEpisodes"><h4>Liste des épisodes</h4><br/>';
                        foreach($json_data[$i]["listeEpisodes"] as $value){
                            echo $value["numero"]." - ".$value["titre"].'<br/>';
                        }
                echo '</div>';
                echo '</div>';
                echo '<input type="button" id="plusButton'.$i.'" value="+" />';
                echo '</div>';
        }   
        ?>
        </div>
    <script src="JS/jquery-3.4.1.min.js"></script>
    <script src="JS/script.js"></script>
    </body>
</html>