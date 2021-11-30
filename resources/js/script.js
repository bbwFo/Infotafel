

var myVar = setInterval(myTimer, 1000);
function myTimer() {
  var date = new Date();
  var liveDate = "<i class='icon-calendar1'></i> " + ("00" + date.getDate()).slice(-2) + "." + ("00" + (date.getMonth() + 1)).slice(-2) + "." + date.getFullYear() + " <i class='icon-time'></i> " + ("00" + date.getHours()).slice(-2) + ":" + ("00" + date.getMinutes()).slice(-2) + ":" + ("00" + date.getSeconds()).slice(-2);
  document.getElementById("dateandtime").innerHTML = liveDate;
}






function openSite(itemID){



  console.log(itemID);

  $('#Item' + itemID).addClass("ItemFullscreen");

  var data_rang = $('#dbRang' + id).data('value');
}
