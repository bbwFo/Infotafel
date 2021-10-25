<?php
  include("../sql/db.php");

  // error_reporting(0);

  $db_zeile = $db -> prepare("SELECT * FROM slider");
  $db_zeile -> execute();
  $result = $db_zeile->fetchAll();

  foreach ($result as $wert) {

    $slider_size = utf8_encode($slider_size["slider_size"]);
    $slider_link = utf8_encode($slider_link["slider_link"]);


?>

<div class="Slider" data-size="<?php echo $slider_size; ?>">
  <div class="Item"><div class="ItemInner" onclick="<?php echo $slider_link; ?>"></div></div>
  <div class="Item"><div class="ItemInner" onclick="<?php echo $slider_link; ?>"></div></div>
  <div class="Item"><div class="ItemInner" onclick="<?php echo $slider_link; ?>"></div></div>
  <div class="Item"><div class="ItemInner" onclick="<?php echo $slider_link; ?>"></div></div>
</div>


<?php } ?>
