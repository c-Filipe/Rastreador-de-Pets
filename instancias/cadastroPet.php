<!DOCTYPE html>
<html>
	<head>
		<title>cadastro de Pet</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>

	<body>

		<?php

			require_once '../classes/classePet.php';

			$pet = new pet;

			$pet->cadastrar();

		?>
		


		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	</body>

</html>


