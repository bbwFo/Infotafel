<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #handtrackControlCanvas{
            position: fixed;
            z-index: 1000;
            width: 100%;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

    </style>
</head>
<body>
    <canvas id="handtrackControlCanvas" onmousemove="MouseCoordinates(event)"></canvas>
</body>
</html>

<script>
    //Select erverything in my html Konfiguration
    const stream_webcam = document.querySelector('#streamWebcam');
    const canvas = document.querySelector('#handtrackControlCanvas');
    const context = handtrackControlCanvas.getContext('2d');
    var model;
    //------------------------------------------------

    // setting up the width and the height of the canvas (id= drawTable)
    context.canvas.width  = window.innerWidth; //width of the canvas field
    context.canvas.height = window.innerHeight; //height of the canvas field

    class Button_handtrack_control 
    {
        constructor(id)
        {
            this.button_Id = id;
            this.button_Element = document.getElementById(id);
            this.button_Element_Position = this.button_Element.getBoundingClientRect();
            this.click_Timer = 0; // der Klick Timer
            this.mouse_On_Button = 0; // ist 1 wenn die Maus auf einen Button ist und 0 wenn nicht
            this.button_Touch_Check = 0 // ist 1 wenn der Button mit der Hand berührt wurde und 0 wenn nicht
        }

        generateZones()
        {
            if($(this.button_Element).is(":visible"))
            {
                this.button_Element_Position = this.button_Element.getBoundingClientRect();
            } 
        }

        buttonFoundMouse(mouse_position_x, mouse_position_y)
        {
            if($(this.button_Element).is(":visible"))
            {
                this.button_Found_Mouse = (mouse_position_x > this.button_Element_Position.x && mouse_position_x < this.button_Element_Position.x + this.button_Element_Position.width && mouse_position_y > this.button_Element_Position.y && mouse_position_y < this.button_Element_Position.y + this.button_Element_Position.height);
                return this.button_Found_Mouse;
            }
        }
        buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y)
        {
            if(settings_handtrack_control == 1)
            {
                if($(this.button_Element).is(":visible"))
                {
                    this.button_Found_Hand = hand1_x > this.button_Element_Position.x && hand1_x < this.button_Element_Position.x + this.button_Element_Position.width && hand1_y > this.button_Element_Position.y && hand1_y < this.button_Element_Position.y + this.button_Element_Position.height || hand2_x > this.button_Element_Position.x && hand2_x < this.button_Element_Position.x + this.button_Element_Position.width && hand2_y > this.button_Element_Position.y && hand2_y < this.button_Element_Position.y + this.button_Element_Position.height;
                    return this.button_Found_Hand;
                }
            }
        }
        hover()
        {
            if($(this.button_Element).is(":visible"))
            {
                if(this.button_Found_Mouse == true || this.button_Found_Hand == true)
                {
                    this.button_Element.style.color = "yellow";
                    this.mouse_On_Button = 1;
                }
                else
                {
                    this.button_Element.style.color = "white";
                    this.mouse_On_Button = 0;
                }
            }
        }
        click()
        {
            if($(this.button_Element).is(":visible"))
            {
                this.button_Element.click();
            }
        }
        clickTimer()
        {
            if($(this.button_Element).is(":visible"))
            {
                ++this.click_Timer;
            }
        }
    }

</script>

<?php
    // Add definitions file
    include ("logic/button_definition.php");
?>

<script>
    if(settings_handtrack_control == 1)
    {
        $(".no-handtrack-control-element").hide();
        $(".only-handtrack-control-element").show();
    }
    else
    {
        $("#handtrackControlCanvas").hide();
        $(".only-handtrack-control-element").hide();
    }



    function MouseCoordinates(event)
    {
        // Menu
        var mouse_position_x = event.clientX;
        var mouse_position_y = event.clientY;

        if($(alink_instrument_drums.button_Element).is(":visible"))
        {
            alink_instrument_drums.buttonFoundMouse(mouse_position_x, mouse_position_y);
            alink_instrument_drums.hover();
        }

        if($(alink_instrument_guitar.button_Element).is(":visible"))
        {
            alink_instrument_guitar.buttonFoundMouse(mouse_position_x, mouse_position_y);
            alink_instrument_guitar.hover();
        }

        if($(alink_instrument_theremin.button_Element).is(":visible"))
        {
            alink_instrument_theremin.buttonFoundMouse(mouse_position_x, mouse_position_y);
            alink_instrument_theremin.hover();
        }

        if($(alink_settings.button_Element).is(":visible"))
        {
            alink_settings.buttonFoundMouse(mouse_position_x, mouse_position_y);
            alink_settings.hover();
        }

        if($(alink_main_menu.button_Element).is(":visible"))
        {
            alink_main_menu.buttonFoundMouse(mouse_position_x, mouse_position_y);
            alink_main_menu.hover();
        }

        // Settings Menu

        // Instument Volume
        if($(button_settings_instrument_volume_1.button_Element).is(":visible"))
        {
            button_settings_instrument_volume_1.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_instrument_volume_1.hover();
        }
        if($(button_settings_instrument_volume_2.button_Element).is(":visible"))
        {
            button_settings_instrument_volume_2.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_instrument_volume_2.hover();
        }
        if($(button_settings_instrument_volume_3.button_Element).is(":visible"))
        {
            button_settings_instrument_volume_3.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_instrument_volume_3.hover();
        }

        // Score threshold
        if($(button_settings_score_threshold_1.button_Element).is(":visible"))
        {
            button_settings_score_threshold_1.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_score_threshold_1.hover();
        }
        if($(button_settings_score_threshold_2.button_Element).is(":visible"))
        {
            button_settings_score_threshold_2.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_score_threshold_2.hover();
        }
        if($(button_settings_score_threshold_3.button_Element).is(":visible"))
        {
            button_settings_score_threshold_3.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_score_threshold_3.hover();
        }

        // Iou threshold
        if($(button_settings_iou_threshold_1.button_Element).is(":visible"))
        {
            button_settings_iou_threshold_1.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_iou_threshold_1.hover();
        }
        if($(button_settings_iou_threshold_2.button_Element).is(":visible"))
        {
            button_settings_iou_threshold_2.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_iou_threshold_2.hover();
        }
        if($(button_settings_iou_threshold_3.button_Element).is(":visible"))
        {
            button_settings_iou_threshold_3.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_iou_threshold_3.hover();
        }

        // Interval Rate
        if($(button_settings_interval_rate_1.button_Element).is(":visible"))
        {
            button_settings_interval_rate_1.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_interval_rate_1.hover();
        }
        if($(button_settings_interval_rate_2.button_Element).is(":visible"))
        {
            button_settings_interval_rate_2.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_interval_rate_2.hover();
        }
        if($(button_settings_interval_rate_3.button_Element).is(":visible"))
        {
            button_settings_interval_rate_3.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_interval_rate_3.hover();
        }

        // Click Timer
        if($(button_settings_click_timer_1.button_Element).is(":visible"))
        {
            button_settings_click_timer_1.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_click_timer_1.hover();
        }
        if($(button_settings_click_timer_2.button_Element).is(":visible"))
        {
            button_settings_click_timer_2.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_click_timer_2.hover();
        }
        if($(button_settings_click_timer_3.button_Element).is(":visible"))
        {
            button_settings_click_timer_3.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_click_timer_3.hover();
        }


        // Hand Control
        if($(button_settings_handtrack_control.button_Element).is(":visible"))
        {
            button_settings_handtrack_control.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_handtrack_control.hover();
        }

        // Save Settings
        if($(button_settings_save_settings.button_Element).is(":visible"))
        {
            button_settings_save_settings.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_save_settings.hover();
        }

        // Reset Settings
        if($(button_settings_reset_settings.button_Element).is(":visible"))
        {
            button_settings_reset_settings.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_reset_settings.hover();
        }

        // Refresh Page
        if($(button_settings_refresh_page.button_Element).is(":visible"))
        {
            button_settings_refresh_page.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_refresh_page.hover();
        }

        // Main Menu
        if($(button_settings_main_menu.button_Element).is(":visible"))
        {
            button_settings_main_menu.buttonFoundMouse(mouse_position_x, mouse_position_y);
            button_settings_main_menu.hover();
        }        
    }

    $("#handtrackControlCanvas").click(function()
    {
        // Menu
        if(alink_instrument_drums.button_Found_Mouse)
        {
            alink_instrument_drums.click();
        }

        if(alink_instrument_guitar.button_Found_Mouse)
        {
            alink_instrument_guitar.click();
        }

        if(alink_instrument_theremin.button_Found_Mouse)
        {
            alink_instrument_theremin.click();
        }

        if(alink_settings.button_Found_Mouse)
        {
            alink_settings.click();
        }

        if(alink_main_menu.button_Found_Mouse)
        {
            alink_main_menu.click();
        }

        // Settings Menu
      
        // Instrument Volume
        if(button_settings_instrument_volume_1.button_Found_Mouse)
        {
            button_settings_instrument_volume_1.click();
        }
        if(button_settings_instrument_volume_2.button_Found_Mouse)
        {
            button_settings_instrument_volume_2.click();
        }
        if(button_settings_instrument_volume_3.button_Found_Mouse)
        {
            button_settings_instrument_volume_3.click();
        }

        // Score Threshold
        if(button_settings_score_threshold_1.button_Found_Mouse)
        {
            button_settings_score_threshold_1.click();
        }
        if(button_settings_score_threshold_2.button_Found_Mouse)
        {
            button_settings_score_threshold_2.click();
        }
        if(button_settings_score_threshold_3.button_Found_Mouse)
        {
            button_settings_score_threshold_3.click();
        }

        // Iou Threshold
        if(button_settings_iou_threshold_1.button_Found_Mouse)
        {
            button_settings_iou_threshold_1.click();
        }
        if(button_settings_iou_threshold_2.button_Found_Mouse)
        {
            button_settings_iou_threshold_2.click();
        }
        if(button_settings_iou_threshold_3.button_Found_Mouse)
        {
            button_settings_iou_threshold_3.click();
        }

        // Interval Rate
        if(button_settings_interval_rate_1.button_Found_Mouse)
        {
            button_settings_interval_rate_1.click();
        }
        if(button_settings_interval_rate_2.button_Found_Mouse)
        {
            button_settings_interval_rate_2.click();
        }
        if(button_settings_interval_rate_3.button_Found_Mouse)
        {
            button_settings_interval_rate_3.click();
        }

        // Click Timer
        if(button_settings_click_timer_1.button_Found_Mouse)
        {
            button_settings_click_timer_1.click();
        }
        if(button_settings_click_timer_2.button_Found_Mouse)
        {
            button_settings_click_timer_2.click();
        }
        if(button_settings_click_timer_3.button_Found_Mouse)
        {
            button_settings_click_timer_3.click();
        }


        // Hand Control
        if(button_settings_handtrack_control.button_Found_Mouse)
        {
            button_settings_handtrack_control.click();
        }

        // Save Settings
        if(button_settings_save_settings.button_Found_Mouse)
        {
            button_settings_save_settings.click();
        }

        // Reset Settings
        if(button_settings_reset_settings.button_Found_Mouse)
        {
            button_settings_reset_settings.click();
        }

        // Refresh Page
        if(button_settings_refresh_page.button_Found_Mouse)
        {
            button_settings_refresh_page.click();
        }

        // Main Menu
        if(button_settings_main_menu.button_Found_Mouse)
        {
            button_settings_main_menu.click();
        }
    });


    handTrack.startVideo(stream_webcam)
        .then(status => {
            if(status){
                navigator.getUserMedia({video: {}}, stream =>{
                    stream_webcam.srcObject = stream;
                    //Run our detection
                    setInterval(runDetection, <?php echo $settings_interval_rate; ?>);
                },
                    err => console.log(err)
                );
            }
        })

        function runDetection(){
            model.detect(stream_webcam)
                .then(predictions => {
                    if(predictions.length !==0){
                        document.getElementById("noHandAlert").style.display = "none";

                        //Neue zuweisung der folgenden Variablen
                        //Hand 1
                        if(predictions[0]){
                            hand1_handl = predictions[0].bbox;
                            hand1_x = hand1_handl[0] + (hand1_handl[2] * 0.5);
                            hand1_y = hand1_handl[1] + (hand1_handl[3] * 0.5);
                        }else{
                            hand1_handl = 0;
                            hand1_x = 0;
                            hand1_y = 0;
                        }
                        //----------------------
                        //Hand 2
                        if(predictions[1]){
                            hand2_handl = predictions[1].bbox;
                            hand2_x = hand2_handl[0] + (hand2_handl[2] * 0.5);
                            hand2_y = hand2_handl[1] + (hand2_handl[3] * 0.5);
                        }else{
                            hand2_handl = 0;
                            hand2_x = 0;
                            hand2_y = 0;
                        }
                        //----------------------
                        //----------------------

                        // Menu
                        if($(alink_instrument_drums.button_Element).is(":visible"))
                        {
                            alink_instrument_drums.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            alink_instrument_drums.hover(); 
                        }

                        if($(alink_instrument_guitar.button_Element).is(":visible"))
                        {
                            alink_instrument_guitar.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            alink_instrument_guitar.hover(); 
                        }
                        
                        if($(alink_instrument_theremin.button_Element).is(":visible"))
                        {
                            alink_instrument_theremin.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            alink_instrument_theremin.hover(); 
                        }

                        if($(alink_settings.button_Element).is(":visible"))
                        {
                            alink_settings.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            alink_settings.hover(); 
                        }

                        if($(alink_main_menu.button_Element).is(":visible"))
                        {
                            alink_main_menu.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            alink_main_menu.hover(); 
                        }


                        // Settings Menu

                        // Instrument Volume
                        if($(button_settings_instrument_volume_1.button_Element).is(":visible"))
                        {
                            button_settings_instrument_volume_1.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_instrument_volume_1.hover(); 
                        }
                        if($(button_settings_instrument_volume_2.button_Element).is(":visible"))
                        {
                            button_settings_instrument_volume_2.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_instrument_volume_2.hover(); 
                        }
                        if($(button_settings_instrument_volume_3.button_Element).is(":visible"))
                        {
                            button_settings_instrument_volume_3.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_instrument_volume_3.hover(); 
                        }

                        // Score Threshold
                        if($(button_settings_score_threshold_1.button_Element).is(":visible"))
                        {
                            button_settings_score_threshold_1.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_score_threshold_1.hover(); 
                        }
                        if($(button_settings_score_threshold_2.button_Element).is(":visible"))
                        {
                            button_settings_score_threshold_2.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_score_threshold_2.hover(); 
                        }
                        if($(button_settings_score_threshold_3.button_Element).is(":visible"))
                        {
                            button_settings_score_threshold_3.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_score_threshold_3.hover(); 
                        }

                        // Iou Threshold
                        if($(button_settings_iou_threshold_1.button_Element).is(":visible"))
                        {
                            button_settings_iou_threshold_1.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_iou_threshold_1.hover(); 
                        }
                        if($(button_settings_iou_threshold_2.button_Element).is(":visible"))
                        {
                            button_settings_iou_threshold_2.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_iou_threshold_2.hover(); 
                        }
                        if($(button_settings_iou_threshold_3.button_Element).is(":visible"))
                        {
                            button_settings_iou_threshold_3.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_iou_threshold_3.hover(); 
                        }

                        // Interval Rate
                        if($(button_settings_interval_rate_1.button_Element).is(":visible"))
                        {
                            button_settings_interval_rate_1.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_interval_rate_1.hover(); 
                        }
                        if($(button_settings_interval_rate_2.button_Element).is(":visible"))
                        {
                            button_settings_interval_rate_2.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_interval_rate_2.hover(); 
                        }
                        if($(button_settings_interval_rate_3.button_Element).is(":visible"))
                        {
                            button_settings_interval_rate_3.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_interval_rate_3.hover(); 
                        }

                        // Click Timer
                        if($(button_settings_click_timer_1.button_Element).is(":visible"))
                        {
                            button_settings_click_timer_1.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_click_timer_1.hover(); 
                        }
                        if($(button_settings_click_timer_2.button_Element).is(":visible"))
                        {
                            button_settings_click_timer_2.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_click_timer_2.hover(); 
                        }
                        if($(button_settings_click_timer_3.button_Element).is(":visible"))
                        {
                            button_settings_click_timer_3.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_click_timer_3.hover(); 
                        }
                        

                        // Hand Control
                        if($(button_settings_handtrack_control.button_Element).is(":visible"))
                        {
                            button_settings_handtrack_control.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_handtrack_control.hover(); 
                        }

                        // Save Settings
                        if($(button_settings_save_settings.button_Element).is(":visible"))
                        {
                            button_settings_save_settings.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_save_settings.hover(); 
                        }

                        // Reset Settings
                        if($(button_settings_reset_settings.button_Element).is(":visible"))
                        {
                            button_settings_reset_settings.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_reset_settings.hover(); 
                        }

                        // Refresh Page
                        if($(button_settings_refresh_page.button_Element).is(":visible"))
                        {
                            button_settings_refresh_page.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_refresh_page.hover(); 
                        }

                        // Main Menu
                        if($(button_settings_main_menu.button_Element).is(":visible"))
                        {
                            button_settings_main_menu.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y);
                            button_settings_main_menu.hover(); 
                        }


                        // Menu
                        if($(alink_instrument_drums.button_Element).is(":visible"))
                        {
                            if(alink_instrument_drums.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(alink_instrument_drums);
                            }
                            else
                            {
                                if(alink_instrument_drums.mouse_On_Button == 0){
                                    alink_instrument_drums.hover();
                                    alink_instrument_drums.click_Timer = 0;
                                }
                            }
                        }

                        if($(alink_instrument_guitar.button_Element).is(":visible"))
                        {
                            if(alink_instrument_guitar.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(alink_instrument_guitar);
                            }
                            else
                            {
                                if(alink_instrument_guitar.mouse_On_Button == 0){
                                    alink_instrument_guitar.hover();
                                    alink_instrument_guitar.click_Timer = 0;
                                }
                            }
                        }

                        if($(alink_instrument_theremin.button_Element).is(":visible"))
                        {
                            if(alink_instrument_theremin.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(alink_instrument_theremin);
                            }
                            else
                            {
                                if(alink_instrument_theremin.mouse_On_Button == 0){
                                    alink_instrument_theremin.hover();
                                    alink_instrument_theremin.click_Timer = 0;
                                }
                            }
                        }

                        if($(alink_settings.button_Element).is(":visible"))
                        {
                            if(alink_settings.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(alink_settings);
                            }
                            else
                            {
                                if(alink_settings.mouse_On_Button == 0){
                                    alink_settings.hover();
                                    alink_settings.click_Timer = 0;
                                }
                            }
                        }

                        if($(alink_main_menu.button_Element).is(":visible"))
                        {
                            if(alink_main_menu.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(alink_main_menu);
                            }
                            else
                            {
                                if(alink_main_menu.mouse_On_Button == 0){
                                    alink_main_menu.hover();
                                    alink_main_menu.click_Timer = 0;
                                }
                            }
                        }

                        // Settings Menu

                        // Instrument Volume
                        if($(button_settings_instrument_volume_1.button_Element).is(":visible"))
                        {
                            if(button_settings_instrument_volume_1.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_instrument_volume_1);
                            }
                            else
                            {
                                if(button_settings_instrument_volume_1.mouse_On_Button == 0){
                                    button_settings_instrument_volume_1.hover();
                                    button_settings_instrument_volume_1.click_Timer = 0;
                                }
                            }
                        }
                        if($(button_settings_instrument_volume_2.button_Element).is(":visible"))
                        {
                            if(button_settings_instrument_volume_2.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_instrument_volume_2);
                            }
                            else
                            {
                                if(button_settings_instrument_volume_2.mouse_On_Button == 0){
                                    button_settings_instrument_volume_2.hover();
                                    button_settings_instrument_volume_2.click_Timer = 0;
                                }
                            }
                        }
                        if($(button_settings_instrument_volume_3.button_Element).is(":visible"))
                        {
                            if(button_settings_instrument_volume_3.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_instrument_volume_3);
                            }
                            else
                            {
                                if(button_settings_instrument_volume_3.mouse_On_Button == 0){
                                    button_settings_instrument_volume_3.hover();
                                    button_settings_instrument_volume_3.click_Timer = 0;
                                }
                            }
                        }

                        // Score Threshold
                        if($(button_settings_score_threshold_1.button_Element).is(":visible"))
                        {
                            if(button_settings_score_threshold_1.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_score_threshold_1);
                            }
                            else
                            {
                                if(button_settings_score_threshold_1.mouse_On_Button == 0){
                                    button_settings_score_threshold_1.hover();
                                    button_settings_score_threshold_1.click_Timer = 0;
                                }
                            }
                        }
                        if($(button_settings_score_threshold_2.button_Element).is(":visible"))
                        {
                            if(button_settings_score_threshold_2.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_score_threshold_2);
                            }
                            else
                            {
                                if(button_settings_score_threshold_2.mouse_On_Button == 0){
                                    button_settings_score_threshold_2.hover();
                                    button_settings_score_threshold_2.click_Timer = 0;
                                }
                            }
                        }
                        if($(button_settings_score_threshold_3.button_Element).is(":visible"))
                        {
                            if(button_settings_score_threshold_3.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_score_threshold_3);
                            }
                            else
                            {
                                if(button_settings_score_threshold_3.mouse_On_Button == 0){
                                    button_settings_score_threshold_3.hover();
                                    button_settings_score_threshold_3.click_Timer = 0;
                                }
                            }
                        }

                        // Iou Threshold
                        if($(button_settings_iou_threshold_1.button_Element).is(":visible"))
                        {
                            if(button_settings_iou_threshold_1.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_iou_threshold_1);
                            }
                            else
                            {
                                if(button_settings_iou_threshold_1.mouse_On_Button == 0){
                                    button_settings_iou_threshold_1.hover();
                                    button_settings_iou_threshold_1.click_Timer = 0;
                                }
                            }
                        }
                        if($(button_settings_iou_threshold_2.button_Element).is(":visible"))
                        {
                            if(button_settings_iou_threshold_2.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_iou_threshold_2);
                            }
                            else
                            {
                                if(button_settings_iou_threshold_2.mouse_On_Button == 0){
                                    button_settings_iou_threshold_2.hover();
                                    button_settings_iou_threshold_2.click_Timer = 0;
                                }
                            }
                        }
                        if($(button_settings_iou_threshold_3.button_Element).is(":visible"))
                        {
                            if(button_settings_iou_threshold_3.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_iou_threshold_3);
                            }
                            else
                            {
                                if(button_settings_iou_threshold_3.mouse_On_Button == 0){
                                    button_settings_iou_threshold_3.hover();
                                    button_settings_iou_threshold_3.click_Timer = 0;
                                }
                            }
                        }

                        // Interval Rate
                        if($(button_settings_interval_rate_1.button_Element).is(":visible"))
                        {
                            if(button_settings_interval_rate_1.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_interval_rate_1);
                            }
                            else
                            {
                                if(button_settings_interval_rate_1.mouse_On_Button == 0){
                                    button_settings_interval_rate_1.hover();
                                    button_settings_interval_rate_1.click_Timer = 0;
                                }
                            }
                        }
                        if($(button_settings_interval_rate_2.button_Element).is(":visible"))
                        {
                            if(button_settings_interval_rate_2.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_interval_rate_2);
                            }
                            else
                            {
                                if(button_settings_interval_rate_2.mouse_On_Button == 0){
                                    button_settings_interval_rate_2.hover();
                                    button_settings_interval_rate_2.click_Timer = 0;
                                }
                            }
                        }
                        if($(button_settings_interval_rate_3.button_Element).is(":visible"))
                        {
                            if(button_settings_interval_rate_3.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_interval_rate_3);
                            }
                            else
                            {
                                if(button_settings_interval_rate_3.mouse_On_Button == 0){
                                    button_settings_interval_rate_3.hover();
                                    button_settings_interval_rate_3.click_Timer = 0;
                                }
                            }
                        }

                        // Click Timer
                        if($(button_settings_click_timer_1.button_Element).is(":visible"))
                        {
                            if(button_settings_click_timer_1.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_click_timer_1);
                            }
                            else
                            {
                                if(button_settings_click_timer_1.mouse_On_Button == 0){
                                    button_settings_click_timer_1.hover();
                                    button_settings_click_timer_1.click_Timer = 0;
                                }
                            }
                        }
                        if($(button_settings_click_timer_2.button_Element).is(":visible"))
                        {
                            if(button_settings_click_timer_2.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_click_timer_2);
                            }
                            else
                            {
                                if(button_settings_click_timer_2.mouse_On_Button == 0){
                                    button_settings_click_timer_2.hover();
                                    button_settings_click_timer_2.click_Timer = 0;
                                }
                            }
                        }
                        if($(button_settings_click_timer_3.button_Element).is(":visible"))
                        {
                            if(button_settings_click_timer_3.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_click_timer_3);
                            }
                            else
                            {
                                if(button_settings_click_timer_3.mouse_On_Button == 0){
                                    button_settings_click_timer_3.hover();
                                    button_settings_click_timer_3.click_Timer = 0;
                                }
                            }
                        }

                        // Handtrack Control
                        if($(button_settings_handtrack_control.button_Element).is(":visible"))
                        {
                            if(button_settings_handtrack_control.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_handtrack_control);
                            }
                            else
                            {
                                if(button_settings_handtrack_control.mouse_On_Button == 0){
                                    button_settings_handtrack_control.hover();
                                    button_settings_handtrack_control.click_Timer = 0;
                                }
                            }
                        }

                        // Save Settings
                        if($(button_settings_save_settings.button_Element).is(":visible"))
                        {
                            if(button_settings_save_settings.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_save_settings);
                            }
                            else
                            {
                                if(button_settings_save_settings.mouse_On_Button == 0){
                                    button_settings_save_settings.hover();
                                    button_settings_save_settings.click_Timer = 0;
                                }
                            }
                        }

                        // Reset Settings
                        if($(button_settings_reset_settings.button_Element).is(":visible"))
                        {
                            if(button_settings_reset_settings.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_reset_settings);
                            }
                            else
                            {
                                if(button_settings_reset_settings.mouse_On_Button == 0){
                                    button_settings_reset_settings.hover();
                                    button_settings_reset_settings.click_Timer = 0;
                                }
                            }
                        }

                        // Refresh Page
                        if($(button_settings_refresh_page.button_Element).is(":visible"))
                        {
                            if(button_settings_refresh_page.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_refresh_page);
                            }
                            else
                            {
                                if(button_settings_refresh_page.mouse_On_Button == 0){
                                    button_settings_refresh_page.hover();
                                    button_settings_refresh_page.click_Timer = 0;
                                }
                            }
                        }

                        // Main Menu
                        if($(button_settings_main_menu.button_Element).is(":visible"))
                        {
                            if(button_settings_main_menu.buttonFoundHand(hand1_x, hand1_y, hand2_x, hand2_y) == true)
                            {
                                HandOnButton(button_settings_main_menu);
                            }
                            else
                            {
                                if(button_settings_main_menu.mouse_On_Button == 0){
                                    button_settings_main_menu.hover();
                                    button_settings_main_menu.click_Timer = 0;
                                }
                            }
                        }

                        //Draw Template
                        //Set the size of the browser window to the webcam
                        stream_webcam.width = window.innerWidth; //width 
                        stream_webcam.height = window.innerHeight; //height

                        //Set the size of the browser window to the handtrackControlCanvas
                        context.canvas.width  = window.innerWidth; //width of the canvas field
                        context.canvas.height = window.innerHeight; //height of the canvas field

                        //Einmal das Bild drehen für die Webcam Zeichnung
                        context.scale(-1, 1);
                        context.translate(-context.canvas.width, 0);

                        //Nochmal das Bild drehen, damit die Zonen richtig dargestellt werden
                        context.scale(-1, 1);
                        context.translate(-context.canvas.width, 0); 



                         if(settings_handtrack_control == 1)
                         {
                            //hand marc points
                            context.beginPath();
                            context.fillStyle = "red";
                            //context.arc(hand1_x,hand1_y,5,0,2*Math.PI);
                            context.rect(hand1_x, hand1_y, 10, 10)
                            context.fill();
                            context.fillStyle = "black";
                            context.textAlign = "center";
                            context.font = "10px 'Rock Salt'";
                            context.fillText("1", hand1_x, hand1_y + 5);

                            context.beginPath();
                            context.fillStyle = "red";
                            //context.arc(hand2_x,hand2_y,5,0,2*Math.PI);
                            context.rect(hand2_x, hand2_y, 10, 10)
                            context.fill();
                            context.fillStyle = "black";
                            context.textAlign = "center";
                            context.font = "10px 'Rock Salt'";
                            context.fillText("2", hand2_x, hand2_y + 5);
                            //------------------------           
                        }

                        // Debug Show Erkennungs-Zone
                        // context.fillStyle = "red";
                        // context.rect(button_settings_score_threshold_1.button_Element_Position.x, button_settings_score_threshold_1.button_Element_Position.y, button_settings_score_threshold_1.button_Element_Position.width, button_settings_score_threshold_1.button_Element_Position.height);
                        // context.fill();



                    }
                    else{
                        if(settings_handtrack_control == 1)
                        {
                            console.log("NO HAND");
                            document.getElementById("noHandAlert").style.display = "block";
                        }
                    }
                });
        }

        handTrack.load(modelParams).then(lmodel => {
            model = lmodel;
        });

        function HandOnButton(button)
        {
            if(button.button_Touch_Check == 1)
            {
                button.hover();

                button.clickTimer();
                console.log(button.click_Timer);

                if(button.click_Timer == <?php echo $settings_click_timer;?>)
                {
                    // trigger click function
                    button.click();
                    button.click_Timer = 0;
                }
                button.button_Touch_Check = 0;
            }
            else
            {
                button.button_Touch_Check = 1;
                //button.click_timer = 0;
            }   
        }                
</script>