$(function() {
    $("#namesignup").on("input", function() {
      var input=$(this);
      var is_name=input.val();
      
      if(is_name){
        $("#namesignup").attr("class", "form-control is-valid overflow-auto", "value", "mark");
      } else {
        $("#namesignup").attr("class", "form-control is-invalid overflow-auto");
        $("#namesignup").attr("placeholder", "Username required");
      }
    });
});

$(function() {
    $("#emailsignup").on("input", function() {
      var input=$(this);
      var is_name=input.val();
  
      if(is_name){
        $("#emailsignup").attr("class", "form-control is-valid overflow-auto");
      } else {
        $("#emailsignup").attr("class", "form-control is-invalid overflow-auto");
        $("#emailsignup").attr("placeholder", "Email required");
      }
    });
});

$(function() {
    $("#passwordsignup").on("input", function() {
      var input=$(this);
      var is_name=input.val();
  
      if(is_name){
        $("#passwordsignup").attr("class", "form-control is-valid overflow-auto");
      } else {
        $("#passwordsignup").attr("class", "form-control is-invalid overflow-auto");
        $("#passwordsignup").attr("placeholder", "Please enter password");
      }
    });
});

$(function() {
    $("#passwordverifysignup").on("input", function() {
      var input=$(this);
      var is_name=input.val();
  
      if(is_name){
        $("#passwordverifysignup").attr("class", "form-control is-valid overflow-auto");
      } else {
        $("#passwordverifysignup").attr("class", "form-control is-invalid overflow-auto");
        $("#passwordverifysignup").attr("placeholder", "Please verify password");
      }
    });
});

  