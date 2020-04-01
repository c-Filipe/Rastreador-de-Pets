<?php
	
	session_start();
 
	if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

 	//echo "Área restrita ! Seu id é ".$_SESSION['id'].".";
       	
  	} 
  	else {

  		header("Location:login.html");

  	}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title> Relacionar Pet/Rastreador </title>
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
		
		<div class="container ">
			<section>
				<div class="container d-flex justify-content-center">
					<span class="border" style="text-align:center; margin:10% auto;padding:60px; background:#ADD8E6; box-shadow:2px 3px 4px #B0C4DE;">

						<form method="POST" action="../instancias/relacionarPet_Rastreador.php">
							<div class="form-group ">

								<label for="pet" > <h4>Selecione o pet que deseja relacionar a  um rastreador:</h4></label><br>
								<select id="pet" name="pet">
									<option value="nulo"> Selecione </option>
									<?php
										include_once("../classes/conexao.php");

										$sql = $pdo->prepare("SELECT  IdPet, NomePet FROM pet WHERE IdUsuario = ? AND idRastreador is NULL");
										$sql->BindValue(1,$_SESSION['id']);
										$sql->execute();

										if(count($sql)){
	     									foreach ($sql as $sql) {
	 								?>                                             
	    							<option  value="<?php echo $sql['IdPet'];?>" ><?php echo $sql['NomePet'];?></option> 
									 <?php      
									    }
									  }
									?>
								</select>
								<br/>
								<hr/>
								<label for="rastreador" > <h4>Agora selecione o rastreador que será atribuido ao pet escolhido :</h4></label><br>
								<select id="rastreador" name="rastreador">
									<option value="nulo"> Selecione </option>
									<?php
										include_once("../classes/conexao.php");

										$sql = $pdo->prepare("SELECT  IdRastreador, IdCadastro FROM rastreador WHERE IdUsuario = ? ");
										$sql->BindValue(1,$_SESSION['id']);
										$sql->execute();

										if(count($sql)){
	     									foreach ($sql as $sql) {
	 								?>                                             
	    							<option  value="<?php echo $sql['IdRastreador'];?>" ><?php echo $sql['IdCadastro'];?></option> 
									 <?php      
									    } //fim foreach
									  } // fim if
									?>
									
								</div>			
								</select>
							</div>
							<br/>
							<div class="row justify-content-center" >
									<div class="col-2">
										<input class="btn btn-primary btn-lg" type="submit" value="Salvar Alterações"/>
									</div>
							</div>				
						</form>
						<br/>
						<div class="row justify-content-center" >
									<div class="col-1">
										<a href="index.php"><button type="button" class="btn btn-secondary"> Voltar</button></a>
									</div>
						</div>			
					</span>	
				</div>	

			</section>
		</div>
		<footer>
			<hr/>
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
		
	</body>
</html>    		