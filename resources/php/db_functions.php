<?php

// FUNKTIONEN
include 'functions.php';




// ASKYLAN PHP FUNCTIONS-KIT



// save_file() - ok

// db_create_table() - ok
// db_add() - ok
// db_update() - ok
// db_delete() - ok
// db_all_values() - ok
// db_count() - ok

// get_values()
// get_value()
// get_all_values()


// gen_session()
// gen_username()
// gen_very()
// gen_uuid()
// gen_uuid_by()
// gen_gradient()

// set_cookie() - ok
// del_cookie() - ok
// get_cookie() - ok



// psw_very()
// psw_hash()

// ____


// get_uuid()
// format()

// math_procent()


// function proz($WERT, $PROZENT)
// {
//  $SUM1 = $WERT / 100 * $PROZENT;
//
//  $SUM2 = $WERT - $SUM1;
//
//
//  return $SUM2;
// }
//










function get_uuid(string $USERNAME, string $PASSWORD)
{
  include 'db.php';

  if (db_count('user','username', $USERNAME))
  {
    $QWERY1 = $db -> prepare("SELECT password FROM user WHERE username = '$USERNAME'");
    $QWERY1 -> execute();
    $RESULT1 = $QWERY1 -> fetchAll();

    foreach ($RESULT1 as $VALUE) { $HASHED_PASSWORD = $VALUE["password"]; }

    if (password_verify($PASSWORD, $HASHED_PASSWORD))
    {
      $QWERY2 = $db -> prepare("SELECT uuid FROM user WHERE username = '$USERNAME'");
      $QWERY2 -> execute();
      $RESULT2 = $QWERY2 -> fetchAll();

      foreach ($RESULT2 as $VALUE) { $UUID = $VALUE["uuid"]; }

      return $UUID;
    }
  }
}









function random_color(int $OPACITY)
{
  return 'rgba('.rand(0,255).','.rand(0,255).','.rand(0,255).','.$OPACITY.')';
}





function gen_gradient($TYPE)
{

  $COLORS = array(
    "rgba(020, 193, 089, 0.6)",
    "rgba(018, 115, 235, 0.6)",
    "rgba(185, 242, 255, 0.6)",
    "rgba(255, 229, 041, 0.6)",
    "rgba(255, 133, 027, 0.6)",
    "rgba(244, 067, 054, 0.6)",
    "rgba(177, 013, 201, 0.6)"
  );


       $COLOR_ONE = $COLORS[array_rand($COLORS)];
  do { $COLOR_TWO = $COLORS[array_rand($COLORS)]; }

  while ($COLOR_ONE == $COLOR_TWO);

  return "background: ".$TYPE."-gradient(".rand(0,360)."deg, ".$COLOR_ONE." 0%, ".$COLOR_TWO." 100%)";
}










// function start_session(string $USERNAME, string $PASSWORD)
// {
//   $UUID = get_uuid();
//
//
//   gen_session('F5VpkT1ZKMAzGtEdsJzeBU0YTwTlNl', array(
//     'cards' => 'all',
//     'content' => array('pdf','html')
//   ));
// }






// create_db_table('test', array(
//   'id'        => 'INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY',
//   'nachname'  => 'VARCHAR( 150 ) NOT NULL',
//   'vorname'   => 'VARCHAR( 150 ) NOT NULL',
//   'akuerzel'  => 'VARCHAR( 2 ) NOT NULL',
//   'strasse'   => 'VARCHAR( 150 ) NULL',
//   'plz'       => 'INT( 5 ) NOT NULL',
//   'telefon'   => 'VARCHAR( 20 ) NULL'
// ));



























// echo gen_username();






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
    if ($VAR == end($DATA))
    {
      $NEWDATA .= $VAR;
    }
    else
    {
      $NEWDATA .= $VAR.", ";
    }
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
    $RETURN = $VALUE[$DATA];
  }

  return $RETURN;
}





// // CROSS JOIN
// "SELECT * FROM table1 CROSS JOIN table2"
// "SELECT * FROM table1, table2"
//
//
// // INNER JOIN
// "SELECT * FROM table1 JOIN table2 ON table1.uuid = table2.uuid" // mit unterschiedlichen Spalten
// "SELECT * FROM table1 JOIN table2 USING (uuid)" // mit gleicher spalte
//
// "SELECT * FROM table1 JOIN table2 USING (uuid) WHERE uuid = '123'"
// "SELECT * FROM table1 JOIN table2 USING (uuid) JOIN table3 USING (uuid) WHERE uuid = '123'"
//
// // NATURAl JOIN
// "SELECT * FROM table1 NATURAL JOIN table2" // 2 spalten gleich (=inner Join), Keine spalten gleich (= Cross Join)
//
//
//
//
// "SELECT * FROM table1 LEFT JOIN table2 ON table1.uuid = table2.hwid" // Füllt alle nicht übereinstimmenden werte der ersten tabelle mit NULL
// "SELECT * FROM table1 RIGHT JOIN table2 ON table1.uuid = table2.hwid" // Füllt alle nicht übereinstimmenden werte der letzten tabelle mit NULL
//


//
// db_join()
//
// db_trigger_insert()
// db_trigger_update()
// db_trigger_delete()
//
//
// $X = db_join($UUID, array('table1', 'table2'))
//
//
// function db_join(string $UUID, array $TABLES)
// {
//   $STRING = "";
//
//   foreach ($TABLES as $TABLE)
//   {
//     if ($TABLES[0])
//     {
//       $STRING .= $TABLE;
//     }
//     else if (end($TABLES))
//     {
//       $STRING .= " JOIN ".$TABLE." USING (uuid) WHERE uuid = '$UUID'";
//     }
//     else
//     {
//       $STRING .= " JOIN ".$TABLE." USING (uuid)";
//     }
//   }
//
//   $QUERY = $db -> prepare("SELECT * FROM $STRING");
//   $QUERY -> execute();
//   $RESULT = $QUERY -> fetchAll();
//
//   return $RESULT;
// }



//
//
//
//
//
// db_inner_join('uuid', array(
//   'table1' => 'all',
//   'table2' => 'all'
// ))
//
//
//
// CREATE TABLE IF NOT EXISTS `foo` (
//   `id` varchar(128), PRIMARY KEY (`id`(4))
// )
//
//
//
//
//
// function db_inner_join()
// {
//
//   $QUERY = $db -> prepare("SELECT * FROM table1 INNER JOIN table2 USING (uuid)");
//   $QUERY -> execute();
//   $RESULT = $QUERY -> fetchAll();
//
//
//
//
//
//   function db_get_values(string $TABLE, string $UUID, $DATA)
//   {
//     include 'db.php';
//
//     if (is_array($DATA) && $DATA != 'all') // EINZELNE INDEX-EINTRÄGE
//     {
//       $NEW_STRING = '';
//       $ARRAY = array();
//
//       foreach ($DATA as $VALUE) { if ($VALUE == end($DATA)) { $NEW_STRING .= $VALUE; } else { $NEW_STRING .= $VALUE.", "; } }
//
//       $QUERY = $db -> prepare("SELECT $NEW_STRING FROM $TABLE WHERE uuid = '$UUID'");
//       $QUERY -> execute();
//       $RESULT = $QUERY -> fetchAll();
//
//       foreach ($RESULT as $VALUE) { foreach ($DATA as $INDEX) { $ARRAY += array($INDEX => $VALUE[$INDEX]); } }
//     }
//     else // ALLE INDEX-EINTRÄGE
//     {
//       $ARRAY = array();
//
//       $QUERY1 = $db -> prepare("DESCRIBE $TABLE");
//       $QUERY1 -> execute();
//       $RESULT1 = $QUERY1 -> fetchAll(PDO::FETCH_COLUMN);
//
//       $QUERY2 = $db -> prepare("SELECT * FROM $TABLE WHERE uuid = '$UUID'");
//       $QUERY2 -> execute();
//       $RESULT2 = $QUERY2 -> fetchAll();
//
//       foreach ($RESULT1 as $INDEX) { foreach (array_values($RESULT2) as $VALUE) { $ARRAY += array($INDEX => $VALUE[$INDEX]); } }
//     }
//
//     return $ARRAY;
//   }
// }
//
//
//
//
//













// -----------------------------------------------------------------------------

// function db_create_default_user_table()
// {
//   db_create_table('user', array(
//    'id'          => 'INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY',
//    'uuid'        => 'VARCHAR( 150 ) NOT NULL',
//    'username'    => 'VARCHAR( 150 ) NOT NULL',
//    'password'    => 'VARCHAR( 2 ) NOT NULL',
//    'email'       => 'VARCHAR( 150 ) NOT NULL',
//    'steamid'     => 'VARCHAR( 150 ) NOT NULL',
//    'update_date' => 'TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
//    'create_date' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP'
//  ));
//
//  db_add('user', array(
//    'uuid'        => gen_uuid(),
//    'username'    => 'root',
//    'password'    => psw_hash('1234'),
//    'email'       => '',
//    'steamid'     => '00000000',
//  ));
//
// }










//
//
//
// function db_backup()
// {
//   include 'db.php';
//
//   $date = date("Y-m-d");
//   $path = 'resources/uploads/';
//
//   $CMD = "mysqldump --routines -h {$host} -u {$username} -p{$password} {$database} > " . $path . "{$date}_{$database}.sql";
//
//   exec($CMD);
// }
//
//
// function db_restore()
// {
//   $restore_file  = "/home/abdul/20140306_world_copy.sql";
//
//   $cmd = "mysql -h {$host} -u {$username} -p{$password} {$database} < $restore_file";
//   exec($cmd);
// }
//
//



// -----------------------------------------------------------------------------

// function gen_session(string $TABLE, string $UUID ,array $ROWS)
// {
//   include 'db.php';
//
//   foreach ($ROWS as $WERT)
//   {
//     $ZEILE = $db -> prepare("SELECT $WERT FROM $TABLE WHERE uuid = '$UUID'");
//     $ZEILE -> execute();
//     $RESULT = $ZEILE -> fetchAll();
//
//     foreach ($RESULT as $SESSION_VALUE)
//     {
//       $_SESSION["$WERT"] = $SESSION_VALUE["$WERT"];
//     }
//   }
// }

// -----------------------------------------------------------------------------

// function psw_very(string $PASSWORD, string $UUID)
// {
//   include 'db.php';
//
//   $ZEILE = $db -> prepare("SELECT password FROM user WHERE uuid = '$UUID'");
//   $ZEILE -> execute();
//   $RESULT = $ZEILE -> fetchAll();
//
//   foreach ($RESULT as $VALUE) { $HASHED_PASSWORD = $VALUE["password"]; }
//
//   return (password_verify($PASSWORD, $HASHED_PASSWORD)) ? true : false;
//
// }

// -----------------------------------------------------------------------------

// db_add()
// FÜGT WERTE DER DATENBANK HINZU.
// SYNTAX: db_add('TABELLE', array('INDEX1' => 'VALUE1', $INDEX2 => $VALUE2));
// ACHTUNG! NACH DER TABELLE MUSS IMMER EIN ARRAY STEHEN.



// -----------------------------------------------------------------------------

// db_update()
// UPDATED WERTE DER DATENBANK.
// SYNTAX: db_update('TABELLE', 'UUID', array('INDEX1' => 'VALUE1', $INDEX2 => $VALUE2));
// ACHTUNG! NACH DER UUID MUSS IMMER EIN ARRAY STEHEN.



// -----------------------------------------------------------------------------

// db_delete()
// LÖSCHT WERTE AUS DER DATENBANK.
// SYNTAX: db_delete('TABELLE', 'UUID');



// -----------------------------------------------------------------------------

// function gen_very()
// {
//   include 'db.php';
//
//   do
//   {
//     $ZEICHEN = '0123456789'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $ZEICHEN_LENGTH = strlen($ZEICHEN);
//
//     $CODEBLOCK1 = '';
//     $CODEBLOCK2 = '';
//     $CODEBLOCK3 = '';
//
//     for ($i = 0; $i < 6; $i++) { $CODEBLOCK1 .= $ZEICHEN[rand(0, $ZEICHEN_LENGTH - 1)]; }
//     for ($i = 0; $i < 6; $i++) { $CODEBLOCK2 .= $ZEICHEN[rand(0, $ZEICHEN_LENGTH - 1)]; }
//     for ($i = 0; $i < 6; $i++) { $CODEBLOCK3 .= $ZEICHEN[rand(0, $ZEICHEN_LENGTH - 1)]; }
//
//     $VERYCODE = $CODEBLOCK1.'-'.$CODEBLOCK2.'-'.$CODEBLOCK3;
//
//     $ZEILE = $db -> prepare("SELECT * FROM user WHERE uuid = '$VERYCODE'");
//     $ZEILE -> execute();
//     $RESULT = $ZEILE -> fetchAll();
//     $EXSIST = count($RESULT);
//   }
//   while ($EXSIST);
//
//   return $VERYCODE;
//
//
// }

// -----------------------------------------------------------------------------

// gen_uuid()
// GENERIERT EINE 20 STELLIGE USER-IDENTIFIKATIONSNUMMER DIE ES NUR EINMALIG IN DER DATENBANK GIBT.
// RÜCKGABEWERT IST DER UUID-CODE.

// function gen_uuid()
// {
//   include 'db.php';
//
//   do
//   {
//     $ZEICHEN = '0123456789'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'abcdefghijklmnopqrstuvwxyz';
//     $ZEICHEN_LENGTH = strlen($ZEICHEN);
//     $UUID_CODE = '';
//
//     for ($i = 0; $i < 30; $i++)
//     {
//       $UUID_CODE .= $ZEICHEN[rand(0, $ZEICHEN_LENGTH - 1)];
//     }
//
//     $ZEILE = $db -> prepare("SELECT * FROM cards WHERE uuid = '$UUID_CODE'");
//     $ZEILE -> execute();
//     $RESULT = $ZEILE -> fetchAll();
//     $EXSIST = count($RESULT);
//   }
//   while ($EXSIST);
//
//   return $UUID_CODE;
// }

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
