<?php

// ############################################################################# DB_ADD()

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

// ############################################################################# DB_DELETE()

function db_delete(string $TABLE, string $INDEX, string $VALUE)
{
  include 'db.php';

  $DELETE = $db -> prepare("DELETE FROM $TABLE WHERE $INDEX = '$VALUE'");
  $DELETE -> execute();
}

// ############################################################################# GEN_UUID_BY()

function gen_id(string $TABLE, string $ID_NAME, int $LENGHT, string $ZEICHENSATZ)
{
  if ($ZEICHENSATZ != 'default') { $ZEICHEN = $ZEICHENSATZ; }
  else { $ZEICHEN = '0123456789'.'abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; }

  do
  {
    $ZEICHEN_LENGTH = strlen($ZEICHEN);
    $ID_CODE = '';

    for ($i = 0; $i < $LENGHT; $i++) { $ID_CODE .= $ZEICHEN[rand(0, $ZEICHEN_LENGTH - 1)]; }
  }
  while (db_count($TABLE, $ID_NAME, $ID_CODE));

  return $ID_CODE;
}

// ############################################################################# DB_COUNT()

function db_count(string $TABLE, string $INDEX, string $VALUE)
{
  include 'db.php';

  if ($VALUE != 'all')
  {
    $ZEILE = $db -> prepare("SELECT * FROM $TABLE WHERE $INDEX = '$VALUE'");
    $ZEILE -> execute();
    $RESULT = $ZEILE -> fetchAll();
    return count($RESULT);
  }
  else
  {
    $ZEILE = $db -> prepare("SELECT * FROM $TABLE WHERE $INDEX");
    $ZEILE -> execute();
    $RESULT = $ZEILE -> fetchAll();
    return count($RESULT);
  }
}

// ############################################################################# DB_GET_VALUES()

function db_get(string $TABLE, string $ID_NAME, string $ID_VALUE, $DATA)
{
  include 'db.php';

  if (is_array($DATA) && $DATA != 'all') // EINZELNE INDEX-EINTRÄGE
  {
    $NEW_STRING = '';
    $ARRAY = array();

    foreach ($DATA as $VALUE) { if ($VALUE == end($DATA)) { $NEW_STRING .= $VALUE; } else { $NEW_STRING .= $VALUE.", "; } }

    $QUERY = $db -> prepare("SELECT $NEW_STRING FROM $TABLE WHERE $ID_NAME = '$ID_VALUE'");
    $QUERY -> execute();
    $RESULT = $QUERY -> fetchAll();

    foreach ($RESULT as $VALUE) { foreach ($DATA as $INDEX) { $ARRAY += array($INDEX => $VALUE[$INDEX]); } }
  }
  else // ALLE INDEX-EINTRÄGE
  {
    $ARRAY = array();

    $QUERY1 = $db -> prepare("DESCRIBE $TABLE");
    $QUERY1 -> execute();
    $RESULT1 = $QUERY1 -> fetchAll(PDO::FETCH_COLUMN);

    $QUERY2 = $db -> prepare("SELECT * FROM $TABLE WHERE $ID_NAME = '$ID_VALUE'");
    $QUERY2 -> execute();
    $RESULT2 = $QUERY2 -> fetchAll();

    foreach ($RESULT1 as $INDEX) { foreach (array_values($RESULT2) as $VALUE) { $ARRAY += array($INDEX => $VALUE[$INDEX]); } }
  }

  return $ARRAY;
}

// ############################################################################# DB_UPDATE()

function db_update(string $TABLE, string $ID_NAME, string $ID_VALUE, array $DATA)
{
  include 'db.php';

  $VALUE = '';

  foreach ($DATA as $INDEX => $VALUES) { if ($VALUES == end($DATA)) { $VALUE .= $INDEX."='".$VALUES."'"; } else { $VALUE .= $INDEX."='".$VALUES."', "; } }

  $UPDATE = $db -> prepare("UPDATE $TABLE SET $VALUE WHERE $ID_NAME = '$ID_VALUE'");
  $UPDATE -> execute();
}




// ############################################################################# DB_GET_FOREACH_VALUES()

function db_get_foreach(string $TABLE)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT * FROM $TABLE");
  $ZEILE -> execute();
  return $RESULT = $ZEILE -> fetchAll();
}


// ############################################################################# GEN_USERNAME()

function gen_username()
{
  $VORNAME = array(
    'Prince','Lord','Tobi','Drake','Johnathon','Anthony','Erasmo','Raleigh','Nancie','Tama','Camellia','Augustine','Christeen','Luz','Diego','Lyndia','Thomas','Georgianna','Leigha','Alejandro','Marquis','Joan','Stephania','Elroy','Zonia','Buffy','Sharie','Blythe','Gaylene','Elida','Randy','Margarete','Margarett','Dion','Tomi','Arden','Clora','Laine','Becki','Margherita','Bong','Jeanice','Qiana','Lawanda','Rebecka','Maribel','Tami','Yuri','Michele','Rubi','Larisa','Lloyd','Tyisha','Samatha'
  );
  $NACHNAME = array(
    'Dragon','Mischke','Serna','Pingree','Mcnaught','Pepper','Schildgen','Mongold','Kadachi','Wrona','Geddes','Lanz','Fetzer','Schroeder','Block','Mayoral','Fleishman','Roberie','Latson','Lupo','Motsinger','Drews','Coby','Redner','Culton','Howe','Stoval','Michaud','Mote','Menjivar','Wiers','Paris','Grisby','Noren','Damron','Kazmierczak','Haslett','Guillemette','Buresh','Center','Kucera','Catt','Badon','Grumbles','Antes','Byron','Volkman','Klemp','Pekar','Pecora','Schewe','Ramage'
  );

  $NAME = $VORNAME[rand (0, count($VORNAME) -1)];
  $NAME .= ' ';
  $NAME .= $NACHNAME[rand (0, count($NACHNAME) -1)];

  return $NAME;
}



// ############################################################################# SAVE_FILE()

function save_file(string $PATH, $FILE, string $NEW_FILENAME, array $VALIDTYPES)
{
  $FILENAME = $FILE['name'];

  $PATHTOFILE = $PATH.$FILENAME;

  $FILETYPE = pathinfo($PATHTOFILE, PATHINFO_EXTENSION);
  $FILETYPE = strtolower($FILETYPE);

  if(in_array(strtolower($FILETYPE), $VALIDTYPES))
  {
    if(move_uploaded_file($FILE['tmp_name'], $PATH.$NEW_FILENAME.'.'.$FILETYPE))
    {
      return $NEW_FILENAME.'.'.$FILETYPE;
    }
  }
}


// function save_file(string $PATH, $FILE, string $UUID)
// {
//   $FILENAME = $FILE['name'];
//
//   $PATHTOFILE = $PATH.$FILENAME;
//
//   $FILETYPE = pathinfo($PATHTOFILE, PATHINFO_EXTENSION);
//   $FILETYPE = strtolower($FILETYPE);
//
//   $VALIDTYPES = array("jpg","jpeg","png","gif","pdf");
//
//   if(in_array(strtolower($FILETYPE), $VALIDTYPES))
//   {
//     if(move_uploaded_file($FILE['tmp_name'], $PATH.$UUID.'.'.$FILETYPE))
//     {
//       return $UUID.'.'.$FILETYPE;
//     }
//   }
// }

// ############################################################################# SET_COOKIE()

function cookie_add(string $COOKIENAME, int $DAYS, string $DATA)
{
  if (isset($_COOKIE[$COOKIENAME])) { return 0; } else { setcookie($COOKIENAME, $DATA, strtotime($DAYS.' days')); }
}

// ############################################################################# GET_COOKIE()

function cookie_get(string $COOKIENAME)
{
  if (isset($_COOKIE[$COOKIENAME])) { return $_COOKIE[$COOKIENAME]; } else { return 0; }
}

// ############################################################################# DEL_COOKIE()

function cookie_delete(string $COOKIENAME)
{
  if (isset($_COOKIE[$COOKIENAME])) { setcookie($COOKIENAME, '', strtotime('0 days')); } else { return 0; }
}

// ############################################################################# CLEAN_INPUT()

function delete_script($TEXT)
{
  return preg_replace(array('@<script[^>]*?>.*?</script>@si','@<[\/\!]*?[^<>]*?>@si','@<style[^>]*?>.*?</style>@siU','@<![\s\S]*?--[ \t\n\r]*>@'), '', $TEXT);
}



// ############################################################################# SAY_HELLO()

function say_hello()
{
  $HOUR = date('H', time());

  if ($HOUR > 6 && $HOUR <= 11) { return "Guten Morgen"; }
  else if ($HOUR > 11 && $HOUR <= 16) { return "Guten Tag"; }
  else if ($HOUR > 16 && $HOUR <= 23) { return "Guten Abend"; }
  else { return "Du bist noch nicht im Bett?"; }
}


// ############################################################################# changeDate()

function changeDate(string $TABLE, string $TIMESTAMP)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT MAX(`$TIMESTAMP`) AS 'timestamp' FROM $TABLE");
  $ZEILE -> execute();
  $RESULT = $ZEILE -> fetchAll();

  foreach ($RESULT as $VALUE) { return $NEW_DATE = $VALUE['timestamp']; }
}


// ############################################################################# token()







function getCalendarDate($DATE)
{
  if ($DATE)
  {
    $Arr = explode('-', $DATE);

    $YEAR = $Arr[0];

    if      ($Arr[1] == '01') { $MONTH = 'JAN'; }
    else if ($Arr[1] == '02') { $MONTH = 'FEB'; }
    else if ($Arr[1] == '03') { $MONTH = 'MRZ'; }
    else if ($Arr[1] == '04') { $MONTH = 'APR'; }
    else if ($Arr[1] == '05') { $MONTH = 'MAI'; }
    else if ($Arr[1] == '06') { $MONTH = 'JUN'; }
    else if ($Arr[1] == '07') { $MONTH = 'JUL'; }
    else if ($Arr[1] == '08') { $MONTH = 'AUG'; }
    else if ($Arr[1] == '09') { $MONTH = 'SEP'; }
    else if ($Arr[1] == '10') { $MONTH = 'OKT'; }
    else if ($Arr[1] == '11') { $MONTH = 'NOV'; }
    else if ($Arr[1] == '12') { $MONTH = 'DEZ'; }

    $DAY = $Arr[2];

    $NEW_DATE = array('YEAR' => $YEAR, 'MONTH' => $MONTH, 'DAY' => $DAY);

    return $NEW_DATE;
  }
  else
  {
    return $NEW_DATE = array('YEAR' => '0000', 'MONTH' => '00', 'DAY' => '00');
  }

}



// gen_token('20', 'default')
//
// verify_token()
//
//
// get_token()
