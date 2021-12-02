<!DOCTYPE html>
<html lang="de" dir="ltr">

  <?php include("resources/php/php_functions/db.php"); ?>
  <?php include('resources/php/php_functions/functions.php'); ?>

  <head>
    <meta charset="utf-8">
    <title>IT-Infotafel</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/php_functions.css">
  </head>
  <body>

    <?php include("resources/php/db.php"); ?>

    <!-- <img class="BodyBg" id="Bg"> -->

    <div class="Frame" id="Frame">

      <div class="Nav">
        <p class="Logo"><span class="Block"></span>IT-Infotafel</p>

        <p class="dateandtime" id="dateandtime"></p>

      </div>

      <!-- <span class="preloader" id="preloader"><i class="icon-spinner9"></i></span> -->





      <!-- PAGE-CONTENT -->
      <div class="Content" id="Content">



        <!-- <div class="Preloader">
          <span id="preloader"><i class="icon-spinner2 loader"></i><i class="icon-hipster2 middle"></i></span>
        </div> -->


        <div class="BigSite">
          <!-- <iframe src="http://localhost/arklifenet/mediadrake/"></iframe> -->


          <?php
          // foreach (db_select_all_from("user") as $wert) {
          //
          //   echo utf8_encode($wert["username"]);?><br><br><?php
          //   echo utf8_encode($wert["password"]);?><br><br><?php
          //   echo utf8_encode($wert["var"]);?><br><br><?php
          //
          // }



          start_global_session("askylan");


          // db_update_table();

          ?>







          <div class="LoginForm" id="LoginForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <!-- <i class="icon-login1"></i> -->
            </div>
            <p class="info_massage"><?php echo sayhello() ?><br>Willkommen bei ARK-LIFE.NET<br>Bitte melde dich an!</p>
            <p id="loginOutput"></p>
            <input id="loginInput1" type="text" value="" placeholder="Username">
            <input id="loginInput2" type="password" value="" placeholder="Passwort">
            <button onclick="sendLogin()" type="button" name="button">Einloggen<i class="icon-arrow-right4"></i></button>
          </div>


          <?php echo $_SESSION['coins'] ?>
          <?php echo $_SESSION['diamonds'] ?>
          <?php echo $_SESSION['username'] ?>

          <?php echo session_name() ?>



          <div class="VerifyForm" id="VerifyForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <i class="icon-key"></i>
            </div>
            <p class="info_massage">Deinen Verify-Code bekommst du nach dem Aufnahmegespräch bei einem unserer Administratoren im Support unseres Discord-Servers. Bitte beachete das wir auch mal nicht erreichbar sein können!</p>
            <p class="info_massage">Solltest du dich jedoch umentschieden haben sag uns bescheid und wir löschen alle deine angegebenen Daten aus unserer Datenbank.</p>
            <p class="massage" id="verifyOutput_All"></p>
            <input id="verifyInput_Username" type="text" value="" placeholder="Username">
            <p class="massage" id="verifyOutput_Username"></p>
            <input id="verifyInput_Code" type="text" value="" placeholder="Verify-Code">
            <p class="massage" id="verifyOutput_Code"></p>
            <button onclick="sendVerify()" type="button" name="button">Account Verifizieren<i class="icon-arrow-right4"></i></button>
          </div>


          <?php

            // echo EchoPlayerName("76561198936641063");



          ?>



          <div class="RegistForm" id="RegistForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <i class="icon-user-plus"></i>
            </div>
            <p class="massage" id="registOutput_All"></p>
            <input id="registInput_Username" type="text" value="" placeholder="Username">
            <p class="massage" id="registOutput_Username"></p>
            <input id="registInput_Passwort1" type="password" value="" placeholder="Passwort">
            <input id="registInput_Passwort2" type="password" value="" placeholder="Passwort wiederholen">
            <p class="massage" id="registOutput_Passwort"></p>

            <input id="registInput_Steam" type="text" value="" placeholder="Steam64-ID">
            <p class="massage" id="registOutput_Steam"></p>

            <input id="registInput_Discord" type="text" value="" placeholder="Discord-Name & Tag">
            <p class="massage" id="registOutput_Discord"></p>

            <input id="registInput_Email" type="text" value="" placeholder="Email">
            <p class="massage" id="registOutput_Email"></p>
            <button onclick="sendRegist()" type="button">Weiter<i class="icon-arrow-right4"></i></button>
            <!-- <i id="registLoader" class="icon-spinner8"></i> -->
          </div>


          <div class="RegistForm" id="RegistForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <i class="icon-user-check"></i>
            </div>
            <p class="info_massage">Bitte überprüfe nochmal deine angaben befor der spaß los geht.</p>
            <p class="info_massage">Dein ALC-Username: <br>- Askylan#1337</p>
            <p class="info_massage">Dein Steam-Username:<br>- Askylan</p>
            <p class="info_massage">Dein Discord-Username:<br>- Askylan</p>
            <p class="info_massage">Deine Email-Adresse: <br>- askylan@gmail.com</p>
            <button onclick="" type="button">Registrieren<i class="icon-arrow-right4"></i></button>
            <button onclick="" type="button">Zurück<i class="icon-arrow-right4"></i></button>
          </div>




          <?php




          // echo login("RedDrake","4321");

          ?><br><br><?php

          // echo regist("RedDrake1337","4321","reddke@gmail.com");

          ?><br><br><?php

          // echo verify("RedDrake1337","3784-5908-4007");

          // echo regist_mail("askylan");

          // if (login("askylan","1234") == 1) {
          //   echo "string";
          // }

          ?>

          <br><br><br>








        </div>


        <?php include ('resources/blueprints/sliders.php.php'); ?>








    </div>

    <!-- Sriptgedöns -->
    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/nav.js"></script>
    <script src="resources/js/slick.min.js"></script>
    <script src="resources/js/slick.conf.js"></script>
    <script src="resources/js/marquee.js"></script>
    <script src="resources/js/script.js"></script>
    <script src="resources/php/php_functions/php_action.js"></script>

  </body>
</html>
