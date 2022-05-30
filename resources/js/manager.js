// 
//
//
//
//
//
//
//
//
//
// function addCard()
// {
//   $.ajax({
//     url: 'resources/php/managerAdd.php',
//     type: 'post',
//     dataType: 'json',
//     cache: false,
//     // encode: true,
//     // processData: false,
//     // contentType: false,
//     data:
//     {
//       titel: $('#card_titel').val(),
//       description: $('#card_description').val(),
//       row: $('#card_row').val(),
//       icon: $('#card_icon').val(),
//       color: $('#card_color').val(),
//       style: $('#card_style').val(),
//       termin: $('#card_termin').val(),
//       background: $('#card_background').val(),
//       pdf: $('#card_pdf').val(),
//       url: $('#card_url').val(),
//       html: $('#card_html').val()
//     },
//     success: function(data)
//     {
//       if (data.state == 'added')
//       {
//         location.reload('manager.php');
//       }
//       else
//       {
//         console.log(data);
//       }
//     },
//     error: function(){ console.log('addCard() - error'); }
//   })
// }
//
//
//
//
//
//
// function readURL(input)
// {
//   if (input.files && input.files[0]) {
//        var reader = new FileReader();
//
//        reader.onload = function (e) {
//
//            $('#ImagePrev').css('opacity','1').attr('src', e.target.result);
//        };
//
//        reader.readAsDataURL(input.files[0]);
//    }
// }
//
//
//
//
//
// function closeModal()
// {
//   $('#ModalFrame').css({"opacity": "0", "visibility": "hidden"});
//   $('#ModalFrame').load("");
// }
//
//
// function openEditModal(uuid)
// {
//   $('#ModalFrame').css({"opacity": "1", "visibility": "visible"});
//   $('#ModalFrame').load("managerEdit.php?uuid=" + uuid);
// }
//
// function openAddModal()
// {
//   $('#ModalFrame').css({"opacity": "1", "visibility": "visible"});
//   $('#ModalFrame').load("managerAdd.php");
// }
