<?php
 session_start();
   include("conexao.php");
   include("incluir2.php");
   include("incluir4.php"); 
   include("update.php");       
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = 'select nome, tipoconta from usuarios where usuarios.login="'.$_SESSION["login"].'" and usuarios.senha="'.$_SESSION["senha"].'"';
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
     echo("Voce está logado ".$linha['nome'].".");
        echo("<br><a href='destroi.php'>Sair</a><br>");
    $tipo=$linha['tipoconta'];
  }
  if($tipo==1){
	$consulta = 'select codigo from categoria where nome="'.$_POST["categoria"].'"';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    $categoria=$linha['codigo'];
    }
        $consulta = 'select nome from categoria';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    $categorias=$linha['nome'];
    }
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<head>
<title>Concluido</title>
</head>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



    <title>Trabalho TCC</title>

        <link rel="stylesheet" type="text/css" href="style2.css" media="all">


    <link rel="stylesheet" type="text/css" href="style.css" media="all">
<script src="jquery.min.js" type="text/javascript"></script>

<script src="coin-slider.min.js" type="text/javascript"></script>

</head>


<body>


<div id="outer-wrap">
<div id="outer-wrap-2">


<div id="wrapper" style="display: block; ">



<div id="innerwrapper">



    <div id="banner" class="main" style="background: url(imagens/inverno.jpg) center;">
        <a class="bannerlink" href="" title="asd"></a>


    </div>



    <div id="mainwrapper">



<ul id="menus">
    <li id="menus2"><a href="home.php">Home</a></li>
    <li id="menus2"><a href="contaadmin.php">Conta</a></li>
    <li id="menus2"><a href="comentarios.php">Comentarios</a></li>
    <li id="menus3"><a href="cadaspromo.php">Cadastra Produtos</a></li>
    <li id="menus3"><a href="gerenciar.php">Gerenciar Produtos</a></li>
</ul>


        <div class="mainwrapper-inner">

        <div class="mainwrapper-inner-inner">








            <div id="listaE">







            </div>



            <div id="corpodosite">


<h2><span class="green">Concluido</span></h2>
                <div id="contactform">
                    <div class="form">
                    <div class="clear2"></div>
                    <div class="clear2"></div>
                    <div class="clear2"></div>
   <table align="center" id="table3">
<?php
   if(isset($_POST['concluir'])){
   if ($_POST['position']=="Lista direita"){
   $position="listad";
   $posicao="1";
   }
   if ($_POST['position']=="Lista central"){
   $position="produtosindex";
   $posicao="2";
   }
   if ($_POST['position']=="Slide"){
   $position="slide";
   $posicao="3";
   }
    $consulta = 'select codigo from categoria where nome="'.$_POST["categoria"].'"';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    $categoria=$linha['codigo'];
    }
   $consulta = Incluir('produtos',$_POST['titulo'],$_POST['descriver'],$_POST['valor'],$_POST['imagem'],$categoria,$posicao);
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());
    $consulta = 'select codigo from produtos where titulo="'.$_POST["titulo"].'" and descricao="'.$_POST["descriver"].'" and valor="'.$_POST["valor"].'" and categorias="'.$categoria.'"  and imagem="'.$_POST["imagem"].'"';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    $produto=$linha['codigo'];
    }
   echo(mysql_error());
   $consulta = Incluir4($position,$produto);
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error()); 
   
   
   
   
   
   }elseif(isset($_POST['atualizar'])){
   
   
   
   
   
   
   
   if ($_POST['position']=="Lista direita"){
   $position="listad";
   $posicao="1";
   }
   if ($_POST['position']=="Lista central"){
   $position="produtosindex";
   $posicao="2";
   }
   if ($_POST['position']=="Slide"){
   $position="slide";
   $posicao="3";
   }
    $consulta = 'select codigo from categoria where nome="'.$_POST["categoria"].'"';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    $categoria=$linha['codigo'];
    }
   $consulta = Atualizar('produtos',$_POST['titulo'],$_POST['descriver'],$_POST['valor'],$_POST['imagem'],$categoria,$posicao,$_POST['codigo']);
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());
   $consulta = 'delete from '.$position.' where codigoproduto in(select codigo from produtos where codigo="'.$_POST['codigo'].'")';
   $resultado = mysql_query($consulta,$link);
   echo(mysql_error());
   $consulta = Incluir4($position,$_POST['codigo']);
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error()); 	   
   }   
?>
   <?php
    $consulta = 'select * from produtos where titulo="'.$_POST["titulo"].'" and descricao="'.$_POST["descriver"].'" and valor="'.$_POST["valor"].'" and categorias="'.$categoria.'"  and imagem="'.$_POST["imagem"].'"';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
        echo('<br>');
        $titulo=$linha['titulo'];
        $categoria=$linha['categorias'];
        $descricao=$linha['descricao'];
        $valor=$linha['valor'];
        $imagem=$linha['imagem'];
        $codigo=$linha['codigo'];
    }
        echo('<br>');
        echo('<tr><td>titulo  :'.$titulo.'</td></tr>');
        echo('<tr><td>categoria  :'.$categorias.'</td></tr>');
        echo('<tr><td>descricao  :'.$descricao.'</td></tr>');        
        echo('<tr><td>valor  :R$ '.$valor.'</td></tr>');
        echo('<tr><td><img src="upload/'.$imagem.'"></td></tr>');
        echo('<form method="POST" action="home.php" enctype="multipart/form-data">');        
        echo('<tr><td><input type="submit" name="back" value="Voltar"></td></tr>');
        echo('</form>');
   ?>
   </table>
   <table align="center">
    <form method="POST" action="cadaspromo"conclude enctype="multipart/form-data">

  </form>
      <form method="POST" action="conclude" enctype="multipart/form-data">

   </table>
  </form>
 </div>

    <div id="conteudoslide">

        </div>





            <div id="conteudo">


        </div>

        </div>




            </div>




        </div>

        </div>

    </div>


        </div>



</body></html>
<?php
}else{
    echo('<meta http-equiv="refresh" content="0;home.php">');
}
}
?>
