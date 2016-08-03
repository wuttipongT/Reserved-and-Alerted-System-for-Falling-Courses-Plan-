/**
 * @author bed wuttipong
 */
 $(document).ready(function() {     
    $("#btn_addcourse").click(function(e) {
        ShowDialog(false,"#dialog_courses");
        e.preventDefault();
    });
    $("#btn_aca").click(function(e){
    	ShowDialog(false,"#dialog_aca")
    	e.preventDefault();
    });
     $("#btn_edu").click(function(e) {
        ShowDialog(false,"#dialog_edu");
        e.preventDefault();
    });
    $("#btn_sub").click(function(e) {
        ShowDialog(false,"#dialog_sub");
        e.preventDefault();
    });
    $("#btn_model").click(function(e) {
        ShowDialog(false,"#dialog_model");
        e.preventDefault();
    });
    $("#add-news").click(function(e) {
        ShowDialog(false,"#dialog_addnews");
        e.preventDefault();
    });
    $("button.close").click(function (e){
    	HideDialog();
    	e.preventDefault();
    });
});
function ShowDialog(model,id){
	$("#overlay").show();
	$(id).slideDown(300);
	if(model){
		$("#overlay").unbind("click");
	}else {
		$("#overlay").click(function (e){
			HideDialog();
		});
	}
}
function HideDialog(){
	$("#overlay").hide();
	$(".dialog").fadeOut();
}