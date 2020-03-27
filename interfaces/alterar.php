<?php
	
	session_start();
 
 	if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

 	//echo "Área restrita ! Seu id é ".$_SESSION['id'].".";
	       	
	  } else {

	  	header("Location: login.html");

	  }

	  include_once("../classes/conexao.php");

	  $sql = $pdo->prepare("SELECT * FROM usuario WHERE IdUsuario = ? ");
	  $sql->bindValue(1,$_SESSION['id']);
	  $sql->execute();
	  foreach($sql->fetchAll() as  $usuario){}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Alterar cadastro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo_personalizado.css">

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
	</div>				
	
			<div class="container alterar">
				<section>
					<form method="POST" action="../instancias/alteracao.php">
						<div class="form-group">
							<div class="row justify-content-center" >
								<div class="col-4">
									<h3>Dados Pessais</h3>
								</div>	
							</div>
							<hr/>		
								<div class="row">
									<div class="col">
										<label for="nome"> Nome </label>
										<input id="nome" type="text" name="nome" class="form-control" placeholder="Digite seu nome" value="<?php 
										
											echo $usuario["Nome"];
										?>"> 	
										<br/>
									</div>	
									<div class="col">	
										<label for="sobrenome"> Sobrenome </label>
										<input id="sobrenome" type="text" name="sobrenome" class="form-control" 	placeholder="Digite seu sobrenome" value=
										"<?php 
												echo $usuario["Sobrenome"];
										?>">
									</div>							
								</div>

								<div class="row">
									<div class="col">
										<label for="email"> E-mail </label>
										<input id="email" type="email" name="email" class="form-control" placeholder="Digite seu E-mail" value=
										"<?php 
												echo $usuario["Email"];
										?>"> 
										<br />
									</div>
									
								</div>
								<hr/>
								<div class="row justify-content-center" >
									<div class="col-4">
										<h3>Endereço</h3>
									</div>	
								</div>
								<hr/>
								<div class="row">
									<div class="col">
										<label for="estado">Estado</label>
										<select id="estado" size="1" name="estado" class="form-control">

											<option value="0"> Selecione seu estado </option>
											<option value="Acre" <?=($usuario["Estado"] == 'Acre')?'selected':''?> > Acre (AC) </option>
											<option value="Alagoas" <?=($usuario["Estado"] == 'Alagoas')?'selected':''?>> Alagoas (AL) </option>
											<option value="Amapá" <?=($usuario["Estado"] == 'Amapá')?'selected':''?>> Amapá (AP) </option>
											<option value="Amazonas" <?=($usuario["Estado"] == 'Amazonas')?'selected':''?>> Amazonas (AM) </option>
											<option value="Bahia" <?=($usuario["Estado"] == 'Bahia')?'selected':''?>> Bahia (BA) </option>
											<option value="Ceará"<?=($usuario["Estado"] == 'Ceará')?'selected':''?>> Ceará (CE) </option>
											<option value="Distrito Federal"<?=($usuario["Estado"] == 'Distrito Federal')?'selected':''?>> Distrito Federal (DF) </option>
											<option value="Espírito Santo"<?=($usuario["Estado"] == 'Espírito Santo')?'selected':''?>> Espírito Santo (ES) </option>
											<option value="Goiás"<?=($usuario["Estado"] == 'Goiás')?'selected':''?>> Goiás (GO) </option>
											<option value="Maranhão" <?=($usuario["Estado"] == 'Maranhão')?'selected':''?>> Maranhão (MA) </option>
											<option value="Mato Grosso" <?=($usuario["Estado"] == 'Mato Grosso')?'selected':''?>> Mato Grosso (MT) </option>
											<option value="Mato Grosso do Sul" <?=($usuario["Estado"] == 'Mato Grosso do Sul')?'selected':''?>> Mato Grosso do Sul (MS) </option>
											<option value="Minas Gerais" <?=($usuario["Estado"] == 'Minas Gerais')?'selected':''?> > Minas Gerais (MG)  
											</option>
											<option value="Pará"<?=($usuario["Estado"] == 'Pará')?'selected':''?>> Pará (PA) </option> 
											<option value="Paraíba"<?=($usuario["Estado"] == 'Paraíba')?'selected':''?>> Paraíba (PB) </option>
											<option value="Paraná"<?=($usuario["Estado"] == 'Paraná')?'selected':''?>> Paraná (PR) </option>
											<option value="Pernambuco"<?=($usuario["Estado"] == 'Pernambuco')?'selected':''?>> Pernambuco (PE) </option>
											<option value="Piauí"<?=($usuario["Estado"] == 'Piauí')?'selected':''?>> Piauí (PI) </option>
											<option value="Rio de Janeiro"<?=($usuario["Estado"] == 'Rio de Janeiro')?'selected':''?>> Rio de Janeiro (RJ) </option>
											<option value="Rio Grande dO Norte"<?=($usuario["Estado"] == 'Rio Grande dO Norte')?'selected':''?>> Rio Grande do Norte (RN) </option>
											<option value="Rio Grande do Sul"<?=($usuario["Estado"] == 'Rio Grande do Sul')?'selected':''?>> Rio Grande do Sul (RS) </option>
											<option value="Rondônia"<?=($usuario["Estado"] == 'Rondônia')?'selected':''?>> Rondônia (RO) </option>
											<option value="Roraima"<?=($usuario["Estado"] == 'Roraima')?'selected':''?>> Roraima (RR) </option>
											<option value="Santa Catarina"<?=($usuario["Estado"] == 'Santa Catarina')?'selected':''?>> Santa Catarina (SC) </option>
											<option value="São Paulo"<?=($usuario["Estado"] == 'São Paulo')?'selected':''?>> São Paulo (SP) </option>
											<option value="Sergipe" <?=($usuario["Estado"] == 'Sergipe')?'selected':''?>> Sergipe (SE) </option>
											<option value="Tocantins"<?=($usuario["Estado"] == 'Tocantins')?'selected':''?>> Tocantins (TO) </option>
										</select>
									</div>
									<div class="col">
										<label for="cidade"> Cidade </label>
										<input id="cidade" type="text" name="cidade" class="form-control" placeholder="Digite sua cidade" value=
										"<?php 
												echo $usuario["Cidade"];
										?>">  
									</div>
									<div class="col">
										<label for="bairro"> Bairro </label>
										<input id="bairro" type="text" name="bairro" class="form-control" placeholder="Digite seu bairro"value=
										"<?php 
												echo $usuario["Bairro"];
										?>">  
									</div>	
								</div>
								<br/>
								<div class="row">
									<div class="col">
										<label for="rua"> Rua </label>
										<input id="rua" type="text" name="rua" class="form-control"   placeholder="Digite sua rua" value=
										"<?php 
												echo $usuario["Rua"];
										?>"> 
									</div>
									<div class="col">
										<label for="cep"> CEP </label>
										<input id="cep" type="number" name="cep" class="form-control"  placeholder="Digite seu cep" value=
										"<?php 
												echo $usuario["CEP"];
										?>"> 
									</div>
									<div class="col">
										<label for="numero"> Número </label>
										<input id="numero" type="number" name="numero" class="form-control"  placeholder=" numero de sua residência" value=
										"<?php 
												echo $usuario["Numero"];
										?>"> 
									</div>		

								</div>
								<br/>
								<div class="row">
									<div class="col">
										<label for="complemento"> Complemento </label>
										<input id="complemento" type="text" name="complemento" class="form-control"  placeholder="Digite complemento se houver" value=
										"<?php 
											echo $usuario["Complemento"];
										?>"> 
										<br>
									</div>
								</div>

							<hr />
							<div class="row justify-content-center" >
									<div class="col-2">
										<input class="btn btn-primary btn-lg" type="submit" value="Salvar Alterações"/>
									</div>
							</div>	
						</div>				
					</form>
				</section>	
								<div class="row justify-content-center" >
									<div class="col-1">
										<button class="btn btn-danger" onclick="cancelar()"> Cancelar </button>
									</div>		
								</div>			
			</div>				
	
	
		
	</div>	
		<!-- Funçao para alerta de cancelamento de alteração -->
	<script>

		function cancelar()
		{
		var x;
		var ok =confirm("ATENÇÃO! Os dados alterados não serão salvos");
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