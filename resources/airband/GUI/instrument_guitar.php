<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include (".inc/head.inc.php"); ?>
    <!-- <link rel="stylesheet" href="css/instrument_drums.css"> -->

    <title>AIR BAND | GITARRE</title>
</head>
<body>
<div id="Main">
        <div id="site_wrapper">
            <div id="container">

            <button id="backToMenu_button" class="defaultButton handtrack_contol_element" onclick="window.location.href = 'main_menu.php';">Zurück zum Instrumenten Menü</button>

            <div id="drawTableDiv">
                <video id="streamWebcam_instrument" width="640" height="480" autoplay></video>
                <canvas class="drawTable" id="canvas1" width="640" height="480" style="display: block;"></canvas>
                <canvas class="drawTable" id="canvas2" width="640" height="480" style="display: block;"></canvas>
                <canvas class="drawTable" id="canvas3" width="640" height="480" style="display: block;"></canvas>
            </div>

            <div class="color_settings_container">
                    <div class="color_settings_text" style="width: 100%;">
                        <div>Tippe auf das Webcambild um eine Farbe auszuwählen.</div>
                    </div>
                    <div class="color_settings_control_container">
                        <!-- Tracker Color Settings 1 -->
                        <div id="tracker_1_color_settings_container" class="color_settings_container_item">
                            <div>Farbe 1 (Strum)</div>
                            <div id="tracker_1_color"></div>
                            <div>
                                <div>
                                    <div>Empfindlichkeit</div>
                                    <input id="tracker_1_tolerance" type="range" value="50" max="255" min="0" step="1">
                                </div>
                            </div>
                        </div>

                        <!-- Tracker Color Settings 1 -->
                        <div id="tracker_2_color_settings_container" class="color_settings_container_item">
                            <div>Farbe 2 (Akkorde)</div>
                            <div id="tracker_2_color"></div>
                            <div class="color_settings_control">
                                <div>
                                    <div>Empfindlichkeit</div>
                                    <input id="tracker_2_tolerance" type="range" value="50" max="255" min="0" step="1">
                                </div>
                            </div>
                        </div>     
                    </div>
                </div>

                <?php
                    include ("logic/instrument_guitar_logic.php");
                    // include (".inc/instrument_settings.inc.php");
                ?>
            </div> <!-- end off container -->
        </div> <!--end of site_wrapper -->
</div> <!--end of Main -->
    
</body>
</html>
