$(function () {

    $("#acticle_type option[value="+$("#acticle_type").data('select')+"]").attr('selected',true);

    var _token = $("input[name='_token']") .val();
    var photo_default=$("#photo_show").data("default");
    var photo=photo_default;//封面图片

    //编译器实例化
    $(function () {
        function initToolbarBootstrapBindings() {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                    'Times New Roman', 'Verdana'],
                fontTarget = $('[title=Font]').siblings('.dropdown-menu');
            $.each(fonts, function (idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
            });
            $('a[title]').tooltip({ container: 'body' });
            $('.dropdown-menu input').click(function () { return false; })
                .change(function () { $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle'); })
                .keydown('esc', function () { this.value = ''; $(this).change(); });

            $('[data-role=magic-overlay]').each(function () {
                var overlay = $(this), target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });
            if ("onwebkitspeechchange" in document.createElement("input")) {
                var editorOffset = $('#editor').offset();
                $('#voiceBtn').css('position', 'absolute').offset({ top: editorOffset.top, left: editorOffset.left + $('#editor').innerWidth() - 35 });
            } else {
                $('#voiceBtn').hide();
            }
        };
        function showErrorAlert(reason, detail) {
            var msg = '';
            if (reason === 'unsupported-file-type') { msg = "Unsupported format " + detail; }
            else {
                console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong>File uploads error</strong> ' + msg + ' </div>').prependTo('#alerts');
        };
        initToolbarBootstrapBindings();
        $('.wysiwyg-editor').wysiwyg({ fileUploadError: showErrorAlert });
        window.prettyPrint && prettyPrint();
    });


    ////当前状态
    //var editor_status = false;
    //var status = $("#status").val();
    //if($("#status").attr("association_status")==2){
    //    $("input,textarea").attr("disabled", "disabled");
    //    //$("#editor").attr("contenteditable", false);
    //    $(".header-title").find("h1").text("新闻详情");
    //    $(".widget-caption").text("新闻详情");
    //    $(".add_apply").text("社团认证中").attr("disabled",true);
    //    $("#photo_image").attr("disabled",true);
    //    editor_status=true;
    //}else {
    //    if (status == 1 || status == 3) {//待审核3  审核失败1
    //        $(".add_apply").text("重新发布");
    //        var public = $("#public").attr("public");
    //        $('input[name="public').eq(public).attr("checked", true);
    //        var format = $("#format").attr("format");
    //        $('input[name="format').eq(format).attr("checked", true);
    //    } else if (status != 4) {
    //        $(".caption").hide();
    //        $(".add_apply").remove();
    //        $("input,textarea").attr("disabled", "disabled");
    //        //$("#editor").attr("contenteditable", false);
    //        $(".header-title").find("h1").text("新闻详情");
    //        $(".widget-caption").text("新闻详情");
    //        editor_status=true;
    //    }
    //}

    //上传插件实例化
    $("#photo_image").fileupload({
        url: 'upload_img?_token='+_token,
        sequentialUploads: true,
    }).bind('fileuploadprogress', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $("#photo_progress").css('width',progress + '%');
        $("#photo_progress").html(progress + '%');
    }).bind('fileuploaddone', function (e, data) {
        $("#photo_show").attr("src",data.result.pic);
        photo=data.result.pic;
        $("#photo_upload").css({display:"none"});
        $("#photo_cancle").css({display:""});
    });

    //删除封面
    $("#photo_cancle").click(function(){
        $("#photo_show").attr("src",photo_default);
        $("#photo_progress").css('width','0%');
        $("#photo_progress").html('0%');
        $("#photo_upload").css({display:""});
        $("#photo_cancle").css({display:"none"});
    });


    //发布新闻
    $(".add_apply").click(function(){
        var title = $.trim($("#title").val());
        var content = $('#editor').html();
        var acticle_type = $("#acticle_type").val();
        if(title==""){
            alert_info(2,"警告","标题不能为空");
            return;
        }else if(content == ""){
            alert_info(2,"警告","内容不能为空");
            return;
        }
        var article_data = {
            name:title,
            image:photo,
            content:content,
            type:acticle_type
        }
        var url = 'add_write?_token='+_token;
        if(document.getElementById("save_article")){
            var save_article = $("#save_article").val();
            article_data.article = save_article;
            url = 'save_article?_token='+_token;
        }
        $.post(
            url,
            article_data,
            function(data){
                data = JSON.parse(data);
                if(data.msg_code == 1){
                    alert_info(1,"错误",data.msg);
                }else{
                    alert_info(0,"成功",data.msg);
                    $(".add_apply").attr("disabled",true);
                    $("#editor").attr("contenteditable", false);
                    location.href='/Admin/articles_info?article='+data.data;
                }
            }
        )
    })
});
