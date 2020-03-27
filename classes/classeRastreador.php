<?php


class rastreador {

	//ATRIBUTOS


	private $idCadastro;
	private $dataAtivacao;


	//METODOS PARA MODIFICAR OS  ATRIBUTOS

	public function setIdCadastro($setIdCadastro){
		$this->idCadastro = $setIdCadastro;
	}
	public function setDataAtivacao($setDataAtivacao){
		$this->dataAtivacao = $setDataAtivacao;
	}
	//METODOS PARA RETORNA O ATRIBUTO

 	public function getIdCadastro(){
		 return $this->idCadastro;
	}
	public function getdataAtivacao(){
		 return $this->dataAtivacao;
	}

	// CONEXÃO COM O BANCO DE DADOS

	public function __construct(){


		$dsn = "mysql:dbname=rastreador;host=localhost";
			$dbuser = "root";
			$dbpass = "";

				try{
					
					$this->pdo = new PDO($dsn,$dbuser,$dbpass);

						
				}
			
				catch(PDOException $e){
					echo "falhou: ".$e->getMessage();
				} 
	}

	// MÉTODO PARA INSERIR NOVO RASTREADOR

	public function cadastrar(){

		$this->setIdCadastro(addslashes($_POST['id']));
		$this->setDataAtivacao(date("y/m/d"));


		// verificando se todos os dados obrigatorios foram preenchidos
		if (empty($this->getIdCadastro())) {
		 	echo "<script> alert('Preencha o campo ID DO RASTREADOR para se cadastrar') </script>";
		 	echo "<script> history.back() </script>";
		
		} 	
			 else {
				
					//	Verificando se rastreador ja está cadastrado

				 	$sql= $this->pdo->prepare("SELECT * FROM rastreador WHERE  IdCadastro = :id ");
				 	$sql->bindValue(':id',$this->getIdCadastro());
				 	$sql->execute();

				 	if ($sql->rowCount() > 0) {

				 		echo "<script> window.location= '../interfaces/cadastro-rastreador.php'; alert('Rastreador já existe.'); </script>";

				 	}
				 	

						// Inserindo dados se tudo estiver correto
					else {
					
						session_start();
						 
						

						  			// Inserindo dados ao banco


						$sql = $this->pdo->prepare("INSERT INTO rastreador SET IdCadastro = ? , DataAtivacao = ? , IdUsuario = ?");
						  		$sql->execute(array($this->getIdCadastro(),$this->getdataAtivacao(),$_SESSION['id']));

						 $sql = $this->pdo->prepare("INSERT INTO localizacao  (IdRastreador) VALUES  (LAST_INSERT_ID())");
						 $sql->execute(); 
						 
						echo " <div class='alert alert-success' role='alert'> Cadastrado com sucesso </div>";
						echo "<meta http-equiv='refresh' content='2;URL= ../interfaces/index.php'>";
						  		
					}
				}		  			
	  		


	}

	
	


}




?>