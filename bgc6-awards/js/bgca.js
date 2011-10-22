$(document).ready(function(){
    $("#bgca-bgPopup").data("state",0);

    $("#bgca-popup, #bgca-bgPopup").click(function(){
        disablePopup();
    });

    $('.bgca-vote-form input[name="nominee"]').click(function(){
        var bgcaAward = $(this).parents('.bgca-vote-form').find('input[name="award"]').val();
        var bgcaNominee = $(this).val();
        centerPopup();
        loadPopup();
        //alert( 'uid: BGC6\nnominee: ' + bgcaNominee + '\naward: ' + bgcaAward );
        $.ajax({
           type: "POST",
           url: "http://features.oxygen.com/awards/post.php",
           data: ({
                uid: 'BGC6',
                award: bgcaAward,
                nominee: bgcaNominee
            })
         });
        return false;
    })
});

function loadPopup(){
    //loads popup only if it is disabled
    if($("#bgca-bgPopup").data("state")==0){
        $("#bgca-bgPopup").css({
            "opacity": "0.7"
        });
        $("#bgca-bgPopup").fadeIn("medium");
        $("#bgca-popup").fadeIn("medium");
        $("#bgca-bgPopup").data("state",1);
    }
}

function disablePopup(){
    if ($("#bgca-bgPopup").data("state")==1){
        $("#bgca-bgPopup").fadeOut("medium");
        $("#bgca-popup").fadeOut("medium");
        $("#bgca-bgPopup").data("state",0);
    }
}

function centerPopup(){
    var winw = $(window).width();
    var winh = $(window).height();
    var popw = 431;
    var poph = 233;
    $("#bgca-popup").css({
        "position" : "absolute",
        "top" : winh/2 - poph/2 + $(window).scrollTop(),
        "left" : winw/2 - popw/2
    });
    //IE6
    $("#bgca-bgPopup").css({
        "height": winh
    });
}

