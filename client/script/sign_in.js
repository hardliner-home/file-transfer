

const $accept_btn = $('#myBtnStyle');
const $al = $('.alert');
const $text = $('.alert p');


//вывод сообщения с ошибкой
function checkData(log, pass1){
    if(pass1 =="" || log == "") {
        $al.addClass('alertVisible');
        $text.text('Все поля должны быть заполненны!');
        return false;
    }
    return true;
}

$('.close').click(function(){
    $al.removeClass('alertVisible');
});


//запрос на аунтефикацию
$accept_btn.click(function(){
    let log = $('.login').val();
    let pass1 = $('.pass1').val();

    $.ajax ({
        url : "http://localhost/123/server/api/sign_in",
        type: "POST",
        data: {login: log, password: pass1},
        dataType: "text", 
        success: function(require){
            let req = $.parseJSON(require);
            console.log(req.require);
            if (req.require == 'true') {
                $(location).attr("href", "../client/user.php");
            }
            else {
                console.log(false);
            }
        }
    });
});