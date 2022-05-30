<form id="indexSettingsForm" onchange="$('#indexSettingsForm').submit()">
<div id="instrumentSettingsMenuSoundDiv">
    <h3>Sound</h3>
    <!-- <label id="labelInstrumentVolumeSettings">Instrument Volume</label> -->
    <img src="img/guitar-icon.svg" alt="guitar-icon.svg">
    <input id="sliderInstrumentVolume" class="settingsSlider no-handtrack-control-element" type="range" min="-50" max="0" step="1" value="0" onchange="UpdateHandtrackSettings()">
    <label id="outputInstrumentVoumeSettings"></label>

    <br class="only-handtrack-control-element">
    <button id="buttonSettingsInstrumentVolume1" class="defaultButton only-handtrack-control-element" value="0" onclick="buttonSettingsInstrumentVolume1Click()" style="width: 50px">0</button>
    <button id="buttonSettingsInstrumentVolume2" class="defaultButton only-handtrack-control-element" value="25" onclick="buttonSettingsInstrumentVolume2Click()" style="width: 50px">25</button>
    <button id="buttonSettingsInstrumentVolume3" class="defaultButton only-handtrack-control-element" value="50" onclick="buttonSettingsInstrumentVolume3Click()" style="width: 50px">50</button>
    <br>
</div>
<br>
<h3>Handtrack</h3>
<div id="handtrackSettings1">
    <div class="settingsContainer1">
        <label id="labelIntervalRate">Interval-Rate</label>
        <input id="sliderIntervalRate" class="settingsSlider no-handtrack-control-element" type="range" min="0" max="200" step="1" value="5" onchange="UpdateHandtrackSettings()">
        <label id="outputIntervalRate"></label>

        <br class="only-handtrack-control-element">
        <button id="buttonSettingsIntervalRate1" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsIntervalRate1Click()" style="width: 50px">5</button>
        <button id="buttonSettingsIntervalRate2" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsIntervalRate2Click()" style="width: 50px">100</button>
        <button id="buttonSettingsIntervalRate3" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsIntervalRate3Click()" style="width: 50px">200</button>
        <br class="only-handtrack-control-element">
        <br>


        <label id="labelScoreThreshold">Sensitivity</label>
        <input id="sliderScoreThreshold" class="settingsSlider no-handtrack-control-element" type="range" min="0.01" max="1" step="0.01" value="0.5" onchange="UpdateHandtrackSettings()">
        <label id="outputScoreThreshold"></label>

        <br class="only-handtrack-control-element">
        <button id="buttonSettingsScoreThreshold1" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsScoreThreshold1Click()" style="width: 50px">25%</button>
        <button id="buttonSettingsScoreThreshold2" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsScoreThreshold2Click()" style="width: 50px">50%</button>
        <button id="buttonSettingsScoreThreshold3" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsScoreThreshold3Click()" style="width: 50px">75%</button>
        <!-- <br class="only-handtrack-control-element"> -->
        <br>
    </div>

    <div class="settingsContainer2">
        <label id="labelScoreIouThreshold">ioU Threshold</label>
        <input id="sliderScoreIouThreshold" class="settingsSlider no-handtrack-control-element" type="range" min="0.01" max="1" step="0.01" value="0.5" onchange="UpdateHandtrackSettings()">
        <label id="outputScoreIouThreshold"></label>

        <br class="only-handtrack-control-element">
        <button id="buttonSettingsIouThreshold1" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsIouThreshold1Click()" style="width: 50px">0.01</button>
        <button id="buttonSettingsIouThreshold2" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsIouThreshold2Click()" style="width: 50px">0.5</button>
        <button id="buttonSettingsIouThreshold3" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsIouThreshold3Click()" style="width: 50px">1</button>
        <br class="only-handtrack-control-element">
        <br>


        <label id="labelClickTimer">Click Timer</label>
        <input id="sliderClickTimer" class="settingsSlider no-handtrack-control-element" type="range" min="10" max="100" step="1" value="20" onchange="UpdateHandtrackSettings()">
        <label id="outputClickTimer"></label>

        <br class="only-handtrack-control-element">
        <button id="buttonSettingsClickTimer1" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsClickTimer1Click()" style="width: 50px">10</button>
        <button id="buttonSettingsClickTimer2" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsClickTimer2Click()" style="width: 50px">20</button>
        <button id="buttonSettingsClickTimer3" class="defaultButton only-handtrack-control-element" onclick="buttonSettingsClickTimer3Click()" style="width: 50px">40</button>
        <!-- <br class="only-handtrack-control-element"> -->
    </div>
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
<br>
    <button id="buttonSettingsHandtrackControl" class="defaultButton handtrack_contol_element" onclick="HandtrackControlClick()">Menu Hand Control</button>
<!-- javascript ist  in handtrack_data_logic.php -->

</form>


<script>
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
