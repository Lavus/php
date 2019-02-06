<?php
 session_start();
?>
<html>
 <head>
  <title>Excluir</title>
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
  $consulta = "select CPF_cliente from clientes where usuario='".$_SESSION['usuario']."' and senha='".$_SESSION['senha']."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){	
   $CPF=$linha['CPF_cliente'];
  }
  $produto=$_GET['opicao'];
  $consulta = "select guardaprodutos.cod_guarda from clientes,guardaprodutos,produtos where guardaprodutos.CPF_cliente=clientes.CPF_cliente and guardaprodutos.cod_produto=produtos.cod_produto and clientes.CPF_cliente='".$CPF."' and produtos.cod_produto='".$produto."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){	
   $guarda=$linha['cod_guarda'];
  }
  $consulta = "DELETE FROM guardaprodutos WHERE guardaprodutos.cod_guarda='".$guarda."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  echo('<meta http-equiv="refresh" content="0;cestadecompras.php">'); 
   ?>
  	
