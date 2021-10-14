$(document).ready(() => {
    console.log("ONLOAD : main.js");

    document.getElementById("savePage").onclick = () => {
        $('#infoContent').html('Page créer avec succès !').css({color: 'green'});

    }
})