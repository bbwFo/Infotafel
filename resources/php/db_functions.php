<?php
// ASKYLAN PHP FUNCTIONS-KIT

// session_start();
// session_destroy();



function db_count(string $TABLE, string $ROW, string $TARGET)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT * FROM $TABLE WHERE $ROW = '$TARGET'");
  $ZEILE -> execute();
  $RESULT = $ZEILE -> fetchAll();
  return count($RESULT);

  exit;
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







function get_lvl(string $UUID)
{
  $EXPERIENCE = get_db_value('user','xp','UUID');






}



function get_db_value(string $TABLE, string $VALUE, string $UUID)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT $VALUE FROM $TABLE WHERE uuid = '$UUID'");
  $ZEILE -> execute();
  $DATABASE_RESULT = $ZEILE -> fetchAll();

  foreach ($DATABASE_RESULT as $DATABASE_VALUE)
  {
    $RESULT = $DATABASE_VALUE["$VALUE"];
  }

  return $RESULT;
}







// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------


// echo gen_session('user', '10', array('username', 'password'));

// echo $_SESSION["username"];


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
  exit;
}
// -----------------------------------------------------------------------------





// echo db_add('user', array('username' => 'Askylan', 'uuid' => '10', 'password' => psw_hash('1234')));




// echo psw_very('1234','10');

function psw_very(string $PASSWORD, string $UUID)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT password FROM user WHERE uuid = '$UUID'");
  $ZEILE -> execute();
  $RESULT = $ZEILE -> fetchAll();

  foreach ($RESULT as $VALUE) { $HASHED_PASSWORD = $VALUE["password"]; }

  return (password_verify($PASSWORD, $HASHED_PASSWORD)) ? true : false;

  exit;
}








 // echo db_add('user', array('uuid' => gen_uuid(), 'username' => gen_username(), 'password' => psw_hash('1234')));








// -----------------------------------------------------------------------------
// db_add()
// FÜGT WERTE DER DATENBANK HINZU.
// SYNTAX: db_add('TABELLE', array('INDEX1' => 'VALUE1', $INDEX2 => $VALUE2));
// ACHTUNG! NACH DER TABELLE MUSS IMMER EIN ARRAY STEHEN.

function db_add(string $TABLE, array $DATA)
{
  include 'db.php';

  $INDEX = json_encode(array_keys($DATA));
  $VALUES = json_encode(array_values($DATA));

  $INDEX_STRING = str_replace(array('[',']','{','}',':','"'), '', $INDEX);
  $VALUE_STRING = str_replace('"', "'", str_replace(array('[',']','{','}',':'), '', $VALUES));

  $EXEC_DATA = "INSERT INTO $TABLE( $INDEX_STRING ) VALUES ( $VALUE_STRING )";
  $db -> exec($EXEC_DATA);

  exit;
}
// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------
// db_update()
// UPDATED WERTE DER DATENBANK.
// SYNTAX: db_update('TABELLE', 'UUID', array('INDEX1' => 'VALUE1', $INDEX2 => $VALUE2));
// ACHTUNG! NACH DER UUID MUSS IMMER EIN ARRAY STEHEN.

function db_update(string $TABLE,string $TARGET, array $DATA)
{
  include 'db.php';

  foreach($DATA as $INDEX => $VALUE)
  {
    $UPDATE = $db -> prepare("UPDATE $TABLE SET $INDEX = '$VALUE' WHERE uuid = $TARGET");
    $UPDATE -> execute();
  }

  exit;
}
// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------
// db_delete()
// LÖSCHT WERTE AUS DER DATENBANK.
// SYNTAX: db_delete('TABELLE', 'UUID');

function db_delete(string $TABLE, string $UUID)
{
  include 'db.php';

  $DELETE = $db->prepare("DELETE FROM $TABLE WHERE uuid = '$UUID'");
  $DELETE -> execute();

  exit;
}
// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------
// gen_uuid()
// GENERIERT EINE 20 STELLIGE USER-IDENTIFIKATIONSNUMMER DIE ES NUS EINMALIG IN DER DATENBANK GIBT.
// RÜCKGABEWERT IST DER UUID-CODE.

function gen_uuid()
{
  include 'db.php';

  do
  {
    $ZEICHEN = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $ZEICHEN_LENGTH = strlen($ZEICHEN);
    $UUID_CODE = '';
    for ($i = 0; $i < 20; $i++)
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

  exit;
}
// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------
// psw_hash()
// HASHT EIN PASSWORD WIE IN DER FUNKTION VORGEGEBEN UND GIBT ES GEHASHT ZURÜCK.
// SYNTAX: psw_hash('1234');

function psw_hash($PASSWORD){
  $PASSWORD_HASH = password_hash($PASSWORD, PASSWORD_DEFAULT);
  return $PASSWORD_HASH;
  exit;
}
// -----------------------------------------------------------------------------





?>
