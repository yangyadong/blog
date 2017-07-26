$(function(){
    var ue = UE.getEditor('editor');
    $('.date-picker').datepicker();

    var diplomas = $("#diplomas").attr("diplomas");
    for(var i=0;i<$("#diplomas").find("option").length;i++) {
        if (diplomas == $("#diplomas").find("option").eq(i).text()) {
            $("#diplomas").find("option").eq(i).attr("selected", true);
            break;
        }
    }

    var sex = $("#sex").attr("sex");
    $("input[type='radio'][name=sex][value="+sex+"]").attr("checked",true);

    var data = {};
    $(".add_apply").click(function(){
        data.name = $("#name").val();
        data.signature = $("#signature").val();
        data.diplomas = $("#diplomas").text();
        data.school = $("#school").val();
        data.phone = $("#phone").val();
        data.email = $("#email").val();
        data.birthplace = $("#birthplace").val();
        data.location = $("#location").val();
        // data.explain = $("#explain").val();
        data.explain = UE.getEditor('editor').getContent();

        if(!data.name || !data.signature || !data.diplomas || !data.school || !data.phone || !data.email || !data.birthplace || !data.location || !data.explain){
            alert_info(2,"警告","信息不完善");
            return false;
        }
    })
})
