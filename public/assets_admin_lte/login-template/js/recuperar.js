var working = false;
$('.login').on('submit', function(e) {
  e.preventDefault();
  if (working) return;
  working = true;
  $('#spinner_loading').show();

  var $this = $(this),
  $state = $this.find('button > .state');
  $this.addClass('loading');
  $state.html('Verifinado Usuario');


  $.ajax({
    dataType: "json",
   type: $(this).attr('method'),
   url: $(this).attr('action'),
                // url: "send.php",
                data: $(this).serialize(),
                beforeSend: function(){



                },

                success: function (data) {
                   console.log(data.estado);
                 if (data.estado=="correcto") {
                    $this.addClass('ok');
                     $state.html(data.mensaje);//mensaje del ajax
                         setTimeout(function() {
                           window.location.href = '/admin';
                          }, 3000);
                    
                  }else{
                      setTimeout(function() {
                    $this.addClass('false');
                          $state.html(data.mensaje);//mensaje del ajax
                          setTimeout(function() {
                            $state.html('Log in');
                            $this.removeClass('ok loading false');
                            $('#spinner_loading').hide();
                            working = false;
                          }, 3000);
                        }, 2000);

                      // $this.addClass('false');
                      //return false;
                    }
                  }
                });


/*
  setTimeout(function() {
    $this.addClass('ok');
    $state.html('Welcome back!');
    setTimeout(function() {
      $state.html('Log in');
      $this.removeClass('ok loading');
      working = false;
    }, 4000);
  }, 3000);
*/

});
