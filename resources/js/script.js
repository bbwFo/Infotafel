

var myVar = setInterval(myTimer, 1000);
function myTimer() {
  var date = new Date();
  var liveDate = "<i class='icon-calendar1'></i> " + ("00" + date.getDate()).slice(-2) + "." + ("00" + (date.getMonth() + 1)).slice(-2) + "." + date.getFullYear() + " <i class='icon-time'></i> " + ("00" + date.getHours()).slice(-2) + ":" + ("00" + date.getMinutes()).slice(-2) + ":" + ("00" + date.getSeconds()).slice(-2);
  document.getElementById("dateandtime").innerHTML = liveDate;
}





$('.Item').dblclick(function() {
    cardID = $(this).data('card_id');
    // console.log(cardID);

    $('.Overlay').addClass('Overlay_AKTIV');

    $('#showOverlayID').html('Content-ID = ' + cardID);

    $('.Item .ItemInner:not(.Item[data-card_id=' + cardID + '] .ItemInner)').addClass('ItemDisable');
    $('.Item[data-card_id=' + cardID + '] .ItemInner').addClass('ItemScale');

});



$('.overlayCloser').click(function() {
    $('.Overlay').removeClass('Overlay_AKTIV');

    $('.Item .ItemInner:not(.Item[data-card_id=' + cardID + '] .ItemInner)').removeClass('ItemDisable');
    $('.Item[data-card_id=' + cardID + '] .ItemInner').removeClass('ItemScale');
});
