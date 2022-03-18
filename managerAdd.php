<link rel="stylesheet" href="resources/css/manager.css">
<?php
  session_start();

  if ($_SESSION["login"] == 0) { header("Location: login.php"); }
?>

<?php include 'resources/php/db_functions.php' ?>

<div class="Modal_Screen_Overlay">
  <div class="Modal">
    <div class="Modal_Head">
      <div class="Modal_Head_Titel">
        <p>Neuen Eintrag erstellen</p>
      </div>
      <div class="Modal_Head_Button">
        <a href="manager.php"><i class="icon-close"></i></a>
      </div>
    </div>
    <div class="Modal_Content">
      <div class="Modal_Content_Menu">
        <label class="container" onclick='window.location.assign("#ModalBox1")'>
          <input type="radio" name="radio" checked>
          <div class="checkmark"><p>Titel & Beschreibung</p></div>
        </label>
        <label class="container" onclick='window.location.assign("#ModalBox2")'>
          <input type="radio" name="radio">
          <div class="checkmark"><p>Reihe</p></div>
        </label>
        <label class="container" onclick='window.location.assign("#ModalBox3")'>
          <input type="radio" name="radio">
          <div class="checkmark"><p>Icon & Farbe</p></div>
        </label>
        <label class="container" onclick='window.location.assign("#ModalBox4")'>
          <input type="radio" name="radio">
          <div class="checkmark"><p>Aussehen</p></div>
        </label>
        <label class="container" onclick='window.location.assign("#ModalBox5")'>
          <input type="radio" name="radio">
          <div class="checkmark"><p>Content</p></div>
        </label>
        <hr>
        <label class="container" onclick='window.location.assign("#ModalBox6")'>
          <input type="radio" name="radio">
          <div class="checkmark"><p>Hintergrungbild</p></div>
        </label>
        <label class="container" onclick='window.location.assign("#ModalBox7")'>
          <input type="radio" name="radio">
          <div class="checkmark"><p>Termin</p></div>
        </label>
        <hr>
        <label class="container" onclick='window.location.assign("#ModalBox8")'>
          <input type="radio" name="radio">
          <div class="checkmark"><p>Fertigstellen</p></div>
        </label>
      </div>
      <div class="ModalContentBody">
        <form id="formAdd" method='post' accept-charset='UTF-8' enctype="multipart/form-data">
          <div class="ModalContentBodyItem" id="ModalBox1">
            <p>Titel</p>
            <p class="info">Lege den Titel der Kachel fest. Nehme ein Thema oder ein Schlagword was den Inhalt sehenswert macht.</p>
            <input type="text" name="titel" value="" autocomplete="off" id="input_titel">
            <p>Beschreibung</p>
            <p class="info">Beschreibe kurz den Inhalt der Kachel und um was es sich handelt oder einfach was interresantes.</p>
            <textarea name="description" rows="4" cols="20" id="input_description"></textarea>
          </div>
          <div class="ModalContentBodyItem" id="ModalBox2">
            <p>Reihe</p>
            <p class="info">Lege hier den bereich fest in den die Kachel angezeigt wird.<br>Das 1. Level befindet sich ganz Oben auf dem Bildschirm.<br>Die Zahl der Kacheln in den optionen zeigt an wie viele Kacheln sich in den Level auf einer Seite im Sichtbereich gleichzeitig befinden.</p>
            <select name="row" id="input_row"><?php foreach (db_foreach_values('areas') as $VAR) {?><option value="<?php echo $VAR["row"]; ?>">Level <?php echo $VAR["row"]; ?> - <?php echo $VAR["items"] ?> Kacheln</option><?php } ?></select>
          </div>
          <div class="ModalContentBodyItem" id="ModalBox3">
            <p>Icon</p>
            <p class="info">Lege ein Icon fest das zu deinem Thema past.</p>
            <select name="icon" id="input_icon"><?php foreach (db_foreach_values('icons') as $VAR) {?><option value="<?php echo $VAR["unicode"]; ?>"><?php echo $VAR["unicode"]; ?> <?php echo $VAR["name"] ?></option><?php } ?></select>
            <p>Farbe</p>
            <p class="info">Lege die Akzentfarbe fest.</p>
            <input type="color" name="color" value="#ffffff" id="input_color">
          </div>
          <div class="ModalContentBodyItem" id="ModalBox4">
            <p>Termin festlegen (optional)</p>
            <p class="info">Es muss kein Termin angegeben werden. Das Datum ist auf der Kachel groß dargestellt.</p>
            <input type="date" name="termin" value="" id="input_termin">
          </div>
          <div class="ModalContentBodyItem" id="ModalBox5">
            <p>Aussehen (deaktiviert bei Termin)</p>
            <p class="info">Ändert das Aussehen einer Kachel. (Wird deaktiviert wenn ein Termin festgelegt wurde)</p>
            <select name="style" id="input_style"><?php foreach (db_foreach_values('style') as $VAR) { ?><option value="<?php echo $VAR['style'] ?>"><?php echo $VAR['style'] ?> <?php echo $VAR['name'] ?> (<?php echo $VAR['description'] ?>)</option><?php } ?></select>
          </div>
          <div class="ModalContentBodyItem" id="ModalBox6">
            <p>Hintergrundbild (optional)</p>
            <p class="info">Klicke auf den Kasten und lege ein Hintergrund bild für die gesamte Kachel fest.<br>(Nur .jpg, .jpeg, .png und .gif sind erlaubt!)</p>
            <input  id="input_background" type="file" name="background" onchange="readURL(this);" />
            <div class="ImagePrevBox" id="ImagePrevBox">
              <label for="input_background"></label>
              <img id="ImagePrev" src="#" />
            </div>
          </div>
          <div class="ModalContentBodyItem" id="ModalBox7">
            <group>
              <div class="input-container">
                <input  onclick='window.location.assign("#ModalBox71")' type="radio" name="contentswitch" checked><label>PDF</label>
              </div>
              <div class="input-container">
                <input  onclick='window.location.assign("#ModalBox72")' type="radio" name="contentswitch"><label>URL</label>
              </div>
              <div class="input-container">
                <input  onclick='window.location.assign("#ModalBox73")' type="radio" name="contentswitch"><label>HTML</label>
              </div>
            </group>
            <div class="ContentTypeBox">
              <div class="ContentTypeBoxItem" id="ModalBox71">
                <p class="info">Es kann nur eine PDF-Datei hochgeladen werden die größe der Datei ist aber egal!</p>
                <input type="file" name="pdf" id="input_pdf" />
              </div>
              <div class="ContentTypeBoxItem" id="ModalBox72">
                <p class="info">Nicht alle Webseiten Akzeptieren eine verbindung über einen iframe!</p>
                <input type="url" name="url" value="" placeholder="https://open.mediadrake.net" id="input_url">
              </div>
              <div class="ContentTypeBoxItem" id="ModalBox73">
                <textarea name="html" rows="10" cols="20" placeholder="<h1>Hello World!<h1><br><p style='color:green;'>My Name is Askylan! aka. HeavyMountainMax<p>" id="input_html"></textarea>
              </div>
            </div>
          </div>
          <div class="ModalContentBodyItem" id="ModalBox8">
            <button type="submit" id="upload">Eintrag anlegen</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="resources/js/jquery.js"></script>
<script src="resources/js/manager.js"></script>
<script src="resources/js/managerAdd.js"></script>
