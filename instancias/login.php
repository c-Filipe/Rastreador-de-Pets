
<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>	
	<?php
		
		session_start();
		

		require_once '../classes/classeUsuario.php';

				$login = new usuario();

				$login->login();
			
	?>

	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
