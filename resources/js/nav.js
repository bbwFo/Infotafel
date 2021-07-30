

window.onload = function() {
  ContentPage(2);
  UpdateBg(0);
  LoadMarquee();
};


function ContentPage(pageID){

  var pfad = "resources/pages/";
  var contentBox = document.getElementById("Content");
  var loader = document.getElementById("preloader");

  contentBox.style.opacity = "0";
  contentBox.style.visibility = "hidden";
  loader.style.display = "flex";

  setTimeout(function() {
    switch (pageID) {
      case 1: $('#Content').load(pfad + "info.php"); $('#Frame').scrollTop(0); setPageCookie(1); sliderUpdate(); break;
      case 2: $('#Content').load(pfad + "schulplan.php"); $('#Frame').scrollTop(0); setPageCookie(2); sliderUpdate(); break;
      case 3: $('#Content').load(pfad + "essensplan.php"); $('#Frame').scrollTop(0); setPageCookie(3); break;
      case 4: $('#Content').load(pfad + "unterlagen.php"); $('#Frame').scrollTop(0); setPageCookie(4); break;

      default: $('#Content').load(pfad + "info.php"); $('#Frame').scrollTop(0); setPageCookie(1); sliderUpdate(); break;
    }
  }, 150)

  setTimeout(function() {
    $('#Content').ready(function() {
      contentBox.style.opacity = "1";
      contentBox.style.visibility = "visible";
      loader.style.display = "none";
    });
  }, 300);

}

$('#NavBut1').click(function() {ContentPage(1);});
$('#NavBut2').click(function() {ContentPage(2);});
$('#NavBut3').click(function() {ContentPage(3);});
$('#NavBut4').click(function() {ContentPage(4);});
// $('#NavBut5').click(function() {ContentPage(5);});
// $('#NavBut6').click(function() {ContentPage(6);});
// $('#NavBut7').click(function() {ContentPage(7);});
// $('#NavBut8').click(function() {ContentPage(8);});











// Navigation

var nav = $("nav");
var line = $("<div />").addClass("line");

line.appendTo(nav);

var active = nav.find(".active");
var pos = 0;
var wid = 0;

if (active.length) {
  pos = active.position().left;
  wid = active.width();
  line.css({
    left: pos,
    width: wid
  });
}

nav.find("ul li p").click(function (e) {
  e.preventDefault();
  if (!$(this).parent().hasClass("active") && !nav.hasClass("animate")) {
    nav.addClass("animate");

    var _this = $(this);

    nav.find("ul li").removeClass("active");

    var position = _this.parent().position();
    var width = _this.parent().width();

    if (position.left >= pos) {
      line.animate(
        {
          width: position.left - pos + width
        },
        300,
        function () {
          line.animate(
            {
              width: width,
              left: position.left
            },
            150,
            function () {
              nav.removeClass("animate");
            }
          );
          _this.parent().addClass("active");
        }
      );
    } else {
      line.animate(
        {
          left: position.left,
          width: pos - position.left + wid
        },
        300,
        function () {
          line.animate(
            {
              width: width
            },
            150,
            function () {
              nav.removeClass("animate");
            }
          );
          _this.parent().addClass("active");
        }
      );
    }

    pos = position.left;
    wid = width;
  }
});

function setPageCookie(page){
  document.cookie = "currentPage="+page+";";

}
