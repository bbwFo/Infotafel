<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="icon" type="image/png" href="resources/img/favicon.png">
    <link rel="stylesheet" href="resources/css/manager.css">
  </head>
  <body>
    <?php
      session_start();

      if ($_SESSION["login"] == 0) { header("Location: login.php"); }
    ?>

    <?php include 'resources/php/simple-php.php' ?>





    <div class="Main">








      <div class="Modal" id="Modal">

        <input id="inputTitel" type="text" placeholder="Titel">

        <input id="inputDescription" type="text" placeholder="Description">

        <select id="inputRow">
          <?php foreach (db_get_foreach('areas') as $X) { ?><option value="<?php echo $X["row"]; ?>">Level <?php echo $X["row"]; ?> - <?php echo $X["items"] ?> Kacheln</option><?php } ?>
        </select>

        <select id="inputIcon">
          <?php foreach (db_get_foreach('icons') as $X) { ?><option value="<?php echo $X["unicode"]; ?>"><?php echo $X["unicode"]; ?> <?php echo $X["name"] ?></option><?php } ?>
        </select>

        <select id="inputStyle">
          <?php foreach (db_get_foreach('style') as $X) { ?><option value="<?php echo $X['style'] ?>"><?php echo $X['style'] ?>.) <?php echo $X['name'] ?> (<?php echo $X['description'] ?>)</option><?php } ?>
        </select>

        <input id="inputColor" type="color" value="#FFFFFF">

        <input id="inputTermin" type="date">

        <textarea id="inputHtml" rows="8" cols="80" placeholder="Schreib hier HTML"></textarea>

        <button type="button" onclick="closeModal()">✘ Abbrechen</button>
        <button id="modalbutton" type="button"></button>
      </div>


      <div class="Modal" id="ModalQandA">
        <p></p>
        <button type="button" onclick="closeModalQandA()">✘ Abbrechen</button>
        <button id="ModalQandAButton" type="button"></button>
      </div>



      <div class="MainHead">Infotafel-Manager</div>
      <div class="MainMenu">
        <div class="Modal_Content_Menu">
          <label class="container" onclick='window.location.assign("#Box1")'>
            <input type="radio" name="menuradio" checked>
            <div class="checkmark"><p>Dashbord<i class="icon-equalizer1"></i></p></div>
          </label>
          <label class="container" onclick='openAddModal();'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>Hinzufügen<i class="icon-edit"></i></p></div>
          </label>
          <label class="container" onclick='window.location.assign("#Box3")'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>Alle Einträge<i class="icon-format_list_bulleted"></i></p></div>
          </label>
          <hr>
          <label class="container" onclick='window.location.assign("#Box1")'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>Einstellungen<i class="icon-settings1"></i></p></div>
          </label>
          <label class="container" onclick='window.location.assign("logout.php")'>
            <input type="radio" name="menuradio">
            <div class="checkmark"><p>Ausloggen<i class="icon-logout"></i></p></div>
          </label>
          <p class="copyright">&copy; Askylan 2021 - <?php echo date('Y') ?></p>
        </div>
      </div>
      <div class="MainBody">




        <!-- <div class="CardModal">

          <input id="card_titel" type="text" value="">

          <textarea id="card_description" rows="8" cols="80"></textarea>

          <select id="card_row">
            <?php foreach (db_get_foreach('areas') as $VAR) {?><option value="<?php echo $VAR["row"]; ?>">Level <?php echo $VAR["row"]; ?> - <?php echo $VAR["items"] ?> Kacheln</option><?php } ?>
          </select>

          <select id="card_icon">
            <?php foreach (db_get_foreach('icons') as $VAR) {?><option value="<?php echo $VAR["unicode"]; ?>"><?php echo $VAR["unicode"]; ?> <?php echo $VAR["name"] ?></option><?php } ?>
          </select>

          <input id="card_color" type="color" value="#ffffff">

          <select id="card_style">
            <?php foreach (db_get_foreach('style') as $VAR) { ?><option value="<?php echo $VAR['style'] ?>"><?php echo $VAR['style'] ?>.) <?php echo $VAR['name'] ?> (<?php echo $VAR['description'] ?>)</option><?php } ?>
          </select>

          <input id="card_termin" type="date" name="termin" value="">

          <input id="card_background" type="file" />

          <input id="card_pdf" type="file" />

          <input id="card_url" type="text" value="">

          <textarea id="card_html" rows="8" cols="80"></textarea>


          <button type="button" onclick="addCard()">senden</button>

        </div> -->


        <table id="dataTable">

          <tr>
            <th></th>
            <th>Image:</th>
            <th>Titel:</th>
            <th>Beschreibung:</th>
            <th>Level:</th>
            <th>Typ:</th>
            <th>ID:</th>
            <th>Termin:</th>
            <th>Style:</th>
            <th>Erstellt:</th>
            <th>Aktualisiert:</th>
            <th>
              <button type="button" onclick="openModalNEW()">+ Neu</button>
            </th>
          </tr>

          <tbody id="dataTableBody">

            <?php foreach (db_get_foreach('cards') as $VALUE) { ?>

            <tr>
              <td class="tdLeft" style="background:<?php echo $VALUE['color'] ?>;"><?php echo $VALUE['icon'] ?></td>
              <td class="tdLeft"><img src="resources/uploads/img/<?php echo $VALUE['background'] ?>" alt=""></td>
              <td class="tdLeft"><?php echo $VALUE['titel'] ?></td>
              <td class="tdLeft"><?php echo $VALUE['description'] ?></td>
              <td class="tdLeft"><?php echo $VALUE['row'] ?></td>
              <td class="tdLeft">
                <?php
                if ($VALUE['pdf'] != NULL) { ?><i class="icon-file-pdf"></i><?php }
                else if ($VALUE['url'] != NULL) { ?><i class="icon-link3"></i><?php }
                else if ($VALUE['html'] != NULL) { ?><i class="icon-html-five2"></i><?php }
                ?>
              </td>
              <td class="tdLeft"><?php echo $VALUE['id'] ?></td>
              <td class="tdCenter"><?php echo str_replace('-', '.', $VALUE['termin']) ?></td>
              <td class="tdCenter"><?php echo $VALUE['style'] ?></td>
              <td class="tdCenter"><?php echo str_replace('-', '.', $VALUE['create_date']) ?></td>
              <td class="tdCenter"><?php echo str_replace('-', '.', $VALUE['update_date']) ?></td>
              <td>
                <button type="button" onclick="getEntry(<?php echo $VALUE['id'] ?>)">✎ Bearbeiten</button>
                <button type="button" onclick="openModalQandA(<?php echo $VALUE['id'] ?>)">✘ Löschen</button>
              </td>
            </tr>

            <?php } ?>

          </tbody>
        </table>


        <!-- <input id="inputFile" type="file" value="">
        <button type="button" onclick="fileToServer('hallo')" name="button">erfefef</button>
 -->






      </div>

    </div>


    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/table.js"></script>
    <script src="resources/js/manager.js"></script>


  </body>
</html>
