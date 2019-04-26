    
    function get_files() {
        $.ajax ({
            url : "http://localhost/123/server/api/user/get_files",
            type: "GET",
            success: (require) => {
                if (require) {
                    let data = $.parseJSON(require);
                    let type, name, size;
    
                    for(let i = 0; i < data.file.length; i++){
                        name = data.file[i].name;
                        addFiles(name);
                    }
                }
                
            }
        }); 
    }



    function addFiles(name){
        let position = name.indexOf('.');
        let type = name.substring(position + 1);
        var $myDiv = $('<div></div>').attr({'id' : name, 'class' : 'add-file'}).appendTo(".file-container");
        $('<img>').attr({'id' : "image-" + name, 'class' : 'add-file-image', 'src' : './style/accets/user/' + getType(type) + '.png'}).appendTo($myDiv);
        $('<p></p>').attr({'id' : 'text-'+ name, 'class' : 'add-file-text'}).text(name).appendTo($myDiv);

    }

    $("document").ready(() => {
        get_files();
    });

    // controls 
    const srch_btn = $(".search-button");
    const up_btn = $('#uploadBtn');
    const down_btn = $("#dowlandBtn");
    const del_btn = $("#delBtn");

    // areas
    const srch_place = $(".search-request").val();
    const file_place = $(".file-block-content");
    const up_file = $("#fileMenu");
    // variables
    let file_names = '';

    let curElem;
    // items
    const file = $(".file");    


    function getType(type){
        if(type == 'png' || type == 'jpg') return 'image';
        if(type == 'avi'|| type == 'mkv') return 'video';
        if(type =='bat' || type == 'exe'|| type == 'js') return 'exe';
        if(type == 'txt') return 'txt';
        if(type == 'mp4') return 'musik';
        return 'unknown';
    }


    //add login
    let text = $('.login').text();
    $('.user-block p').text(text);
    $('.login').addClass('myDisplay');

    // get files


    // upload
    up_btn.off().on('click', () => {
        up_file.trigger('click', function(){
        });
    });

    $("#myForm").on('submit', function(){

        var formData = new FormData();
        var mySet = new Set();

        $.each($("#fileMenu")[0].files, function(i, file){
            mySet.add(file.name);
            formData.append("file[" + i + "]", file);
        });

        $.ajax({
            type: "POST",
            url: "http://localhost/123/server/api/user/upload",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(require){
                let data = $.parseJSON(require);
                console.log(data);
                addFiles(data.name);
            }
        });
        return false;
    });

    up_file.change(function(event){
        $('#myForm').trigger('submit');
    });

       
    
    //обводим выделеные файлы
    $(".file-container").on('click', 'div', function(){
        if(curElem == null || typeof 'curElem' == 'undefined'){
            this.classList.add('outlicneClass');
            curElem = this;
        }else{
            curElem.classList.remove('outlicneClass');
            this.classList.add('outlicneClass');
            curElem = this;
        }
    });

    //снимаем выделение если вне окна
    $(document).mouseup(function (e){ 
        var div = $(".file-container"); 
        if (!div.is(e.target) 
            && div.has(e.target).length === 0 && !$("#dowlandBtn").is(e.target) && !$("#delBtn").is(e.target)) { 
            if(curElem != null && typeof curElem != 'undefined'){
                curElem.classList.remove('outlicneClass');
                curElem = null;
            }
        }
    });
   
    down_btn.click(function(){

        if(curElem == null || typeof curElem == "undefined") return;
        let data = curElem.getAttribute("id");

        var $myDiv = $('<a></a>').attr({'href' : "../server/download.php?file=" + data,  'id' : 'idAaa', 'display' : 'none', 'downland' : data}).appendTo(".main");
        
        var myA=document.getElementById("idAaa");
        myA.click();

        curElem.classList.remove('outlicneClass');
        curElem = null;
        $myDiv.remove();
    });

    del_btn.click(function(){

        if(curElem == null || typeof curElem == "undefined") return;
        let data = curElem.getAttribute("id");

        $.ajax({
            url : "http://localhost/123/server/api/user/delete",
            type: "POST",// DELETE
            data: {file : data},
            dataType: "text",
            success: function(require){
                console.log(require);
                // get_files();
                location.reload();
                // УДАЛИТЬ ФАЙЛ С ФРОНТА ЕСЛИ SUCCESS
            }
        });  

    });

    $("#logout").click(function(){
        $.ajax ({
            url : "http://localhost/123/server/logout",
            type : "GET",
            success: function(reqire){
                location.reload();
            }
        });
    });

    $("#searchStr").on('input', function(){
        let searchWord = $("#searchStr").val();
        if(searchWord ==""){
            for($n of $("div").find(".add-file")){
                if($n.classList.contains("add-file-display")){
                    $n.classList.remove('add-file-display');
                    
                }
            }
        }
    });


    $('#searchBtn').click(function(){
        let searchWord = $("#searchStr").val();
        for($n of $("div").find(".add-file")){
            if(searchWord =="") {}
            
            if($n.getAttribute("id").indexOf(searchWord) != 0){
                $n.classList.add('add-file-display');
            }else if($n.classList.contains("add-file-display")){
                $n.classList.remove('add-file-display');
            }
        }
    });