//
// $('#upload').click(function()
// {
//   var input_titel = $('#input_titel').val();
//   var input_description = $('#input_description').val();
//   var input_row = $('#input_row').val();
//   var input_icon = $('#input_icon').val();
//   var input_color = $('#input_color').val();
//   var input_style = $('#input_style').val();
//   var input_termin = $('#input_termin').val();
//
//
//   if (input_termin != '') { input_style = 5; }
//
//
//
//
//
//
//   var fd = new FormData();
//   var files = $('#input_background')[0].files;
//
//
//   if(files.length > 0 ){
//     fd.append('file',files[0]);
//
//     $.ajax({
//       url: 'resources/php/file_upload.php',
//       type: 'post',
//       data: fd,
//       contentType: false,
//       processData: false,
//       success: function(data){
//         console.log(data);
//         upload_stuff(data);
//       }
//     });
//   }
//   else { upload_stuff(null); }
//
//
//  function upload_stuff(input_background)
//  {
//    $.ajax({
//      type: "POST",
//      url: "resources/php/upload.php",
//      data: {
//        INPUT_TITEL       : input_titel,
//        INPUT_DESCRIPTION : input_description,
//        INPUT_ROW         : input_row,
//        INPUT_ICON        : input_icon,
//        INPUT_COLOR       : input_color,
//        INPUT_STYLE       : input_style,
//        INPUT_TERMIN      : input_termin,
//        INPUT_BACKGROUND  : input_background
//      },
//      success: function(data) { console.log(data); }
//    })
//  }
//
//
//
//   // var input_background = $('#input_background').val();
//   // var input_inhalt = $('#input_inhalt').val();
//   // var input_delete = $('#input_delete').val();
//
//
//   // var background = new FormData();
//   // var input_background = $('#input_background')[0].files;
//   //
//   // background.append('file',input_background[0]);
//
//
//
// });
//
//
//
//
//
//
// $(document).ready(function(){
//
//     $("#but_upload").click(function(){
//
//         var fd = new FormData();
//         var files = $('#file')[0].files;
//
//         // Check file selected or not
//         if(files.length > 0 ){
//            fd.append('file',files[0]);
//
//            $.ajax({
//               url: 'resources/php/file_upload.php',
//               type: 'post',
//               data: fd,
//               contentType: false,
//               processData: false,
//               success: function(data){
//                  if(data != 0)
//                  {
//                     $("#test").html(data);
//
//                  }
//                  else
//                  {
//                     $("#test").html(data);
//                  }
//               },
//            });
//         }
//         else
//         {
//            $("#test").html("2");
//         }
//     });
// });
