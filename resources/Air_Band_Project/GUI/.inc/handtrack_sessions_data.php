<?php
session_start();

if(isset($_SESSION['settings_interval_rate'])){
    $settings_interval_rate = $_SESSION['settings_interval_rate'];
    //echo "<script>document.getElementById('sliderIntervalRate').value = ".$_SESSION['settings_interval_rate'].";</script>";
}else{
    $settings_interval_rate = 5;
}

if(isset($_SESSION['settings_handtrack_control'])){
    $settings_handtrack_control = $_SESSION['settings_handtrack_control'];
}else{
    $settings_handtrack_control = 1;
}

if(isset($_SESSION['settings_click_timer'])){
    $settings_click_timer = $_SESSION['settings_click_timer'];
}else{
    $settings_click_timer = 20;
}


if(isset($_POST['settings_interval_rate'])){
    $_SESSION['settings_interval_rate'] = $_POST['settings_interval_rate'];
    $settings_interval_rate = $_SESSION['settings_interval_rate'];
}
if(isset($_POST['settings_score_threshold'])){
    $_SESSION['settings_score_threshold'] = $_POST['settings_score_threshold'];
    $settings_score_threshold = $_SESSION['settings_score_threshold'];
}
if(isset($_POST['settings_score_iouthreshold'])){
    $_SESSION['settings_score_iouthreshold'] = $_POST['settings_score_iouthreshold'];
    $settings_score_iouthreshold = $_SESSION['settings_score_iouthreshold'];
}
if(isset($_POST['settings_instrument_volume'])){
    $_SESSION['settings_instrument_volume'] = $_POST['settings_instrument_volume'];
    $settings_instrument_volume = $_SESSION['settings_instrument_volume'];
}
if(isset($_POST['settings_handtrack_control'])){
    $_SESSION['settings_handtrack_control'] = $_POST['settings_handtrack_control'];
    $settings_handtrack_control = $_SESSION['settings_handtrack_control'];
}

if(isset($_POST['settings_click_timer'])){
    $_SESSION['settings_click_timer'] = $_POST['settings_click_timer'];
    $settings_click_timer = $_SESSION['settings_click_timer'];
}
//---------------------------------

// DEBUG: Alle Sessions ausgeben
if($_SESSION)
{
    foreach($_SESSION as $key=>$value) {
        echo '<script> console.log("Der Inhalt von $_SESSION[' . "'" . $key . "'" . '] ist ' .
         "'" . $value . "'" . ' ");</script>';
    }
}
else
{
    echo "<script>console.log('No SESSIONS Found');</script>";
}
//--------------------------------------

//session_destroy();
include (".inc/save_reset_settings.php"); 
include ("logic/handtrack_data_logic.php");

echo "<script>UpdateHandtrackSettings();</script>";

?>