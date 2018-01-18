/*global $ */
(function () {
    "use strict";
    // var loadedData = $.get("recipes.json");
    var recipes = [];
    $.get("recipes.json", function (theRecipes) {
        recipes = theRecipes;
    });
    var namePlace = $("#name");

    $("#submit").click(function () {


        recipes.forEach(function (recipe) {
            if (recipe.name === ":checked".val()) {
                namePlace.text(recipe.name);
            }
        });

        /*}).fail(function (xhr, statusCode, statusText) {
            div.text("error: " + statusText);
        });*/



    });
}());