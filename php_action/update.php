<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$dataani = mysqli_escape_string($connect, $_POST['dataani']);
	$fone = mysqli_escape_string($connect, $_POST['fone']);

	$id = mysqli_escape_string($connect, $_POST['id']);

	

	$sql = "UPDATE tbclientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', dataani = '$dataani', fone ='$fone'  WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	endif;
endif;