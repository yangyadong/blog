function alert_info(type,title,data){
    switch (type){
        case 0:
            var that = $("#modal-success");
            show(title,data,that);
            break;
        case 1:
            var that = $("#modal-danger");
            show(title,data,that);
            break;
        case 2:
            var that = $("#modal-warning");
            show(title,data,that);
            break;
        case 3:
            var that = $("#modal-info");
            show(title,data,that);
            break;
    }
}
function show(title,data,that){
    if(that){
        that.find(".modal-title").text(title);
        that.find(".modal-body").text(data);
        that.modal('show');
        setTimeout(function(){
            that.modal('hide');
        },2000)
    }
}