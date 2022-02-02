<?php

function db_count(string $TABLE, string $ROW, string $TARGET)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT * FROM $TABLE WHERE $ROW = '$TARGET'");
  $ZEILE -> execute();
  $RESULT = $ZEILE -> fetchAll();
  return count($RESULT);

  exit;
}

function db_psw(string $USERNAME)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT password FROM user WHERE username = '$USERNAME'");
  $ZEILE -> execute();
  return $RESULT = $ZEILE -> fetchAll();

  exit;
}



function db_set_session(string $USERNAME)
{
  include 'db.php';

  $ZEILE = $db -> prepare("SELECT * FROM user WHERE username = '$USERNAME'");
  $ZEILE -> execute();
  $RESULT = $ZEILE -> fetchAll();

  foreach ($RESULT as $SESSION_VALUE)
  {
    $_SESSION["uuid"] = $SESSION_VALUE["uuid"];
    $_SESSION["username"] = $SESSION_VALUE["username"];
    $_SESSION["email"] = $SESSION_VALUE["email"];

  }

  exit;
}



$USERDATA = array('username' => 'Askylan', 'password' => '1234');






function db_add($USERDATA)
{
  include 'db.php';


  foreach(array_keys($USERDATA) as $key)
  {
    if (condition)
    {
      echo "'".$key."',";
    }
    else
    {
      echo "'".$key."'";
    }
  }

  foreach(array_values($USERDATA) as $key)
  {
    if (condition)
    {
      echo "'".$key."',";
    }
    else
    {
      echo "'".$key."'";
    }
  }


  

  $NEW_DATA = "INSERT INTO user( '$KEY' ) VALUES ( '$VALUES' )";

  $db -> exec($NEW_DATA);

  exit;
}










?>
