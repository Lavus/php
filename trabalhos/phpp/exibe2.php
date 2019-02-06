<?php
 session_start();
 include("conexao.php");
 include("monta.php");
 include("incluir2.php");
 include("calcular.php"); 
?>
<html>
 <head>
  <title>Adicional</title>
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
   if (isset($_SESSION['caixa'])){
   $meudia=calcular($_POST['Canetas'],$_POST['Producao'],$_POST['Valor'],$_POST['porcentagem'],$_SESSION['caixa']);
   }else{
   $meudia=calcular($_POST['Canetas'],$_POST['Producao'],$_POST['Valor'],$_POST['porcentagem'],10000);
   }
   $a = incluir('usuario',$meudia[0],$meudia[1],$meudia[2],$meudia[3],$meudia[4],$meudia[5],$meudia[6],$meudia[7],$meudia[8],$meudia[9],$meudia[10],$meudia[11],$meudia[12]);
   $campo=array('Nome','Email','Codigo','Login','Senha','Foto');
   $consulta = $a;
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());    
    echo('<div id="tabela1"><table border="1" align="center" align="up">');
     echo('<tr>');   
      echo('<td>');   
       echo('Os dias de produ&ccedil;&atilde;o ser&aacute;: ');
      echo('</td>');
      echo('<td>');
       echo('A demanda de mat&eacute;ria prima ser&aacute;: ');
      echo('</td>');
      echo('<td>');      
       echo('O Preco da caneta &eacute;: ');
      echo('</td>');
     echo('</tr>');             
     echo('<tr>');   
      echo('<td>');   
       echo($meudia[0]);
      echo('</td>');
      echo('<td>');
       echo($meudia[1]);
       echo(' kg');       
      echo('</td>');
      echo('<td>');
       echo('R$ ');            
       echo($meudia[5]);
      echo('</td>');
     echo('</tr>');             
    echo('</table><br><br>');  
    echo('<div id="tabela2"><table border="1" align="center">');
     echo('<tr>');     
      echo('<td>');
       echo('O Valor inicial &eacute;: ');
      echo('</td>');
      echo('<td>');
       echo('O Valor depois da compra &eacute;: ');       
      echo('</td>');    
      echo('<td>');
       echo('O caixa pos venda &eacute;: ');       
      echo('</td>');
     echo('</tr>'); 
     echo('<tr>'); 
       echo('<td>');
       echo('R$ ');        
       echo($meudia[3]);
      echo('</td>');
      echo('<td>');
       echo('R$ ');       
       echo($meudia[4]);       
      echo('</td>');    
      echo('<td>');
       echo('R$ ');       
       echo($meudia[8]);       
      echo('</td>');
     echo('</tr>');             
    echo('</table><br><br>');     
    echo('<div id="tabela3"><table border="1" align="center" valign=top, middle, bottom>');
     echo('<tr>');     
      echo('<td>');
       echo('O custo ser&aacute;: ');       
      echo('</td>');    
      echo('<td>');
       echo('O Lucro bruto &eacute;: ');       
      echo('</td>');    
      echo('<td>');
       echo('O Lucro liquido &eacute;: ');       
      echo('</td>');    
     echo('</tr>'); 
     echo('<tr>'); 
      echo('<td>');
       echo('R$ ');       
       echo($meudia[2]);       
      echo('</td>');    
      echo('<td>');
       echo('R$ ');       
       echo($meudia[6]);       
      echo('</td>');    
      echo('<td>');
       echo('R$ ');       
       echo($meudia[7]);       
      echo('</td>');    
     echo('</tr>');             
    echo('</table><br><br>'); 
    echo('<div id="tabela3"><table border="1" align="center" valign=top, middle, bottom>');
     echo('<tr>');     
      echo('<td>');
       echo('As canetas s&atilde;o: ');       
      echo('</td>');    
      echo('<td>');
       echo('A produ&ccedil;&atilde;o diaria &eacute;: ');       
      echo('</td>');    
      echo('<td>');
       echo('O valor da materiaprima &eacute;: ');       
      echo('</td>');    
      echo('<td>');
       echo('A porcentagem &eacute;: ');       
      echo('</td>');
     echo('</tr>'); 
     echo('<tr>'); 
      echo('<td>');
       echo($meudia[9]);       
      echo('</td>');    
      echo('<td>');
       echo($meudia[10]);       
      echo('</td>');    
      echo('<td>');
       echo('R$ ');       
       echo($meudia[11]);       
      echo('</td>'); 
      echo('<td>');
       echo($meudia[12].'%');       
      echo('</td>');          
     echo('</tr>');             
    echo('</table><br><br>');     
?>
<?php
  for($i=0; $i<sizeof($acesso); $i++){
  if($nome[$i]=='SIG'){
	echo('  <form name="name" method="POST" action="exibe4.php" >');
}else{
	echo('  <form name="name" method="POST" action="restrito.php" >');
}	
  }
?>  
  <form name='name' method="POST" action="exibe4.php" >
   <table border="1" align="center">
 <?php   
  echo('<tr><td><input type="submit" name="enviar" value="OK"></div></td></tr>');    
 ?>
<?php
 }else{
  echo('N&atilde;o &eacute permitido a entrada');
 }
?>
