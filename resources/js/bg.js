
function UpdateBg(backgroundID){

  if(backgroundID == 0) {
    var pfad = "resources/img/bg/";
    var items = new Array(
      "blueprint.png"
    );
    var max = items.length;
    var random = Math.floor(Math.random() * max);
    var item = items[random];
    var img = pfad + item;
    $("#Bg").attr("src", img);
  }

}
