
$(document).ready(function(){
  $("#dataTableSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#dataTableBody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


























function openModalNEW()
{
  $('#Modal').css({'display': 'flex'});
  $('#Modal #modalbutton').attr('onclick', 'addEntry()').html('✔ Anlegen');

  $('#Modal input').val('');
  $('#Modal select').val('');
  $('#Modal textarea').val('');
}


function openModal(titel, description, row, icon, style, color, termin, html, id)
{
  $('#Modal').css({'display': 'flex'});
  $('#Modal #inputTitel').val(titel);
  $('#Modal #inputDescription').val(description);
  $('#Modal #inputRow').val(row);
  $('#Modal #inputIcon').val(icon);
  $('#Modal #inputStyle').val(style);
  $('#Modal #inputColor').val(color);
  $('#Modal #inputTermin').val(termin);
  $('#Modal #inputHtml').val(html);
  $('#Modal #modalbutton').attr('onclick', 'updateEntry(' + id + ')').html('✔ Speichern');
}

function closeModal()
{
  $('#Modal').css({'display': 'none'});
}



function openModalQandA(id)
{
  $('#ModalQandA').css({'display': 'flex'});
  $('#ModalQandA p').html('Möchtest du den Eintrag mit der ID: ' + id + ' wirklich löschen?');
  $('#ModalQandA #ModalQandAButton').attr('onclick', 'deleteEntry(' + id + ')').html('✔ Löschen');
}

function closeModalQandA()
{
  $('#ModalQandA').css({'display': 'none'});
}






function addEntry()
{
  $.ajax({
    url: 'resources/php/addEntry.php',
    type: 'post',
    dataType: 'json',
    cache: false,
    data: {
      titel: $('#inputTitel').val(),
      description: $('#inputDescription').val(),
      row: $('#inputRow').val(),
      icon: $('#inputIcon').val(),
      style: $('#inputStyle').val(),
      color: $('#inputColor').val(),
      termin: $('#inputTermin').val(),
      html: $('#inputHtml').val()
    },
    success: function(data)
    {
      if (data.state == 'done')
      {
        $("#dataTable").load(window.location + " #dataTable");
        closeModal();
      }
    },
    error: function() { console.log('addEntry() - Error'); },
    complete: function () { console.log('addEntry() - Complete'); }
  })
}


function getEntry(id)
{
  $.ajax({
    url: 'resources/php/getEntry.php',
    type: 'post',
    dataType: 'json',
    cache: false,
    data: { id: id },
    success: function(data)
    {
      if (data.state == 'done')
      {
        openModal(
          data.titel,
          data.description,
          data.row,
          data.icon,
          data.style,
          data.color,
          data.termin,
          data.html,
          data.id
        );
      }
    },
    error: function() { console.log('getEntry() - Error'); },
    complete: function () { console.log('getEntry() - Complete'); }
  })
}





function updateEntry(id)
{
  $.ajax({
    url: 'resources/php/updateEntry.php',
    type: 'post',
    dataType: 'json',
    cache: false,
    data:
    {
      id: id,
      titel: $('#inputTitel').val(),
      description: $('#inputDescription').val(),
      row: $('#inputRow').val(),
      icon: $('#inputIcon').val(),
      style: $('#inputStyle').val(),
      color: $('#inputColor').val(),
      termin: $('#inputTermin').val(),
      html: $('#inputHtml').val()
    },
    success: function(data)
    {
      console.log(data);

      if (data.state == 'done')
      {
        $("#dataTable").load(window.location + " #dataTable");
        closeModal();
      }
    },
    error: function() { console.log('updateEntry() - Error'); },
    complete: function () { console.log('updateEntry() - Complete'); }
  })
}


function deleteEntry(id)
{
  $.ajax({
    url: 'resources/php/deleteEntry.php',
    type: 'post',
    dataType: 'json',
    cache: false,
    data: { id: id },
    success: function(data)
    {
      if (data.state == 'done')
      {
        $("#dataTable").load(window.location + " #dataTable");
        closeModalQandA();
      }
    },
    error: function() { console.log('deleteEntry() - Error'); },
    complete: function () { console.log('deleteEntry() - Complete'); }
  })
}










setInterval(function () { change(); }, 10000);

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
        $("#dataTable").load(window.location + " #dataTable");
        console.log(data.massage);
      }
    },
    error: function() { console.log('change() - Error'); }
  })
}









function fileToServer(name)
{
  var fd = new FormData();
  var files = $('#inputFile')[0].files;

  if (files.length > 0)
  {
    fd.append('file', files[0]);
    fd.append('name', name);

    $.ajax({
      url: 'resources/php/fileToServer.php',
      type: 'post',
      cache: false,
      contentType: false,
      processData:false,
      data: fd,
      success: function(data)
      {
        console.log(data);
        return data;
      },
      error: function() { console.log('fileToServer() - Error'); },
      complete: function () { console.log('fileToServer() - Complete'); }
    }, 'json')
  }
  else
  {

  }
}



//
//
// var fd = new FormData();
// var files = $('#input_background')[0].files;
//
//
// if(files.length > 0 ){
//   fd.append('file',files[0]);
//
//   $.ajax({
//     url: 'resources/php/file_upload.php',
//     type: 'post',
//     data: fd,
//     contentType: false,
//     processData: false,
//     success: function(data){
//       console.log(data);
//       upload_stuff(data);
//     }
//   });
// }
