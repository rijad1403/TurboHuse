const lightbox = require("lightbox2");
const { trumbowyg } = require("jquery");

require("../../node_modules/bootstrap/dist/js/bootstrap");
require("../../node_modules/lightbox2/dist/js/lightbox");
require("../../node_modules/trumbowyg/dist/trumbowyg");

lightbox.option({
    'albumLabel': "Slika %1 od %2"
});


$('#body').trumbowyg();


$(document).ready(() => {
    $('#shopButton').click(() => {
        if (location.pathname === '/artikli') {
            $('#itemsHeader')[0].scrollIntoView();
        } else {
            location.pathname = '/artikli';
        }
    })
})
