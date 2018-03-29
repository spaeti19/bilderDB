<?php
/*
 *  @autor Michael Abplanalp
 *  @version Februar 2017
 *  Dieses Modul beinhaltet Funktionen, welche die Anwendungslogik implementieren.
 */

/*
 * Beinhaltet die Anwendungslogik zur Verwaltung des Kontaktformulars
 */
function kontakterfassen() {
  // Initialisierungen
  if (isset($_GET['action'])) $action = $_GET['action'];
  else $action = "new";
  if (isset($_GET['kid'])) $kid = $_GET['kid'];
  else $kid = "";
  // Wenn ein Kontakt bearbeitet werden soll
  if ($action == "edit" && $kid > 0) editKontakt($action, $kid);
  else newKontakt($action);
  // Template abfüllen und Resultat zurückgeben
  setValue("phpmodule", $_SERVER['PHP_SELF']."?id=".getValue("func")."&action=$action&kid=$kid");
  return runTemplate( "../templates/".getValue("func").".htm.php" );
}

/*
 * Beinhaltet die Anwendungslogik zur Ausgabe der Kontaktliste
 */
function kontaktliste() {
  // Falls ein Kontakt erfolgreich eingefügt worden ist
  if (isset($_GET['action'])) {
	$action = $_GET['action'];
	if ($action == "new") setValue("meldung", "Der Kontakt wurde erfolgreich eingefügt.");
	elseif ($action == "edit") setValue("meldung", "Der Kontakt wurde erfolgreich geändert.");
  // Übergebener Eintrag in DB löschen
  } elseif (isset($_GET['kid'])) {
	db_delete_kontakt($_GET['kid']);
	setValue("meldung", "Der Kontakt wurde erfolgreich gelöscht.");
  }
  // Alle Daten (Kontakte) aus der DB lesen und der Variablen "data" zuweisen
  setValue("data", db_select_kontakte());
  // Falls Daten vorhanden sind, Template ausführen und Resultat zurückgeben
  if (is_array(getValue("data"))) {
	setValue("phpmodule", $_SERVER['PHP_SELF']."?id=".getValue("func"));
	return runTemplate("../templates/".getValue("func").".htm.php");
  } else {
	return "<div class='col-md-offset-3 col-md-4 text-center'>Liste ist leer...</div><br /><br />";
  }
}


function ortliste() {
    // Alle Daten (Orte) aus der DB lesen und der Variablen "data" zuweisen
    setValue("data", db_select_ort());
    // Falls Daten vorhanden sind, Template ausführen und Resultat zurückgeben
    if (is_array(getValue("data"))) {
        setValue("phpmodule", $_SERVER['PHP_SELF']."?id=".getValue("func"));
        return runTemplate("../templates/".getValue("func").".htm.php");
    } else {
        return "<div class='col-md-offset-3 col-md-4 text-center'>Liste ist leer...</div><br /><br />";
    }
}

function orterfassen() {
    // Initialisierungen
    if (isset($_GET['action'])) $action = $_GET['action'];
    else $action = "new";
    if (isset($_GET['oid'])) $kid = $_GET['oid'];
    else $oid = "";
    // Wenn ein Kontakt bearbeitet werden soll
    if ($action == "edit" && $oid > 0) editOrt($action, $oid);
    else newOrt($action);
    // Template abfüllen und Resultat zurückgeben
    setValue("phpmodule", $_SERVER['PHP_SELF']."?id=".getValue("func")."&action=$action&oid=$oid");
    return runTemplate( "../templates/".getValue("func").".htm.php" );
}

function newOrt($action) {
    // Es wurde auf "speichern" geklickt
    if (isset($_POST['speichern'])) {
        $fehlermeldung = checkOrt();
        // Wenn ein Fehler aufgetreten ist
        if (strlen($fehlermeldung) > 0) {
            setValue("meldung", $fehlermeldung);
            setValues($_POST);
            setValue("droport", dropOrt($_POST['oid']));
            // Wenn alles ok, wird der Kontakt eingefügt und die Kontaktliste angezeigt
        } else {
            db_insert_ort($_POST);
            // Die Funktion wird hier verlassen und die Kontaktliste angezeigt
            return header("Location: ".$_SERVER['PHP_SELF']."?id=ortliste&action=new");
        }
        // Die Seite wurde zum 1. Mal aufgerufen (via Menü)
    } else {
        setValue("droport", dropOrt());
    }
}

function checkOrt() {
    $fehlermeldung = "";

    if (!checkEmpty($_POST['plz'], 3)) {
        $fehlermeldung .= "Bitte füllen Sie dieses Feld aus ";
    }
    if (!checkEmpty($_POST['ort'], 3)) {
        $fehlermeldung .= "Bitte füllen Sie dieses Feld aus ";
    }
    return $fehlermeldung;
}

/*
 * Erstellt das Listenfeld Orte
 * @param       $data       Assoziativer Array mit den Werten
 * @param       $sel        Wert, welcher vorselektiert werden soll
 */
function dropOrt($sel="") {
  $data = db_select_orte();
  $drop = "<select name='oid' class='form-control'>";
  $drop .= "<option value='NULL'></option>";
  if (count($data)) {
	foreach ($data as $row) {
	  $selected = "";
	  if ($row['oid'] == $sel) $selected = "selected";
	  $drop .= "<option value='".$row['oid']."' $selected>".$row['plz']." ".$row['ort']."</option>";
	}
  }
  $drop .= "</select>";
  return $drop;
}

/*
 * Funktion zum Einfügen eines Kontaktes
 * @param  $action     Die Aktion (= new), um bei einem Fehler die URL wieder zu bilden
 */
function newKontakt($action) {
  // Es wurde auf "speichern" geklickt
  if (isset($_POST['speichern'])) {
	$fehlermeldung = checkKontakt();
	// Wenn ein Fehler aufgetreten ist
	if (strlen($fehlermeldung) > 0) {
	  setValue("meldung", $fehlermeldung);
	  setValues($_POST);
	  setValue("droport", dropOrt($_POST['oid']));
	// Wenn alles ok, wird der Kontakt eingefügt und die Kontaktliste angezeigt
	} else {
	  db_insert_kontakt($_POST);
	  // Die Funktion wird hier verlassen und die Kontaktliste angezeigt
	  return header("Location: ".$_SERVER['PHP_SELF']."?id=kontaktliste&action=new");
	}
  // Die Seite wurde zum 1. Mal aufgerufen (via Menü)
  } else {
	setValue("droport", dropOrt());
  }
}

/*
 * Funktion zum Ändern eines Kontaktes
 * @param  $action     Die Aktion (= edit), um bei einem Fehler die URL wieder zu bilden
 * @param  $kid        Die ID des Kontaktes, der geändert werden soll
 */
function editKontakt($action, $kid) {
  // Es wurde auf "speichern" geklickt
  if (isset($_POST['speichern'])) {
	$fehlermeldung = checkKontakt();
	// Wenn ein Fehler aufgetreten ist
	if (strlen($fehlermeldung) > 0) {
	  setValue("meldung", $fehlermeldung);
	  setValues($_POST);
	  setValue("droport", dropOrt($_POST['oid']));
	// Wenn alles ok, werden die Änderungen gespeichert und die Kontaktliste angezeigt
	} else {
	  db_update_kontakt($kid, $_POST);
	  // Die Funktion wird hier verlassen und die Kontaktliste angezeigt
	  return header("Location: ".$_SERVER['PHP_SELF']."?id=kontaktliste&action=edit");
	}
  // Die Seite wurde zum 1. Mal aufgerufen (von der Kontaktliste aus)
  } else {
	// Die Daten von der DB werden in den globalen Array geschrieben
	setValue("data", db_select_kontakt($kid));
	// Die einzelnen Attribute in den globalen Array schreiben.
	// Der 1. (und in diesem Fall einzige) Datensatz hat den Index = 0.
	if (is_array(getValue("data"))) {
	  setValues(getValue("data")[0]);
	  setValue("droport", dropOrt(getValue("data")[0]['oid']));
	}
  }
}

/*
 * Funktion zur Eingabeprüfung eines Kontaktes
 */
function checkKontakt() {
  $fehlermeldung = "";

  if (!checkEmpty($_POST['nachname'], 3)) {
	$fehlermeldung .= "Der Nachname muss mind. 3 Zeichen lang sein. ";
  }
  if (!checkEmail($_POST['email'])) {
	$fehlermeldung .= "Falsches Format E-Mail. ";
  }
  return $fehlermeldung;
}
?>