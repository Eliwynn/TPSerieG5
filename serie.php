<?php $json = file_get_contents('JSON/series.json'); $json_data = json_decode($json,true); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TP Series</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/0ae3795648.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
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
                <div class="serieRating">
                    <a href="#" class="oneStar"><i class="far fa-star"></i></a>
                    <a href="#" class="twoStar"><i class="far fa-star"></i></a>
                    <a href="#" class="threeStar"><i class="far fa-star"></i></a>
                    <a href="#" class="fourStar"><i class="far fa-star"></i></a>
                    <a href="#" class="fiveStar"><i class="far fa-star"></i></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="#" class="setFav"><i class="far fa-heart"></i></a>
                </div>
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
        
        <script>

            var fav = "<?php echo $json_data[$_GET["s"]]["favori"] ?>";
            console.log(fav);

            if(fav = false){
                $("a.setFav").html("<i class='fas fa-heart'></i>");
            }

            if(fav = true){
                $("a.setFav").html("<i class='far fa-heart'></i>");
            }

            $(".setFav").click(function(e){
            if(fav = false){
                $("a.setFav").html("<i class='fas fa-heart'></i>");
                fav = true;
            }
            else {
                $("a.setFav").html("<i class='far fa-heart'></i>");
                fav = false;
            }
            });

            function getParameterByName( name,href )
            {
                name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
                var regexS = "[\\?&]"+name+"=([^&#]*)";
                var regex = new RegExp( regexS );
                var results = regex.exec( href );
                if( results == null )
                    return "";
                else
                    return decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            var serie = 'rating_'+getParameterByName("s", window.location.href);

            switch(localStorage.getItem(serie)){
                case "1":
                    $("a.oneStar").html("<i class='fas fa-star'></i>");
                    $("a.twoStar").html("<i class='far fa-star'></i>");
                    $("a.threeStar").html("<i class='far fa-star'></i>");
                    $("a.fourStar").html("<i class='far fa-star'></i>");
                    $("a.fiveStar").html("<i class='far fa-star'></i>");
                    break;
                case "2":
                    $("a.oneStar").html("<i class='fas fa-star'></i>");
                    $("a.twoStar").html("<i class='fas fa-star'></i>");
                    $("a.threeStar").html("<i class='far fa-star'></i>");
                    $("a.fourStar").html("<i class='far fa-star'></i>");
                    $("a.fiveStar").html("<i class='far fa-star'></i>");
                    break;
                case "3":
                    $("a.oneStar").html("<i class='fas fa-star'></i>");
                    $("a.twoStar").html("<i class='fas fa-star'></i>");
                    $("a.threeStar").html("<i class='fas fa-star'></i>");
                    $("a.fourStar").html("<i class='far fa-star'></i>");
                    $("a.fiveStar").html("<i class='far fa-star'></i>");
                    break;
                case "4":
                    $("a.oneStar").html("<i class='fas fa-star'></i>");
                    $("a.twoStar").html("<i class='fas fa-star'></i>");
                    $("a.threeStar").html("<i class='fas fa-star'></i>");
                    $("a.fourStar").html("<i class='fas fa-star'></i>");
                    $("a.fiveStar").html("<i class='far fa-star'></i>");
                    break;
                case "5":
                    $("a.oneStar").html("<i class='fas fa-star'></i>");
                    $("a.twoStar").html("<i class='fas fa-star'></i>");
                    $("a.threeStar").html("<i class='fas fa-star'></i>");
                    $("a.fourStar").html("<i class='fas fa-star'></i>");
                    $("a.fiveStar").html("<i class='fas fa-star'></i>");
                    break;
            }

            $(".oneStar").click(function(e){
                $("a.oneStar").html("<i class='fas fa-star'></i>");
                $("a.twoStar").html("<i class='far fa-star'></i>");
                $("a.threeStar").html("<i class='far fa-star'></i>");
                $("a.fourStar").html("<i class='far fa-star'></i>");
                $("a.fiveStar").html("<i class='far fa-star'></i>");
                localStorage.setItem(serie, "1");
            });

            $(".twoStar").click(function(e){
                $("a.oneStar").html("<i class='fas fa-star'></i>");
                $("a.twoStar").html("<i class='fas fa-star'></i>");
                $("a.threeStar").html("<i class='far fa-star'></i>");
                $("a.fourStar").html("<i class='far fa-star'></i>");
                $("a.fiveStar").html("<i class='far fa-star'></i>");
                localStorage.setItem(serie, "2");
            });

            $(".threeStar").click(function(e){
                $("a.oneStar").html("<i class='fas fa-star'></i>");
                $("a.twoStar").html("<i class='fas fa-star'></i>");
                $("a.threeStar").html("<i class='fas fa-star'></i>");
                $("a.fourStar").html("<i class='far fa-star'></i>");
                $("a.fiveStar").html("<i class='far fa-star'></i>");
                localStorage.setItem(serie, "3");
            });

            $(".fourStar").click(function(e){
                $("a.oneStar").html("<i class='fas fa-star'></i>");
                $("a.twoStar").html("<i class='fas fa-star'></i>");
                $("a.threeStar").html("<i class='fas fa-star'></i>");
                $("a.fourStar").html("<i class='fas fa-star'></i>");
                $("a.fiveStar").html("<i class='far fa-star'></i>");
                localStorage.setItem(serie, "4");
            });

            $(".fiveStar").click(function(e){
                $("a.oneStar").html("<i class='fas fa-star'></i>");
                $("a.twoStar").html("<i class='fas fa-star'></i>");
                $("a.threeStar").html("<i class='fas fa-star'></i>");
                $("a.fourStar").html("<i class='fas fa-star'></i>");
                $("a.fiveStar").html("<i class='fas fa-star'></i>");
                localStorage.setItem(serie, "5");
            });
        </script>
    </body>
</html>