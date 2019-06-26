;(function() {
    "use strict";

    var tableBody = document.querySelector("#table").querySelector("tbody");
    var modalOkButton = document.querySelector("#modal").querySelector("button[type=submit]");

    tableBody.addEventListener("click", function(evt) {
        var deleteFormId = evt.target.getAttribute("data-deleteform");
        if (typeof deleteFormId !== "undefined") {
            modalOkButton.setAttribute("form", deleteFormId);
        }
    });
})();
