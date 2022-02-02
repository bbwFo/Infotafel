<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="resources/css/manager.css">
  </head>
  <body>
    <?php
      session_start();

      include 'resources/php/db.php';

      if (isset($_POST['username']) && isset($_POST['password']))
      {
        $USERNAME = $_POST['username'];
        $PASSWORD = $_POST["password"];



        if (db_count('user', 'username', $USERNAME))
        {


          foreach (db_psw($USERNAME) as $spalte)
          {
            $DB_PASSWORD = $spalte["password"];


            if ($PASSWORD == $DB_PASSWORD)
            {
              $_SESSION["login"] = 1;
              $_SESSION["user"] = $USERNAME;
              header("Location: manager.php");
              exit;
            }
            else
            {
              $_SESSION["login"] = 0;
              header("Location: manager_login.php");
              exit;
            }
          }

        }
      }



      function db_count($TABLE, $ROW, $TARGET)
      {
        include 'resources/php/db.php';
        $ZEILE = $db -> prepare("SELECT * FROM $TABLE WHERE $ROW = '$TARGET'");
        $ZEILE -> execute();
        $RESULT = $ZEILE -> fetchAll();
        return count($RESULT);
      }

      function db_psw($USERNAME)
      {
        include 'resources/php/db.php';
        $ZEILE = $db -> prepare("SELECT password FROM user WHERE username = '$USERNAME'");
        $ZEILE -> execute();
        return $RESULT = $ZEILE -> fetchAll();
      }







    ?>

    <form id='login' method='post' accept-charset='UTF-8'>
      <input type='text' name='username' id='username' />
      <input type='password' name='password' id='password' />
      <input type='submit' name='submit' value='Login' />
    </form>

  </body>
</html>
