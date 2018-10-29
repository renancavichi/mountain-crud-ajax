<?php 
$user = $_POST['user'];
$pass = sha1($_POST['pass']);

require 'conexao.php';
try{
	$stmt = $conn->prepare(
	"SELECT * FROM usuario WHERE user = :user AND pass = :pass;"
	);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);

	$stmt->execute();
	
	if($stmt->rowCount() == 1){
		session_start();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$_SESSION['id'] = $result['id'];
		$_SESSION['nome'] = $result['name'];
		$_SESSION['usuario'] = $result['user'];
		$_SESSION['foto'] = $result['photo'];
		
		$retorno['deucerto'] = true;
		$retorno['mensagem'] = "Parabéns! Logou!";
		echo json_encode($retorno);
	}else{
		$retorno['deucerto'] = false;
		$retorno['mensagem'] = "Usuário ou Senha Inválidos";
		echo json_encode($retorno);
	};
} catch(PDOException $e){
	$retorno['deucerto'] = false;
	$retorno['mensagem'] = "Opss! Algo deu errado!";
	$retorno['error'] = $e->getMessage();
	echo json_encode($retorno);
}
?>