$(function() {
  $('#inputGroupFile02').on('change',function(){
    //get the file name
    var fileName = $(this).val().split("\\").pop();
    //replace the "Choose a file" label
    $(this).next('label.custom-file-label').html(fileName);
  });
});
      

$(function() {
  $("#bandname").on("input", function() {
    var input=$(this);
    var is_name=input.val();
    
    if(is_name){
      $("#bandname").attr("class", "form-control is-valid overflow-auto", "value", "mark");
    } else {
      $("#bandname").attr("class", "form-control is-invalid overflow-auto");
    }
  });
});

$(function() {
  $("#emailapply").on("input", function() {
    var input=$(this);
    var is_name=input.val();

    if(is_name){
      $("#emailapply").attr("class", "form-control is-valid overflow-auto", "value", "mark");
    } else {
      $("#emailapply").attr("class", "form-control is-invalid overflow-auto");
    }
  });
});

$(function() {
  $("#bandname").on("input", function() {
    var input=$(this);
    var is_name=input.val();

    if(is_name){
      $('#bandname').attr("class", "form-control is-valid overflow-auto");
    } else {
      $('#bandname').attr("class", "form-control is-invalid overflow-auto");
      $('#bandname').attr("placeholder", "Band Name Required");
    }
  });
});
   
$(function() {
  $("#bandbio").on('input', function() {
    var input=$(this);
    var is_name=input.val();

    if(is_name){
      $("#bandbio").attr("class", "form-control is-valid overflow-auto");
    } else {
      $("#bandbio").attr("class", "form-control is-invalid overflow-auto");
      $("#bandbio").attr("placeholder", "Band Bio Required");
    }
  });
});

$(function() {
  $("#bandsite").on('input', function() {
    var input=$(this);
    var is_name=input.val();

    if(is_name){
      $("#bandsite").attr("class", "form-control is-valid overflow-auto");
    } else {
      $("#bandsite").attr("class", "form-control is-invalid overflow-auto");
      $("#bandsite").attr("placeholder", "Band Website required");
    }
  });
});

$(function() {
  $("#bandvideo").on('input', function() {
    var input=$(this);
    var is_name=input.val();

    if(is_name){
      $("#bandvideo").attr("class", "form-control is-valid overflow-auto");
      $("#bandvideo").attr("required", true);
    } else {
      $("#bandvideo").attr("class", "form-control is-invalid overflow-auto");
      $("#bandvideo").attr("placeholder", "Band Video Required");
      $("#bandvideo").attr("required", true); 
    }
  });
});