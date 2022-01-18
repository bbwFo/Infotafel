//
//
// var myVar = setInterval(myTimer, 1000);
// function myTimer() {
//   var date = new Date();
//   var liveDate = "<i class='icon-calendar1'></i> " + ("00" + date.getDate()).slice(-2) + "." + ("00" + (date.getMonth() + 1)).slice(-2) + "." + date.getFullYear() + " <i class='icon-time'></i> " + ("00" + date.getHours()).slice(-2) + ":" + ("00" + date.getMinutes()).slice(-2) + ":" + ("00" + date.getSeconds()).slice(-2);
//   document.getElementById("dateandtime").innerHTML = liveDate;
// }
//
//




function openSite(itemID){



  console.log(itemID);

  $('#Item' + itemID).addClass("ItemFullscreen");

  var data_rang = $('#dbRang' + id).data('value');
}











$( '.map_mark' ).click(function() {


  var color = $('#colorSelect').val();

  if ($( this ).hasClass( 'map_mark_AKTIV'))
  {
    $( this ).removeClass( 'map_mark_AKTIV ' + color );
  }
  else
  {
    $( this ).addClass( 'map_mark_AKTIV ' + color);
  }

});












$( '.map_mark' ).dblclick(function() {

  var pin = $('#pinSelect').val();
  var color = $('#colorSelect').val();

  if (pin == 'home')
  {
    $( this ).prepend($('<i class="icon-' + pin + ' ' + color + '_pin"></i><div class="pin_text">Wegpunkt</div>'));
  }
  else
  {
    $( this ).prepend($('<i class="icon-' + pin + '"></i> <div class="pin_text">Wegpunkt</div>'));
  }

});





console.log($("#map").html());



function saveMap(){

  var map_save = $("#map").html();


  $.ajax({
    type: "POST",
    url: "resources/php/map.php",
    data: {MAP_SAVE: map_save},
    success: function(data) {

    }
  })
}
