// accordian arrow animation function (if button is clicked and accordian is open the arrow will point up
    // as a gesture to the user to close the accordian)
    $(function() {

        $('#h1drop',).on('click', function(e) {
          
          if($('#h1drop i').hasClass('icon-down-open')) {
            $('#arrow1.icon-down-open').attr('class', 'icon-up-open');
          } else {
            $('#arrow1.icon-up-open').attr('class', 'icon-down-open');
          }   
          });
  
          $('#h2drop',).on('click', function(e) {
          
          if($('#h2drop i').hasClass('icon-down-open')) {
            $('#arrow2.icon-down-open').attr('class', 'icon-up-open');
          } else {
            $('#arrow2.icon-up-open').attr('class', 'icon-down-open');
          }   
          });
  
          $('#h3drop',).on('click', function(e) {
          
          if($('#h3drop i').hasClass('icon-down-open')) {
            $('#arrow3.icon-down-open').attr('class', 'icon-up-open');
          } else {
            $('#arrow3.icon-up-open').attr('class', 'icon-down-open');
          }   
          });

          $('#h4drop',).on('click', function(e) {

          if($('#h4drop i').hasClass('icon-down-open')) {
            $('#arrow4.icon-down-open').attr('class', 'icon-up-open');
          } else {
            $('#arrow4.icon-up-open').attr('class', 'icon-down-open');
          }   
          });

          $('#h5drop',).on('click', function(e) {

            if($('#h5drop i').hasClass('icon-down-open')) {
              $('#arrow5.icon-down-open').attr('class', 'icon-up-open');
            } else {
              $('#arrow5.icon-up-open').attr('class', 'icon-down-open');
            }   
            });

            $('#h6drop',).on('click', function(e) {

              if($('#h6drop i').hasClass('icon-down-open')) {
                $('#arrow6.icon-down-open').attr('class', 'icon-up-open');
              } else {
                $('#arrow6.icon-up-open').attr('class', 'icon-down-open');
              }   
              });

              $('#h7drop',).on('click', function(e) {

                if($('#h7drop i').hasClass('icon-down-open')) {
                  $('#arrow7.icon-down-open').attr('class', 'icon-up-open');
                } else {
                  $('#arrow7.icon-up-open').attr('class', 'icon-down-open');
                }   
                });
       });