var isShown = false;
var seriesLen = 0;
$.getJSON('JSON/series.json', function(data) {         
    var series = data;
    seriesLen = series.length - 1;
});

for(var i=0; i < seriesLen; i++) {
    $("#plusButton"+i).click(function() {
        if (isShown) {
            console.log("test");
            //$(".accordionContainer").css({"display": "none"});
            //$("input.plusButton").val("+");
            isShown = false;
        }
        else {
            console.log("test");
            //$(".accordionContainer").css({"display": "initial"});
            //$("input.plusButton").val("-");
            isShown = true;
        }
    });
}

