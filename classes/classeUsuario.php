<?php
	header('Content-Type: text/html; charset=utf-8');
	
	
	class usuario {

//ATRIBUTOS 

	private $idUsuario;
	private $nome;
	private $sobrenome;
	private $email;
	private $senha;
	private $estado;
	private $cidade;
	private $bairro;
	private $rua;
	private $cep;
	private $numero;
	private $complemento;


//METODOS PARA MODIFICAR ATRIBUTOS

	public function setIdUsuario($idUsuario){

		$this->idUsuario = $idUsuario;
	}
	public function setNome($nome){

		$this->nome = $nome;
	}
	public function setSobrenome($sobrenome){

		$this->sobrenome = $sobrenome;
	}
	public function setEmail($email){

		$this->email = $email;
	}
	public function setSenha($senha){

		$this->senha = $senha;
	}
	public function setEstado($estado){

		$this->estado = $estado;
	}
	public function setCidade($cidade){

		$this->cidade = $cidade;
	}
	public function setBairro($bairro){

		$this->bairro = $bairro;
	}
	public function setRua($rua){

		$this->rua = $rua;
	}
	public function setCep($cep){

		$this->cep = $cep;
	}
	public function setNumero($numero){

		$this->numero = $numero;
	}
	public function setComplemento($complemento){

		$this->complemento = $complemento;
	} 	 	 	 	 	 	 	 	 	 	 	 	 	

//METODOS PARA RETORNA O ATRIBUTO

	public function getIdUsuario() {
		return $this->idUsuario;
	}
	public function getNome() {
		return $this->nome;
	}
	public function getSobrenome() {
		return $this->sobrenome;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getSenha() {
		return $this->senha;
	}
	public function getEstado() {
		return $this->estado;
	}
	public function getCidade() {
		return $this->cidade;
	}
	public function getBairro() {
		return $this->bairro;
	}
	public function getRua() {
		return $this->rua;
	}
	public function getCep() {
		return $this->cep;
	}
	public function getNumero() {
		return $this->numero;
	}
	public function getComplemento() {
		return $this->complemento;
	}

	//Metodo construtor

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

		// Metodos da classe usuario

	// Metodo para cadastrar novo usuario

	public function cadastrar(){

		
		$nome = addslashes($_POST['nome']);
		$sobrenome = addslashes($_POST['sobrenome']);
		$email = addslashes($_POST['email']);
		$senha = md5(addslashes($_POST['senha']));
		$estado = addslashes($_POST['estado']);
		$cidade = addslashes($_POST['cidade']);
		$bairro = addslashes($_POST['bairro']);
		$rua = addslashes($_POST['rua']);
		$cep = addslashes($_POST['cep']);
		$numero = addslashes($_POST['numero']);
		$complemento = addslashes($_POST['complemento']);

		
			// verificando se todos os dados obrigatorios foram preenchidos
		if (empty($nome)) {
		 	echo "<script> alert('Preencha o campo nome para se cadastrar') </script>";
		 	echo "<script> history.back() </script>";

		}
		elseif (empty($email)) {
		 	echo "<script>alert('Preencha o campo email para se cadastrar')</script>";
		 	echo "<script> history.back() </script>";
		}
		elseif (empty($senha)) {
		 	echo "<script>alert('Preencha o campo senha para se cadastrar')</script>";
		 	echo "<script> history.back() </script>";
		}

		// definindo valor null para campos nao preechidos que nao sejam obrigatorios

			// inserir codigo
		// inserir codigo
		// inserir codigo


		else{
			
				//	Verificando se email ja está cadastrado

			 	$sql= $this->pdo->prepare("SELECT * FROM usuario WHERE  Email = :email ");
			 	$sql->bindValue(':email',$email);
			 	$sql->execute();

			 	if ($sql->rowCount() > 0) {

					echo "<script>alert('O Email informado já está cadastrado')</script>";
					echo "<script> history.back() </script>";
			 	}

			 	// Inserindo dados se tudo estiver correto
			 	else{
			 			
			 		$sql = $this->pdo->prepare("INSERT INTO usuario SET Nome = ?, Sobrenome = ?, Email= ?, Senha = ? , Estado = ?, Cidade= ?, Bairro= ? , Rua= ?, CEP= ? , Numero = ? ,Complemento = ? " );

			 		$sql->execute(array($nome, $sobrenome, $email, md5($senha), $estado, $cidade, $bairro, $rua, $cep, $numero, $complemento));

			 		echo " <div class='alert alert-success' role='alert'> Cadastrado com sucesso </div>";
					echo "<meta http-equiv='refresh' content='2;URL=../instancias/login.php'>";

				}
			}
					 		
				 
	}

// METODO PARA REALIZAR LOGIN


	public function login(){

		if (isset($_POST['email']) && empty($_POST['email']) == false and isset($_POST['senha']) && empty($_POST['senha']) == false ) {
			$email = addslashes($_POST['email']);
			$senha = md5(addslashes($_POST['senha']));	
			
			//verificando  banco de dados

				$sql = $this->pdo->prepare("SELECT * FROM usuario WHERE Email = :email 
				AND Senha = :senha "); 
				$sql->bindValue(':email',$email);
				$sql->bindValue(':senha', md5($senha));
				$sql->execute();



					if ($sql->rowCount() > 0) {

						$dado = $sql->fetch();

 						$_SESSION['id'] = $dado['IdUsuario'] ;
						

		 				header("location: ../interfaces/index.php");
		 				
					}

				else{
					
					echo " <div class='alert alert-danger' role='alert'> Email e/ou senha incorreto! </div>";
					echo "<meta http-equiv='refresh' content='2;URL=../instancias/login.php'>";	
				}
		}	
		else{
			
				header("location: ../interfaces/login.html");
			
			}
				
	}
// METODO PARA ALTERAÇÃO DE DADOS  DO USUARIO


	public function alterarCadastro(){

		$nome = addslashes($_POST['nome']);
		$sobrenome = addslashes($_POST['sobrenome']);
		$email = addslashes($_POST['email']);
		$estado = addslashes($_POST['estado']);
		$cidade = addslashes($_POST['cidade']);
		$bairro = addslashes($_POST['bairro']);
		$rua = addslashes($_POST['rua']);
		$cep = addslashes($_POST['cep']);
		$numero = addslashes($_POST['numero']);
		$complemento = addslashes($_POST['complemento']);
				
	// verificando se todos os dados obrigatorios foram preenchidos
		if (empty($nome)) {
		 	echo "<script> alert('Preencha o campo nome para proesseguir') </script>";
		 	echo "<script> history.back() </script>";

		}
		elseif (empty($email)) {
		 	echo "<script>alert('Preencha o campo email para prosseguir')</script>";
		 	echo "<script> history.back() </script>";
		}
		else{
	//	Verificando se email ja está cadastrado

			 	include_once("conexao.php"); //conexao com o banco
				
				$id =$_SESSION['id']; // Validando a variavel global para inserir na query
				
			 	$sql= $pdo->prepare("SELECT Email FROM usuario WHERE  Email = :email AND IdUsuario != $id  ");
			 	$sql->bindValue(':email',$email);
			 	$sql->execute();

			 	if ($sql->rowCount() > 0) {

			 		echo "<script>alert('O Email informado já esta cadastrado')</script>";
		 			echo "<script> history.back() </script>";
			 	}	
			 	// Inserindo dados se tudo estiver correto
			 	else{ 	
					include_once("conexao.php"); //conexao com o banco
					$id =$_SESSION['id']; // Validando a variavel global para inserir na query

					$sql= $pdo->prepare("UPDATE usuario SET Nome = ? , Sobrenome = ? , Email = ?, Estado= ?, Cidade = ?,Bairro = ?,Rua = ?, CEP = ?, Numero = ? , Complemento = ? WHERE IdUsuario = $id ");
					$sql->execute(array($nome, $sobrenome, $email, $estado, $cidade, $bairro, $rua, $cep, $numero, $complemento,));

					echo " <div class='alert alert-success' role='alert'> Alteração realizada com sucesso </div>";
						echo "<meta http-equiv='refresh' content='1 ;URL= ../interfaces/index.php'>";
				}
			}	
	}	
}
	
?>

