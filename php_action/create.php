<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';
require_once '../includes/message.php';
// Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-cadastrar'])):
	$nome = clear($_POST['nome']);
	$sobrenome = clear($_POST['sobrenome']);
	$email = clear($_POST['email']);
	$dataani = clear($_POST['dataani']);
    $fone = clear($_POST['fone']);

	$sql = "INSERT INTO tbclientes (nome, sobrenome, email, dataani, fone) VALUES ('$nome', '$sobrenome', '$email', '$dataani', '$fone')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
	endif;
endif;


