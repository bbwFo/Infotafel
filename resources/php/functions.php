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

// ############################################################################# DB_CREATE_TABLE()

function db_create_table(string $TABLE, array $OPTIONS)
{
  include 'db.php';

  $STRING = '';

  foreach ($OPTIONS as $INDEX => $VALUE) { if ($VALUE == end($OPTIONS)) { $STRING .= "`".$INDEX."` ".$VALUE.""; } else { $STRING .= "`".$INDEX."` ".$VALUE.", "; } }

  $NEW_TABLE = $db -> prepare("CREATE TABLE IF NOT EXISTS `$TABLE` ( $STRING )");
  $NEW_TABLE -> execute();
}

// ############################################################################# DB_DELETE()

function db_delete(string $TABLE, string $UUID)
{
  include 'db.php';

  $DELETE = $db -> prepare("DELETE FROM $TABLE WHERE uuid = '$UUID'");
  $DELETE -> execute();
}

// ############################################################################# DB_GET_FOREACH_VALUES()

function db_foreach_values(string $TABLE)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT * FROM $TABLE");
  $ZEILE -> execute();
  return $RESULT = $ZEILE -> fetchAll();
}

// ############################################################################# DB_GET_VALUES()

function db_get_values(string $TABLE, string $UUID, $DATA)
{
  include 'db.php';

  if (is_array($DATA) && $DATA != 'all') // EINZELNE INDEX-EINTRÄGE
  {
    $NEW_STRING = '';
    $ARRAY = array();

    foreach ($DATA as $VALUE) { if ($VALUE == end($DATA)) { $NEW_STRING .= $VALUE; } else { $NEW_STRING .= $VALUE.", "; } }

    $QUERY = $db -> prepare("SELECT $NEW_STRING FROM $TABLE WHERE uuid = '$UUID'");
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

    $QUERY2 = $db -> prepare("SELECT * FROM $TABLE WHERE uuid = '$UUID'");
    $QUERY2 -> execute();
    $RESULT2 = $QUERY2 -> fetchAll();

    foreach ($RESULT1 as $INDEX) { foreach (array_values($RESULT2) as $VALUE) { $ARRAY += array($INDEX => $VALUE[$INDEX]); } }
  }

  return $ARRAY;
}

// ############################################################################# DB_UPDATE()

function db_update(string $TABLE,string $UUID, array $DATA)
{
  include 'db.php';

  $VALUE = '';

  foreach ($DATA as $INDEX => $VALUES) { if ($VALUES == end($DATA)) { $VALUE .= $INDEX."='".$VALUES."'"; } else { $VALUE .= $INDEX."='".$VALUES."', "; } }

  $UPDATE = $db -> prepare("UPDATE $TABLE SET $VALUE WHERE uuid = $UUID");
  $UPDATE -> execute();
}

// ############################################################################# GEN_SESSION()

function gen_session(string $UUID, $TABLE)
{
  if (session_status() != PHP_SESSION_ACTIVE) { session_start(); }

  foreach ($TABLE as $INDEX => $VALUE) { $_SESSION[$INDEX] = db_get_values($INDEX, $UUID, $VALUE); }
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

  $USERNAME = $VORNAME[rand ( 0 , count($VORNAME) -1)];
  $USERNAME .= ' ';
  $USERNAME .= $NACHNAME[rand ( 0 , count($NACHNAME) -1)];

  return $USERNAME;
}

// ############################################################################# GEN_UUID_BY()

function gen_uuid(string $TABLE, int $LENGHT, string $ZEICHENSATZ)
{
  if ($ZEICHENSATZ != 'default') { $ZEICHEN = $ZEICHENSATZ; }
  else { $ZEICHEN = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; }

  do
  {
    $ZEICHEN_LENGTH = strlen($ZEICHEN);
    $UUID_CODE = '';

    for ($i = 0; $i < $LENGHT; $i++) { $UUID_CODE .= $ZEICHEN[rand(0, $ZEICHEN_LENGTH - 1)]; }
  }
  while (db_count($TABLE, 'uuid', 'all'));

  return $UUID_CODE;
}

// ############################################################################# SAVE_FILE()

function save_file(string $PATH, $FILE, string $UUID)
{
  $FILENAME = $FILE['name'];

  $PATHTOFILE = $PATH.$FILENAME;

  $FILETYPE = pathinfo($PATHTOFILE, PATHINFO_EXTENSION);
  $FILETYPE = strtolower($FILETYPE);

  $VALIDTYPES = array("jpg","jpeg","png","gif","pdf");

  if(in_array(strtolower($FILETYPE), $VALIDTYPES))
  {
    if(move_uploaded_file($FILE['tmp_name'], $PATH.$UUID.'.'.$FILETYPE))
    {
      return $UUID.'.'.$FILETYPE;
    }
  }
}

// ############################################################################# SET_COOKIE()

function set_cookie(string $COOKIENAME, int $DAYS, string $DATA)
{
  if (isset($_COOKIE[$COOKIENAME])) { return 0; } else { setcookie($COOKIENAME, $DATA, strtotime($DAYS.' days')); }
}

// ############################################################################# GET_COOKIE()

function get_cookie(string $COOKIENAME)
{
  if (isset($_COOKIE[$COOKIENAME])) { return $_COOKIE[$COOKIENAME]; } else { return 0; }
}

// ############################################################################# DEL_COOKIE()

function del_cookie(string $COOKIENAME)
{
  if (isset($_COOKIE[$COOKIENAME])) { setcookie($COOKIENAME, '', strtotime('0 days')); } else { return 0; }
}


?>
