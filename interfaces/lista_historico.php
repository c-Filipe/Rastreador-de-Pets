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
	<title>Histórico</title>
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
            <h2 class='titulo-tab'> Histórico </h2>
		    <section>
                <table class="table  table-hover">
                    <thead> 
                        <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Latitude Inicial</th>
                                <th scope="col">Longitude Inicial</th>
                                <th scope="col">Latitude Final</th>
                                <th scope="col">Longitude Final</th>
                                <th scope="col"></th>
                        </tr>
                    </thead>    
                    <?php
                        include_once("../classes/conexao.php"); // conexão com banco de dados
                        
                        $idPet = addslashes($_POST['pet']);

                        $sql = $pdo->prepare("SELECT idHistorico, DataHistorico, Hora,latitude_inicial,latitude_final,longitude_inicial,
                        longitude_final FROM historicoloc WHERE IdPet = ?  ORDER BY DataHistorico DESC ");
                        $sql->BindValue(1,$idPet);
                        $sql->execute();

                                  
                             foreach ($sql as $sql) {

                                    $id = $sql['idHistorico'];
                                    $data = $sql['DataHistorico']; 
                                    
                                    
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>   
                            <td> <?php echo date('d/m/Y', strtotime($data));;?></td>
                            <td> <?php echo $sql['Hora'];?></td <>
                            <td> <?php echo $sql['latitude_inicial'];?></td>
                            <td> <?php echo $sql['longitude_inicial'];?></td>
                            <td> <?php echo $sql['latitude_final'];?></td>
                            <td> <?php echo $sql['longitude_final'];?></td>
                            <td><a class='link' href='histo_loc.php?id=<?php echo $id; ?>'> Ver Mapa<a></td>
                        </tr>
                        <?php
                            } // fim foreach
                    
                         ?>
                    <tbody>        
                </table>

                    <div class="container menu">
                        <div class="row linha" >
                            <div class="col coluna">
                                <a href="historico_localizacao.php"> Nova consulta </a>
                            </div>
                        <div class="col coluna">
                            <a href="index.php"> Voltar para a página principal </a> 
                        </div>
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
		


		<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	</div>
</body>
</html>