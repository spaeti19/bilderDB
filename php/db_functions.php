<?php
/*
 *  @autor Michael Abplanalp
 *  @version Februar 2017
 *  Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 *  Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 *  sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 */

/*
 * Datenbankfunktionen zur Tabelle orte
 */
function db_insert_ort($params){
    $sql = "insert into orte (plz, ort)
            values ('".escapeSpecialChars($params['plz'])."','".escapeSpecialChars($params['ort'])."')";
    sqlQuery($sql);
}

function db_select_orte() {
	$sql = "select * from orte order by ort, plz";
	return sqlSelect($sql);
}

function db_select_ort() {
    $sql = "select o.oid, o.plz, o.ort
			from orte o
			order by plz, ort";
    return sqlSelect($sql);
}

function db_update_orte($oid, $params) {
    $sql = "update orte
			set plz = '".escapeSpecialChars($params['plz'])."',
				ort = '".escapeSpecialChars($params['ort'])."'
			where oid = $oid";
    sqlQuery($sql);
}

function db_delete_orte($oid) {
    if (isCleanNumber($oid)) sqlQuery("delete from orte where oid=".$oid);
}

/*
 * Datenbankfunktionen zur Tabelle kontakte
 */
//function db_insert_kontakt($oid, $params) {
function db_insert_kontakt($params) {
    $sql = "insert into kontakte (nachname, vorname, strasse, oid, email, tel)
            values ('".escapeSpecialChars($params['nachname'])."','".escapeSpecialChars($params['vorname'])."',
					'".escapeSpecialChars($params['strasse'])."', ".$params['oid'].",
					'".escapeSpecialChars($params['email'])."','".escapeSpecialChars($params['tel'])."')";
    sqlQuery($sql);
}

function db_update_kontakt($kid, $params) {
    $sql = "update kontakte
			set nachname = '".escapeSpecialChars($params['nachname'])."',
				vorname = '".escapeSpecialChars($params['vorname'])."',
				strasse = '".escapeSpecialChars($params['strasse'])."',
				oid = ".$params['oid'].",
				email = '".escapeSpecialChars($params['email'])."',
				tel = '".escapeSpecialChars($params['tel'])."'
			where kid = $kid";
    sqlQuery($sql);
}

function db_select_kontakt($kid) {
	$sql = "select * from kontakte where kid = $kid";
	return sqlSelect($sql);
}

function db_select_kontakte() {
	$sql = "select k.kid, k.nachname, k.vorname, k.strasse, o.plz, o.ort, k.email, k.tel
			from kontakte k
			left join orte o on o.oid = k.oid
			order by nachname, vorname";
	return sqlSelect($sql);
}

function db_delete_kontakt($kid) {
    if (isCleanNumber($kid)) sqlQuery("delete from kontakte where kid=".$kid);
}

?>