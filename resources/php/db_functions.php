<?php
// ASKYLAN PHP FUNCTIONS-KIT


// session_start();
// session_destroy();









function file_save(string $PATH, $FILE, $UUID)
{
  $FILENAME = $FILE['name'];

  $PATHTOFILE = $PATH.$FILENAME;

  $FILETYPE = pathinfo($PATHTOFILE, PATHINFO_EXTENSION);
  $FILETYPE = strtolower($FILETYPE);

  $VALIDTYPES = array("jpg","jpeg","png","gif");

  $RESPONDE = 0;

  if(in_array(strtolower($FILETYPE), $VALIDTYPES))
  {
    if(move_uploaded_file($_FILES['file']['tmp_name'], $PATHTOFILE))
    {
      $RESPONDE = $PATHTOFILE;

      rename($PATHTOFILE, $PATH.$UUID.'.'.$FILETYPE);

      return $UUID.'.'.$FILETYPE;
    }
  }
}















function db_count(string $TABLE, string $ROW, string $TARGET)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT * FROM $TABLE WHERE $ROW = '$TARGET'");
  $ZEILE -> execute();
  $RESULT = $ZEILE -> fetchAll();
  return count($RESULT);


}








// echo gen_username();

function gen_username()
{
  $firstname = array('Drake','Johnathon','Anthony','Erasmo','Raleigh','Nancie','Tama','Camellia','Augustine','Christeen','Luz','Diego','Lyndia','Thomas','Georgianna','Leigha','Alejandro','Marquis','Joan','Stephania','Elroy','Zonia','Buffy','Sharie','Blythe','Gaylene','Elida','Randy','Margarete','Margarett','Dion','Tomi','Arden','Clora','Laine','Becki','Margherita','Bong','Jeanice','Qiana','Lawanda','Rebecka','Maribel','Tami','Yuri','Michele','Rubi','Larisa','Lloyd','Tyisha','Samatha');
  $lastname = array('Dragon','Mischke','Serna','Pingree','Mcnaught','Pepper','Schildgen','Mongold','Wrona','Geddes','Lanz','Fetzer','Schroeder','Block','Mayoral','Fleishman','Roberie','Latson','Lupo','Motsinger','Drews','Coby','Redner','Culton','Howe','Stoval','Michaud','Mote','Menjivar','Wiers','Paris','Grisby','Noren','Damron','Kazmierczak','Haslett','Guillemette','Buresh','Center','Kucera','Catt','Badon','Grumbles','Antes','Byron','Volkman','Klemp','Pekar','Pecora','Schewe','Ramage');

  $name = $firstname[rand ( 0 , count($firstname) -1)];
  $name .= ' ';
  $name .= $lastname[rand ( 0 , count($lastname) -1)];

  return $name;
}




// GET_VALUES()
//
// GIBT WERTE AUS DER DATENBANK ALS ASSOCIATUVES ARRAY ZURÜCK.
// SYNTAX: get_values('TABELLE', 'UUID', array('WERT1', 'WERT2', 'WERT3'));
// RÜCKGABE:  BEISPIEL: {"WERT1":"hallo","WERT2":"wie","WERT3":"gehts"}
// ACHTUNG! NACH DER UUID MUSS IMMER EIN ARRAY STEHEN.



function get_values(string $TABLE, string $UUID, array $DATA)
{
  include 'db.php';

  $NEWDATA = '';

  foreach ($DATA as $VAR)
  {
    if ($VAR == end($DATA)) { $NEWDATA .= $VAR; } else { $NEWDATA .= $VAR.", "; }
  }

  $ZEILE = $db -> prepare("SELECT $NEWDATA FROM $TABLE WHERE uuid = '$UUID'");
  $ZEILE -> execute();
  $DB_RESULT = $ZEILE -> fetchAll();

  $RETURN = array();

  foreach ($DB_RESULT as $DB_VALUE)
  {
    foreach ($DATA as $DATA_INDEX)
    {
      $RETURN += array($DATA_INDEX => $DB_VALUE[$DATA_INDEX]);
    }
  }

  return $RETURN;
}


function get_value(string $TABLE, string $UUID, string $DATA)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT $DATA FROM $TABLE WHERE uuid = '$UUID'");
  $ZEILE -> execute();
  $RESULT = $ZEILE -> fetchAll();

  foreach ($RESULT as $VALUE)
  {
    $RETURN = $VALUE["username"];
  }

  return $RETURN;
}





function get_all_values(string $TABLE)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT * FROM $TABLE");
  $ZEILE -> execute();
  return $RESULT = $ZEILE -> fetchAll();
}



// -----------------------------------------------------------------------------

function gen_cookie(string $COOKIENAME, int $DAYS, string $COOKIEDATA)
{
  if (isset($_COOKIE[$COOKIENAME]))
  {
    return 0;
  }
  else
  {
    setcookie($COOKIENAME, $COOKIEDATA, strtotime($DAYS.' days'));
  }
}


function del_cookie(string $COOKIENAME)
{
  if (isset($_COOKIE[$COOKIENAME]))
  {
    setcookie($COOKIENAME, '', strtotime('0 days'));
  }
  else
  {
    return 0;
  }
}



function get_cookie(string $COOKIENAME)
{
  if (isset($_COOKIE[$COOKIENAME]))
  {
    return $_COOKIE[$COOKIENAME];
  }
  else
  {
    return 0;
  }
}

// -----------------------------------------------------------------------------

function gen_session(string $TABLE, string $UUID ,array $ROWS)
{
  include 'db.php';

  foreach ($ROWS as $WERT)
  {
    $ZEILE = $db -> prepare("SELECT $WERT FROM $TABLE WHERE uuid = '$UUID'");
    $ZEILE -> execute();
    $RESULT = $ZEILE -> fetchAll();

    foreach ($RESULT as $SESSION_VALUE)
    {
      $_SESSION["$WERT"] = $SESSION_VALUE["$WERT"];
    }
  }
}

// -----------------------------------------------------------------------------

function psw_very(string $PASSWORD, string $UUID)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT password FROM user WHERE uuid = '$UUID'");
  $ZEILE -> execute();
  $RESULT = $ZEILE -> fetchAll();

  foreach ($RESULT as $VALUE) { $HASHED_PASSWORD = $VALUE["password"]; }

  return (password_verify($PASSWORD, $HASHED_PASSWORD)) ? true : false;

}

// -----------------------------------------------------------------------------

// db_add()
// FÜGT WERTE DER DATENBANK HINZU.
// SYNTAX: db_add('TABELLE', array('INDEX1' => 'VALUE1', $INDEX2 => $VALUE2));
// ACHTUNG! NACH DER TABELLE MUSS IMMER EIN ARRAY STEHEN.

function db_add(string $TABLE, array $DATA)
{
  include 'db.php';

  $INDEX = '';
  $VALUE = '';

  foreach ($DATA as $INDEXES => $VALUES) {

    if ($VALUES == end($DATA))
    {
      $INDEX .= $INDEXES."";
      $VALUE .= "'".$VALUES."'";
    }
    else
    {
      $INDEX .= $INDEXES.", ";
      $VALUE .= "'".$VALUES."', ";
    }
  }

  $EXEC_DATA = "INSERT INTO $TABLE( $INDEX ) VALUES ( $VALUE )";
  $db -> exec($EXEC_DATA);

}

// -----------------------------------------------------------------------------

// db_update()
// UPDATED WERTE DER DATENBANK.
// SYNTAX: db_update('TABELLE', 'UUID', array('INDEX1' => 'VALUE1', $INDEX2 => $VALUE2));
// ACHTUNG! NACH DER UUID MUSS IMMER EIN ARRAY STEHEN.

function db_update(string $TABLE,string $UUID, array $DATA)
{
  include 'db.php';

  $VALUE = '';

  foreach ($DATA as $INDEX => $VALUES) {

    if ($VALUES == end($DATA))
    {
      $VALUE .= $INDEX."='".$VALUES."'";
    }
    else
    {
      $VALUE .= $INDEX."='".$VALUES."', ";
    }
  }

  $UPDATE = $db -> prepare("UPDATE $TABLE SET $VALUE WHERE uuid = $UUID");
  $UPDATE -> execute();

}

// -----------------------------------------------------------------------------

// db_delete()
// LÖSCHT WERTE AUS DER DATENBANK.
// SYNTAX: db_delete('TABELLE', 'UUID');

function db_delete(string $TABLE, string $UUID)
{
  include 'db.php';

  $DELETE = $db->prepare("DELETE FROM $TABLE WHERE uuid = '$UUID'");
  $DELETE -> execute();


}

// -----------------------------------------------------------------------------

function gen_very()
{
  include 'db.php';

  do
  {
    $ZEICHEN = '0123456789'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $ZEICHEN_LENGTH = strlen($ZEICHEN);

    $CODEBLOCK1 = '';
    $CODEBLOCK2 = '';
    $CODEBLOCK3 = '';

    for ($i = 0; $i < 6; $i++) { $CODEBLOCK1 .= $ZEICHEN[rand(0, $ZEICHEN_LENGTH - 1)]; }
    for ($i = 0; $i < 6; $i++) { $CODEBLOCK2 .= $ZEICHEN[rand(0, $ZEICHEN_LENGTH - 1)]; }
    for ($i = 0; $i < 6; $i++) { $CODEBLOCK3 .= $ZEICHEN[rand(0, $ZEICHEN_LENGTH - 1)]; }

    $VERYCODE = $CODEBLOCK1.'-'.$CODEBLOCK2.'-'.$CODEBLOCK3;

    $ZEILE = $db -> prepare("SELECT * FROM user WHERE uuid = '$VERYCODE'");
    $ZEILE -> execute();
    $RESULT = $ZEILE -> fetchAll();
    $EXSIST = count($RESULT);
  }
  while ($EXSIST);

  return $VERYCODE;


}

// -----------------------------------------------------------------------------

// gen_uuid()
// GENERIERT EINE 20 STELLIGE USER-IDENTIFIKATIONSNUMMER DIE ES NUR EINMALIG IN DER DATENBANK GIBT.
// RÜCKGABEWERT IST DER UUID-CODE.

function gen_uuid()
{
  include 'db.php';

  do
  {
    $ZEICHEN = '0123456789'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'abcdefghijklmnopqrstuvwxyz';
    $ZEICHEN_LENGTH = strlen($ZEICHEN);
    $UUID_CODE = '';

    for ($i = 0; $i < 30; $i++)
    {
      $UUID_CODE .= $ZEICHEN[rand(0, $ZEICHEN_LENGTH - 1)];
    }

    $ZEILE = $db -> prepare("SELECT * FROM user WHERE uuid = '$UUID_CODE'");
    $ZEILE -> execute();
    $RESULT = $ZEILE -> fetchAll();
    $EXSIST = count($RESULT);
  }
  while ($EXSIST);

  return $UUID_CODE;
}

// -----------------------------------------------------------------------------

// psw_hash()
// HASHT EIN PASSWORD WIE IN DER FUNKTION VORGEGEBEN UND GIBT ES GEHASHT ZURÜCK.
// SYNTAX: psw_hash('1234');

function psw_hash($PASSWORD)
{
  $PASSWORD_HASH = password_hash($PASSWORD, PASSWORD_DEFAULT);

  return $PASSWORD_HASH;
}

// -----------------------------------------------------------------------------





?>
