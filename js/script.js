
var popupStatus = 0;

function loadPopup(id) {
    if(popupStatus == 0) { // if value is 0, show popup
        $("#"+id).fadeIn(0500); // fadein popup div
        $("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
        $("#backgroundPopup").fadeIn(0001);
        popupStatus = 1; // and set value to 1
    }
}

function disablePopup(id) {
    if(popupStatus == 1) { // if value is 1, close popup
        if(typeof (id) != 'undefined'){
            $("#"+id).fadeOut("normal");
        }else{
            $('.toPopup').fadeOut("normal");
        }
        $("#backgroundPopup").fadeOut("normal");
        popupStatus = 0;  // and set value to 0
    }
}