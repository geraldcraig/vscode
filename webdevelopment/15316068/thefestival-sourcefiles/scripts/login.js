$(function() {
    $("#emaillogin").on("input", function() {
      var input=$(this);
      var is_name=input.val();
  
      if(is_name){
        $("#emaillogin").attr("class", "form-control is-valid overflow-auto");
      } else {
        $("#emaillogin").attr("class", "form-control is-invalid overflow-auto");
        $("#emaillogin").attr("placeholder", "email required");
      }
    });
});

$(function() {
    $("#passwordlogin").on("input", function() {
      var input=$(this);
      var is_name=input.val();
  
      if(is_name){
        $("#passwordlogin").attr("class", "form-control is-valid overflow-auto");
      } else {
        $("#passwordlogin").attr("class", "form-control is-invalid overflow-auto");
        $("#passwordlogin").attr("placeholder", "Password required");
      }
    });
});