# Toyplanet - GWP/DWP Projekt

## Getting Started
### Vorraussetzung

```
XAMPP Control Panel v3.2.4
damit verbunden XAMPP und phpmyadmin
Chrome/Firefox
```

### Installtion

* In XAMPP muss in der php.ini der Tag short_open_tag=on eingestellt sein.
* Das Projekt sollte nun in den in XAMPP festgelegten Ordner (standard: C:\xampp\htdocs) geschoben werden

* Datenbank-Import: entweder durch SQL-Datei import oder durch Forward Engineering in MySql Workbench:
```
src/database/database.mwb für MySQL Workbench
src/database/sqlInstall.sql für MySQL Dump
```
* Bei Import über PHPMyAdmin muss bei "Formatspezifische Optionen:" Der Haken bei "AUTO_INCREMENT nicht für Nullwerte verwenden" entfernt werden

* username: root
* password: '' (empty)

### Website Login:
* Login: Email:"test@mail.com" Passwort:"Passwort123"
* Registrierung eines eigenen Accounts

## Authors

* Bilal Alnaani
* Tom Käppler