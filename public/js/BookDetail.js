var countermap = 0;
var map;
var marker;
$(document).ready(function(){
  //initMap();
  console.log($('#stars').val());

  $("#rateYo").rateYo({
    rating: $('#stars').val(),
    starWidth: "30px",
    ratedFill: "#16a085",
    normalFill: "#95a5a6",
    maxValue: 5,
    numStars: 5,
    precision: 1,
  });
//$('.materialboxed').materialbox();
  
  $('.maplocation').click(function(){
    var myLatLng = {lat: parseFloat($(this).find('.locationcoord').attr('latitude')),lng: parseFloat($(this).find('.locationcoord').attr('longitude'))};
    marker = new google.maps.Marker({
    position: myLatLng,
    map: map
  });
    map.setZoom(17);
    map.panTo(marker.position);
  })

  $('#BookDetailModalMap').modal({
    ready: function(){
      if (countermap==0) {
        initMap();        
      }          
        countermap = 1;
      }      
    
  })

  

})


function initMap() {
        var uluru = {lat: 18.456726, lng: -69.965195};
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: uluru
        });        
      }

function addLike(count){  
    alert(count);  
}
function logms(){
    Materialize.toast('Debe logearse para realizar esta accion', 4000);
}