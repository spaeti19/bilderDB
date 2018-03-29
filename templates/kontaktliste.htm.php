<table class="table table-striped table-condensed">
  <thead>
	<tr>
	  <th></th>
	  <th>Nachname</th>
	  <th>Vorname</th>
	  <th>Strasse</th>
	  <th>PLZ</th>
	  <th>Ort</th>
	  <th>E-Mail</th>
	  <th>Tel.nr.</th>
	</tr>
  </thead>
  <tbody>
	<?php
	  foreach(getValue("data") as $row) {
		echo "<tr>
			  <td><a href='".getValue('phpmodule')."&kid=".$row['kid']."'>
			  <img src='../images/delete.png' border='no' onclick='return confdel();'></a></td>
			  <td><a href='".$_SERVER['PHP_SELF']."?id=kontakterfassen&action=edit&kid=".$row['kid']."'>".htmlTextAufbereiten($row['nachname'])."</a></td>
			  <td>".htmlTextAufbereiten($row['vorname'])."</td>
			  <td>".htmlTextAufbereiten($row['strasse'])."</td>
			  <td>".$row['plz']."</td>
			  <td>".htmlTextAufbereiten($row['ort'])."</td>
			  <td>".htmlTextAufbereiten($row['email'])."</td>
			  <td>".htmlTextAufbereiten($row['tel'])."</td>
			  </tr>\n";
	  }
	?>
  </tbody>
</table>
<?php
  $meldung = getValue("meldung");
  if (strlen($meldung) > 0) echo "<div class='col-md-offset-2 col-md-6 alert alert-success'>$meldung</div>";
?>
