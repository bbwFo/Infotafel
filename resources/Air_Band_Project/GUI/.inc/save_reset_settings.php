<script type='text/javascript'>
    function SaveSettings(){
        var valueiouThreshold = document.getElementById('sliderScoreIouThreshold').value;
        setCookie("air_band_iouThreshold", valueiouThreshold, 30);       	
        var valuescoreThreshold = document.getElementById('sliderScoreThreshold').value;
        setCookie("air_band_scoreThreshold", valuescoreThreshold, 30);
        var valueintervalRate = document.getElementById('sliderIntervalRate').value;
        setCookie("air_band_intervalRate", valueintervalRate, 30);
        var valueinstrumentVolume = document.getElementById('sliderInstrumentVolume').value;
        setCookie("air_band_instrumentVolume", valueinstrumentVolume, 30);
        var valuehandtrackControl = settings_handtrack_control;
        setCookie("air_band_handtrack_control", valuehandtrackControl, 30);
        var valueclickTimer = settings_click_timer;
        setCookie("air_band_click_timer", valueclickTimer, 30);

        alert("The settings were saved in cookies.");
        }

    function ResetSettings(){
        setCookie("air_band_scoreThreshold", "0.5", 0);
        setCookie("air_band_iouThreshold", "0.5", 0);
        setCookie("air_band_intervalRate", "5", 0);
        setCookie("air_band_instrumentVolume", "5", 0);
        setCookie("air_band_handtrack_control", "0", 0);
        setCookie("air_band_click_timer", "20", 0);

        alert("The settings have been reset. (Cookies deleted)");
        document.getElementById('sliderScoreIouThreshold').value = 0.5;
        document.getElementById('sliderScoreThreshold').value = 0.5;
        document.getElementById('sliderIntervalRate').value = 5;
        document.getElementById('sliderInstrumentVolume').value = 5;
        document.getElementById('sliderClickTimer').value = 20;
        settings_handtrack_control = 0;
        UpdateHandtrackSettings();
    }


    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

</script>