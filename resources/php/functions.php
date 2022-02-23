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

    // ROW NAMES
    $QUERY1 = $db -> prepare("DESCRIBE $TABLE");
    $QUERY1 -> execute();
    $RESULT1 = $QUERY1 -> fetchAll(PDO::FETCH_COLUMN);

    // ROW DATA
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

// ############################################################################# DEL_COOKIE()

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

// ############################################################################# GEN_SESSION()

function gen_session($TABLE, string $UUID)
{
  session_start();

  if (is_array($TABLE))
  {
    foreach ($TABLE as $TABELS) { $_SESSION[$TABELS] = db_get_values($TABELS, $UUID, 'all'); }
  }
  else
  {
    $_SESSION[$TABLE] = db_get_values($TABLE, $UUID, 'all');
  }
}

// ############################################################################# GEN_USERNAME()

function gen_username()
{
  $firstname = array('Drake','Johnathon','Anthony','Erasmo','Raleigh','Nancie','Tama','Camellia','Augustine','Christeen','Luz','Diego','Lyndia','Thomas','Georgianna','Leigha','Alejandro','Marquis','Joan','Stephania','Elroy','Zonia','Buffy','Sharie','Blythe','Gaylene','Elida','Randy','Margarete','Margarett','Dion','Tomi','Arden','Clora','Laine','Becki','Margherita','Bong','Jeanice','Qiana','Lawanda','Rebecka','Maribel','Tami','Yuri','Michele','Rubi','Larisa','Lloyd','Tyisha','Samatha');
  $lastname = array('Dragon','Mischke','Serna','Pingree','Mcnaught','Pepper','Schildgen','Mongold','Wrona','Geddes','Lanz','Fetzer','Schroeder','Block','Mayoral','Fleishman','Roberie','Latson','Lupo','Motsinger','Drews','Coby','Redner','Culton','Howe','Stoval','Michaud','Mote','Menjivar','Wiers','Paris','Grisby','Noren','Damron','Kazmierczak','Haslett','Guillemette','Buresh','Center','Kucera','Catt','Badon','Grumbles','Antes','Byron','Volkman','Klemp','Pekar','Pecora','Schewe','Ramage');

  $name = $firstname[rand ( 0 , count($firstname) -1)];
  $name .= ' ';
  $name .= $lastname[rand ( 0 , count($lastname) -1)];

  return $name;
}

// ############################################################################# GEN_UUID_BY()

function gen_uuid_by(string $TABLE, int $LENGHT, string $ZEICHENSATZ)
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

// ############################################################################# GET_COOKIE()

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

// ############################################################################# SAVE_FILE()

function save_file(string $PATH, $FILE, string $UUID)
{
  $FILENAME = $FILE['name'];

  $PATHTOFILE = $PATH.$FILENAME;

  $FILETYPE = pathinfo($PATHTOFILE, PATHINFO_EXTENSION);
  $FILETYPE = strtolower($FILETYPE);

  $VALIDTYPES = array("jpg","jpeg","png","gif","pdf");

  $RESPONDE = 0;

  if(in_array(strtolower($FILETYPE), $VALIDTYPES))
  {
    if(move_uploaded_file($FILE['tmp_name'], $PATH.$UUID.'.'.$FILETYPE))
    {
      $RESPONDE = $PATHTOFILE;

      return $UUID.'.'.$FILETYPE;
    }
  }
}

// ############################################################################# SET_COOKIE()

function set_cookie(string $COOKIENAME, int $DAYS, string $COOKIEDATA)
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

// ############################################################################# DB_BACKUP()

function db_backup()
{

}

?>
