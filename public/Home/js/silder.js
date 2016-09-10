var obj=null;
var As=document.getElementById('topnav').getElementsByTagName('a');
obj = null;
for(i=0;i<As.length;i++){if(window.location.href.indexOf(As[i].href)>=0)
obj=As[i];}
obj.id='topnav_current'

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