

var myVar = setInterval(myTimer, 1000);
function myTimer() {
  var date = new Date();
  var liveDate = "<i class='icon-calendar1'></i> " + ("00" + date.getDate()).slice(-2) + "." + ("00" + (date.getMonth() + 1)).slice(-2) + "." + date.getFullYear() + " <i class='icon-time'></i> " + ("00" + date.getHours()).slice(-2) + ":" + ("00" + date.getMinutes()).slice(-2) + ":" + ("00" + date.getSeconds()).slice(-2);
  document.getElementById("dateandtime").innerHTML = liveDate;
}





$('.Item').dblclick(function() {
    cardID = $(this).data('card_id');

    $('#OverlayContentIframe').attr('src', 'overlay.php?uuid=' + cardID);

    $('.Overlay').addClass('Overlay_AKTIV');

    $('.Item .ItemInner:not(.Item[data-card_id=' + cardID + '] .ItemInner)').addClass('ItemDisable');
    $('.Item[data-card_id=' + cardID + '] .ItemInner').addClass('ItemScale');

});



$('.overlayCloser').click(function() {
    $('.Overlay').removeClass('Overlay_AKTIV');

    $('#OverlayContentIframe').attr('src', '');

    $('.Item .ItemInner:not(.Item[data-card_id=' + cardID + '] .ItemInner)').removeClass('ItemDisable');
    $('.Item[data-card_id=' + cardID + '] .ItemInner').removeClass('ItemScale');
});










setInterval(function () {
  change();
  console.log('hallo');

}, 10000);

function change()
{
  $.ajax({
    url: 'resources/php/change.php',
    type: 'post',
    dataType: 'json',
    cache: false,
    data: { trigger: 1 },
    success: function(data)
    {
      if (data.state == 'change')
      {
        $("#dataTable").load(window.location + " #Main");
        console.log(data.massage);
      }
    },
    error: function() { console.log('change() - Error'); }
  })
}
