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
                     else { alert(data); }
    }
  })
}











function sendRegist(){

  var username = $('#registInput_Username').val();
  var username_text = $('.registOutput_Username');

  var password1 = $('#registInput_Passwort1').val();
  var password2 = $('#registInput_Passwort2').val();
  var password_text = $('.registOutput_Passwort');

  var steam = $('#registInput_Steam').val();
  var steam_text = $('.registOutput_Steam');

  var discord = $('#registInput_Discord').val();
  var discord_text = $('.registOutput_Discord');

  var email = $('#registInput_Email').val();
  var email_text = $('.registOutput_Email');

  var rules = $('#registInput_Rules').val();

  var loader = $('.icon-spinner8');

  $.ajax({
    type: "POST",
    url: "resources/php/php_functions/regist.php",
    data: {USERNAME: username, PASSWORD_ONE: password1, PASSWORD_TWO: password2, STEAM: steam, DISCORD: discord, EMAIL: email, RULES: rules},
    success: function(data) {

      loader.addClass('loaderAKTIV');

      if (data == 1)
      {
        sendRegistEmail(username, email);
      }
      else if (data == 2)
      {
        loader.removeClass('loaderAKTIV');
        email_text.html("Diese Email ist bereits verknüpft!");
        $('#registInput_Email').addClass("InputError");
      }
      else if (data == 3)
      {
        loader.removeClass('loaderAKTIV');
        discord_text.html("Dieser Discord-Account ist bereits verknüpft!");
        $('#registInput_Discord').addClass("InputError");
      }
      else if (data == 4)
      {
        loader.removeClass('loaderAKTIV');
        steam_text.html("Dieser Steam-Account ist bereits verknüpft!");
        $('#registInput_Steam').addClass("InputError");
      }
      else if (data == 5)
      {
        loader.removeClass('loaderAKTIV');
        username_text.html(username + " ist bereits vergeben!");
        $('#registInput_Username').addClass("InputError");
      }
      else if (data == 6)
      {
        loader.removeClass('loaderAKTIV');
        password_text.html("Passwörter stimmen nicht überein!");
        $('#registInput_Passwort1').addClass("InputError");
        $('#registInput_Passwort2').addClass("InputError");
      }
      else if (data == 7)
      {
        loader.removeClass('loaderAKTIV');
      }
      else { alert(data); }
    }
  })
}

function sendRegistEmail(username, email){
  $.ajax({
    type: "POST",
    url: "resources/php/php_functions/regist_mail.php",
    data: {USERNAME: username, EMAIL: email},
    success: function(data) {
      // alert('mail geschickt');

      $('.icon-spinner8').removeClass('loaderAKTIV');
    }
  })
}
