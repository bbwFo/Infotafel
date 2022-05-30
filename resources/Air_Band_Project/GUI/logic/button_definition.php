<script>
    var alink_instrument_drums = 0;
    var alink_instrument_guitar = 0;
    var alink_instrument_theremin = 0;
    var alink_settings = 0;
    var alink_main_menu = 0;

    // Instrument Volume
    var button_settings_instrument_volume_1 = 0;
    var button_settings_instrument_volume_2 = 0;
    var button_settings_instrument_volume_3 = 0;

    // Score Threshold
    var button_settings_score_threshold_1 = 0;
    var button_settings_score_threshold_2 = 0;
    var button_settings_score_threshold_3 = 0;

    // Interval Rate
    var button_settings_interval_rate_1 = 0;
    var button_settings_interval_rate_2 = 0;
    var button_settings_interval_rate_3 = 0;

    // ioU Threshold
    var button_settings_iou_threshold_1 = 0;
    var button_settings_iou_threshold_2 = 0;
    var button_settings_iou_threshold_3 = 0;

    // Click Timer
    var button_settings_click_timer_1 = 0;
    var button_settings_click_timer_2 = 0;
    var button_settings_click_timer_3 = 0;

    // Handtrack Control
    var button_settings_handtrack_control = 0;

    // Save Settings
    var button_settings_save_settings = 0;

    // Reset Settings
    var button_settings_reset_settings = 0;

    // Refresh Page
    var button_settings_refresh_page = 0;

    // Main Menu
    var button_settings_main_menu = 0;

    //Button Click functionen
    // Menu
    function alinkInstrumentDrumsClick()
    {
        MenuPageSelect(3);
    }

    function alinkInstrumentGuitarClick()
    {
        MenuPageSelect(4);
    }

    function alinkInstrumentThereminClick()
    {
        MenuPageSelect(5);
    }

    function alinkSettingsClick()
    {
        MenuPageSelect(2);
    }

    function MenuMainClick()
    {
        MenuPageSelect(1);
    }

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

    function HandtrackControlClick_activated()
    {
        if(settings_handtrack_control == 1)
        {
            // button_settings_handtrack_control.button_Element.style.backgroundColor = 'rgb(' + 0 + ',' + 46 + ',' + 99 + ')';
            document.getElementById("buttonSettingsHandtrackControl").style.backgroundColor = 'rgb(' + 0 + ',' + 46 + ',' + 99 + ')';
        }
        else
        {
            // button_settings_handtrack_control.button_Element.style.backgroundColor = "black";
            document.getElementById("buttonSettingsHandtrackControl").style.backgroundColor = 'black';
        }
    }

    // Hier werden anhand der menu_page_select Variable das passende Menu aufgerufen
    function MenuPageSelect(menu_page_select)
    {
        $("div").hide();
        $("#streamWebcam").show();
        $("#mainMenuHeading").show();
        $("#site_wrapper").show();
        $("#container").show();
        $("#menuFooter").show();

        switch (menu_page_select)
        {
        case 1: // Main-Menu
            $("#menuMain").show();
            $("#menuBottomContainer").show();

            window.onload = function () {
                alink_instrument_drums = new Button_handtrack_control("alinkInstrumentDrums");
                alink_instrument_guitar = new Button_handtrack_control("alinkInstrumentGuitar");
                alink_instrument_theremin = new Button_handtrack_control("alinkInstrumentTheremin");
                //alink_settings = new Button_handtrack_control("alinkSettings");

                alink_instrument_drums.generateZones();
                alink_instrument_guitar.generateZones();
                alink_instrument_theremin.generateZones();
                //alink_settings.generateZones();
            };
            break;
        case 2: // Settings-Menu
            $("#menuMain").hide();
            $("#settingsMenu").show();
            $("#instrumentSettingsMenuSoundDiv").show();
            $("#handtrackSettings1").show();
            $("#handtrackSettings2").show();
            $(".settingsContainer1").show();
            $(".settingsContainer2").show();
            $("#menuBackContainer").show();
            HandtrackControlClick_activated();


            alink_main_menu = new Button_handtrack_control("alinkMainMenu");
            alink_main_menu.generateZones();

            // Instrument Volume
            button_settings_instrument_volume_1 = new Button_handtrack_control("buttonSettingsInstrumentVolume1");
            button_settings_instrument_volume_2 = new Button_handtrack_control("buttonSettingsInstrumentVolume2");
            button_settings_instrument_volume_3 = new Button_handtrack_control("buttonSettingsInstrumentVolume3");

            button_settings_instrument_volume_1.generateZones();
            button_settings_instrument_volume_2.generateZones();
            button_settings_instrument_volume_3.generateZones();

            // Score Threshold
            button_settings_score_threshold_1 = new Button_handtrack_control("buttonSettingsScoreThreshold1");
            button_settings_score_threshold_2 = new Button_handtrack_control("buttonSettingsScoreThreshold2");
            button_settings_score_threshold_3 = new Button_handtrack_control("buttonSettingsScoreThreshold3");

            button_settings_score_threshold_1.generateZones();
            button_settings_score_threshold_2.generateZones();
            button_settings_score_threshold_3.generateZones();

            // Iou Threshold
            button_settings_iou_threshold_1 = new Button_handtrack_control("buttonSettingsIouThreshold1");
            button_settings_iou_threshold_2 = new Button_handtrack_control("buttonSettingsIouThreshold2");
            button_settings_iou_threshold_3 = new Button_handtrack_control("buttonSettingsIouThreshold3");

            button_settings_iou_threshold_1.generateZones();
            button_settings_iou_threshold_2.generateZones();
            button_settings_iou_threshold_3.generateZones();

            // Interval Rate
            button_settings_interval_rate_1 = new Button_handtrack_control("buttonSettingsIntervalRate1");
            button_settings_interval_rate_2 = new Button_handtrack_control("buttonSettingsIntervalRate2");
            button_settings_interval_rate_3 = new Button_handtrack_control("buttonSettingsIntervalRate3");

            button_settings_interval_rate_1.generateZones();
            button_settings_interval_rate_2.generateZones();
            button_settings_interval_rate_3.generateZones();

            // Click Timer
            button_settings_click_timer_1 = new Button_handtrack_control("buttonSettingsClickTimer1");
            button_settings_click_timer_2 = new Button_handtrack_control("buttonSettingsClickTimer2");
            button_settings_click_timer_3 = new Button_handtrack_control("buttonSettingsClickTimer3");

            button_settings_click_timer_1.generateZones();
            button_settings_click_timer_2.generateZones();
            button_settings_click_timer_3.generateZones();

            // Handtrack Control
            button_settings_handtrack_control = new Button_handtrack_control("buttonSettingsHandtrackControl");
            button_settings_handtrack_control.generateZones();

            // Save Settings
            button_settings_save_settings = new Button_handtrack_control("buttonSettingsSaveCookies");
            button_settings_save_settings.generateZones();

            // Reset Settings
            button_settings_reset_settings = new Button_handtrack_control("buttonResetSettings");
            button_settings_reset_settings.generateZones();

            // Refresh Page
            button_settings_refresh_page = new Button_handtrack_control("buttonRefreshPage");
            button_settings_refresh_page.generateZones();

            // Main Menu
            button_settings_main_menu = new Button_handtrack_control("buttonBackMainMenu");

            break;
        case 3: // Weiterleitung zu Handtrack Drums
            window.location = "instrument_drums.php";
            break;
        case 4: // Weiterleitung zu Handtrack Guitar
            window.location = "instrument_guitar.php";
            break;
        case 5: // Weiterleitung zu Handtrack Theremin
            window.location = "instrument_theremin.php";
            break;
        }
    }



</script>
