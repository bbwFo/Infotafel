<script type="text/javascript">
//Variablen for modelParams Settings
var modelParams = {
    flipHorizontal: true,   // flip e.g for video 
    outputStride: 16,
    imageScaleFactor: 1,  // reduce input image size for gains in speed. 0.7 Default
    maxNumBoxes: 2,        // maximum number of boxes to detect
    iouThreshold: 0.5,      // ioU threshold for non-max suppression 0.5 Default
    scoreThreshold: 0.5,    // confidence threshold for predictions.
    modelType: "ssd320fpnlite",
    modelSize: "small",
    bboxLineWidth: "2",
    fontSize: 17,

}
// Diese durch PHP-Variablenm ersetzen
var settings_score_threshold = 0;
var settings_score_iouthreshold = 0;
var settings_interval_rate = 0;
var settings_handtrack_control = 0; // 0 = false, 1 = true
var settings_click_timer = 0;
//-------------------------
var checkCookie = 0;


UpdateHandtrackSettings();
settings_handtrack_control = <?php echo $settings_handtrack_control; ?>;

function UpdateHandtrackSettings(){
    //alert('UpdateHandtrackSettings');
    // settings_instrument_volume = document.getElementById("sliderInstrumentVolume").value;
    // document.getElementById("outputInstrumentVoumeSettings").innerHTML = 50 + parseInt(settings_instrument_volume); 
    // sampler.volume.value = settings_instrument_volume;

    // settings_interval_rate = document.getElementById("sliderIntervalRate").value;
    // document.getElementById("outputIntervalRate").innerHTML = settings_interval_rate; 

    // settings_score_threshold = document.getElementById("sliderScoreThreshold").value;
    // document.getElementById("outputScoreThreshold").innerHTML = settings_score_threshold;

    // settings_score_iouthreshold = document.getElementById("sliderScoreIouThreshold").value;
    // document.getElementById("outputScoreIouThreshold").innerHTML = settings_score_iouthreshold;

    // settings_click_timer = document.getElementById("sliderClickTimer").value;
    // document.getElementById("outputClickTimer").innerHTML = settings_click_timer;

    // modelParams.scoreThreshold = settings_score_threshold;
    // modelParams.iouThreshold = settings_score_iouthreshold;
    
    handTrack.load(modelParams).then(lmodel => {
        model = lmodel;
        console.log("%c Change Handtrack Settings","color: yellow");
        console.log(model);
    });
}

//Variablen Definieren
//Hand 1
var hand1_handl = 0;
var hand1_x = 0;
var hand1_y = 0;
var hand1_label = "";
//---------------

//Hand 2
var hand2_handl = 0;
var hand2_x = 0;
var hand2_y = 0;
var hand2_label = "";
//---------------
//----------------------

function getCookie(name) {
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");
    
    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        
        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if(name == cookiePair[0].trim()) {
            // Decode the cookie value and return
            return decodeURIComponent(cookiePair[1]);
        }
    }
    
    // Return null if not found
    return null;
}

function SetToCookieValue_settings(cookie_name, slider_name, settings_variable, output_settings_variable){
    checkCookie = getCookie(cookie_name);
    if(checkCookie != null){
        settings_variable = checkCookie;
    }else{
        settings_variable = document.getElementById(slider_name).value;
    }
    document.getElementById(output_settings_variable).innerHTML = settings_variable;
    document.getElementById(slider_name).value = settings_variable;
}

function SetToCookieValue_variable(cookie_name, settings_variable){
    checkCookie = getCookie(cookie_name);
    if(checkCookie != null){
        settings_variable = checkCookie;
    }else{
        settings_variable = 0;
    }
}

</script>