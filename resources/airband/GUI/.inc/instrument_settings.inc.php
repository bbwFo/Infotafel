<form id="indexSettingsForm" onchange="$('#indexSettingsForm').submit()">
<div id="instrumentSettingsMenuSoundDiv">
    <h3>Sound</h3>
    <!-- <label id="labelInstrumentVolumeSettings">Instrument Volume</label> -->
    <img src="img/guitar-icon.svg" alt="guitar-icon.svg">
    <input id="sliderInstrumentVolume" class="settingsSlider no-handtrack-control-element" type="range" min="-50" max="0" step="1" value="0" onchange="UpdateHandtrackSettings()">
    <label id="outputInstrumentVoumeSettings"></label>
    <br>
</div>
<br>
<h3>Handtrack</h3>
<!-- <div id="handtrackSettings1"> -->
    <div class="settingsContainer1">
        <label id="labelIntervalRate">Interval-Rate</label>
        <input id="sliderIntervalRate" class="settingsSlider no-handtrack-control-element" type="range" min="0" max="200" step="1" value="5" onchange="UpdateHandtrackSettings()" >
        <label id="outputIntervalRate"></label>

        <br>

        <label id="labelScoreThreshold">Sensitivity</label>
        <input id="sliderScoreThreshold" class="settingsSlider no-handtrack-control-element" type="range" min="0.01" max="1" step="0.01" value="0.5" onchange="UpdateHandtrackSettings()">
        <label id="outputScoreThreshold"></label>

        <br>
    <!-- </div> -->

    <!-- <div class="settingsContainer2"> -->
        <label id="labelScoreIouThreshold">ioU Threshold</label>
        <input id="sliderScoreIouThreshold" class="settingsSlider no-handtrack-control-element" type="range" min="0.01" max="1" step="0.01" value="0.5" onchange="UpdateHandtrackSettings()">
        <label id="outputScoreIouThreshold"></label>

        <br>


        <label id="labelClickTimer">Click Timer</label>
        <input id="sliderClickTimer" class="settingsSlider no-handtrack-control-element" type="range" min="10" max="100" step="1" value="10" onchange="UpdateHandtrackSettings()">
        <label id="outputClickTimer"></label>
    <!-- </div> -->
</div>
<hr>
<br>

<div id="handtrackSettings2">
    <div class="settingsContainer1">
        <button id="buttonSettingsSaveCookies" class="defaultButton buttonSaveSettings handtrack_contol_element" onclick="buttonSettingsSaveCookiesClick()">Save Settings</button>
        <br><br>
        <button id="buttonResetSettings" class="defaultButton handtrack_contol_element" onclick="buttonSettingsResetSettingsClick()">Reset Settings</button>
    </div>

    <div class="settingsContainer2">
        <button id="buttonRefreshPage" class="defaultButton handtrack_contol_element" onclick="buttonRefreshPageClick()">Refresh Page</button>
        <br><br>
        <button id="buttonBackMainMenu" class="defaultButton handtrack_contol_element" onclick="buttonMainMenuClick()">Main Menu</button>
    </div>
</div>
    <button id="buttonSettingsHandtrackControl" class="defaultButton handtrack_contol_element" onclick="HandtrackControlClick()">Menu Hand Control</button>
<!-- javascript ist  in handtrack_data_logic.php -->

</form>


<script>
$('#labelClickTimer').hide();
$('#sliderClickTimer').hide();
$('#outputClickTimer').hide();
$('#buttonSettingsHandtrackControl').hide();




// Settings Menu
// Instrument Volume
function buttonSettingsInstrumentVolume1Click()
{
    document.getElementById('sliderInstrumentVolume').value = -50;
    UpdateHandtrackSettings();
}
function buttonSettingsInstrumentVolume2Click()
{
    document.getElementById('sliderInstrumentVolume').value = -25;
    UpdateHandtrackSettings();
}
function buttonSettingsInstrumentVolume3Click()
{
    document.getElementById('sliderInstrumentVolume').value = 0;
    UpdateHandtrackSettings();
}

// Score Threshold
function buttonSettingsScoreThreshold1Click()
{
    document.getElementById('sliderScoreThreshold').value = 0.25;
    UpdateHandtrackSettings();
}

function buttonSettingsScoreThreshold2Click()
{
    document.getElementById('sliderScoreThreshold').value = 0.50;
    UpdateHandtrackSettings();
}
function buttonSettingsScoreThreshold3Click()
{
    document.getElementById('sliderScoreThreshold').value = 0.75;
    UpdateHandtrackSettings();
}

// Interval Rate
function buttonSettingsIntervalRate1Click()
{
    document.getElementById('sliderIntervalRate').value = 5;
    UpdateHandtrackSettings();
    alert("Refresh the Page! Press F5");
}
function buttonSettingsIntervalRate2Click()
{
    document.getElementById('sliderIntervalRate').value = 100;
    UpdateHandtrackSettings();
    alert("Refresh the Page! Press F5");
}
function buttonSettingsIntervalRate3Click()
{
    document.getElementById('sliderIntervalRate').value = 200;
    UpdateHandtrackSettings();
    alert("Refresh the Page! Press F5");
}

// iou Threshold
function buttonSettingsIouThreshold1Click()
{
    document.getElementById('sliderScoreIouThreshold').value = 0.01;
    UpdateHandtrackSettings();
}
function buttonSettingsIouThreshold2Click()
{
    document.getElementById('sliderScoreIouThreshold').value = 0.5;
    UpdateHandtrackSettings();
}
function buttonSettingsIouThreshold3Click()
{
    document.getElementById('sliderScoreIouThreshold').value = 1;
    UpdateHandtrackSettings();
}

// Click Timer
function buttonSettingsClickTimer1Click()
{
    document.getElementById('sliderClickTimer').value = 10;
    UpdateHandtrackSettings();
}
function buttonSettingsClickTimer2Click()
{
    document.getElementById('sliderClickTimer').value = 20;
    UpdateHandtrackSettings();
}
function buttonSettingsClickTimer3Click()
{
    document.getElementById('sliderClickTimer').value = 40;
    UpdateHandtrackSettings();
}

// Save Settings
function buttonSettingsSaveCookiesClick()
{
    SaveSettings();
}

// Reset Settings
function buttonSettingsResetSettingsClick()
{
    ResetSettings();
    alert("Refresh the Page! Press F5");
}

// Refresh Page
function buttonRefreshPageClick()
{
    location.reload()
}

// Main Menu
function buttonMainMenuClick()
{
    window.location = "main_menu.php";
}

// Hand Control
function HandtrackControlClick()
{
    alert("Refresh the Page! Press F5");
    if(settings_handtrack_control == 0)
    {
        settings_handtrack_control = 1;
        button_settings_handtrack_control.hover();
    }
    else
    {
        settings_handtrack_control = 0;
        button_settings_handtrack_control.hover();
    }

    UpdateHandtrackSettings();
    HandtrackControlClick_activated();


}










<?php
    if(isset($_SESSION['settings_interval_rate'], $_SESSION['settings_score_threshold'], $_SESSION['settings_score_threshold'], $_SESSION['settings_instrument_volume'], $_SESSION['settings_handtrack_control'], $_SESSION['settings_click_timer']))
    {
        echo "document.getElementById('sliderIntervalRate').value = ".$_SESSION['settings_interval_rate'].";";
        echo "document.getElementById('sliderScoreThreshold').value = ".$_SESSION['settings_score_threshold'].";";
        echo "document.getElementById('sliderScoreIouThreshold').value = ".$_SESSION['settings_score_iouthreshold'].";";
        echo "document.getElementById('sliderInstrumentVolume').value = ".$_SESSION['settings_instrument_volume'].";";
        echo "document.getElementById('sliderClickTimer').value = ".$_SESSION['settings_click_timer'].";";
        echo "settings_handtrack_control = ".$_SESSION['settings_handtrack_control'].";";
    }
    else
    {
        echo
        "
            SetToCookieValue_settings('air_band_iouThreshold', 'sliderScoreIouThreshold', settings_score_iouthreshold, 'outputIntervalRate');
            SetToCookieValue_settings('air_band_scoreThreshold', 'sliderScoreThreshold', settings_score_threshold, 'outputScoreThreshold');
            SetToCookieValue_settings('air_band_intervalRate', 'sliderIntervalRate', settings_interval_rate, 'outputScoreThreshold');
            SetToCookieValue_settings('air_band_instrumentVolume', 'sliderInstrumentVolume', settings_instrument_volume, 'outputInstrumentVoumeSettings');
            SetToCookieValue_settings('air_band_clickTimer', 'sliderClickTimer', settings_click_timer, 'outputClickTimer');
            SetToCookieValue_variable('air_band_handtrack_control', 'settings_handtrack_control');
        ";
    }
?>


    UpdateHandtrackSettings();

    $('#indexSettingsForm').submit(function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '.inc/head.inc.php',
            data:{
                settings_interval_rate: settings_interval_rate,
                settings_score_threshold: settings_score_threshold,
                settings_score_iouthreshold: settings_score_iouthreshold,
                settings_instrument_volume: settings_instrument_volume,
                settings_handtrack_control: settings_handtrack_control,
                settings_click_timer: settings_click_timer,
            },
            success: function(data){
                //alert(settings_click_timer);
                UpdateHandtrackSettings();

            }
        });
    });
</script>
