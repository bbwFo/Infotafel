






function readURL(input)
{
  if (input.files && input.files[0]) {
       var reader = new FileReader();

       reader.onload = function (e) {

           $('#ImagePrev').css('opacity','1').attr('src', e.target.result);
       };

       reader.readAsDataURL(input.files[0]);
   }
}





function closeModal()
{
  $('#ModalFrame').css({"opacity": "0", "visibility": "hidden"});
  $('#ModalFrame').load("");
}


function openEditModal(uuid)
{
  $('#ModalFrame').css({"opacity": "1", "visibility": "visible"});
  $('#ModalFrame').load("managerEdit.php?uuid=" + uuid);
}

function openAddModal()
{
  $('#ModalFrame').css({"opacity": "1", "visibility": "visible"});
  $('#ModalFrame').load("managerAdd.php");
}


function deleteCard(uuid)
{

}
