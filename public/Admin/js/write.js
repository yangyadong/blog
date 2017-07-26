$(function () {

    var ue = UE.getEditor('editor');

    $("#acticle_type option[value="+$("#acticle_type").data('select')+"]").attr('selected',true);

    var _token = $("input[name='_token']") .val();
    var photo_default=$("#photo_show").data("default");
    var photo=photo_default;//封面图片

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
        // var content = $('#editor').html();
        var content = UE.getEditor('editor').getContent();
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
