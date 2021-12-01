function sendLogin(){

  $('#LoginForm input').removeClass("InputError");
  $('#LoginForm .massage').html("");

  var username = $('#loginInput1').val();
  var password = $('#loginInput2').val();
  $.ajax({
    type: "POST",
    url: "resources/php/php_functions/login.php",
    data: {USERNAME: username, PASSWORD: password},
    success: function(data) {
      var output = $("#loginOutput");
           if (data == 5) { output.html("Der von Ihnen eingegebene Benutzername oder das Passwort ist falsch. Bitte versuchen Sie es erneut."); }
      else if (data == 4) { output.html("Der von Ihnen eingegebene Benutzername oder das Passwort ist falsch. Bitte versuchen Sie es erneut."); }
      else if (data == 3) { output.html("Du musst dich erst verifiziren!"); }
      else if (data == 2) { output.html("Passwort ist Falsch!"); }
      else if (data == 1) { output.html("Eingeloggt!"); }
                     else { output.html("Fehler"); }
    }
  })
}

function sendVerify(){

  $('#VerifyForm input').removeClass("InputError");
  $('#VerifyForm .massage').html("");

  var username = $('#verifyInput_Username').val();
  var code = $('#verifyInput_Code').val();
  $.ajax({
    type: "POST",
    url: "resources/php/php_functions/verify.php",
    data: {USERNAME: username, CODE: code},
    success: function(data) {

      var output_all = $("#verifyOutput_All");
      var output_username = $("#registOutput_Username");
      var output_code = $("#verifyOutput_Code");

           if (data == 5) { output_all.html("Bitte fülle alle Felder aus!"); }
      else if (data == 4) { output_username.html("Benutzer existiert nicht!"); }
      else if (data == 3) { output_code.html("Der Code ist Falsch!"); }
      else if (data == 2) { output_all.html("Account bereits aktiviert!"); }
      else if (data == 1) { output_all.html("Account aktiviert!"); }
                     else { output_all.html("Fehler"); }
    }
  })
}

function sendRegist(){

  $('#RegistForm input').removeClass("InputError");
  $('#RegistForm .massage').html("");



  var username = $('#registInput_Username').val();
  var password1 = $('#registInput_Passwort1').val();
  var password2 = $('#registInput_Passwort2').val();
  var email = $('#registInput_Email').val();

  $.ajax({
    type: "POST",
    url: "resources/php/php_functions/regist.php",
    data: {USERNAME: username, PASSWORD_ONE: password1, PASSWORD_TWO: password2, EMAIL: email},
    success: function(data) {

      var output_all = $("#registOutput_All");
      var output_username = $("#registOutput_Username");
      var output_password = $("#registOutput_Passwort");
      var output_email = $("#registOutput_Email");

      if (data == 6)
      {
        output_all.html("Bitte fülle alle Felder aus!");
      }
      else if (data == 5)
      {
        output_password.html("Passwörter stimmen nicht miteinander übernander ein");
        $('#registInput_Passwort1').addClass("InputError");
        $('#registInput_Passwort2').addClass("InputError");
      }
      else if (data == 4)
      {
        output_username.html("Der Username ist bereits vergeben!");
        $('#registInput_Username').addClass("InputError");
        output_email.html("Diese Email ist bereits verknüpft!");
        $('#registInput_Email').addClass("InputError");
      }
      else if (data == 3)
      {
        output_username.html("Der Username ist bereits vergeben!");
        $('#registInput_Username').addClass("InputError");
      }
      else if (data == 2)
      {
        output_email.html("Diese Email ist bereits verknüpft!");
        $('#registInput_Email').addClass("InputError");
      }
      else if (data == 1)
      {
        output_email.html("Benuzter angelegt!");
      }
      else
      {
        output_all.html("Ein Fehler ist aufgetreten!");
      }

    }
  })
}
