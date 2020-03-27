<?php
	
	session_start();
 
	if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

 	//echo "Área restrita ! Seu id é ".$_SESSION['id'].".";
       	
  	} 
  	else {

  	header("Location: login.html");

  	}
 ?>  

<!DOCTYPE html>
<html>
<head>
	<title>cadastro de Pet</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
	<div class="container">
			<header>
				<div class="row">
					<div class="col-sm-6 logo ">
					 	<img src="../imagens/logo.png" class="img-fluid" />
					</div>
				</div>		
			</header>

		<div class="container d-flex justify-content-center">
			<span class="border" style="text-align:center; margin:10% auto;padding:60px; background:#ADD8E6; box-shadow:2px 3px 4px #B0C4DE;">
				<form method="POST" action="../instancias/cadastroPet.php">
					<div class="form-group ">
						
						<label for="nome" > Nome do seu Pet:</label><br>
						<input type="text" name="nome" id="nome" placeholder="Digite o nome do seu pet" size="25"><br><br>
						<label for="tipo" > Tipo:</label><br>
						<input type="text" name="tipo" id="tipo" placeholder="cachorro, gato, etc..." size="25"><br><br>

						<div class="row">
							<div class="col">
								<label for="data" > Data de Nascimento:</label><br>
								<input type="date" name="data" id="data">
							</div>

							<div class="col">
								<label for="sexo" >Sexo:</label><br>
								<select id="sexo" name="sexo">
									<option value="Macho"> Macho </option>
									<option value="Femea"> Fêmea </option>
								</select>
							</div>

						</div>	 
							<hr />
							<input class="btn btn-primary btn-lg" type="submit" value="Cadastrar" />
					</div>
				</form>
				
				<button class="btn btn-danger" onclick="cancelar()"> Cancelar </button>
		
			</span>	
		</div>

		<!-- Funçao para alerta de cancelamento do cadastro -->
		<script>

			function cancelar()
			{
			var x;
			var ok =confirm("ATENÇÃO! Os seus dados não serão salvos");
			if (ok==true)
			{
			x=window.location.href = "index.php";
			}
			else
			{
			x= false;
			}
			document.getElementById("demo").innerHTML=x;
			}
		</script>
	
		<footer>
				<hr />
				<div class="container d-flex justify-content-center">
					Copyright &copy; 2020 - by Filipe Andrade	
				</div>
				<div class="container d-flex justify-content-center">
				<a href="https://www.linkedin.com/in/carlos-filipe-1232571a0/" target="_blank">
					<img src="../imagens/linkedin.png" class="img-fluid">
					LinkedIn &nbsp;
			 	</a>
				<a href="https://www.instagram.com/filipe.andrade_/" target="_blank">
					<img src="../imagens/instagram.png" class="img-fluid">
					Instagram
				</a>
			</footer>
		


		<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	</div>
</body>

</html>