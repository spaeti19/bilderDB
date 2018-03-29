<div class="col-md-12">
<form name="kontakt" class="form-horizontal form-condensed" action="<?php echo getValue("phpmodule"); ?>" method="post">
  <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="nachname">Nachname *</label>
	<div class="col-md-4">
	  <input type="text" class="form-control" id="nachname" name="nachname" value="<?php echo getHtmlValue("nachname"); ?>" />
	</div>
  </div>
  <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="vorname">Vorname</label>
	<div class="col-md-4">
	  <input type="text" class="form-control" id="vorname" name="vorname" value="<?php echo getHtmlValue("vorname"); ?>" />
	</div>
  </div>
  <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="strasse">Adresse</label>
	<div class="col-md-4">
	  <input type="text" class="form-control" id="strasse" name="strasse" value="<?php echo getHtmlValue("strasse"); ?>" />
	</div>
  </div>
  <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="oid">PLZ + Ort</label>
	<div class="col-md-4">
	  <?php echo getValue("droport"); ?>
	</div>
  </div>
  <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="email">E-Mail *</label>
	<div class="col-md-4">
	  <input type="text" class="form-control" id="email" name="email" value="<?php echo getHtmlValue("email"); ?>" />
	</div>
  </div>
  <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="tel">Telefon</label>
	<div class="col-md-4">
	  <input type="text" class="form-control" id="tel" name="tel" value="<?php echo getHtmlValue("tel"); ?>" />
	</div>
  </div>
  <div class="form-group control-group">
	<div class="col-md-offset-4 col-md-4">
	  <button type="submit" class="btn btn-success" name="speichern" id="speichern">speichern</button>
	  <a href="<?php echo $_SERVER['PHP_SELF']."?id=kontaktliste"; ?>" class="btn btn-warning">abbrechen</a>
	  </div>
  </div>
</form>
</div>
<?php
  $meldung = getValue("meldung");
  if (strlen($meldung) > 0) echo "<div class='col-md-offset-2 col-md-6 alert alert-danger'>$meldung</div>";
?>
