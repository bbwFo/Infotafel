# Askylan's PHP-Functions-Pack

## Dateien

   - ```save_file()``` - ok

## Datenbank

   - ```db_create_table()``` - ok
   - ```db_add()``` - ok
   - ```db_update()``` - ok
   - ```db_delete()``` - ok
   - ```db_all_values()``` - ok
   - ```db_count()```
   - ```get_values()```
   - ```get_value()```
   - ```get_all_values()```

## Generieren

   - ```gen_session()``` - ok
   - ```gen_username()```
   - ```gen_very()```
   - ```gen_uuid()```
   - ```gen_uuid_by()``` - ok
   - ```gen_gradient()```

## Cookies

   - ```set_cookie()``` - ok
   - ```del_cookie()``` - ok
   - ```get_cookie()``` - ok

## Passwörter

   - ```psw_very()```
   - ```psw_hash()```
   - ```get_uuid()```

## Berechnungen

   - ```math_procent()```

## Formatierung

   - ```format()```

---

## Datenbank

   - ``` db_add() ```

     Die Funktion ``` db_add() ``` fügt werte der Datenbank hinzu.

     Code-Beispiel:
     ```php
     <?php
       db_add('user', array(
         'uuid' => gen_uuid(),
         'username' => $USERNAME,
         'password' => psw_hash($PASSWORD),
         'email' => $EMAIL
       ));
     ?>
     ```

---
<!-- #### -->
   - ``` db_update() ```

     Die Funktion ``` db_update() ``` Aktualisiert werte der Datenbank.

     Code-Beispiele:
     ```php
     <?php db_update('user', $UUID, array('username' => 'Askylan')); ?>

     <?php db_update('user', $UUID, array('username' => 'RedDrake1337', 'email' => $NEW_EMAIL)); ?>
     ```

---
<!-- #### -->
   - ``` db_delete() ```

     Die Funktion ``` db_delete() ``` Löscht werte aus der Datenbank.

     Code-Beispiel:
     ```php
     <?php db_delete('user', $UUID); ?>
     ```

---
<!-- #### -->
   - ``` db_all_values() ```

     Die Funktion ``` db_all_values() ``` Liest alle Datensätze der Unified-User-ID aus und gibt sie als Asociatives Array zurück.

     Code-Beispiel:
     ```php
     <?php $USERDATA = db_all_values('user', $UUID); ?>
     <?php echo $USERDATA['username'] ?>
     ```

---
<!-- #### -->
   - ``` gen_uuid_by() ```

     Die Funktion ``` gen_uuid_by() ``` generiert eine Unified-User-ID die nur einmalin der angegebenen Tabelle existiert.

     Beispiel:
     ```php
     <?php gen_uuid_by('user', '20', 'default'); ?>
     ```
     Der default verwendet diesen Zeichensatz: ```0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz```


     Beispiel mit Eigenen Zeichensatz:
     ```php
     <?php gen_uuid_by('user', '10', '0123456789!$%&?'); ?>
     ```
---
<!-- #### -->
   - ``` gen_session() ```

     Die Funktion ``` gen_session() ``` generiert eine PHP-Session mit ```session_start()``` die mit der Function ```db_all_values()``` die angegebene Tabelle oder mehreren Tabellen als Associatives Array in einer ```$_SESSION``` variable speichert die den Namen der angegebenen Tabelle trägt.


     Beispiel mit einer Tabelle:

     Syntax - ```gen_session($TABLE, $UUID)```
     ```php
     <?php
        gen_session('user', $UUID);

        echo $_SESSION['user']['username'];
     ?>

     ```

     Bei mehreren Tabellen werden für jede eine eigene ```$_SESSION``` variable angelegt.

     Beispiel mit mehreren Tabbelen:

     Syntax - ```gen_session(array($TABLE, $TABLE, ...), $UUID)```
     ```php
     <?php
        gen_session(array('user', 'games'), $UUID);

        echo $_SESSION['user']['username'];
        echo $_SESSION['games']['game_name'];
     ?>
     ```
---
<!-- #### -->
   - ``` set_cookie() ```

     Die Funktion ``` set_cookie() ``` erstellt einen Cookie.

     Beispiel:
     ```php
     <?php set_cookie('name', '1', $DATA); ?>
     ```
---
<!-- #### -->
   - ``` del_cookie() ```

     Die Funktion ``` del_cookie() ``` Löscht einen Cookie.

     Beispiel:
     ```php
     <?php del_cookie('name'); ?>
     ```
---
<!-- #### -->
   - ``` get_cookie() ```

     Die Funktion ``` get_cookie() ``` Löscht einen Cookie.

     Beispiel:
     ```php
     <?php get_cookie('name'); ?>
     ```


---
<!-- #### -->

   - ``` save_file() ```

     Die Funktion ``` save_file() ``` speichert eine Datei im angegebenen Pfad und ändert den Dateinamen wie angegeben.

     Beispiele:

     Speichert das Bild und bennent es in die ```$UUID``` um.
     ```php
     <?php save_file('resources/uploads/img/', $_FILES['image'], $UUID); ?>
     ```

     Speichert das Bild und bennent es in ```askylan``` um und gibt den Namen mit Dateityp zurück.
     ```php
     <?php
        $IMAGE = save_file('resources/uploads/img/', $_FILES['image'], 'askylan');

        echo $IMAGE;  // askylan.png
     ?>
     ```

     ```php
     <?php
        $UUID = gen_uuid();

        db_add('user', array(
          'uuid' => $UUID,
          'username' => 'Askylan',
          'avatar' => save_file('resources/uploads/img/', $_FILES['avatar'], $UUID)
        ));
     ?>
     ```
