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

        $ZEILE = $db -> prepare("SELECT * FROM user WHERE username = '$USERNAME'");
        $ZEILE -> execute();
        $DB_RESULT = $ZEILE -> fetchAll();
        $USER_EXIST = count($DB_RESULT);

        if ($USER_EXIST)
        {
          $zeile_2 = $db -> prepare("SELECT password FROM user WHERE username = '$USERNAME'");
          $zeile_2 -> execute();
          $db_result_2 = $zeile_2 -> fetchAll();

          foreach ($db_result_2 as $spalte)
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
    ?>

    <form id='login' method='post' accept-charset='UTF-8'>
      <input type='text' name='username' id='username' />
      <input type='password' name='password' id='password' />
      <input type='submit' name='submit' value='Login' />
    </form>

  </body>
</html>
