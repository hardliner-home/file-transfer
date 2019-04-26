

const $accept_btn = $('#myBtnStyle');
const $al = $('.alert');
const $text = $('.alert p');


//вывод окна с ошибкой
function checkData(log, pass1, pass2){
    if(checkStr(log)){
        $al.addClass('alertVisible');
        $text.text("Пароль или логин не должен содержать \[\$\\\^\|\?\*\+\(\)~#%{}:<>/+\"");
        return false;
    }
    if(pass1 =="" || pass2 == "" || log == "") {
        $al.addClass('alertVisible');
        $text.text('Все поля должны быть заполненны!');
        return false;
    }
    if(!(pass1 === pass2)) {
        console.log(pass1 + " " + pass2);
        $al.addClass('alertVisible');
        $text.text('Пароли не совпадают');
        return false;
    }
    return true;
}

//проверка строки на специальные символы
function checkStr(str){
    specialSim = "\[\$\\\^\|\?\*\+\(\)~#%{}:<>/+\"";
    for(let j = 0; j < specialSim.length; j++){
        for(let i = 0; i < str.length; i++){
            if((str.indexOf(specialSim[j])) != -1) return true;
        }
    }
}


$(document).mouseup(function (e){  
    if (!$al.is(e.target)) { 
        $al.removeClass('alertVisible');
    }
});

$('.close').click(function(){
    $al.removeClass('alertVisible');
});

//запрос на регистрацию
$accept_btn.click(function(){
    let log = $('.login').val();
    let pass1 = $('.pass1').val();
    let pass2 = $('.pass2').val();
    if(checkData(log, pass1, pass2)){
        $.ajax({
            url : "http://localhost/123/server/api/register",
            type: "POST",
            data: ({login: log, password: pass1}),
            dataType: "text", 
            success: function(require){
                console.log(require);
                $(location).attr("href", require);
            }
        });
    }
});
