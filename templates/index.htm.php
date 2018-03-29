<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
  <link href="../css/bootstrap.min.css" rel="stylesheet" />
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jscript.js"></script>
  <title>Kontakteverwaltung</title>
  <style>
	.form-condensed .control-group {
	  margin-top: 0;
	  margin-bottom: 5px;
	}
  </style>
</head>

<body style="background-image: url("../public/images/background.jpg'");">
  <nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
      <div class="navbar-header">
		<a class="navbar-brand">Kontakteverwaltung</a>
      </div>
	  <ul class="nav navbar-nav">
        <?php echo getMenu(getValue("cfg_menu_list"), "Hauptmenü"); ?>
      </ul>
	</div>
  </nav>
  <div class="container" style="margin-top:80px">
	<?php echo getValue("inhalt"); ?>
  </div>
  <div class="container" style="margin-top:20px">
	<div class="row">
	  <div class="col-md-offset-3 col-md-4 text-center small text-muted">
		&copy;&nbsp;Copyright gibb M.Abplanalp
	  </div>
	</div>
  </div>
</body>
</html>
