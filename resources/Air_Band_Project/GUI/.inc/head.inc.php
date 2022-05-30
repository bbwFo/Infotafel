<script src="logic/imported_scripts/handtrackjs/handtrack.min.js"></script> <!-- Load Handtrack Script offline -->
<script src="logic/imported_scripts/trackingjs/tracking-min.js"></script> <!-- Load tracking.js Script offline -->

<script src="logic/imported_scripts/tone.js/tone.js"></script><!-- Load tone.js Script offline -->

<!-- Font Family -->
<link rel="stylesheet" href="css/kalam_font/kalam_font.css">
<link rel="stylesheet" href="css/rock_salt_font/rock_salt_font.css">
<!-- //////////////////// -->
<script src="logic/imported_scripts/jquery-3.5.1.min.js"></script>

<link rel="stylesheet" href="css/index.css">



<video id="streamWebcam_background" width="640" height="480" autoplay></video>
      
<script>
    // start webcam stream
    var video = document.querySelector("#streamWebcam_background");
    if (navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
        video.srcObject = stream;
        })
        .catch(function (err0r) {
        console.log("Something went wrong!");
        });
    }

    // set start volume and create a Sampler
    var settings_instrument_volume = -100;
    var sampler = new Tone.Sampler({
    }).toDestination();
    sampler.volume.value = settings_instrument_volume;

    // initialize the tracking point coordinates
    color1_middle_point_x = 0;
    color1_middle_point_y = 0;
    color2_middle_point_x = 0;
    color2_middle_point_y = 0;

    is_blast_modus_active = false; // a funny funny mode
</script>

<?php
    include ("handtrack_sessions_data.php");
?>