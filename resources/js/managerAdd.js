


// if ()
// {
//   var titel = $('input_titel').val();
//   var description = $('input_description').val();
//   var row = $('input_row').val();
//   var icon = $('input_icon').val();
//   var color = $('input_color').val();
//   var style = $('input_style').val();
//   var termin = $('input_termin').val();
//   var background = $('input_background').val();
//   var pdf = $('input_pdf').val();
//   var url = $('input_url').val();
//   var html = $('input_html').val();
//
//
//   $.ajax({
//     url: "managerAdd_Card.php",
//     type: "POST",
//     data:
//     {
//       TITEL: titel,
//       DESCRIPTION: description,
//       ROW: row,
//       ICON, icon,
//       COLOR: color,
//       STYLE: style,
//       TERMIN: termin,
//       BACKGROUND: background,
//       PDF: pdf,
//       URL: url,
//       HTML: html
//     },
//     processData: false,
//     contentType: false,
//     success: function (x)
//     {
//       console.log(x);
//     }
//   });
//
//
//
// }
// else {
//
// }

$("#formAdd").submit(function (event) {

  var formData = {
    titel: $('#input_titel').val(),
    description: $('#input_description').val(),
    row: $('#input_row').val(),
    icon: $('#input_icon').val(),
    color: $('#input_color').val(),
    style: $('#input_style').val(),
    termin: $('#input_termin').val(),
    background: $('#input_background').val(),
    pdf: $('#input_pdf').val(),
    url: $('#input_url').val(),
    html: $('#input_html').val()
  };

  $.ajax({
    type: "POST",
    url: "resources/php/managerAdd_Card.php",
    data: formData,
    dataType: "json",
    encode: true,
    processData: false,
    contentType: false
  }).done(function (data) {
    console.log(data);
  });

  console.log('hello');
  event.preventDefault();
});
