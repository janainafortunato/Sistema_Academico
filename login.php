<?php
/**
*Inclui o arquivo de inicialização
*/
require 'init.php';

/**
*Resgata variáveis do formulario
*/
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if(empty($name) || empty($email) || empty($password)){
	echo "Informe nome, email e senha";
	exit;
}
/**
*Cria o hash da senha
*/
$passwordHash = make_hash($password);

$PDO = db_connect();

$sql = "SELECT id_login, name FROM login WHERE name = :name , email = :email AND password = :password";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $passwordHash);

$stmt->execute();

$login = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($login)<= 0){
	echo "Nome ou Email ou senha incorretos";
	exit;
}

/**
*Pega o primeiro usuário
*/
$login = $logins[0];

session_start();
$_SESSION['logged_in'] = true;
$_SESSION['id_login'] = $login['id_login'];
$_SESSION['name'] = $login['name'];


header('Location:index.php');

?>





















?>