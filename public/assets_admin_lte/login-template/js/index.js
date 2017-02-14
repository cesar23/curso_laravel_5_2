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
    data: $(this).serialize(),
     beforeSend: function(){



                },
              

                success: function (data) {
                  console.log(data.estado);
                  
                  if (data.estado=="correcto") {
                    $this.addClass('ok');
                    $state.html(data.mensaje);//mensaje del ajax
                    window.location.href = '/tienda/index/index';
                   //   window.location.href = '/admin/login/success';
                  } else if (data.estado=="incorrecto") {
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
                    
                  },
                  error:function(data){
                    console.log("Error no se encontro la solicitud");
                     console.log(data);
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
