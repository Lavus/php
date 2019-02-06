<?php
 session_start();
 include("conexao.php");
 include("monta.php");
 include("incluir.php");
?>
<html>
 <head>
  <title>Informa&ccedil;&otilde;es</title>
 </head>
<body bgcolor="aquablack">
<img src="imagens/image.png" width="100%" height="155">
<table border="1" width="100%" height="30"><tr><td>
  <tr>
   <td>
     <a href="restrito.php">Home</a>
   </td>   
   
   <td>
    <a href="contatos.php">Contato</a>
   </td>   
<?php
 $acesso=array(); 
 $nome=array();  
 $links=array();
  $consulta = "select tipo_usuario.nome,sistema.nome_tipo,sistema.cod_sistema, sistema.link from usuarios,tipo_usuario,sistema,sistema_tipo where usuario='".$_SESSION['usuario']."' and senha='".$_SESSION['senha']."' and usuarios.cod_tipo_u=tipo_usuario.cod_tipo_u and sistema_tipo.cod_sistema=sistema.cod_sistema and sistema_tipo.cod_tipo_u=tipo_usuario.cod_tipo_u";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){	
    $setor=$linha['nome'];
    
    //array_push($array, $valor)  - -  adiciona um $valor a um $array
    array_push($nome, $linha['nome_tipo']);
    array_push($acesso, $linha['cod_sistema']);
    array_push($links, $linha['link']);
  }

//sizeof($array) - retorna o tamanho de um $array 

  for($i=0; $i<sizeof($acesso); $i++){
    echo('<td>');
    echo('<a href="'.$links[$i].'">'.$nome[$i].'</a>');
    echo('</td>');  
  }
?> 
   <td>
    <a href="destroi.php">Sair</a>
   </td>
  </tr>
  </table><br><br> 
<?php  
  if (isset($_SESSION['usuario']) and isset($_SESSION['senha'])){
 $a = montaSQL('usuario',$_GET[opicao],'asc');
 $b = montaSQL('usuario',$_GET[opicao],'desc'); 
 $campo=array('dia','canetas','producaodiaria','valormateriaprima','porcentagem','caixa','diasproducao','demanda','custo','caixaposcompra','valores','bruto','liquido','caixaposvenda');
 if (isset($_GET[opicao])){
 if (isset($_GET[order])){ 
  if($_GET[order] == "desc"){
   $consulta = $a;
   $resultado=mysql_query($consulta,$link);
  echo(mysql_error());
    echo('<table border="3" align="center">');
   
     echo('<tr>');
     
      for($x=0;$x<14;$x++){
       echo('<td>');
        echo('<a href="exibe4.php?opicao='.$campo[$x].'&order=asc">'.$campo[$x].'</a>');
       echo('</td>');
      }
      
     echo('</tr>');
     
  }elseif($_GET[order] == "asc"){
   $consulta = $b;  
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());
    echo('<table border="3" align="center">');
   
     echo('<tr>');
    
      for($x=0;$x<14;$x++){
       echo('<td>');
        echo('<a href="exibe4.php?opicao='.$campo[$x].'&order=desc">'.$campo[$x].'</a>');
       echo('</td>');
      }    
        
     echo('</tr>');
  
  }
 }
 }else{
  $consulta = "select * from usuario";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
   echo('<table border="3" align="center">');
   
    echo('<tr>');
    
     for($x=0;$x<14;$x++){
      echo('<td>');
       echo('<a href="exibe4.php?opicao='.$campo[$x].'&order=asc">'.$campo[$x].'</a>');
      echo('</td>');
     }

    echo('</tr>');
 }
   echo('<form name="name" method="POST" action="enviado2.php" >');
  while($linha  =  mysql_fetch_array($resultado)){
     echo('<tr>');
   
    echo('<td>');
    echo('<input type="radio" name="Cod" value="'.$linha['dia'].'">');
     echo($linha['dia']);
     echo('<br>');
    echo('</td>');
    
    echo('<td>'); 
     echo($linha['canetas']);  
     echo('<br>');
    echo('</td>');
    
    echo('<td>'); 
     echo($linha['producaodiaria']);  
     echo('<br>');
    echo('</td>');
    
    echo('<td>'); 
     echo('R$ ');     
     echo($linha['valormateriaprima']);  
     echo('<br>');
    echo('</td>');
    
    echo('<td>');     
     echo($linha['porcentagem']);  
     echo('%');
     echo('<br>');     
    echo('</td>');    
    
    echo('<td>');
     echo('R$ ');      
     echo($linha['caixa']);  
     echo('<br>');
    echo('</td>');    
    
    echo('<td>'); 
     echo($linha['diasproducao']);  
     echo('<br>');
    echo('</td>');    
    
    echo('<td>'); 
     echo($linha['demanda']);
     echo(' kg');       
     echo('<br>');
    echo('</td>');    
    
    echo('<td>'); 
     echo('R$ ');     
     echo($linha['custo']);  
     echo('<br>');
    echo('</td>');    
    
    echo('<td>');
     echo('R$ ');      
     echo($linha['caixaposcompra']);  
     echo('<br>');
    echo('</td>');    
    
    echo('<td>');
     echo('R$ ');      
     echo($linha['valores']);  
     echo('<br>');
    echo('</td>');    
    
    echo('<td>');
     echo('R$ ');      
     echo($linha['bruto']);  
     echo('<br>');
    echo('</td>');    
    
    echo('<td>');
     echo('R$ ');      
     echo($linha['liquido']);  
     echo('<br>');
    echo('</td>');
  
    echo('<td>');
     echo('R$ ');      
     echo($linha['caixaposvenda']);  
     echo('<br>');
    echo('</td>');
   
   echo('</tr>');
 
  }
   echo('</table>');
   echo('<table border="1" align="center">');
    echo('<tr>');
     echo('<td>'); 
      echo('<input type="submit" name="Alterar" value="Alterar"');
      echo('<input type="submit" name="Incluir" value="Incluir"');
      echo('<input type="submit" name="Deletar" value="Deletar"');
     echo('</td>');
    echo('</tr>');
   echo('</table>');
  echo('</form>');
?>   
  <table border="1" align="center">   
   <form name='name' method="POST" action="exibe.php" >
<?php
 echo('<tr><td><input type="submit" name="calcular" value="calcular"></div></td></tr>');
?>
   </form>   
  </table>   
<?php  
  }else{
   echo('n&atilde;o &eacute; permitido o acesso');
 }   
?>
