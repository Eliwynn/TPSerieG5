<?php
$json = file_get_contents('JSON/series.json');
$json_data = json_decode($json,true);
?>
    <div class="serieTitre"><h3><?=$json_data[$_GET["s"]]["titre"]?></h3></div>
    <div class="serieType"><h4>Type de la série</h4><?=$json_data[$_GET["s"]]["type"];?></div>
    <div class="serieResume"><h4>Résumé</h4><?=$json_data[$_GET["s"]]["resume"];?></div>
    <div class="listeEpisodes"><h4>Liste des épisodes</h4><br/>
    <?php foreach($json_data[$_GET["s"]]["listeEpisodes"] as $value){
        echo $value["numero"]." - ".$value["titre"].'<br/>';
    }?>
    </div>