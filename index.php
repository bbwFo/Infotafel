<!DOCTYPE html>
<html lang="de" dir="ltr">

  <?php include("resources/sql/dbconnect.php"); ?>

  <head>
    <meta charset="utf-8">
    <title>IT-Infotafel</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">

    <link rel="stylesheet" href="resources/css/style.css">

  </head>
  <body>

    <!-- <img class="BodyBg" id="Bg"> -->

    <div class="Frame" id="Frame">

      <div class="Nav">

        <p class="Logo"><span class="Block"></span>IT-Infotafel</p>

        <nav>
          <ul>
            <li class="active"><p id="NavBut1"><i class="icon-info_outline"></i>Information</p></li>
            <li><p id="NavBut2"><i class="icon-school"></i>Schulplan</p></li>
            <li><p id="NavBut3"><i class="icon-fastfood"></i>Essensplan</p></li>
            <li><p id="NavBut3"><i class="icon-attach_file"></i>Unterlagen</p></li>
            <li><p id="NavBut3"><i class="icon-settings"></i>Einstellungen</p></li>
          </ul>
        </nav>

      </div>

      <span class="preloader" id="preloader"><i class="icon-spinner9"></i></span>

      <!-- <?php include("resources/pages/displaysafe.php"); ?> -->

      <div class="NewsFeed">
        <div class="Date">
          <p id="dateandtime">00.00.0000 - 00:00:00</p>
        </div>

        <div class="news-ticker">
          <div class="news-ticker-contant">
            <div class="nt-item"><span class="new">Neu</span>Neu? Nur wir sind im Roleplaygeschäft Neu!</div>
            <div class="nt-item"><span class="info">Info</span>STAY HOME – PLAY SAFE AND TAME YOUR DINO!</div>
            <div class="nt-item"><span class="info">Info</span>Joine unserem Discord Server!</div>
            <div class="nt-item"><span class="server">Server</span>Der Valguero Hauptserver ist nun Online!</div>
            <div class="nt-item"><span class="update">Update</span>Updates gibt es leider noch nicht.</div>
            <div class="nt-item"><span class="news">News</span>Wustest du das Dinobabys süß sind?</div>
          </div>
        </div>
      </div>


      <!-- PAGE-CONTENT -->
      <div class="Content" id="Content"></div>

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
