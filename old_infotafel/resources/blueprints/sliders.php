
<?php


$ItemID = 0;

?>


<?php

  foreach (db_select_all_from("slider") as $wert) {

    $slider_id = utf8_encode($wert["id"]);
    $slider_size = utf8_encode($wert["size"]);
    $slider_row = utf8_encode($wert["row"]);
?>

<div class="Slider" data-size="<?php echo $slider_size; ?>" data-slider="<?php echo $slider_row ?>" style="order:<?php echo $slider_row ?>;">

  <?php

    foreach (db_select_all_from_where("item", "$slider_id") as $wert2) {

      $item_style = utf8_encode($wert2["style"]);
      $item_link = utf8_encode($wert2["link"]);
      $item_tag = utf8_encode($wert2["tag"]);
      $item_titel = utf8_encode($wert2["titel"]);
      $item_text = utf8_encode($wert2["text"]);
      $item_image = utf8_encode($wert2["img"]);
      $item_badge = utf8_encode($wert2["badge"]);

      $ItemfinalID = $ItemID++;


  ?>

    <div class="Item" id="Item<?php echo $ItemfinalID ?>" onclick="openSite(<?php echo $ItemfinalID ?>)">

      <?php
        $db_zeile3 = $db -> prepare("SELECT * FROM tags WHERE id = '$item_tag'");
        $db_zeile3 -> execute();
        $NEUEVAR3 = $db_zeile3->fetchAll();

        foreach ($NEUEVAR3 as $wert3) {

          $tag_name = utf8_encode($wert3["name"]);
          $tag_color = utf8_encode($wert3["color"]);
          $tag_icon = utf8_encode($wert3["icon"]);

        } ?>


      <div class="ItemInner" <?php if ($item_badge == 1) { ?> style="border-color:<?php echo $tag_color ?>" <?php } ?>>

        <?php if ($item_badge == 1) { ?>

          <div class="Badge" style="background:<?php echo $tag_color ?>">
            <i class="<?php echo $tag_icon ?>"></i>
          </div>

        <?php } ?>


        <!-- STYLE 0 ################################################# -->
        <?php if ($item_style == 0) { ?>

          <img src="<?php echo $item_image ?>">
          <div class="ImgOverlay">
            <?php if ($item_badge == 0) { ?>
              <div class="Icon">
                <?php if ($item_badge == 0) { ?>
                  <i class="<?php echo $tag_icon ?>"></i>
                <?php } ?>
              </div>
            <?php } ?>

            <div class="ItemContent">
              <div class="Titel"><p><?php echo $item_titel ?></p></div>
              <div class="Text"><p><?php echo $item_text ?></p></div>
            </div>
          </div>

        <?php } ?>

        <!-- STYLE 1 ################################################# -->
        <?php if ($item_style == 1) { ?>

          <img src="<?php echo $item_image ?>">
          <div class="Titel_Style_1"><p>
            <?php if ($item_badge == 0) {
              ?><i class="<?php echo $tag_icon ?>"></i><?php
            } ?>
            <?php echo $item_titel ?></p></div>

        <?php } ?>

        <!-- STYLE 2 ################################################# -->
        <?php if ($item_style == 2) { ?>

          <img src="<?php echo $item_image ?>">

        <?php } ?>

        <!-- STYLE 3 ################################################# -->









      </div>
    </div>

  <?php } ?>

</div>

<?php } ?>
