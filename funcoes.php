
<?php
//Função para conectar ao BD
function conexao(){

$host = 'localhost';
$user = 'root';
$pass ='';
$database= 'cadastro';



$conn = mysqli_connect($host, $user, $pass,$database);

if (!$conn) {

	return false;
}

return $conn;
}
conexao();




function inserir($sql){
	if(mysqli_query(conexao(),$sql)){
		return TRUE;
	} else{
		return FALSE;
	}
}

function seleciona($sql){
	return (mysqli_query(conexao(),$sql));
		}

function atualizar($sql){
	if(mysqli_query(conexao(),$sql)){
		return TRUE;
	} else{
		return FALSE;
	}
}
function excluir($sql){
	if(mysqli_query(conexao(),$sql)){
		return TRUE;
		} else{
		return FALSE;
	}
}
?>