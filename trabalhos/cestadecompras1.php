<?php
 session_start();
  include("incluir5.php");
  $consulta = "select codigo from usuarios where login='".$_SESSION['login']."' and senha='".$_SESSION['senha']."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){	
   $codigo=$linha['codigo'];
  }
    if(isset($_GET['opicao'])){
   $consulta = incluir5('guardaprodutos',$codigo,$_GET['opicao']);
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());   
 }
?>
<html>
 <head>
  <title>Cesta de compras</title>
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
  $consulta = "select produtos.* from produtos,usuarios,guardaprodutos where guardaprodutos.codigoprodutos=produtos.codigo and guardaprodutos.codigousuarios=usuarios.codigo and usuarios.codigo='".$codigo."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
   echo('<table align="center">');
	echo('<tr align="center">');
	 echo('<td>');
      echo($linha["nome"]);
      echo('<br>');
	 echo('</td>');
	echo('</tr>');
	echo('<tr align="center">');
	 echo('<td>');
      echo('<img src="upload/'.$linha["imagem"].'" width="50" height="35" border="0" alt="">');
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
      echo('<form name="dados" method="POST" action="compras.php?opicao='.$linha['codigo'].'">');
      echo('<input name="comprar" value="comprar" type="submit" size="30" maxength="50"/>');
      echo('</form>');
      echo('<form name="dados" method="POST" action="excluir.php?opicao='.$linha['codigo'].'">');
      echo('<input name="retirar" value="retirar" type="submit" size="30" maxength="50"/>');
      echo('</form>');      
     echo('</td>');
	echo('</tr>');	
   echo('</table>');
}
   ?>
  	
