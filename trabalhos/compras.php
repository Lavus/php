<?php
 session_start();
?>
<html>
 <head>
  <title>Compras</title>
  <style type="text/css">
   #divmagem
    {
	  width:1400px;
	  height:150px;
	  background-image: url(imagens/image.png);
	  background-repeat: no-repeat;
      background-position: center;
    }
  </style>  
 </head>
<?php
 if (isset($_SESSION['usuario']) and isset($_SESSION['senha'])){
?> 
 <body bgcolor="white">
  <div id="divmagem" align="right">
    <li><a href="cestadecompras.php">Cesta de compras</a></li>
    <li><a href="faleconosco.php">Fale conosco</a></li>
<?php
 if (($_SESSION['usuario']=='admin') and ($_SESSION['senha']=='1234')){
?>   
    <li><a href="vendas.php">Vendas</a></li>
<?php
}
?> 
    <li><a href="destroi.php">Sair</a></li>
  </div>
<?php
 }else{
?>
 <body bgcolor="white">
  <div id="divmagem" align="right">
  </div>   
<?php
 }
?>
  <table align="center"><tr><td>
   <tr>
<?php
 if (isset($_SESSION['usuario']) and isset($_SESSION['senha'])){
 $action=array('livros.php','apostilas.php','cd.php','dvd.php');
 $nome=array('Livros','Apostilas','CD','DVD');
 for($i=0;$i<4;$i++){
  echo('<td>');
  echo('<form name="dados" method="post" action="'.$action[$i].'">');
  echo('<input name="'.$nome[$i].'" value="'.$nome[$i].'" type="submit" size="30" maxlength="50"/>');
  echo('</form>');
  echo('</td>');
 }
 }else{
 $action=array('livros.php','apostilas.php','cd.php','dvd.php','index.php');
 $nome=array('Livros','Apostilas','CD','DVD','Login');
 for($i=0;$i<5;$i++){
  echo('<td>');
  echo('<form name="dados" method="post" action="'.$action[$i].'">');
  echo('<input name="'.$nome[$i].'" value="'.$nome[$i].'" type="submit" size="30" maxlength="50"/>');
  echo('</form>');
  echo('</td>');
 }
 } 
?>    
  </tr> 
   <br/>
 </body>
  <title>Login</title>
 </head>
 <body bgcolor="white">
 </body> 
</html>
<?php
 include("conexao.php");
 include("monta.php");
 if (isset($_GET['opicao'])){
  $consulta = "select CPF_cliente from clientes where usuario='".$_SESSION['usuario']."' and senha='".$_SESSION['senha']."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){	
   $CPF=$linha['CPF_cliente'];
  }
  $produto=$_GET['opicao'];
  $data=date("d/m/Y");
  $horario=date("H:i:s");
  $consulta = "select guardaprodutos.cod_guarda from clientes,guardaprodutos,produtos where guardaprodutos.CPF_cliente=clientes.CPF_cliente and guardaprodutos.cod_produto=produtos.cod_produto and clientes.CPF_cliente='".$CPF."'
   and produtos.cod_produto='".$produto."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){	
   $guarda=$linha['cod_guarda'];
  }
 if (isset($_POST['confirmar'])){
  echo($_POST['corimpares']);
  $pagamento=$_POST['corimpares'];
  $consulta = "INSERT INTO vendas (`CPF_cliente`,`cod_produto`,`data`,`codigo_forma_pagamento`,`horario`) VALUES ('".$CPF."','".$produto."','".$data."','".$pagamento."','".$horario."')";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());  
  $consulta = "DELETE FROM guardaprodutos WHERE guardaprodutos.cod_guarda='".$guarda."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  echo('<meta http-equiv="refresh" content="0;cestadecompras.php">'); 
 }
  $consulta = "select produtos.* from produtos,clientes,guardaprodutos where guardaprodutos.cod_produto=produtos.cod_produto and  guardaprodutos.CPF_cliente=clientes.CPF_cliente and clientes.CPF_cliente='".$CPF."' and clientes.CPF_cliente='".$CPF."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
   echo('<table align="center">');
	echo('<tr align="center">');
	 echo('<td>');
      echo($linha['nome_produto']);
      echo('<br>');
	 echo('</td>');
	echo('</tr>');
	echo('<tr align="center">');
	 echo('<td>');
      echo($linha['nome_autor']);
      echo('<br>');  
     echo('</td>');
	echo('</tr>');
	echo('<tr align="center">');
	 echo('<td>');
      echo('<img src="'.$linha["imagem"].'" width="82" height="118">');
      echo('<br>');
     echo('</td>');
	echo('</tr>');
	echo('<tr align="center">');
	 echo('<td>');
      echo('R$ ');     
      echo($linha['preco']);  
      echo('<br>');
     echo('</td>');
	echo('</tr>');
	echo('<tr align="center">');
	 echo('<td>');
      echo('<form name="dados" method="POST" action="compras.php?opicao='.$linha['cod_produto'].'">');
       echo('<select name="corimpares">');
        $consulta = "select * from formapagamento";
        $resultado = mysql_query($consulta,$link);
        echo(mysql_error());
        while($linha  =  mysql_fetch_array($resultado)){
	     echo('<option value="'.$linha['codigo_forma_pagamento'].'">'.$linha['nome_forma_pagamento'].'</option>');
        }
       echo('<input name="confirmar" value="confirmar" type="submit" size="30" maxength="50"/>');
       echo('</select>');     
      echo('</form>');
     echo('</td>');
	echo('</tr>');	
   echo('</table>');
}
}
   ?>
  	
