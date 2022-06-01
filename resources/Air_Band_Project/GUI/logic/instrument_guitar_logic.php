<script>

// Wait for the page to be ready
window.addEventListener("load", function(e) {

console.log("Page loaded!");
var guitar_chord_choice = 0;

var max_boxes = 1 // e.data.length <= 1: set the max boxes on the screen to 1 boxes on the same time (for each Color Tracker)

//variablen Canvas Box draw
var canvas_box_width = 80;
var canvas_box_height = 40;

// # Box Class
class Box {
  constructor(xp, xw, yp, yw, keywithsample, wasplayedfromcolor1, wasplayedfromcolor2) {
    this.xp = xp;
    this.xw = xw;
    this.yp = yp;
    this.yw = yw;
    this.keywithsample = keywithsample;
    this.wasplayedfromcolor1 = wasplayedfromcolor1;
    this.wasplayedfromcolor2 = wasplayedfromcolor2;
  }
  // # Methods
  playSample()
  {
    sampler.triggerAttack(this.keywithsample);
  }

  StartForColor1()
  {
    // if()
    // {
      
    // }
  }

  StartForColor2(webcam, canvasboxwidth)
  {
    //console.log("color2_middle_point_x " + color2_middle_point_x + " this.xp " + this.xp + " this.xw " + this.xw + " color2_middle_point_y " + color2_middle_point_y + " this.yp " + this.yp + " this.yw " + this.yw);
    if(color2_middle_point_x > calculateNewBoxRecognitionDataWidth(this.xp, webcam.width, canvasboxwidth) && color2_middle_point_x < calculateNewBoxRecognitionDataWidth(this.xp, webcam.width, canvasboxwidth) + this.xw && color2_middle_point_y > this.yp && color2_middle_point_y < this.yp + this.yw)
    //if(color2_middle_point_x > this.xp && color2_middle_point_x < this.xp + this.xw && color2_middle_point_y > this.yp && color2_middle_point_y < this.yp + this.yw)
    {
      if(this.wasplayedfromcolor2 == false)
      {
        this.playSample();
        this.wasplayedfromcolor2 = true;
      }
    //   if(this.wasplayedfromcolor2 == false)
    //   {
    //     this.playSample();
    //     if(is_blast_modus_active === false)
    //     {
    //       this.wasplayedfromcolor2 = true;
    //     }
    //     else
    //     {
    //       this.wasplayedfromcolor2 = false;
    //     }
    //   }
    // }
    // else
    // {
    //   this.wasplayedfromcolor2 = false;
    // }
    }
    // else
    // {
    //   this.wasplayedfromcolor2 == false;
    // }
  }

  DrawBox(color, text, bfs, canvas_context) // color red or blue
  {
    canvas_context.globalAlpha = 1;
    canvas_context.beginPath();
    canvas_context.lineWidth = 5;
    canvas_context.strokeStyle = color;
    canvas_context.strokeRect(this.xp, this.yp, this.xw, this.yw);

    canvas_context.fillStyle = color;
    canvas_context.globalAlpha = 0.5;
    canvas_context.fillRect(this.xp, this.yp, this.xw, this.yw);
    canvas_context.globalAlpha = 1;

    canvas_context.textAlign = "center";
    canvas_context.font = bfs + "px" + "'Rock Salt'";
    canvas_context.fillStyle = "black";
    canvas_context.fillText(text, (this.xp + this.xw * 0.5), (this.yp + this.yw * 0.5));
  }

}

// Create a Sampler
var settings_instrument_volume = 10;
var sampler = new Tone.Sampler({
    "D2" : "audio/E-Guitar_Sounds/01_Chord_D2.wav",
    "D#2" : "audio/E-Guitar_Sounds/02_Chord_Dsh2.wav",
    "E2" : "audio/E-Guitar_Sounds/03_Chord_E2.wav",
    "F2" : "audio/E-Guitar_Sounds/04_Chord_F2.wav",
    "F#2" : "audio/E-Guitar_Sounds/05_Chord_Fsh2.wav",
    "G2" : "audio/E-Guitar_Sounds/06_Chord_G2.wav",
    "G#2" : "audio/E-Guitar_Sounds/07_Chord_Gsh2.wav",
    "A2" : "audio/E-Guitar_Sounds/08_Chord_A2.wav",
    "A#2" : "audio/E-Guitar_Sounds/09_Chord_Ash2.wav",
    "B2" : "audio/E-Guitar_Sounds/10_Chord_B2.wav",
    "C3" : "audio/E-Guitar_Sounds/11_Chord_C3.wav",
    "C#3" : "audio/E-Guitar_Sounds/12_Chord_Csh3.wav",
    "D3" : "audio/E-Guitar_Sounds/13_Chord_D3.wav",
    "D#3" : "audio/E-Guitar_Sounds/14_Chord_Dsh3.wav",
    "E3" : "audio/E-Guitar_Sounds/15_Chord_E3.wav",
    "F3" : "audio/E-Guitar_Sounds/16_Chord_F3.wav",
    "F#3" : "audio/E-Guitar_Sounds/17_Chord_Fsh3.wav",
    "G3" : "audio/E-Guitar_Sounds/18_Chord_G3.wav",

}).toDestination();
sampler.volume.value = settings_instrument_volume;
//-----------------------------------------------

// Grab reference to the tags we will be using
const audio = document.querySelector('#audio');
var stream_webcam_instrument = document.getElementById('streamWebcam_instrument');
var canvas_instrument_tracker1 = document.getElementById('canvas1');
var canvas_instrument_tracker2 = document.getElementById('canvas2');
var canvas_instrument_merge = document.getElementById('canvas3');
var context_instrument1 = canvas_instrument_tracker1.getContext('2d');
var context_instrument2 = canvas_instrument_tracker2.getContext('2d');
var context_instrument3 = canvas_instrument_merge.getContext('2d');
var color_1_swatch = document.getElementById("tracker_1_color");
var color_2_swatch = document.getElementById("tracker_2_color");
var color_1_slider = document.getElementById("tracker_1_tolerance");
var color_2_slider = document.getElementById("tracker_2_tolerance");

// Create the Box-Objects
var box1 = new Box(520, canvas_box_width, 320, canvas_box_height, "", false, false); // strumming section
var box2 = new Box(440, canvas_box_width, 320, canvas_box_height, "B2", false, false); // Chord 1
var box3 = new Box(360, canvas_box_width, 320, canvas_box_height, "A2", false, false); // Chord 2
var box4 = new Box(280, canvas_box_width, 320, canvas_box_height, "G2", false, false); // Chord 3
var box5 = new Box(200, canvas_box_width, 320, canvas_box_height, "F2", false, false); // Chord 4
var box6 = new Box(120, canvas_box_width, 320, canvas_box_height, "E2", false, false); // Chord 5
var box7 = new Box(40, canvas_box_width, 320, canvas_box_height, "D2", false, false); // Chord 6


mergeCanvas(box1, box2, box3, box4, box5, box6, box7, context_instrument1, context_instrument2, context_instrument3);

// witch Color Field is selected
var color_1_swatch_active = true;
var color_2_swatch_active = false;

// witch Color Field is selected mark yellow
color_1_swatch.style.borderColor = "Yellow";
color_2_swatch.style.borderColor = "gray";

// Store the color we will be tracking (selectable by clicking on the stream_webcam_instrument feed)
var color1 = {r: 255, g: 0, b: 0};
var color2 = {r: 255, g: 0, b: 0};

// Register our custom color tracking function
tracking.ColorTracker.registerColor('color_1', function(r, g, b) {return getColorDistance(color1, {r: r, g: g, b: b}) < color_1_slider.value});
tracking.ColorTracker.registerColor('color_2', function(r, g, b) {return getColorDistance(color2, {r: r, g: g, b: b}) < color_2_slider.value});

// Create the color tracking object
var tracker1 = new tracking.ColorTracker(['color_1']);
var tracker2 = new tracking.ColorTracker(['color_2']);

// Add callback for the "track" event
tracker1.on('track', function(e) {

  context_instrument1.clearRect(0, 0, canvas_instrument_tracker1.width, canvas_instrument_tracker1.height);

  if (e.data.length !== 0 && e.data.length <= max_boxes) {
    e.data.forEach(function(rect1) {
      // # Assign coordinates to the colors and draw a rect1angle
      // ## Color 1
      if(rect1.color == "color_1")
      {
        color1_middle_point_x = rect1.x + (rect1.width * 0.5);
        color1_middle_point_y = rect1.y + (rect1.height * 0.5);
        drawRect(rect1, context_instrument1, color1, color1_middle_point_x, color1_middle_point_y);
      }
      else
      {
        color1_middle_point_x = 0;
        color1_middle_point_y = 0;
      }

      // # Box Starts 
      // ## for color1
      if(color1_middle_point_x > calculateNewBoxRecognitionDataWidth(box1.xp, stream_webcam_instrument.width, canvas_box_width) && color1_middle_point_x < calculateNewBoxRecognitionDataWidth(box1.xp, stream_webcam_instrument.width, canvas_box_width) + box1.xw && color1_middle_point_y > box1.yp && color1_middle_point_y < box1.yp + box1.yw)
      //if(color1_middle_point_x > box1.xp && color1_middle_point_x < box1.xp + box1.xw && color1_middle_point_y > box1.yp && color1_middle_point_y < box1.yp + box1.yw)
      {
        box1.wasplayedfromcolor1 = true;
      }
      else
      {
        box1.wasplayedfromcolor1 = false;
        box2.wasplayedfromcolor2 = false;
        box3.wasplayedfromcolor2 = false;
        box4.wasplayedfromcolor2 = false;
        box5.wasplayedfromcolor2 = false;
        box6.wasplayedfromcolor2 = false;
        box7.wasplayedfromcolor2 = false;
      }
      

      // ## Debug
      // console.log(rect1);
      // console.log("osc.frequency.value "+ osc.frequency.value);
      // console.log("osc.volume.value "+ osc.volume.value);
      // console.log("color 1 "+ " x " + color1_middle_point_x + " y " + color1_middle_point_y);
      // console.log("color 2 "+ " x " + color2_middle_point_x + " y " + color2_middle_point_y);
      //-----------------------------------------------------

    });
  }
});


// Add callback for the "track" event
tracker2.on('track', function(e) {

context_instrument2.clearRect(0, 0, canvas_instrument_tracker2.width, canvas_instrument_tracker2.height);

if (e.data.length !== 0 && e.data.length <= max_boxes) {
  e.data.forEach(function(rect2) {
    // # Assign coordinates to the colors and draw a Rectangle
    // ## Color 2
    if(rect2.color == "color_2")
    {
      color2_middle_point_x = rect2.x + (rect2.width * 0.5);
      color2_middle_point_y = rect2.y + (rect2.height * 0.5);
      drawRect(rect2, context_instrument2, color2, color2_middle_point_x, color2_middle_point_y);
    }
    else
    {
      color2_middle_point_x = 0;
      color2_middle_point_y = 0;
    }

    // ## for color2
    if(box1.wasplayedfromcolor1 == true)
    {
        box2.StartForColor2(stream_webcam_instrument, canvas_box_width);
        box3.StartForColor2(stream_webcam_instrument, canvas_box_width);
        box4.StartForColor2(stream_webcam_instrument, canvas_box_width);
        box5.StartForColor2(stream_webcam_instrument, canvas_box_width);
        box6.StartForColor2(stream_webcam_instrument, canvas_box_width);
        box7.StartForColor2(stream_webcam_instrument, canvas_box_width);
    }

    // ## Debug
    // console.log(rect2);
    // console.log("osc.frequency.value "+ osc.frequency.value);
    // console.log("osc.volume.value "+ osc.volume.value);
    // console.log("color 1 "+ " x " + color1_middle_point_x + " y " + color1_middle_point_y);
    // console.log("color 2 "+ " x " + color2_middle_point_x + " y " + color2_middle_point_y);
    //-----------------------------------------------------

  });
}
});

// Start tracking
tracking.track(stream_webcam_instrument, tracker1, { camera: true } );
tracking.track(stream_webcam_instrument, tracker2, { camera: true } );

// # Add listener for the click event on the color field
// ## Color 1
color_1_swatch.addEventListener("click", function (e) {
  color_1_swatch_active = true;
  color_2_swatch_active = false;

  color_1_swatch.style.borderColor = "Yellow";
  color_2_swatch.style.borderColor = "gray";

});

// ## Color 2
color_2_swatch.addEventListener("click", function (e) {
  color_2_swatch_active = true;
  color_1_swatch_active = false;

  color_2_swatch.style.borderColor = "Yellow";
  color_1_swatch.style.borderColor = "gray";
});

// Add listener for the click event on the video
stream_webcam_instrument.addEventListener("click", function (e) {
  // Grab color from the video feed where the click occured
  var c = getColorAt(stream_webcam_instrument, e.offsetX, e.offsetY);

  if(color_1_swatch_active == true)
  {
    // Update target color from color 1
    color1.r = c.r;
    color1.g = c.g;
    color1.b = c.b;

    // Update the div's background so we can see which color was selected
    color_1_swatch.style.backgroundColor = "rgb(" + c.r + ", " + c.g + ", " + c.b + ")";
  }
  else
  {
    if(color_2_swatch_active == true)
    {
      // Update target color from color 2
      color2.r = c.r;
      color2.g = c.g;
      color2.b = c.b;

      // Update the div's background so we can see which color was selected
      color_2_swatch.style.backgroundColor = "rgb(" + c.r + ", " + c.g + ", " + c.b + ")";
    }
  }

});

});

// Calculates the Euclidian distance between the target color and the actual color
function getColorDistance(target, actual) {
return Math.sqrt(
  (target.r - actual.r) * (target.r - actual.r) +
  (target.g - actual.g) * (target.g - actual.g) +
  (target.b - actual.b) * (target.b - actual.b)
);
}

// Returns the color at the specified x/y location in the stream_webcam_instrument video feed
function getColorAt(stream_webcam_instrument, x, y) {

// To be able to access pixel data from the stream_webcam_instrument feed, we must first draw the current frame in
// a temporary canvas_instrument.
var canvas_instrument3 = document.createElement('canvas');
var context_instrument3 = canvas_instrument3.getContext('2d');
canvas_instrument3.width = stream_webcam_instrument.width;
canvas_instrument3.height = stream_webcam_instrument.height;
context_instrument3.drawImage(stream_webcam_instrument, 0, 0, stream_webcam_instrument.width, stream_webcam_instrument.height);

// Then we grab the pixel information from the temp canvas_instrument and return it as an object
var pixel = context_instrument3.getImageData(x, y, 1, 1).data;
return {r: pixel[0], g: pixel[1], b: pixel[2]};

}

// Draw a colored rectangle on the canvas_instrument
function drawRect(rect, context_instrument, color, middle_point_x, middle_point_y, canvas_instrument, stream_webcam_instrument)
{
  // Draw Rectangle
  context_instrument.lineWidth = 5;
  context_instrument.strokeStyle = "rgb(" + color.r + ", " + color.g + ", " + color.b + ")";
  context_instrument.strokeRect(rect.x, rect.y, rect.width, rect.height);

  // Draw Middle Point
  context_instrument.beginPath();
  context_instrument.fillStyle = "green";
  context_instrument.arc(middle_point_x, middle_point_y, 10,0,2*Math.PI);
  context_instrument.fill();
  context_instrument.fillStyle = "black";
  context_instrument.textAlign = "center";
}

function mergeCanvas(b1, b2, b3, b4, b5, b6, b7, context_instrument1, context_instrument2, context_canvas)
{

  // context_canvas.drawImage(context_instrument1, 0, 0);
  // context_canvas.drawImage(context_instrument2, 0, 0);

  // # Draw Template
  var box_font_size = 15;
  b1.DrawBox("orange", "strum", box_font_size, context_canvas);
  b2.DrawBox("blue", "1", box_font_size, context_canvas);
  b3.DrawBox("red", "2", box_font_size, context_canvas);
  b4.DrawBox("blue", "3", box_font_size, context_canvas);
  b5.DrawBox("red", "4", box_font_size, context_canvas);
  b6.DrawBox("blue", "5", box_font_size, context_canvas);
  b7.DrawBox("red", "6", box_font_size, context_canvas);
}

function calculateNewBoxRecognitionDataWidth(value, webcamwidth, canvasboxwidth)
{
  return (webcamwidth/2) - (value) + ((webcamwidth/2) - canvasboxwidth);
}
</script>