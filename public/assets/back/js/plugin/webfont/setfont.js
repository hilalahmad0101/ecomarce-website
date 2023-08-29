"use strict";

var setFont = document.getElementById('setFont');

WebFont.load({
    google: {"families":["Open+Sans:300,400,600,700"]},
    custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: [setFont.getAttribute('data-src')]},
    active: function() {
        sessionStorage.fonts = true;
    }
});
