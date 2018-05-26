<?php include ('funcoes.php');
conexao();

if(isset($_POST['atualizar'])){
		
		
		$sql_atualizabd= "UPDATE cliente SET
		NOME= '".$_POST['NOME']."',
		CPF= '".$_POST['CPF']."',
		DataNascimento= '".$_POST['DataNascimento']."',
		SEXO= '".$_POST['SEXO']."',
		EMAIL= '".$_POST['EMAIL']."',
		TELEFONE= '".$_POST['TELEFONE']."'
		 WHERE id=".$_POST['id'];

		 atualizar($sql_atualizabd);
         unset ($_POST['atualizar']);
	     unset ($_GET['acao']);
	     unset ($_GET['id']);
}
?>

<!DOCTYPE HTML PUBLIC>
<html>
<meta http_equiv="content_type" content="text/html" charset="UTF-8"/>
<html>
<head>
	<title></title>
<meta name="" content=" ">
</head>
<body>
	<?php 

	if((isset($_GET['acao'])) && ($_GET['acao']=='alterar') && (isset($_GET['id']))) {

		$sql_update= "SELECT * FROM cliente WHERE id=".$_GET['id']." LIMIT 1";
		$rs_atualiza=seleciona($sql_update);
		$res_update=mysqli_fetch_assoc($rs_atualiza); 

			?>		
				<form  method="POST" enctype="multipart/form-data" action="">
				
				<input type="text" name="NOME" value="<?php echo ($res_update['NOME'])?>"  /><br/>

				<input type="int" name="CPF" value="<?php echo ($res_update['CPF']) ?>" /><br/>

				<input type="date" name="DataNascimento" value="<?php echo ($res_update['DataNascimento'])?>" /><br/>

				<input type="text" name="SEXO"  value="<?php echo ($res_update['SEXO']) ?>" /> <br/>
				
				<input type="text" name="EMAIL" value="<?php echo ($res_update['EMAIL']) ?>" /><br/>

				<input type="int" name="TELEFONE" value="<?php echo ($res_update['TELEFONE']) ?>"  /><br/>

				<input type="hidden" name="id" value="<?php echo ($res_update['id']) ?>"/>

				<input type="submit" name="atualizar" value="Atualizar"/>
				</form>	
			
		<?php 
	
}


?>

<ul>
<?php

$sql_seleciona= "SELECT * FROM cliente" ;
$rs_cliente= seleciona($sql_seleciona);
while ( $res=mysqli_fetch_assoc($rs_cliente)) {

	?>
	<li>
		<?php echo ($res['NOME'])?> &nbsp 
		<?php echo ($res['CPF']) ?>&nbsp 
		<?php echo ($res['DataNascimento'])?>&nbsp 
		<?php echo ($res['SEXO']) ?>&nbsp 
		<?php echo ($res['EMAIL']) ?>&nbsp 
		<?php echo ($res['TELEFONE']) ?> |
		<a href="atualizacao.php?acao=alterar&id=<?php echo ($res['id']) ?>">Alterar</a>
	</li>
	<?php
}
?>
</ul>
</body>
</html>