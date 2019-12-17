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
                echo '<div class="serieTitre"><a href="serie.php?s='.$i.'"><h3>'.$json_data[$i]["titre"].'</h3></a></div>';
                echo '</div>';
        } ?>
        </div>
    </body>
</html>