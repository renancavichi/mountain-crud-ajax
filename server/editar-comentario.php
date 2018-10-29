<?php 
$id = $_POST['idcomentario'];
$texto = $_POST['novotexto'];

require 'conexao.php';
try{
	$stmt = $conn->prepare(
	"UPDATE comentarios SET texto = :texto WHERE id = :id;"
	);
    $stmt->bindParam(':id', $id);
	$stmt->bindParam(':texto', $texto);

	$stmt->execute();
	$retorno['deucerto'] = true;
	$retorno['mensagem'] = "Parabéns! Editou!";
	echo json_encode($retorno);
	
} catch(PDOException $e){
	$retorno['deucerto'] = false;
	$retorno['mensagem'] = "Opss! Algo deu errado!";
	$retorno['error'] = $e->getMessage();
	echo json_encode($retorno);
}
?>