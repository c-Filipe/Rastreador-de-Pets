<?php 


	header('Content-Type: text/html; charset=utf-8');	
	class localizacao {


		private $longitude_atual;
		private $latitude_atual;
		private $data;
		private $longitude_inicial;
		private $latitude_inicial;
		private $longitude_final;
		private $latitude_final;



		public function setLongitude_atual($setLongitude_atual){
		$this->longitude_atual = $setLongitude_atual;
		}
		public function setLatitude_Atual($setLatitude_Atual){
			$this->latitude_atual = $setLatitude_Atual;
		}
		public function setData($setData){
			$this->data = $setData;
		}
		public function setLongitude_inicial($setLongitude_inicial){
			$this->longitude_inicial = $setLongitude_inicial;
			}
		public function setLatitude_inicial($setLatitude_inicial){
			$this->latitude_inicial = $setLatitude_inicial;
		}
		public function setLongitude_final($setLongitude_final){
			$this->longitude_final = $setLongitude_final;
			}
		public function setLatitude_final($setLatitude_final){
			$this->latitude_final =$setLatitude_final;
		}

	//METODOS PARA RETORNA O ATRIBUTO

 		public function getLongitude_atual(){
		 	return $this->longitude_atual;
		}
		public function getLatitude_Atual(){
		 	return $this->latitude_atual;
		}
		public function getData(){
			return $this->data;
		}
		public function getLongitude_inicial(){
			return $this->longitude_inicial;
		}
	   public function getLatitude_inicial(){
			return $this->latitude_inicial;
	   }
	   
	   public function getLongitude_final(){
			return $this->longitude_final;
		  }
		public function getLatitude_final(){
			return $this->latitude_final;
		}
	// MÉTODO PARA EXIBIR A LOCALIZAÇÃO ATUAL

		public function localizacao_atual(){

			
			$pet = (addslashes($_POST['pet']));
			

			if ($pet == 'nulo') {
				echo "<script>alert('Selecione um pet para realizar uma consulta')</script>";
				exit("<script> history.back() </script>");
				
			}
	
			else{

				include_once("conexao.php"); //conexao com o banco de dados



					// SELECIONANDO O RASTREADOR DO PET ESCOLHIDO
				$sql = $pdo->prepare('SELECT Latitude_Atual,Longitude_Atual FROM localizacao WHERE IdPet = ?');
				$sql->BindValue(1, $pet);
				$sql->execute();
				if ($sql->rowCount() > 0) {
					foreach ($sql as $result) {
						
					}

					$this->setLatitude_Atual($result['Latitude_Atual']);
					$this->setlongitude_atual($result['Longitude_Atual']);
				}	
				if (empty($result['Latitude_Atual']) && empty($result['Longitude_Atual']) ) {
					echo "<script>alert('O pet selecionado ainda não possui rastreador ou uma localização definida')</script>"
					exit("<script> history.back() </script>");
				}

			}	
		}
	// MÉTODO PARA EXIBIR O HISTORICO DE LOCALIZAÇÃO
		public function hist_localizacao(){

			   
			$pet = (addslashes($_POST['pet']));
			$data = (addslashes($_POST['data']));
			
		
		// CONVERTENDO A DATA PARA FORMATO MYSQL	
			function converteData($data){
				if(count(explode("/",$data)) > 1): 
					 return implode("-",array_reverse(explode("/",$data)));
				elseif(count(explode("-",$data)) > 1): 
					 return implode("/",array_reverse(explode("-",$data)));
				endif;
			}

			if ($pet == 'nulo') {
				echo "<script>alert('Selecione um pet para realizar uma consulta')</script>";
				exit("<script> history.back() </script>");   
			}
			elseif (empty($data)) {
				echo "<script>alert('Selecione uma data para realizar uma consulta')</script>";
				exit("<script> history.back() </script>");
			}
			
			else{
				include_once("conexao.php"); //conexao com o banco de dados
			// SELECIONANDO O RASTREADOR DO PET ESCOLHIDO
				$sql = $pdo->prepare('SELECT Latitude_inicial,Longitude_inicial, Latitude_final,Longitude_final,DataHistorico FROM localizacao WHERE IdPet = ? AND DataHistorico = ?');
				$sql->BindValue(1, $pet);
				$sql->BindValue(2, $data);
				$sql->execute();
   
				if ($sql->rowCount() > 0) {
					foreach ($sql as $result) {   
					}
					$this->setLatitude_inicial($result['Latitude_inicial']);
					$this->setlongitude_inicial($result['Longitude_inicial']);
					$this->setLatitude_final($result['Latitude_final']);
					$this->setlongitude_final($result['Longitude_final']);
					$this->setData($result['DataHistorico']);
				}	
				elseif(empty($result['Latitude_inicial']) && empty($result['Longitude_inicial']) && empty($result['DataHistorico']) ) {
					echo "<script>alert('O pet selecionado ainda não possui um histórico de localização')</script>";
					exit("<script> history.back() </script>");
				}
				
				
			}	
		}	
			


		



	}



 ?>
