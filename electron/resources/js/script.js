





setInterval(function(){ checkInternet(); }, 3000);


function checkInternet() {
  var status = navigator.onLine;
  if (status) {

    $('.Overlay').removeClass("Overlay_AKTIV");
  }
  else {
    $('.Overlay').addClass("Overlay_AKTIV");

    var iframe = document.getElementById("mainIframe");
    iframe.src = iframe.src;

  }
}



$("#checkInternetBut").click( function() {

  // alert("dgdhdbl");

  // showNotification();

  // $('#Item' + itemID + " .ItemInner").addClass("ItemInner_AKTIV");

  $('.Overlay').addClass("Overlay_AKTIV");

  var iframe = document.getElementById("mainIframe");
  iframe.src = iframe.src;




});
