<?php
	

	header('Content-Type: text/html; charset=utf-8');

	class pet {

		// ATRIBUTOS

		private $nomePet;
		private $tipoPet;
		private $dataNasc;
		private $sexoPet;
		private $idRastreador;
		private $idPet;

		//METODOS PARA MODIFICAR OS  ATRIBUTOS

		public function setNomePet($setNomePet){
			$this->nomePet = $setNomePet;

		}
		public function setTipoPet($setTipoPet){
			$this->tipoPet = $setTipoPet;

		}

		public function setDataNasc($setDataNasc){
			$this->dataNasc = $setDataNasc;

		}

		public function setSexoPet($setSexoPet){
			$this->sexoPet = $setSexoPet;

		}
		public function setIdRastreador($setIdRastreador){
			$this->idRastreador = $setIdRastreador;
		}
		public function setIdPet($setIdPet){
			$this->idPet = $setIdPet;

		}
		//METODOS PARA RETORNA O ATRIBUTO

		public function getNomePet() {
		return $this->nomePet;
		}

		public function getTipoPet() {
		return $this->tipoPet;
		}
		public function getDataNasc() {
		return $this->dataNasc;
		}
		public function getSexoPet() {
		return $this->sexoPet;
		}
		public function getIdRastreador() {
			return $this->idRastreador;
		}
		public function getIdPet() {
		return $this->idPet;
		}

		public function __construct(){

			//Conectar banco de dados

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
		// Metodos da classe pet

	// Metodo para cadastrar novo pet

		public function cadastrar(){

			$this->setNomePet(addslashes($_POST['nome']));
			$this->setTipoPet(addslashes($_POST['tipo']));
			$this->setDataNasc(addslashes($_POST['data']));
			$this->setSexoPet(addslashes($_POST['sexo']));

			// validando o campo sexo

			switch ($this->getSexoPet()) {
				case 'Macho':
					$this->setSexoPet("Macho");
					break;

				case 'Femea':
					$this->setSexoPet("Femea");
					break;	
			}

			// Iniciando sessão   
			
			session_start();
 
  			// Inserindo dados ao banco
			if (empty($nome)) {
				echo "<script> alert('Preencha o campo nome para proesseguir') </script>";
				echo "<script> history.back() </script>";
			}
			else{
				$sql = $this->pdo->prepare("INSERT INTO pet SET NomePet = :nome , TipoPet = :tipo , DataNasc = :data, SexoPet = :sexo, IdUsuario = :id " );
				$sql->bindValue(':nome', $this->getNomePet());
				$sql->bindValue(':tipo', $this->getTipoPet());
				$sql->bindValue(':data', $this->getDataNasc());
				$sql->bindValue(':sexo', $this->getSexoPet());
				$sql->bindValue(':id', $_SESSION['id']);
				$sql->execute();

				echo " <div class='alert alert-success' role='alert'> Pet cadastrado com sucesso </div>";

				echo "<meta http-equiv='refresh' content='2;URL= ../interfaces/index.php'>";
			}	

		}

		// Metodo para relacionar o rastreador ao pet 

		public function relacionar(){

			

			


			$this->setIdPet(addslashes($_POST['pet']));
			$this->setIdRastreador(addslashes($_POST['rastreador']));

			include_once("conexao.php"); // conexao com o banco de dados

			$sql = $pdo->prepare("SELECT idRastreador FROM pet WHERE idRastreador IS NOT NULL AND idRastreador = :id ");
			$sql->bindValue(':id',$this->getIdRastreador());
			$sql->execute();
			if ($sql->rowCount() > 0) {

				echo " <div class='alert alert-danger' role='alert'> O rastreado selecionado já está relacionado a outro pet. Por favor escolha outro. </div>";
				echo "<meta http-equiv='refresh' content='4;URL=../interfaces/relacionar.php'>";
				
				
				
			}
			else{
				
				$sql = $pdo->prepare("UPDATE pet SET  IdRastreador = ? WHERE IdPet = ?");
				$sql->execute(array($this->getIdRastreador(),$this->getIdPet()));

				$sql = $pdo->prepare("UPDATE localizacao SET IdPet = ?  WHERE IdRastreador = ?");
				$sql->execute(array($this->getIdPet(),$this->getIdRastreador()));

				

				echo " <div class='alert alert-success' role='alert'> O pet selecionado, agora está vinculado ao rastreador escolhido. </div>";
					echo "<meta http-equiv='refresh' content='2;URL= ../interfaces/gerenciador.php'>";

			}



			
			

		}	



	}

?>


