<?php
/*
 *  @autor Michael Abplanalp
 *  @version Februar 2017
 *  Dieses Modul definert alle Konfigurationsparameter und stellt die DB-Verbindung her
 */

// Funktionen
setValue("cfg_func_list", array("kontaktliste","kontakterfassen","ortliste","orterfassen"));
// Inhalt des Menus
setValue("cfg_menu_list", array("kontaktliste"=>"Registrieren","kontakterfassen"=>"Anmelden","ortliste"=>"Ortliste","orterfassen"=>"Ort erfassen"));

// Datenbankverbindung herstellen
$db = mysqli_connect("127.0.0.1", "root", "gibbiX12345", "kontakte");
if (!$db) die("Verbindungsfehler: ".mysqli_connect_error());
setValue("cfg_db", $db);
?>
