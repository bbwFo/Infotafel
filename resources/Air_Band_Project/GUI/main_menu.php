<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include (".inc/head.inc.php"); ?>
    <link rel="stylesheet" href="css/main_menu.css">

    <title>AIR BAND</title>
</head>
<body>
    <video id="streamWebcam"></video>
    <div id="site_wrapper">
        <div id="container">
            <?php
                include (".inc/no_hand_alert.php");
            ?>

            <div id="mainMenuHeading">
                <!-- <img src="img/Air_Band_Logo/air_band_logo2.svg" alt="air_band_logo.svg" style="width: 40%;"> -->
                <img src="img/Air_Band_Logo/air_band_logo2.png" alt="air_band_logo.png" style="width: 40%;">
                <hr id="mainMenuHeadingHr">
            </div>

            <div id="menuMain">
                <ul>
                    <li><a id="alinkInstrumentDrums" class="handtrack_contol_element" onclick="alinkInstrumentDrumsClick()">Schlagzeug</a></li>
                    <li><a id="alinkInstrumentGuitar" class="handtrack_contol_element" onclick="alinkInstrumentGuitarClick()">Gitarre</a></li>
                    <li><a id="alinkInstrumentTheremin" class="handtrack_contol_element" onclick="alinkInstrumentThereminClick()">Theremin</a></li>
                    <div id="menuBottomContainer">
                        <!-- <hr>
                        <li><a id="alinkSettings" class="handtrack_contol_element" onclick="alinkSettingsClick()">Settings</a></li> -->
                    </div>

                </ul>
            </div>


        </div> <!-- end off container -->
        <div id="menuFooter">
            <?php include (".inc/footer.inc.php"); ?>
        </div>
    </div> <!--end of site_wrapper -->

    <!-- Load other scripts -->
    <?php 
        //include ("logic/handtrack_data_logic.php");
        include ("logic/button_class_logic.php");
    ?>
    <!-- --------------------------- -->

    <!-- when the script starts -->
    <script>
        MenuPageSelect(1);
    </script>
    <!-- ------------------- -->
</body>
</html>