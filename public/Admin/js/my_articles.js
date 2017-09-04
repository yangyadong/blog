$(function(){
    var _token = $("input[name='_token']") .val();
    var my_articles = set_data_table("my_articles");
    var articles_type = 0;//文章类型
    var articles_status = 2;//文章状态
    //表格数据dataTable化
    function set_data_table(table){
        var table = $('#'+table).DataTable({
            "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-6'p>>",
            "language": {
                "search": "",
                "sLengthMenu": "_MENU_",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
	    "ordering":false,
        });
        return table;
    }

    $(document).on("click","#seek",function(){
        articles_type = $("#grasp_type").val();
        articles_status = $("#grasp_status").val();
        $.get(
            'my_articles?_token='+_token,
            {
                status:articles_status,
                type:articles_type,
                seek:"seek"
            },
            function(data){
                data = JSON.parse(data);
                $("#my_articles").dataTable().fnClearTable();
                if(data.msg_code == 0){
                    for(i=0;i<data.data.length;i++) {
                        my_articles.row.add([
                            data.data[i]["title"],
                            data.data[i]["name"],
                            data.data[i]["image"],
                            data.data[i]["update_time"],
                            data.data[i]["operation"],
                        ]).draw();
                    }
                }else{
                    alert_info(3,"提示",data.msg);
                }
            }
        )
    })
    $(document).on("click",".text",function(){
        var that = $(this).parents("td");
        var html = that.html();
        $('#my_articles').find("tr").removeClass('selected');
        $(this).parents("tr").addClass('selected');
        var articles_id = that.find("input").attr("article_id");
        var status = that.find("input").val();
        if(status == 1){
            status = 0;//公开
        }else{
            status = 1;//私阅
        }
        bootbox.confirm("Are you sure?", function (result) {
            if (!result) {
                that.html(html);
                return;
            }else{
                $.ajax({
                    url: 'save_articles?_token='+_token,
                    type:"post",
                    data: {
                        id:articles_id,
                        status:status
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        if(data.msg_code==0) {
                            alert_info(0, "成功", data.msg);
                            if(articles_status!=2){
                                my_articles.row('.selected').remove().draw(false);
                            }else{
                                that.find("input").attr("article_id",status);
                            }
                        }else{
                            alert_info(1,"失败",data.msg);
                        }
                    }
                })
            }
        })
    })
})
