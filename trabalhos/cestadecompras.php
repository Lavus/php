<?php
 session_start();
?>
<?php
  include("conexao.php");
    include("incluir5.php");
?>
<?php 
   if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = "select codigo from usuarios where login='".$_SESSION['login']."' and senha='".$_SESSION['senha']."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){	
   $codigo=$linha['codigo'];
  }
    }else{
	   $codigo='0';
	}
    if(isset($_GET['opicao'])){
   $consulta = incluir5('guardaprodutos',$codigo,$_GET['opicao']);
   $resultado=mysql_query($consulta,$link);
   echo(mysql_error());   
 }
   $consulta = 'select nome from categoria';
   $resultado = mysql_query($consulta,$link);
   echo(mysql_error());
   while($linha  =  mysql_fetch_array($resultado)){
   $categorias=$linha['nome'];
   }
   
      if(isset($_GET['gproduto'])){ 
     $guarda=$_GET['gproduto'];
  $consulta = "DELETE FROM guardaprodutos WHERE guardaprodutos.codigo='".$guarda."'";
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
}
    ?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">



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


<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = 'select nome, tipoconta from usuarios where usuarios.login="'.$_SESSION["login"].'" and usuarios.senha="'.$_SESSION["senha"].'"';
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
     echo("Voce está logado ".$linha['nome'].".");
        echo("<br><a href='destroi.php'>Sair</a><br>");
     if ($linha['tipoconta']==1){
        echo("<a href='contaadmin.php'>Conta</a>");
     }
  }
   }
?>
<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
    }else{
?>
            <form name='name' method="POST" action="validacao.php">
                     Login <input type="text" name="login" value=""><br>
                     Senha <input type="password" name="senha" value=""><br>
                    <input type="submit" name="enviar" value="enviar">
            </form>
<?php
}
?>

    <div id="banner" class="main" style="background: url(imagens/inverno.jpg) center;">
        <a class="bannerlink" href="" title="asd"></a>


    </div>



    <div id="mainwrapper">



<ul id="menus">
    <li><a href="home.php">Home</a></li>
    <li><a href="produtos.php">Produtos</a></li>
    <li><a href="promo.php">Promoções</a></li>
    <li><a href="contato.php">Contato</a></li>
<?php
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = 'select nome, tipoconta from usuarios where usuarios.login="'.$_SESSION["login"].'" and usuarios.senha="'.$_SESSION["senha"].'"';
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
    $tipo=$linha['tipoconta'];
  }
  if($tipo==1){
	  echo('<li><a href="gerenciar.php">Gerenciar</a></li>');	
  }else{
  		 echo('<li><a href="produtos.php">Produto</a></li>');	
  }
    }else{
	echo('<li><a href="cadastro.php">Cadastro</a></li>');	
    }
?>
</ul>


        <div class="mainwrapper-inner">

        <div class="mainwrapper-inner-inner">








            <div id="listaE">


                <ul class="nav">
    <?php
    $consulta = 'select * from categoria';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<li><a href="produtos.php?codigo='.$linha['codigo'].'&nome='.$linha['nome'].'">');
    echo($linha['nome']);
    echo("</a></li>");
    }
    ?>
                </ul>



                    <ul class="emailpromo">

                            <strong>Reçeba promoções por E-mail</strong>
                                <li class="caixaemailpromo">
                                <form action="" method="post">
                                <input type="text" size="13" value="E-mail" name="signup"><input class="submit" type="image" src="imagens/signupsubmit.png" width="20" height="15"  alt="" title="Enviar">
                                </form>
                            </li>


                    </ul>




            </div>



            <div id="corpodosite">





                <ul id="listaD">
                    <li class="titulo"><a href=""><h4>Produtos Promovidos</h4></a></li>
    <?php
    $consulta = 'select produtos.codigo,produtos.titulo,produtos.valor,produtos.imagem from listad,produtos where listad.codigoproduto=produtos.codigo';
    $resultado = mysql_query($consulta,$link);
    echo(mysql_error());
    while($linha  =  mysql_fetch_array($resultado)){
    echo('<li class="first odd">');
    echo('<a href="paginaprodutos.php?codigo='.$linha['codigo'].'">');
    echo('<img src="upload/'.$linha["imagem"].'" width="50" height="35" border="0" alt="">');
    echo('<p>'.$linha["titulo"].'</p>');
    echo('<span style="text-decoration:none !important;">R$ '.$linha["valor"].'</span>');
    echo('</a>');
    echo('</li>');
    }
    ?>
                                        </ul>

            <div id="conteudo">
<table>
   <?php
   if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = "select produtos.*,guardaprodutos.codigo as guardacodigo from produtos,usuarios,guardaprodutos where guardaprodutos.codigoprodutos=produtos.codigo and guardaprodutos.codigousuarios=usuarios.codigo and usuarios.codigo='".$codigo."'";
  }else{
    $consulta = "select produtos.*,guardaprodutos.codigo as guardacodigo from produtos,guardaprodutos where guardaprodutos.codigoprodutos=produtos.codigo and guardaprodutos.codigousuarios='".$codigo."'";
  }
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
   echo('<table align="center">');
	echo('<tr align="center">');
	 echo('<td>');
      echo($linha["titulo"]);
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
      echo($linha["valor"]);  
      echo('<br>');
     echo('</td>');
	echo('</tr>');
	echo('<tr align="center">');
	 echo('<td>');
      echo('<form name="dados" method="POST" action="encerrar.php?gproduto='.$linha['guardacodigo'].'">');
      echo('<input name="comprar" value="comprar" type="submit" size="30" maxength="50"/>');
      echo('</form>');
      echo('<form name="dados" method="POST" action="cestadecompras.php?gproduto='.$linha['guardacodigo'].'">');
      echo('<input name="retirar" value="retirar" type="submit" size="30" maxength="50"/>');
      echo('</form>');      
     echo('</td>');
	echo('</tr>');	
   echo('</table>');
}
    if (isset($_SESSION['login']) and isset($_SESSION['senha'])){
  $consulta = "select sum(produtos.valor) as valortotal from produtos,usuarios,guardaprodutos where guardaprodutos.codigoprodutos=produtos.codigo and guardaprodutos.codigousuarios=usuarios.codigo and usuarios.codigo='".$codigo."'";
  }else{
  $consulta = "select sum(produtos.valor) as valortotal from produtos,guardaprodutos where guardaprodutos.codigoprodutos=produtos.codigo and guardaprodutos.codigousuarios='".$codigo."'";
  }
  $resultado = mysql_query($consulta,$link);
  echo(mysql_error());
  while($linha  =  mysql_fetch_array($resultado)){
    echo('<table align="center">');
	echo('<tr align="center">');
	 echo('<td>');
      echo('R$ ');
      echo(round($linha["valortotal"] * 100)/100);
      echo('<br>');
	 echo('</td>');
	echo('</tr>');
	echo('<tr align="center">');
	 echo('<td>');
      echo('<form name="dados" method="POST" action="produtos.php">');
      echo('<input name="continuar" value="Continuar Compra" type="submit" size="30" maxength="50"/>');
      echo('</form>');
      echo('<form name="dados" method="POST" action="encerrar.php">');
      echo('<input name="encerrar" value="Encerrar Compra" type="submit" size="30" maxength="50"/>');
      echo('</form>');      
     echo('</td>');
	echo('</tr>');	
   echo('</table>');	
}
   ?>
</table>
        </div>

        </div>




            </div>




        </div>

        </div>

    </div>


        </div>



</body></html>
