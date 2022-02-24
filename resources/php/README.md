# Askylan's PHP-Functions-Pack

Eine sammlung meiner PHP-Funktionen die das entwickeln von Webseiten Leicher und Übersichtlicher machen soll.

Die Datenbank-Funktionen funktionieren alle mit MySQL das einzige was du wissen musst was in der Anleitung steht.
Es muss keine einzige zeile SQL-Code geschrieben werden.

Füge diesen Snippet in deine ```index.php``` oder auch alle anderen dateien ein in der du die Funktionen verwenden möchtest und verändere dein Pfad zum Ordner.
```php
<?php include 'pfad/db_functions.php' ?>
```
Ändere die Zugangsdaten zur Datenbank in der ```db.php``` Datei im Funktions-Ordner.
```php
<?php
  $host = "localhost";
  $username = "root";
  $password = "1234";
  $database = "databasename";
?>
```

---

# Übersicht aller Funktionen
Drücke auf die jeweilige Funktion

| Funktionen                                      | Beschreibung  | Status |
| :---                                            | :---          | :---   |
| [```db_create_table()```](#db_create_table)     |               | :heavy_check_mark:     |
| [```db_add()```](#db_add)                       | Fügt werte der Datenbank hinzu              | :heavy_check_mark: Fertig    |
| [```db_update()```](#db_update)                 | Aktualisiert werte der Datenbank              | :heavy_check_mark: Fertig    |
| [```db_delete()```](#db_delete)                 | Löscht werte aus der Datenbank              | :heavy_check_mark: Fertig    |
| [```db_get_values()```](#db_get_values)         | Liest alle Datensätze der Unified-User-ID aus und gibt sie als Asociatives Array zurück.              | :heavy_check_mark: Fertig    |
| [```db_foreach_values()```](#db_foreach_values) |               | :x:       |
| [```db_count()```](#db_count)                   |               | :x:       |
| [```save_file()```](#save_file)                 | Speichert eine Datei im angegebenen Pfad und ändert den Dateinamen wie angegeben.             | ok     |
| [```gen_session()```](#gen_session)             | generiert eine PHP-Session mit ```session_start()``` die mit der Function ```db_all_values()``` die angegebene Tabelle oder mehreren Tabellen als Associatives Array in einer ```$_SESSION``` variable speichert die den Namen der angegebenen Tabelle trägt              | ok     |
| [```gen_uuid()```](#gen_uuid)                   |               |        |
| [```gen_uuid_by()```](#gen_uuid_by)             |               | ok     |
| [```set_cookie()```](#set_cookie)               | erstellt einen Cookie              | ok     |
| [```del_cookie()```](#del_cookie)               | löscht einen Cookie              | ok     |
| [```get_cookie()```](#get_cookie)               | gibt einen cookie zurück              | ok     |




---
<!-- ################################################################################ db_create_table() -->

### ``` db_create_table() ```

Die Funktion ``` db_create_table() ``` .

Code-Beispiel:
```php
<?php
  db_create_table('test', array(
   'id'        => 'INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY',
   'nachname'  => 'VARCHAR( 150 ) NOT NULL',
   'vorname'   => 'VARCHAR( 150 ) NOT NULL',
   'akuerzel'  => 'VARCHAR( 2 ) NOT NULL',
   'strasse'   => 'VARCHAR( 150 ) NULL',
   'plz'       => 'INT( 5 ) NOT NULL',
   'telefon'   => 'VARCHAR( 20 ) NULL'
 ));
?>
```
---
<!-- ################################################################################ db_add() -->

### ``` db_add() ```

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
<!-- ################################################################################ db_update() -->

### ``` db_update() ```

Die Funktion ``` db_update() ``` Aktualisiert werte der Datenbank.

Code-Beispiele:
```php
<?php db_update('user', $UUID, array('username' => 'Askylan')); ?>

<?php db_update('user', $UUID, array('username' => 'RedDrake1337', 'email' => $NEW_EMAIL)); ?>
```

---
<!-- ################################################################################ db_delete() -->

### ``` db_delete() ```

Die Funktion ``` db_delete() ``` Löscht werte aus der Datenbank.

Code-Beispiel:
```php
<?php db_delete('user', $UUID); ?>
```

---
<!-- ################################################################################ db_get_values() -->

### ``` db_get_values() ```

Die Funktion ``` db_get_values() ``` Liest alle Datensätze der zeile mit einer bestimmten ```$UUID``` aus und gibt sie als Associatives Array zurück.

Code-Beispiel für nur bestimmte werte:
```php
<?php $USERDATA = db_get_values('user', $UUID, array('username', 'email', 'steamid')) ?>
```
Code-Beispiel für alle werte:
```php
<?php $USERDATA = db_get_values('user', $UUID, 'all') ?>
```

---
<!-- ################################################################################ db_foreach_values() -->

### ``` db_foreach_values() ```

Die Funktion ``` db_foreach_values() ``` wird in einer ```foreach``` schleife verwendet um mehrere HTML-Elemente mit jeweils einer neuen Zeile in der Datenbank zu füllen.

Code-Beispiel für nur bestimmte werte:
```php
<?php foreach (db_foreach_values('user') as $VALUE) { ?>
  <p>Ich bin <?php echo $VALUE['username'] ?> und spiele gerne <?php echo $VALUE['game'] ?>.</p>
<?php } ?>

// Ich bin Askylan und spiele gerne Lost Ark.
// Ich bin Josie und spiele gerne Warframe.
// Ich bin RedDrake und spiele gerne GTAV.
// ...
```



---
<!-- ################################################################################ db_count() -->

### ``` db_count() ```
Die Funktion ``` db_count() ```

Code-Beispiel mit Datenbank "user":

| uuid | username | rang   |
| :--- | :---     | :---   |
| 100  | Askylan  | owner  |
| 101  | Josie    | member |
| 102  | RedDrake | member |

```php
<?php echo db_count('user','uuid','all') ?> // Ausgabe = 3

<?php echo db_count('user','uuid','100') ?> // Ausgabe = 1

<?php echo db_count('user','rang','member') ?> // Ausgabe = 2
```

---
<!-- ################################################################################ gen_uuid_by() -->

   ### ``` gen_uuid_by() ```

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
<!-- ################################################################################ gen_session() -->

### ``` gen_session() ```

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
<!-- ################################################################################ set_cookie() -->

### ``` set_cookie() ```

Die Funktion ``` set_cookie() ``` erstellt einen Cookie.

Beispiel:

Syntax - ```set_cookie('NAME', 'TAGE', NUTZDATEN);```
```php
<?php set_cookie('name', '1', $DATA); ?>
```
     
---
<!-- ################################################################################ del_cookie() -->

### ``` del_cookie() ```

Die Funktion ``` del_cookie() ``` Löscht einen Cookie.

Beispiel:
```php
<?php del_cookie('name'); ?>
```
     
---
<!-- ################################################################################ get_cookie() -->

### ``` get_cookie() ```

Die Funktion ``` get_cookie() ``` gibt einen Cookie zurück.

Beispiel:
```php
<?php get_cookie('name'); ?>
```

---
<!-- ################################################################################ save_file() -->

### ``` save_file() ```

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
