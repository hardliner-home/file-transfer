$("#loginIn").val('hardliner.home@mail.ru');
$("#passwordIn").val('katya1212');

if ($(".login").text != "") {
    $user= $('.userName');
    $user.text($(".login").text());
}

$("#registration").click(function() {
    $(location).attr("href", "../client/sign_up.php");
});

$('#login').click(function(){
    $('#modal').modal('show');
});

//запрос на аунтефикацию
$("#acceptButton").click(function(){

    let login = $("#loginIn").val()
    let password = $("#passwordIn").val();

    $.ajax ({
        url : "http://localhost/123/server/api/sign_in",
        type: "POST",
        data: {login: login, password: password},
        dataType: "text", 
        success: function(require){
            let req = $.parseJSON(require);
            console.log(req.require);
            if (req.require == 'true') {
                $(location).attr("href", "../client/user.php");
            }
            else {
                console.log('сосамба');
            }
        }
    });
});


//анимация движения шапки
$(window).scroll(function() {
    if ($(window).scrollTop() > 50) {
        $('.footer').addClass('footer-scroll');
        $('.buttons .btn').addClass('btn-scroll');
        $('.footer').removeClass('footer-stay');
    }
    else {
        var footer = $('.footer');
        $('.buttons .btn').removeClass('btn-scroll');
        $('.footer').removeClass('footer-scroll')
        $('.footer').addClass('footer-stay');
    }
});
