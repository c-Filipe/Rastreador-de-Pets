<?php
	
	session_start();
 
 if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

 	//echo "Área restrita ! Seu id é ".$_SESSION['id'].".";
       	
  } else {

  	header("Location: login.html");

  }  
	

?>
<!DOCTYPE html>
<html>
<head>
	<title> Localização</title>
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
						<a href="localizacao_atual.php"> Localização Atual </a>
					</div>
					<div class="col coluna">
						<a href="historico_localizacao.php"> Histórico da localização </a>
					</div>
								
				</div>
				<div class="row linha">
					
					<div class="col coluna">
						<a href="index.php"> Voltar para a Página Inicial </a>

						
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
				 	<img src="../imagens/face_logo.png" class="img-fluid">	Facebook |
				 	<img src="../imagens/insta_logo.png" class="img-fluid"> Instagram
				</div> 	
			</footer>

		</div>	
			


			<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
			<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
		</div>
		<footer>
			<hr />
			<div class="container d-flex justify-content-center">
				Copyright &copy; 2020 - by Filipe Andrade	
			</div>
			<div class="container d-flex justify-content-center">
			<a href="https://www.linkedin.com/in/carlos-filipe-1232571a0/" target="_blank">	<img src="../imagens/linkedin.png" class="img-fluid">	LinkedIn &nbsp; </a>
			<a href="https://www.instagram.com/filipe.andrade_/" target="_blank"> <img src="../imagens/instagram.png" class="img-fluid">	Instagram  </a>
		</footer>
	</body>
</html>