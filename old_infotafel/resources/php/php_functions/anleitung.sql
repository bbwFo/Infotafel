






/* DATENBANK ERSTELLEN */
CREATE DATABASE testbench;

/* DATENBANK NUTZEN */
USE testbench;

/* TABELLE ANLEGEN */
CREATE TABLE schüler
(
	id serial PRIMARY KEY,
    vname VARCHAR(50),
    nname VARCHAR(50),
    strasse VARCHAR(15),
    plz VARCHAR(15),
    ort VARCHAR(50)
);

/*
serial
NOT NULL = nicht 0
AUTO INCREMENT = zählt immer 1 nach oben
UNIQUE = einzigartig
UNSIGNED

*/


/* TABELLE ANLEGEN WENN SIE NICHT EXISTIRT */
CREATE TABLE IF NOT EXISTS schüler
(
	id serial PRIMARY KEY,
    vname VARCHAR(50),
    nname VARCHAR(50),
    strasse VARCHAR(15),
    plz VARCHAR(15),
    ort VARCHAR(50)
);




/* ANDERE OPERATOREN */
SELECT * FROM users WHERE username IS NULL; /* NULL */
/* oder */
SELECT * FROM users WHERE username = 'Askylan' AND username = 'Tobi'; /* AND */
/* oder */
SELECT * FROM users WHERE username = 'Askylan' OR username = 'Tobi'; /* OR */
/* oder */
SELECT * FROM users WHERE username = 'Askylan' NOT username = 'Tobi'; /* NOT */
/* oder */
SELECT * FROM users WHERE username = 'Askylan' AND ( id = 1 OR rang > 'admin'); /* MEHRFACHE DEFINIRUNG */




/* [= gleich] Operator */
SELECT * FROM nummers WHERE zahl = 100; /* INT */
/* oder */
SELECT * FROM users WHERE username = 'Askylan'; /* STRING */

/* [< kleiner] Operator */
SELECT * FROM nummers WHERE zahl < 100; /* INT */
/* oder */
SELECT * FROM texte WHERE wort > 'A'; /* STRING */

/* [> größer] Operator */
SELECT * FROM nummers WHERE zahl > 100; /* INT */
/* oder */
SELECT * FROM texte WHERE wort > 'Askylan'; /* STRING */

/* [<> ungleich] Operator */
SELECT * FROM nummers WHERE zahl <> 100; /* INT */
/* oder */
SELECT * FROM texte WHERE wort <> 'Askylan'; /* STRING */

/* [<= kleiner oder gleich] Operator */
SELECT * FROM nummers WHERE zahl <= 100; /* INT */
/* oder */
SELECT * FROM texte WHERE wort <= 'Askylan'; /* STRING */

/* [>= größer oder gleich ] Operator */
SELECT * FROM nummers WHERE zahl >= 100; /* INT */
/* oder */
SELECT * FROM texte WHERE wort >= 'Askylan'; /* STRING */







SELECT * FROM users WHERE login_date = '2020-08-11';

UPDATE users SET login_date = CAST('2020-09-30' AS DATETIME) WHERE username = 'Askylan';






/* TAGE, MONATE ODER JARHE HINZUFÜGEN ODER ENTFERNEN */
SELECT DATE_ADD('2020-09-30', INTERVAL + 5 DAY);

/* DIFFERENZ ZWISCHEN 2 DATUMS */
SELECT DATEDIFF('2020-11-30', '2020-09-30');


SELECT COUNT(*) FROM mitarbeiterr WHERE DAY(Geburtsdatum) = 13;
SELECT COUNT(*) FROM mitarbeiterr WHERE MONTH(Geburtsdatum) = 13;
SELECT COUNT(*) FROM mitarbeiterr WHERE YEAR(Geburtsdatum) < 1990;

SELECT Vorname, DAYNAME(Geburtsdatum) FROM mitarbeiterr WHERE Nachname = 'klein';

































/* TABELLE UMBENNENEN */
RENAME TABLE schüler TO schueler;

/* ALLES IN TABELLE AUSWÄHLEN */
SELECT * FROM schueler;

/* ALLES AUSWÄHLEN OHNE DUPLICATE ANZUZEIGEN */
SELECT distinct District FROM city WHERE CountryCode = 'DEU';

/* AUSWÄHLEN */
SELECT user1 FROM schueler;

/* DATEN HINZUFÜGEN */
ALTER TABLE schueler
ADD hausnummer INT
AFTER strasse;

/* ZEILE MIT DATENSÄTZEN LÖSCHEN */
DELETE FROM kunde WHERE id = 5;

/* ALLE GLEICHEN DATENSÄTZE VERÄNDERN */
UPDATE city SET District = 'Bayern' WHERE District = 'Baijeri';

/* DATENTYP AKTUALISIEREN */
ALTER TABLE schueler
MODIFY hausnummer VARCHAR(5);

/* DATENTYP AKTUALISIEREN - KURZ */
CHANGE hausnummer VARCHAR(5);

/* DATENSATZ EINFÜGEN */
INSERT INTO schueler (vname, nname, strasse, hausnummer, plz, ort)
VALUES ('Guenter', 'Hans', 'kekstrasse', 7, '23483', 'Abensberg');



/* DATENBANK USER ANLEGEN */
CREATE USER askylan IDENTIFIED BY '1234';

/* DATENBANK USER LÖSCHEN */
DROP USER askylan;

/* Alle Rechte für eine Datenbank vergeben */
GRANT ALL ON datenbank TO benutzer@server;

/* Die Rechte INSERT und DELETE für eine Tabelle vergeben */
GRANT INSERT, DELETE ON tabelle TO benutzer@server;

/* Recht an zwei Benutzer vergeben */
GRANT INSERT ON tabelle TO user1, user2;

/* Recht nur auf eine Tabelle vergeben */
GRANT SELECT ON tabelle TO user1;

/* Alle Rechte für eine Datenbank löschen */
REVOKE ALL PRIVILEGES ON tabelle FROM benutzer@server;

/* INSERT und DELETE für eine Datenbank entziehen */
REVOKE INSERT, DELETE ON tabelle FROM benutzer@server;
