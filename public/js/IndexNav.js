    $(window).on('load',function(){
      $('.loader').fadeOut();
    });

  $(document).ready(function(){

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $('#advancesearch-form').submit(function(){
              var tagsObject = $('#chips-div').material_chip('data');              
              $.each(tagsObject,function(i,tagsObject){
                $('<input />').attr('type', 'hidden')
                  .attr('name', "tags-search[]")
                  .attr('value', tagsObject.tag)
                  .appendTo('#advancesearch-form');
                  console.log(tagsObject.tag);
              });
              /*$('<input />').attr('type', 'hidden')
                  .attr('name', "busquedaTag")
                  .attr('value', $('#busqueda-tags').prop('checked'))
                  .appendTo('#advancesearch-form');
                  console.log(tagsObject.tag);*/
              return true;
            })
           /* $('#btn_buscar').click(function(){
              var tagsObject = $('#chips-div').material_chip('data');              
              $.each(tagsObject,function(i,tagObject){
                $('<input />').attr('type', 'hidden')
                  .attr('name', "tags-search[]")
                  .attr('value', tagObject.tag)
                  .appendTo('#search-form');
                  console.log(tagObject.tag);
              })

              $('#advancesearch-form').submit();
            })*/

            $('#btnhomesearch').click(function(){ 
                    $('#search-form').submit();
                    /*$.ajax({
                      type : 'Post',
                      data: {
                        _token: CSRF_TOKEN, 
                        tipodebusqueda: 'normal',
                        search_text: $('#input_home_search').val() 
                      },
                      url : '/FinalProject/findBooks'
                    })*/
                    /*$.post( "/FinalProject/findBooks", { 
                        _token: CSRF_TOKEN, 
                        tipodebusqueda: 'normal',
                        search_text: $('#input_home_search').val()  
                      } );*/
            });


    $('#signInbtn').click(function(){
      $('.loader').show();

      $.ajax({
      type : 'Post',
      data: {
        _token: CSRF_TOKEN, 
        usuario: $('#txtusuario').val(),
        contrasenia: $('#txtcontrasenia').val()
      },
      url : '/FinalProject/usuario/login',
      dataType: 'Json',
      success : function(data){
        if(data.message == 'success'){
          location.reload();
        }else if(data.message == 'contrasenia'){
          $('.loader').fadeOut();
          Materialize.toast('Contrasenia Incorrecta', 4000);
        }else if(data.message == 'usuario'){
          $('.loader').fadeOut();
          Materialize.toast('Usuario incorrecto o no ha sido verificado', 4000);          
        }else{
          $('.loader').fadeOut();
          Materialize.toast('Hubo un problema con el servidor', 4000);
        }            
      },
      error: function (jqXHR, exception) {
          console.log(jqXHR.responseText);
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
                    url : '/FinalProject/usuario/register',
                    dataType: 'Json',
                    success : function(data){
                      if(data.message == 'success'){
                        $('.loader').fadeOut();                        
                        Materialize.toast('Se ha enviado un correo de verificacion a ' + $('#txtcorreosignup').val(), 4000);
                      }else{
                        $('.loader').fadeOut();
                        Materialize.toast('Error al registrar al usuario ' + data.message + '. Revise su usuario o contrasenia', 4000);
                        console.log(data);
                      }
                    },
                      error: function (jqXHR, exception) {
                        console.log(jqXHR.responseText);
                      }    
                  })

          }else{
            $('.loader').fadeOut();
              Materialize.toast('Las contrasenias no son iguales', 4000);
          }

        }else{
          $('.loader').fadeOut();
          Materialize.toast('Complete todo los campos', 4000);
        }


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
  	$('#input_home_search').focus(function(){
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
  selectYears: 200,
  min:0,
  max:true, // Creates a dropdown of 15 years to control year
  format: 'yyyy-mm-dd'
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
    'Cuentos': null,
    'Novela': null,
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
