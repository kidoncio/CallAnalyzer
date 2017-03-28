<?php
require_once ("banco-usuario.php");
require_once("logica-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
if($usuario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválido.";
	header("Location: index.php");
} else {
	$_SESSION["success"] = "Usuário logado com sucesso.";
  setcookie("usuario_logado", $usuario["email"]);
	logaUsuario($usuario["email"]);
	header("Location: dashboard.php");
}
die();
