<html>
    <a href="destroi.php">Sair</a>
 <head>
<body bgcolor="aquablack">
<?php
  include("conexao.php");
  include("incluir.php");
  if(isset($_POST['login'])){
   $consulta = Incluir('usuarios',$_POST['login'],$_POST['senha'],$_POST['CPF'],$_POST['email'],$_POST['endereco'],$_POST['CEP']);
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());
   }
?>
<html>
 <head>
  <title>Home</title>
 </head>
 <body bgcolor="white">
  <table align="center"><tr><td>
   <tr>
<?php
 $action=array('cadastro.php');
 $nome=array('Cadastro');
 for($i=0;$i<1;$i++){
  echo('<td>');
  echo('<form name="dados" method="post" action="'.$action[$i].'">');
  echo('<input name="'.$nome[$i].'" value="'.$nome[$i].'" type="submit" size="30" maxlength="50"/>');
  echo('</form>');
  echo('</td>');
 }
?>
  </tr>
   <br/>
 </body>
  <title>Login</title>
 </head>
 <body bgcolor="white">
  <form name='name' method="POST" action="validacao.php" >
   <table border="1" align="center">
    <tr><td> Login <input type="text" name="login" value="admin"><br></td></tr>

    <tr><td> Senha <input type="password" name="senha" value="1234"><br></td></tr>

    <tr><td><input type="submit" name="enviar" value="enviar"></div></td></tr>
   </table>
  </form>
 </body>
</html>
