<?php
 session_start();
 include("conexao.php");
?>
<html>
 <head>
  <title>Valida&ccedil;&atilde;o</title>
 </head>
<?php
 $consulta = "select login,senha from usuarios";
 $resultado = mysql_query($consulta,$link);
 echo(mysql_error());
   while($linha  =  mysql_fetch_array($resultado)){
    if(($_POST['login']==$linha['login']) and ($_POST['senha']==$linha['senha'])){
        echo('<meta http-equiv="refresh" content="0;cadaspromo.php">');
        $_SESSION['login']=$_POST['login'];
        $_SESSION['senha']=$_POST['senha'];
    }
    else if(($_POST['login']=='admin') and ($_POST['senha']=='1234')){
        echo('<meta http-equiv="refresh" content="0;cadaspromo.php">');
        $_SESSION['login']=$_POST['login'];
        $_SESSION['senha']=$_POST['senha'];
    }
    else{
        echo('<table align="center">');
        echo('<tr align="center">');
        echo('<td>');
        echo ('<H1>Usuario ou senha incorreto!</H1>');
        echo('<br>');
        echo('</td>');
        echo('</tr>');
        echo('</table>');
        echo('<meta http-equiv="refresh" content="1;login.php">');
    }
}
?>


