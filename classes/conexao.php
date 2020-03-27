<?php
			$dsn = "mysql:dbname=rastreador;host=localhost";
			$dbuser = "root";
			$dbpass = "";

				try{

					global $pdo;
					$pdo = new PDO($dsn,$dbuser,$dbpass);


						
				}
			
				catch(PDOException $e){
					echo "falhou: ".$e->getMessage();
				}




?>

