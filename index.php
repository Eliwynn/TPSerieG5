<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TP Series</title>
        <link rel=¨stylesheet¨ href=¨style.css¨>
    </head>

    <body>
        <h3>TEST</h3>
        <?php
        $json = file_get_contents('JSON/series.json');
        $json_data = json_decode($json,true);
        
        for($i = 0; $i < count($json_data); $i++){
            echo '<div class="serieBloc">';
            echo '<h3>'.$json_data[$i]["titre"].'</h3>';
            echo "<br/>";
            echo '<h4>'.$json_data[$i]["type"].'</h4>';
            echo "<br/>";
            echo '<h4>'.$json_data[$i]["resume"].'</h4>';
            echo "<br/>";
            echo "<br/><h4>Liste des épisodes</h4><br/>";
            foreach($json_data[$i]["listeEpisodes"] as $value){
                echo $value["numero"]." - ".$value["titre"];
                echo '<br/>';
            }
            echo "<br/><br/>";
            echo "</div>";
        }   
        ?>
    <script src="JS/script.js"></script>
    <script src="JS/jquery-3.4.1.min.js"></script>
    </body>
</html>