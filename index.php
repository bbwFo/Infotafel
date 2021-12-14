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











          function db_user_check_fehlversuche($USER){

            include ('resources/php/php_functions/db.php');

            $zeile = $db -> prepare("SELECT fehlversuche FROM user WHERE username = '$USER'");
            $zeile -> execute();
            $db_result = $zeile -> fetchAll();

            foreach ($db_result as $spalte) {
             $fehlversuche = $spalte["fehlversuche"];
            }

            if ($fehlversuche >= 5)
            {
              return 'Account deaktiviert';
            }
            else
            {
              $newcounter = $fehlversuche + 1;

              $update = $db -> prepare("UPDATE user SET fehlversuche = '$newcounter' WHERE username = '$USER'");
              $update -> execute();

              return $fehlversuche++;
            }
          }


          echo db_user_check_fehlversuche('pskylan');



          // db_update_table();



          // echo login("RedDrake","4321");

          ?>



          <div class="LoginForm" id="LoginForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <!-- <i class="icon-login1"></i> -->
            </div>
            <p class="info_massage"><?php echo sayhello() ?><br>Willkommen bei ARK-LIFE.NET<br>Bitte melde dich an!</p>
            <p id="loginOutput"></p>
            <input id="loginInput1" type="text" spellcheck="false" value="" placeholder="Username">
            <input id="loginInput2" type="password" spellcheck="false" value="" placeholder="Passwort">
            <label class="container">Angemeldet bleiben
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
            <button onclick="sendLogin()" type="button" name="button">Einloggen<i class="icon-arrow-right4"></i></button>
            <div class="ButtonBox">
              <p class="go_to">Verifizieren</p>
              <p class="info_massage">/</p>
              <p class="go_to">Registrieren</p>
            </div>
          </div>


          <div class="VerifyForm" id="VerifyForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <i class="icon-key"></i>
            </div>
            <p class="info_massage">Deinen Verify-Code bekommst du nach dem Aufnahmegespräch bei einem unserer Administratoren im Support unseres Discord-Servers. Bitte beachete das wir auch mal nicht erreichbar sein können!</p>
            <p class="info_massage">Solltest du dich jedoch umentschieden haben sag uns bescheid und wir löschen alle deine angegebenen Daten aus unserer Datenbank.</p>
            <p class="massage" id="verifyOutput_All"></p>
            <input id="verifyInput_Username" type="text" spellcheck="false" spellcheck="false" value="pskylan" placeholder="Username">
            <p class="massage" id="verifyOutput_Username"></p>
            <input id="verifyInput_Code" type="text" spellcheck="false" spellcheck="false" value="KDT2GT-NBZ04P-163T56" placeholder="Verify-Code">
            <p class="massage" id="verifyOutput_Code"></p>
            <div class="ButtonBox">
              <button onclick="" type="button" name="button"><i class="icon-arrow-left4"></i></button>
              <button onclick="sendVerify()" type="button" name="button">Account Verifizieren<i class="icon-arrow-right4"></i></button>
            </div>
          </div>









          <div class="RegistForm" id="RegistForm">
            <div class="Image">
              <img src="resources/img/alc.png" alt="">
              <i class="icon-user-plus"></i>
            </div>
            <i id="registLoader" class="icon-spinner8"></i>
            <p class="massage registOutput_All"></p>
            <input id="registInput_Username" type="text" spellcheck="false" value="pskylan" placeholder="Username">
            <p class="massage registOutput_Username"></p>
            <input id="registInput_Passwort1" type="password" spellcheck="false" value="1234" placeholder="Passwort">
            <input id="registInput_Passwort2" type="password" spellcheck="false" value="1234" placeholder="Passwort wiederholen">
            <p class="massage registOutput_Passwort"></p>
            <input id="registInput_Steam" type="text" spellcheck="false" value="2389745802" placeholder="Steam64-ID">
            <p class="massage registOutput_Steam"></p>
            <input id="registInput_Discord" type="text" spellcheck="false" value="84567233426787654" placeholder="Discord-Name & Tag">
            <p class="massage registOutput_Discord"></p>
            <input id="registInput_Email" type="text" spellcheck="false" value="maxmerkl.drive@gmail.com" placeholder="Email">
            <p class="massage registOutput_Email"></p>
            <label class="container">Ich habe die Regeln von ARK-LIFE.NET gelesen und stimme diesen zu.
              <input type="checkbox" checked id="registInput_Rules">
              <span class="checkmark"></span>
            </label>
            <div class="ButtonBox">
              <button onclick="" type="button" name="button"><i class="icon-arrow-left4"></i></button>
              <button onclick="sendRegist()" type="button">Weiter<i class="icon-arrow-right4"></i></button>
            </div>
          </div>






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
