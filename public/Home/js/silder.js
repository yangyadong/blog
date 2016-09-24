var obj=null;
var As=document.getElementById('topnav').getElementsByTagName('a');
obj = null;
for(i=0;i<As.length;i++){if(window.location.href.indexOf(As[i].href)>=0)
    obj=As[i];}
if(obj!=null){
    obj.id='topnav_current';
}

//时间格式化
function add0(m){return m<10?'0'+m:m }
function format(data) {
    var time = new Date(data);
    var y = time.getFullYear();
    var m = time.getMonth()+1;
    var d = time.getDate();
    var h = time.getHours();
    var mm = time.getMinutes();
    var s = time.getSeconds();
    return y+'-'+add0(m)+'-'+add0(d)+' '+add0(h)+':'+add0(mm)+':'+add0(s);
}

function getCookie(c_name)
{
    if (document.cookie.length>0)
    {
        var c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1)
        {
            c_start=c_start + c_name.length+1;
            var c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return "";
}

function setCookie(c_name,value,expiredays)
{
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value)+
        ((expiredays==null) ? "" : "; expires="+exdate.toGMTString());
}

/************************判断当前文章是否已点赞**************************/
function checkCookie()
{
    var title_id = $(".heart").data('content');
    var title_like=getCookie('title_like');
    var like_data = title_like.split(';');
    for(var i = 0; like_data.length; i++){
        if(like_data[i]==title_id){
            if_like(title_id);
            return;
        }
    }
}

function checkDB(){
    var title_id = $(".heart").data('content');
    db.transaction(function (trans) {
        trans.executeSql("select title from like where title=?", [title_id], function (ts, data) {
            if (data.rows.length>0) {
                if_like(title_id);
            }
        }, function (ts, message) {
        });
    });
}
/****************************end********************************/

function if_like(title_like){
    if(title_like!=null || title_like!=''){
        $(".heart").addClass("heartAnimation").attr("rel","like");
    }
}

var db=null;
function initDatabase() {
    db = getCurrentDb();//初始化数据库
    if (!db) {
        checkCookie();
        return;
    }
    db.transaction(function (trans) {//启动一个事务，并设置回调函数
        //执行创建表的Sql脚本
        trans.executeSql("CREATE TABLE IF NOT EXISTS like(title TEXT)", [], function (trans, result) {
        }, function (trans, message) {//消息的回调函数alert(message);});
        }, function (trans, result) {
        }, function (trans, message) {
        });
    })
    checkDB();
}

function getCurrentDb() {
    //打开数据库，或者直接连接数据库参数：数据库名称，版本，概述，大小
    //如果数据库不存在那么创建之
    var db = openDatabase("left_eye_title_like", "1.0", "it's to save like data!", 1024 * 1024); ;
    return db;
}
$(function () {//页面加载完成后绑定页面按钮的点击事件
    initDatabase();
});


function set_like_obj(like){
    var like_obj = getCookie('title_like');
    if(!like_obj){
        return like_obj+";"+like;
    }
    return like;
}

function add_like_obj(articles_id){
    if(!db){
        var like_obj = set_like_obj(articles_id);
        setCookie('title_like',like_obj,365);
    }else{
        db.transaction(function (trans) {
            trans.executeSql("insert into like(title) values(?) ", [articles_id], function (ts, data) {
            }, function (ts, message) {
            });
        });
    }
}