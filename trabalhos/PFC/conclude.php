<?php
  include("conexao.php");
  include("incluir2.php");
  if(isset($_POST['concluir'])){
   $consulta = Incluir('anuncios',$_POST['descriver'],$_POST['valor'],$_POST['datainicial'],$_POST['datafinal'],$_POST['minimovenda'],$_POST['valorkm'],$_POST['prazoentrega'],$_POST['imagem'],$_POST['regras'],$_POST['titulo']);
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());
   }
?>
<?php
   $consulta = "select * from anuncios";
   //echo $consulta;
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());
   while($linha = mysql_fetch_array($resultado)){
	echo('<img src="upload/'.$linha["imagem"].'">');
   }
?>
