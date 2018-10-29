<?php 
session_start();
$iduser = $_SESSION['id'];
$texto = $_POST['texto'];

require 'conexao.php';
try{
	$stmt = $conn->prepare(
	"INSERT INTO comentarios (iduser, texto) 
    VALUES (:iduser, :texto)"
	);
    $stmt->bindParam(':iduser', $iduser);
    $stmt->bindParam(':texto', $texto);

	$stmt->execute();
	$retorno['deucerto'] = true;
	$retorno['mensagem'] = "Parabéns! Cadastrou!";
	echo json_encode($retorno);
	
} catch(PDOException $e){
	$retorno['deucerto'] = false;
	$retorno['mensagem'] = "Opss! Algo deu errado!";
	$retorno['error'] = $e->getMessage();
	echo json_encode($retorno);
}
?>