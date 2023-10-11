import Toastify from "toastify-js";
(function () {
    "use strict";
    // if have success notification then show it
    if ($("#success-notification-content").length) {
        console.log("success-notification-content");
        Toastify({
            node: $("#success-notification-content")
                .clone()
                .removeClass("hidden")[0],
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();
    }
})();