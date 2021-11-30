<!DOCTYPE html>
<html lang="de" dir="ltr">

  <?php include("resources/php/php_functions/db.php"); ?>
  <?php include('resources/php/php_functions/functions.php'); ?>

  <head>
    <meta charset="utf-8">
    <title>IT-Infotafel</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/style.css">
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
          <iframe src="http://google.com/"></iframe>


          <?php
          // foreach (db_select_all_from("user") as $wert) {
          //
          //   echo utf8_encode($wert["username"]);?><br><br><?php
          //   echo utf8_encode($wert["password"]);?><br><br><?php
          //   echo utf8_encode($wert["var"]);?><br><br><?php
          //
          // }


          // db_update_table();

          ?>
          <input id="input1" type="text" name="" value="" placeholder="username">
          <input id="input2" type="text" name="" value="" placeholder="password">

          <button onclick="sendLogin()" type="button" name="button">login</button>


          <script type="text/javascript">

            function sendLogin(){

              var username = $('#input1').val();
              var password = $('#input2').val();

              $.ajax({
                type: "POST",
                url: "resources/php/php_functions/login.php",
                data: {USERNAME: username, PASSWORD: password},
                success: function(data) {
                  alert(data);
                }
              })
            }

          </script>




          <?php




          // echo login("RedDrake","4321");

          ?><br><br><?php

          echo regist("RedDrake1337","4321","reddke@gmail.com");

          ?><br><br><?php

          echo verify("RedDrake1337","3784-5908-4007");

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
    <script src="resources/js/bg.js"></script>
    <script src="resources/js/script.js"></script>

  </body>
</html>
