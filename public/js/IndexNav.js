

  $(document).ready(function(){
  $(window).on('load',function(){
    $('.loader').fadeOut();
  });
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $('#signInbtn').click(function(){
      $('.loader').show();

      $.ajax({
      type : 'Post',
      data: {
        _token: CSRF_TOKEN, 
        usuario: $('#txtusuario').val(),
        contrasenia: $('#txtcontrasenia').val()
      },
      url : '/usuario/login',
      dataType: 'Json',
      success : function(data){
        if(data.message == 'success'){
          window.location = './'
        }else{
          $('.loader').fadeOut();
          Materialize.toast('Error al autenticar al usuario ' + data.message + '. Revise su usuario o contrasenia', 4000, 'rounded');
        }     
      }
    })
    })
        $('#signUnbtn').click(function(){
          $('.loader').show();


          if ($('#txtusuariosignup').val()!='' && $('#txtcorreosignup').val()!='' && $('#txtrepeatpasswordsignup').val()!='' && $('#txtpasswordsignup').val()!='') {
            if($('#txtpasswordsignup').val() == $('#txtrepeatpasswordsignup').val()){

                  $.ajax({
                    type : 'Post',
                    data: {
                      _token: CSRF_TOKEN, 
                      usuario: $('#txtusuariosignup').val(),
                      correo: $('#txtcorreosignup').val(),
                      contrasenia: $('#txtpasswordsignup').val()
                    },
                    url : '/usuario/register',
                    dataType: 'Json',
                    success : function(data){
                      if(data.message == 'success'){
                        window.location = './'
                      }else{
                        $('.loader').fadeOut();
                        Materialize.toast('Error al registrar al usuario ' + data.message + '. Revise su usuario o contrasenia', 4000, 'rounded');
                        console.log(data);
                      }     
                    }
                  })

          }else{
            $('.loader').fadeOut();
              Materialize.toast('Las contrasenias no son iguales', 4000, 'rounded');
          }

        }else{
          $('.loader').fadeOut();
          Materialize.toast('Complete todo los campos', 4000, 'rounded');
        }


    })
        $('#signout_btn').click(function(){
          $('.loader').show();

      $.ajax({
      type : 'Post',
      data: {
        _token: CSRF_TOKEN 
      },
      url : '/usuario/logout',
      dataType: 'Json',
      success : function(data){
        if(data.message == 'success'){
          window.location = './'
        }else{
          $('.loader').fadeOut();
          Materialize.toast('Error al autenticar al usuario. Revise su usuario o contrasenia', 4000, 'rounded');
        }     
      }
    })
        })


    $('#homeindexbtn').click(function(){
      $('.parallax').parallax();
    });
    $('#topbooksindexbtn').click(function(){
      $('.parallax').parallax();
    });
    $('#advancesearchindexbtn').click(function(){
      $('.parallax').parallax();
    });
    $('select').material_select();
         $('.modal').modal();


  	    $('.scrollspy').scrollSpy({scrollOffset:10});

  	$(".button-collapse").sideNav();
  	$('.parallax').parallax();
  	$('#input-search').focus(function(){
  		$('#div-prueba').css('z-index','999999');
  		$('#div-prueba').css('background-color','rgba(255,255,255,0.95)');
  		$('#overlay').fadeIn(300);
  	});
	$('#overlay').click(function(e){
		$('#div-prueba').css('background-color','rgba(255,255,255,0.80)');
	    $('#overlay').fadeOut(300, function(){
	        $('#div-prueba').css('z-index','1');
	    });
	});
	var options = [
    {selector: '.categorias-body ul', offset: 0, callback: function(){
    	$('.categorias-body ul').hide();
    }},
    {selector: '.categorias-body ul', offset: 400, callback: function(){
    	$('.categorias-body ul').fadeIn();
    	Materialize.showStaggeredList(".categorias-body ul");
    }}
  ];
  Materialize.scrollFire(options);
  $('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15 // Creates a dropdown of 15 years to control year
});

  $('.chips-placeholder').material_chip({
  placeholder: '+ Tag',
  secondaryPlaceholder: 'Anadir categoria',
  autocompleteData: {
    'Thriller': null,
    'Romantica': null,
    'Aventura': null,
    'Terror': null,
    'Ficcion': null,
    'Realidad': null,
    'Ciencia Ficcion': null,
    'Investigacion': null,
    'Biografia': null,
    'Infantil': null,
    'Autoayuda': null,
    'Erotica (18+)': null,
    'Hogar': null,
    'Enciclopedia ': null,
    'Manual': null,
    'Politica': null,
    'Economia ': null,
    'Marketing': null,
    'Sociedad': null,
    'Deportes': null,
    'Viajes': null,
    'Cultura': null,
    'Satira': null,
    'Drama': null,
    'Accion': null,
    'Misterio': null,
    'Horror': null,
    'Salud': null,
    'Guias': null,
    'Religion': null,
    'Espiritualidad': null,
    'Ciencia': null,
    'Historia': null,
    'Matematicas': null,
    'Antologia': null,
    'Poesia': null,
    'Diccionario': null,
    'Comics': null,
    'Arte': null,
    'Cocina': null,
    'Diario': null,
    'Serie': null,
    'Secuela': null,
    'Trilogia': null,
    'Autobiografia': null,
    'Fantasia': null,
    'Hechos Reales': null,
    'Vivencias': null,
    'Varios': null
  }
});

  });
  $(document).scroll(function () {
    var y = $(this).scrollTop();
    var stop = $( document ).height() - 1050;
    console.log(y);

    if (y > stop) {
      $('#scroll').attr('style', 'position:relative; top: '+stop+';');
    } else {
      $('#scroll').attr('style', '');
    }

});
