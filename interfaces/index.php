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
	<title> Painel </title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo_personalizado.css">
	

</head>
	<body>
		<div class="container ">
			<header>
				<div class="row">
					
					<div class="col-sm-6 logo ">
						 <img src="../imagens/logo.png" class="img-fluid" />
					</div>
						
					
				</div>		
			</header>
		</div>		
		
		<div class="container index ">
			<section>
				<div class="row linha" >
					<div class="col coluna">
						<a href="localizacao.php"> Localizar Pet </a>
					</div>
					<div class="col coluna">
						<a href=" cadastro-pet.php"> Cadastrar Pet </a>
					</div>
					<div class="col coluna">
						<a href="cadastro-rastreador.php"> Cadastrar Rastreador </a>
					</div>				
				</div>
				<div class="row linha">
					<div class="col coluna">
						<a href="alterar.php">Alterar Meu Cadastro</a>
					</div>
					<div class="col coluna">
						<a href="relacionar.php">Gerenciar Pet/Rastreador</a>
					</div>
					
					<div class="col coluna">
					<button type="button" class="btn btn-link btn-lg" onclick="cancelar()"> Sair </button>
						

						
					</div>
				</div>	
				
			</section>
		</div>
		
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

		
			
		<!-- Função para confirmar logout -->
		<script>

			function cancelar()
			{
				var x;
				var ok =confirm("ATENÇÃO! Você sera redirecionado para a tela de login");
				if (ok==true)
				{
					x=window.location.href = "../instancias/logout.php";
				}
				else
				{
					x=window.location.href = "index.php";
				}
					document.getElementById("demo").innerHTML=x;
			}
		</script>

			<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
			<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
		</div>
	</body>
</html>    







